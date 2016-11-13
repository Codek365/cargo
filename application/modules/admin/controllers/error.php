<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error extends Admin_Controller {

	public function __construct()
	{	
		parent::__construct();
	}

	public function index()
	{
		$this->_data['view']='error';
        $this->load->view($this->_data['template'],$this->_data);
	}

}

/* End of file error.php */
/* Location: ./application/controllers/error.php */