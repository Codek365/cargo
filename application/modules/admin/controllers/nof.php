<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nof extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_nof');
	}

	public function index()
	{
		$push = array(
            'email' => count($this->m_nof->countNewMail()),
            'order' => count($this->m_nof->countNewOrder()),
            'online' => count($this->m_nof->countNewOnline()),
            );
        echo json_encode($push);
	}

}

/* End of file nof.php */
/* Location: ./application/controllers/nof.php */