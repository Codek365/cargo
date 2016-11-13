<?php
class Contact extends Admin_Controller{
	public function __construct(){
		parent::__construct();
        session_start();
        $this->load->model('m_contact');
	}
    public function info(){
        $data=array();
        $this->_data['data']=$this->m_contact->getInfoData();
        if($this->input->post('addinfo')!=""){
            $data['phone']=$this->input->post('phone');
            $data['email']=$this->input->post('email');
            $data['address']=$this->input->post('address');
            $data['info']=$this->input->post('info');
            $this->m_contact->update($data);
            redirect(base_url().'admin/contact/info');
        }
        $this->_data['title']="Contact";
        $this->_data['scripts']=array('public/scripts/ckeditor/ckeditor.js');
        $this->_data['view']='contact/info';
		$this->load->view($this->_data['template'],$this->_data);
    }
    public function email(){
        $this->_data['info']=$this->m_contact->listEmail();
        $this->_data['title_area']="Contact";
        $this->_data['view']='contact/email';
		$this->load->view($this->_data['template'],$this->_data);
    }
    public function deleteemail(){
        $id=$this->uri->segment(4);
        if(!empty($id) || is_numeric($id)){
            $this->m_contact->deleteEmail($id);
        }
        redirect(base_url().'admin/contact/email');
    }
    public function reply(){
        $id=$this->uri->segment(4);
        if(empty($id) || !is_numeric($id)){
            redirect(base_url().'admin/contact/email');
        }
        $_SESSION['KCFINDER']['disabled']=false;
        $_SESSION['KCFINDER']['uploadURL'] =base_url().'uploads/kcfinder/';//.$this->session->userdata['username'];
        $data=array();
        $error="";
        if($this->input->post("reply")!=""){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('subject','subject','required');
            $this->form_validation->set_rules('message','message','required');
            $data['subject']=$this->input->post('subject');
            $data['message']=$this->input->post('message');
            $id=$this->input->post('id');
            if($this->form_validation->run()){
                $info=$this->m_contact->getMailById($id);
                $this->load->library('Mail');
                $this->mail->send($info['email'],$data['message'],$data['subject']);
                $this->session->set_flashdata('notify','Your email has been sent to '.$info['name'].' successfully');
                redirect(base_url().'admin/contact/reply/'.$id);
            }else{
                $error.=validation_errors('<li>','</li>');
            }
        }
        $this->_data['error']=$error;
        $this->_data['data']=$data;
        $this->_data['id']=$id;
        $this->_data['title_area']="Reply Email";
        $this->_data['view']='contact/reply';
        $this->_data['styles'][]='public/admin_layout/css/style1.css';
        $this->_data['scripts']=array('public/scripts/ckeditor/ckeditor.js');
		$this->load->view($this->_data['template'],$this->_data);
    }
    public function view(){
        $id=$this->uri->segment(4);
        if(empty($id) || !is_numeric($id)){
            redirect(base_url().'admin/contact/email');
        }
        $this->_data['info']=$this->m_contact->getMailById($id);
        $this->m_contact->read($id);
        $this->_data['title_area']="View Email";
        $this->_data['view']='contact/viewmail';
		$this->load->view($this->_data['template'],$this->_data);
    }    
 }
?>