<?php
class Service extends Default_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->load->model('mservice');
        $this->_data['service_news']=$this->mservice->getNews();
        $this->load->view('default/service_template',$this->_data);
    }
}
?>