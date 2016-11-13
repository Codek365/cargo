<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_dashboard extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function countOrder(){
        $this->db->from('orders');
        return $this->db->count_all_results();
    }
    public function countBox(){
    	$this->db->select_sum('bins');
        $this->db->from('orders');
        return $this->db->count_all_results();
    }

}

/* End of file m_dasboard.php */
/* Location: ./application/models/m_dasboard.php */