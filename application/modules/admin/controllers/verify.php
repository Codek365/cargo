<?php
class Verify extends Admin_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('m_verify');
		
	}
    public function forgot(){
        $data=array();
        $this->_data["error"]="";
        if($this->input->post('btnforgot')!=""){
            $this->load->library('form_validation');
            $this->form_validation->set_rules("username","username","required");
            $this->form_validation->set_rules("email","email","required|valid_email");
            $data["username"]=$this->input->post("username",true);
            $data["email"]=$this->input->post("email",true);
            if($this->form_validation->run()==true){
                 $compare=$this->m_verify->checkForgotPassword($data["username"],$data["email"]);
                 if(!empty($compare)){
                        $password=substr(time(),strlen(time())-6,strlen(time()));
                        $body='This is your new password: <b>'.$password.'</b>';
                        $this->load->library("Mail");
                        $this->mail->send($data['email'],$body,'Your new password',null);
                        $this->m_verify->updatePassword($data['username'],$data['email'],md5($password));
                        $this->session->set_flashdata('notify','Please check your email to get new password');
                        //redirect(base_url().'admin/verify/login');
                }else{
                    $this->_data["error"]="The username and email are incorrect, please try again";
                }
            }else{
                $this->_data["error"].=validation_errors();
            }
        }
        
        $this->_data['view']='login_layout/content';
		$this->load->view('login_layout/template',$this->_data);
    }
	public function login(){
	   if($this->session->userdata('username')){
	       redirect(base_url().'admin/dashboard/index');
	   }else{
		$this->_data['error']="";
		if($this->input->post("login")!=""){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('user','username','required|min_length[3]');
			$this->form_validation->set_rules('password','password','required|min_length[5]');
			if($this->form_validation->run()){
				$data['username']=$this->input->post('user',true);
				$password=$this->input->post('password',true);
				$checklogin=$this->m_verify->checkLogin($data['username'],md5($password));
				if(!empty($checklogin)){
					$this->session->set_userdata('user_id',$checklogin['user_id']);
					$this->session->set_userdata('username',$checklogin['user_username']);
					$this->session->set_userdata('usergroup',$checklogin['user_position']);
					$this->session->set_flashdata('notify_login','login is successful');
					$default= $this->m_verify->defaultRouter($checklogin['user_position']);
                    // var_dump($default['default_router']);
					redirect(base_url().'admin/'.$default['default_router']);
				}else{
					$this->_data['error']="<li>Your username or password is incorrect</li>";
				}
			}else{
				$this->_data['error'].=validation_errors('<li>','</li>');
			}
		}
		$this->_data['view']='login_layout/content';
		$this->load->view('login_layout/template',$this->_data);
    }
	}
    public function logout(){
        echo $this->session->sess_destroy();

        redirect(base_url());
    }
    public function test()
    {
    	
    	
    }
}
?>