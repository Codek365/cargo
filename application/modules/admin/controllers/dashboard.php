<?php
class Dashboard extends Admin_Controller{
	public function __construct(){
		parent::__construct();
        $this->load->model('m_dashboard');
	}
	public function index(){

        $this->_data['count_order'] = $this->m_dashboard->countOrder();
        $this->_data['count_box'] = $this->m_dashboard->countBox();
        $this->_data['title_area']="Dashboard";
        $this->_data['view']='dashboard/index';
        $this->load->view($this->_data['template'],$this->_data);
	}
    public function error(){
        $this->_data['title_area']="ERROR";
  		$this->load->view($this->_data['template'],$this->_data);
    }
}
?>