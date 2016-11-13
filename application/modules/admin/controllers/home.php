<?php
class Home extends Admin_Controller{
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->_data['view']='home/index';
		$this->load->view($this->_data['template'], $this->_data);
	}
} 
?>