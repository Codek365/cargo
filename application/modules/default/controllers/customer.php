<?php
class Customer extends Default_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('mcustomer');
        $this->load->model('mblog');
        $this->_data['related_data']=$this->mblog->getRelatedNews(2,10);
    }
    public function active(){
        $active_code=$this->uri->segment(3);
        if($this->mcustomer->checkActive($active_code)==true){
            $data['active']=1;
            $this->mcustomer->active($data,$active_code);
            $this->session->set_flashdata('notify','You have just actived your account successfully');
            redirect(base_url().'blog');
        }else{
            echo 'Your active code is incorrect';
        }
    }
    public function myaccount(){
         if(!$this->session->userdata('customer_id')){
            redirect(base_url());
            exit();
        }else{
            $id=$this->session->userdata('customer_id');
        }
        $avatar=$this->mcustomer->getAvatar($id);
        $data=array();
        $this->_data['error']="";
        $this->_data['info']['avatar']=$avatar['avatar'];
        $this->_data['info']['username']=$avatar['username'];
        if($this->_data['language']=='english'){
            $this->_data['titlepage']='My account';
            $this->_data['titlepanel']='My account';
        }elseif($this->_data['language']=='vietnamese'){
            $this->_data['titlepage']='Tài khoản';
            $this->_data['titlepanel']='Tài khoản';
        }
        if($this->input->post('update')!=""){
            $data['fullname']=$this->input->post('fullname');
            $data['phone']=$this->input->post('phone');
            $data['address']=$this->input->post('address');
            $data['avatar']=$_FILES['avatar']['name'];
            $this->load->library('form_validation');
            $this->form_validation->set_rules('phone','phone','required');
            if($this->form_validation->run()){
                if(!empty($data['avatar'])){
                    $config['upload_path'] = './uploads/avatar/';
            		$config['allowed_types'] = 'gif|jpg|png';
            		$config['max_size']	= '1000';
            		$config['max_width']  = '800';
            		$config['max_height']  = '800';
            		$this->load->library('upload', $config);
                    if ($this->upload->do_upload("avatar"))
            		{
      		            $img_uploaded=$this->upload->data();
      		            $config['image_library'] = 'gd2';
                        $config['source_image']	= './uploads/avatar/'.$img_uploaded["file_name"];
                        $config['create_thumb'] = TRUE;
                        $config['maintain_ratio'] = TRUE;
                        $config['width']= 100;
                        $config['height']= 100;
                        $this->load->library('image_lib',$config);
                        if(!$this->image_lib->resize()){
                            $this->_data["error"].=$this->image_lib->display_errors("<li>","</li>");
                        }else{
                            if(file_exists('./uploads/avatar/'.$avatar['avatar'])){
                                unlink('./uploads/avatar/'.$avatar['avatar']);
                            }
                            if(file_exists('./uploads/avatar/thumb_'.$avatar['avatar'])){
                                unlink('./uploads/avatar/thumb_'.$avatar['avatar']);
                            }
                        }
                		}else{
                		  $this->_data["error"].=$this->upload->display_errors("<li>","</li>");
                		}
                    }
                    if(empty($this->_data["error"])){
                        $this->load->helper("date");
                        $data["date"]=local_to_gmt(now());
                        if(empty($_FILES['avatar']['name'])){
                            $data['avatar']=$avatar['avatar'];
                        }else{
                            $data['avatar']=$img_uploaded["file_name"];
                        }
                        $this->mcustomer->updateAccount($id,$data);
                        $this->session->set_flashdata("notify","You have just updated your account successfully");
                        redirect(base_url().'customer/myaccount');
                    }
            }else{
                $this->_data['error'].=validation_errors('<li>','</li>');
            }
        }else{
            $this->_data['info']=$this->mcustomer->getAccount($id);
        }
        $this->_data['styles']=array('style1.css');
        $this->lang->load('register',$this->_data['language']);
        $this->_data["view"]="customer/myaccount";
        $this->load->view($this->_data['template'],$this->_data);
    }
     public function forgotpassword(){
            if($this->session->userdata('customer_id')){
                redirect(base_url());
                exit();
            }
            $data=array();
            if($this->input->post("receivepassword")!=""){
                $this->load->library('form_validation');
                $this->form_validation->CI =& $this;
                $this->form_validation->set_rules("username","username","required");
                $this->form_validation->set_rules("email","email","required|valid_email");
                $data["username"]=$this->input->post("username");
                $data["email"]=$this->input->post("email");
                if($this->form_validation->run()==true){
                    $compare=$this->mcustomer->checkForgotPassword($data["username"],$data["email"]);
                    if(count($compare)>0){
                        $password=time();
                        $body='This is your new password: <b>'.$password.'</b>';
                        $this->load->library("Mail");
                        $this->mail->send($data['email'],$body,'ATZ Company',null);
                        $this->mcustomer->updatePassword($data['username'],$data['email'],md5($password));
                        $this->session->set_flashdata('notify','Please check your email to get new password');
                        redirect(base_url().'blog');
                    }else{
                        $this->_data["error"]="The username and email are incorrect, please try again";
                    }
                }else{
                    $this->_data["error"]=validation_errors();
                }
            }
            $this->_data["info"]=$data;
            $this->_data['styles']=array('public/admin_layout/css/style1.css');
            $this->_data['title_page']="Register an account";
            $this->_data['view']='customer/forgotpassword';
            $this->load->view('default/blog_template',$this->_data);
        }
     public function changepassword(){
            $this->_data["error"]="";
            $data=array();
            if($this->input->post('btnChange')!=''){
                $this->load->library('form_validation');
                $this->form_validation->set_rules('oldpassword','old password','required|min_length[6]');
                $this->form_validation->set_rules('newpassword','new password','required|min_length[6]');
                $this->form_validation->set_rules('repassword','re-password','required|min_length[6]|matches[newpassword]');
                $data['oldpassword']=$this->input->post('oldpassword');
                $data['newpassword']=$this->input->post('newpassword');
                $data['repassword']=$this->input->post('repassword');
                if($this->form_validation->run()){
                    $id=$this->session->userdata('customer_id');
                    $comparePassword=$this->mcustomer->checkUser($id,md5($data['oldpassword']));
                    if(count($comparePassword)>0){
                        $this->mcustomer->changePassword(md5($data['newpassword']),$id);
                        $this->session->set_flashdata('notify','The password has been changed successfully');
                        redirect(base_url().'customer/changepassword');
                    }else{
                        $this->_data['error']='<li>The old password is incorrect, please try again</li>';
                    }
                }else{
                    $this->_data["error"].=validation_errors('<li>','</li>');
                }
            }
            $this->_data['styles']=array('public/admin_layout/css/style1.css');
            $this->_data['title_page']="Change password";
            $this->_data['view']='customer/changepassword';
            $this->load->view('default/blog_template',$this->_data);
        }  
    public function register(){
        if($this->session->userdata('customer_id')){
            redirect(base_url());
            exit();
        }else{
            $data=array();
            $this->_data['error']="";
            if($this->input->post('register')!=""){
                $data['username']=$this->input->post('username');
                $data['password']=$this->input->post('password');
                $data['email']=$this->input->post('email');
                $data['fullname']=$this->input->post('fullname');
                $data['phone']=$this->input->post('phone');
                $data['address']=$this->input->post('address');
                $data['avatar']=$_FILES['avatar']['name'];
                $this->load->library('form_validation');
                $this->form_validation->CI =& $this;
                $this->form_validation->set_rules('username','username','required|min_length[3]|callback_checkUsername');
                $this->form_validation->set_rules('password','password','required|min_length[6]');
                $this->form_validation->set_rules('email','email','required|valid_email|callback_checkEmail');
                $this->form_validation->set_rules('phone','phone','required|callback_checkPhone');
                $this->form_validation->set_rules('repassword','re-password','required|matches[password]');
                if($this->form_validation->run()){
                    if(!empty($data['avatar'])){
                        $config['upload_path'] = './uploads/avatar/';
                		$config['allowed_types'] = 'gif|jpg|png';
                		$config['max_size']	= '1000';
                		$config['max_width']  = '800';
                		$config['max_height']  = '800';
                		$this->load->library('upload', $config);
                        if ($this->upload->do_upload("avatar"))
                		{
          		            $img_uploaded=$this->upload->data();
          		            $config['image_library'] = 'gd2';
                            $config['source_image']	= './uploads/avatar/'.$img_uploaded["file_name"];
                            $config['create_thumb'] = TRUE;
                            $config['maintain_ratio'] = TRUE;
                            $config['width']= 100;
                            $config['height']= 100;
                            $this->load->library('image_lib',$config);
                            if(!$this->image_lib->resize()){
                                $this->_data["error"].=$this->image_lib->display_errors("<li>","</li>");
                            }
                		}else{
                		  $this->_data["error"].=$this->upload->display_errors("<li>","</li>");
                		}
                    }
                    if(empty($this->_data["error"])){
                        $this->load->helper("date");
                        $data["date"]=local_to_gmt(now());
                        $data["password"]=md5($data["password"]);
                        $data["code_active"]=md5(time());
                        $this->mcustomer->Register($data);
                        //SEND MAIL
                        $body='<a href="'.base_url().'customer/active/'.$data['code_active'].'">Click here to active your account</a>';
                        $this->load->library("Mail");
                        $this->mail->send($data['email'],$body,'ATZ Company',null);
                        //###SEND MAIL
                        $this->session->set_flashdata("notify","You have just registed an account successfully, please check your email");
                        redirect(base_url().'contact/sentmail');
                    }
                }else{
                    $this->_data['error']=validation_errors('<li>','</li>');
                    $this->_data['info']=$data;
                }
            }
            
            $this->_data['styles']=array('public/admin_layout/css/style1.css');
            $this->_data['title_page']="Register an account";
            $this->_data['view']='customer/register';
            $this->load->view('default/blog_template',$this->_data);
        }
    }
    public function login(){
        if($this->session->userdata('customer_id')){
            redirect(base_url());
            exit();
        }
        $error="";
         if($this->input->post("submit")!=""){
            $data['username']=$this->input->post('username',true);
            $data['password']=$this->input->post('password',true);
            $this->load->library('form_validation');
            $this->form_validation->set_rules('username','username','required');
            $this->form_validation->set_rules('password','password','required');

            if($this->form_validation->run()){
                $rs=$this->mcustomer->Login($data['username'],md5($data['password']));
                if(empty($rs)){
                    $error.='<li>The username or password is incorrect</li>';
                }else{
                    if($rs['active']==0){
                        $error.="<li>Your account haven't actived yet, please check your email</li>";
                    }else{
                        $this->session->set_userdata('customer_id',$rs['id']);
                        $this->session->set_userdata('customer_username',$rs['username']);
                    }
                }
            }else{
                $error.=validation_errors('<li>','</li>');
            }
        }
        $this->session->set_flashdata('error',$error);
        $url=$this->input->post('url');
        if(empty($url)){
            redirect(base_url().'blog');
        }else{
            redirect(base_url().'home');
        }
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url().'customer/blog');
    }
    public function checkUsername($username){
        if($this->mcustomer->checkUsername($username)==true){
            return true;
        }else{
            $this->form_validation->set_message('checkUsername','The username was used');
            return false;
        }
    }
     public function checkEmail($email){
        if($this->mcustomer->checkEmail($email)==true){
            return true;
        }else{
            $this->form_validation->set_message('checkEmail','The email was used');
            return false;
        }
    }
    public function checkPhone($phone){
        if($this->mcustomer->checkPhone($phone)==true){
            return true;
        }else{
            $this->form_validation->set_message('checkPhone','The phone was used');
            return false;
        }
    }
}
?>