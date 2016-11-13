<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_devices extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function getDevices(){
    	$data=$this->db->get('mb_devices')->result_array();
    	return $data;
	}

	public function enable($data) {
		$this->db->insert('mb_devices', $data); 
		redirect(base_url().'admin/devices/index');
	}
	public function disable($data) {		
		$this->db->delete('mb_devices', $data);

		$value = array('token' => '');
		$this->db->where_in($data);
		$this->db->update('mb_tokens', $value);
		redirect(base_url().'admin/devices/index');
	}
	public function history () {
    	$data=$this->db->get('mb_tokens')->result_array();
    	return $data;
	}

	public function token_del($data) {
		$this->db->delete('mb_tokens', $data);		
	}

	public function add_device ($data) {
		$this->db->insert('mb_devices', $data);
	}

	public function del_device ($data) {
		$this->db->delete('mb_devices', $data);
	}

}

/* End of file  */
/* Location: ./application/models/ */