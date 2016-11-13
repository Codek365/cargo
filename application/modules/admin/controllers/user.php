<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		
	}

	public function index()
	{
		$this->_data['user_list'] = $this->m_user->loadUserlist();
		$this->_data['user_role'] = $this->m_user->loadRole();
		$this->_data['title_area']="User Manager";
        $this->_data["view"]="user/index";
        $this->load->view($this->_data["template"],$this->_data);
	}

	public function addUser()
	{
		$user['user_username'] = $this->input->get('username');
		$user['user_fullname'] = $this->input->get('fullname');
		$user['user_password'] = md5($this->input->get('pass'));
		$user['user_email'] = $this->input->get('email');
		$user['user_gender'] = $this->input->get('gender');
		$user['user_position'] = $this->input->get('role');
		$this->m_user->addUser($user);
		redirect(base_url().'admin/user');
	}

	public function delete()
	{
		$id = $this->input->get('id', TRUE);
		$this->m_user->deleteUser($id);
		redirect(base_url().'admin/user');
	}
	public function role()
	{
		$this->_data['user_role'] = $this->m_user->loadRole();
        $this->_data['routers'] = $this->m_user->loadRouters();
		$this->_data['title_area']="User Role";
        $this->_data["view"]="user/role";
        $this->load->view($this->_data["template"],$this->_data);
	}
	public function decentralization()
	{
		$id = $this->input->get('id');
		if(!empty($id)){
			$this->_data['routers'] = $this->m_user->loadRoutersById($id);
		} else {			
			$this->_data['routers'] = $this->m_user->loadRoutersById($this->session->userdata('usergroup'));
		}
		$this->_data['user_groups'] = $this->m_user->loadRole();
		$this->_data['title_area']="User Decentralization";
        $this->_data["view"]="user/decentralization";
        $this->load->view($this->_data["template"],$this->_data);
	}
	public function decentralization_edit()
	{
		$id = $this->input->get('id');	
		$line = $this->input->get('line');	
		$delline = $this->input->get('delline');
		if (!empty($line)) {
			$lines['user_position_id'] = $id;
			$lines['user_router_id'] = $line;
			// print_r($lines);
			$this->m_user->addRoleRouter($lines);	
			redirect(base_url().'admin/user/decentralization_edit?id='.$id);			
		}
		if (!empty($delline)) {
			// $dellines['id'] = $delline;
			// print_r($lines);
			$this->m_user->deleteRoleRouter($delline);			
		}
		$this->_data['routersId'] = $this->m_user->loadRoutersById($id);	
		$this->_data['routers'] = $this->m_user->loadRouters();		
		$this->_data['user_groups'] = $this->m_user->loadRole();
		$this->_data['title_area']="User Decentralization";
        $this->_data["view"]="user/decentralization_edit";
        $this->load->view($this->_data["template"],$this->_data);
	}
	public function changepassword(){
        $error="";
        if($this->input->post('edit')){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('old','old password','required');
            $this->form_validation->set_rules('new','new password','required');
            $this->form_validation->set_rules('renew','confirm password','required|matches[new]');
            if($this->form_validation->run()){
                $oldpassword=$this->input->post('old');
                $newpassword=$this->input->post('new');
                if($this->m_user->checkPassord($this->session->userdata('user_id'),$oldpassword)){
                    $this->m_user->updateUser($this->session->userdata('user_id'),array('user_password'=>md5($newpassword)));
                    $this->session->set_flashdata('notify','You have just updated your password successfully');
                    redirect(base_url().'admin/user/');
                }else{
                    $error.='<li>Your password you entered is incorrect</li>';
                }
            }else{
                $error.=validation_errors('<li>','</li>');
            }
        }
        $this->_data['error']=$error;
        $this->_data['styles'][]='public/admin_layout/css/style1.css';
        $this->_data['title_area']="User management";
        $this->_data['title']="Change password";
        $this->_data['view']='user/changepassword';
		$this->load->view($this->_data['template'],$this->_data);
    }

    public function profile(){
        $user_id=$this->session->userdata('user_id');
        $data=array();
        $error="";
        $data['user_gender']=1;
        $avatar=$this->m_user->getAvatar($user_id);
        $data['user_avatar']=$avatar['user_avatar'];
        if(!empty($user_id)){
            if($this->input->post('save')!=""){
                $this->load->library('form_validation');
                $data['user_fullname']=$this->input->post('user_fullname');
                $data['user_email']=$this->input->post('user_email');
                $data['user_gender']=$this->input->post('user_gender');
                $this->form_validation->set_rules('user_fullname','fullname','required');
                $this->form_validation->set_rules('user_email','email','valid_email');
                if($this->form_validation->run()){
                    if(!empty($_FILES['user_avatar']['name'])){
                        $config['upload_path'] = './uploads/avatar/';
                        $config['allowed_types'] = 'gif|jpg|png';
                        $config['max_size'] = 15000;
                        $config['max_width']  = 15000;
                        $config['max_height']  = 15000;
                        $this->load->library('upload', $config);
                        if ($this->upload->do_upload("user_avatar"))
                        {
                            $img_uploaded=$this->upload->data();
                            $config['image_library'] = 'gd2';
                            $config['source_image'] = './uploads/avatar/'.$img_uploaded["file_name"];
                            $config['create_thumb'] = TRUE;
                            $config['maintain_ratio'] = TRUE;
                            $config['width']= 150;
                            $config['height']= 150;
                            $this->load->library('image_lib',$config);
                            if(!$this->image_lib->resize()){
                                $error.=$this->image_lib->display_errors("<li>","</li>");
                            }
                            if(file_exists('./uploads/avatar/'.$data['user_avatar'])){
                                unlink('./uploads/avatar/'.$data['user_avatar']);
                            }
                            if(file_exists('./uploads/avatar/thumb_'.$data['user_avatar'])){
                                unlink('./uploads/avatar/thumb_'.$data['user_avatar']);
                            }
                        }else{
                              $error.=$this->upload->display_errors("<li>","</li>");
                        }
                    }
                    if(empty($error)){
                        if(!empty($_FILES['user_avatar']['name'])){
                            $data['user_avatar']=$img_uploaded["file_name"];
                        }
                        $this->m_user->updateUser($user_id,$data);
                        $this->session->set_flashdata('notify','You have just updated your profile successfully');
                        redirect(base_url().'admin/user/profile');
                    }
                }
            }else{
                $data=$this->m_user->getProfile($user_id);
            }
            $this->_data['error']=$error;
            $this->_data['info']=$data;
            $this->_data['title_area']='Edit profile';
            $this->_data['view']='user/profile';
            $this->load->view($this->_data['template'],$this->_data);
        }
    }

    public function roleA()
    {
        $user_id = $this->input->get('id');
        $role = $this->input->get('role');
        $this->m_user->updateUser($user_id,array('user_position'=>$role));
    }
    public function routerA()
    {
        $user_position_id = $this->input->get('id');
        $router = $this->input->get('router');
        echo $router;
        $this->m_user->updateUserRouter($user_position_id,array('default_router'=>$router));
    }
}

/* End of file  */
/* Location: ./application/controllers/ */