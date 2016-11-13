<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_sfield extends CI_Model {


	public function __construct()
	{
		parent::__construct();
		
	}

	public function Load()
	{
		return $this->db->get('system_field')->result_array();
	}
	public function Update($data,$id)			
	{
		$this->db->where('id', $id);
		$this->db->update('system_field',$data);		
	}
	public function Insert($data)	
	{
		$this->db->insert('system_field', $data);
	}
	public function Delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('system_field');
	}
}

/* End of file  */
/* Location: ./application/models/ */