<?php
class Home extends Default_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->load->model('mhome');
        $this->_data['slider']=$this->mhome->getSlider();
        $this->_data['home_news']=$this->mhome->getHomeNews();
        $this->_data['lastest_news']=$this->mhome->get3NewsLastest();
        $this->_data['title_page']="Welcome to A Dong Cargo";
        $this->load->view('default/home_template',$this->_data);
    }
}
?>