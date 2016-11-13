<?php
class Contact extends Default_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        //Xóa tất cả các ảnh 2 tiếng trước
        $dir='./capcha/';
        $dh=opendir($dir);
         while ( $name = readdir( $dh )){
            if( $name=="." || $name==".." ) continue;
            if(time()-filectime($dir.$name)>7200){
                if(file_exists($dir.$name)){
                    unlink($dir.$name);
                }
            }
         }
        $this->load->model('mcontact');
        $this->_data['info']=$this->mcontact->getInfo();
        $this->_data['title_page']="Liên hệ";
        $this->load->view('default/contact_template',$this->_data);
    }
    public function receivemail(){
        $capcha=$this->session->userdata('capcha');
        $data=array();
        $error="";
        if($this->input->post('sendmail')!=""){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name','name','required');
            $this->form_validation->set_rules('email','email','required|valid_email');
            $this->form_validation->set_rules('subject','subject','required');
            $this->form_validation->set_rules('message','message','required');
            $this->form_validation->set_rules('capcha','capcha','required');
            $data['name']=$this->input->post('name',true);
            $data['email']=$this->input->post('email',true);
            $data['subject']=$this->input->post('subject',true);
            $data['message']=$this->input->post('message',true);
            $inputcapcha=$this->input->post('capcha',true);
            if($this->form_validation->run()){
                if(trim($inputcapcha)==$capcha){
                    $this->load->model('mcontact');
                    $data['status']=0;
                    $this->mcontact->insertEmail($data);
                }else{
                    $error.='<li>Please enter capcha code correctly...</li>';
                }
            }else{
                $error.=validation_errors('<li>','</li>');
            }
        }
        if(empty($error)){
                $this->session->set_flashdata('contact_notify','yes');
        }else{
            $this->session->set_flashdata('contact_error',$error);
        }
        redirect(base_url().'contact/sent');
    }
    public function getcapcha(){
        $dir='./capcha/';
        $dh=opendir($dir);
         while ( $name = readdir( $dh )){
            if( $name=="." || $name==".." ) continue;
            if(time()-filectime($dir.$name)>7200){
                if(file_exists($dir.$name)){
                    unlink($dir.$name);
                }
            }
         }
        //tạo capcha
        $this->load->helper('captcha');
        $time=time();
        $val = array(
                "word"      => substr($time,strlen($time)-6,strlen($time)),
                "img_path"  =>  "./capcha/",
                "img_url"   => base_url()."capcha/",
                "img_width" => 120,
                "img_height"=> 30,
                "expiration"=> 7200
                );
        $cap = create_captcha($val);
        $this->session->set_userdata('capcha',$cap['word']);
        echo $cap['image'];
    }
    public function sent(){
        $this->_data['title_page']="Notify";
        $this->_data['view']='contact/sentmail';
        $this->load->view('default/blog_template',$this->_data);   
    }
}
?>