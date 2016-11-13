<?php
class About extends Default_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->load->model('mabout');
        $this->_data['about_news']=$this->mabout->get4news();
        // $this->_data['about_member']=$this->mabout->getMember();
        $this->_data['about_intro']=$this->mabout->getIntro();
        $this->_data['title_page']="Giới thiệu";
        $this->load->view('default/about_template',$this->_data);
    }
}
?>