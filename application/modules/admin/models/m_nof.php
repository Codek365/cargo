<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_nof extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function countNewMail(){
        $this->db->select('status');
        $this->db->where('status',0);
        return $this->db->get('email')->result_array();
    }
    public function countNewOrder()
    {
    	$this->db->select('order_status_id');
        $this->db->where('order_status_id',NULL);
        return $this->db->get('orders')->result_array();
    }
    public function countNewOnline()
    {
    	// $this->db->select('order_status_id');
        return $this->db->get('user_online')->result_array();
    }
}

/* End of file m_nof.php */
/* Location: ./application/models/m_nof.php */