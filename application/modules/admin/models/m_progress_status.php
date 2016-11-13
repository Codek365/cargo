<?php
class M_progress_status extends CI_Model
{
	protected $_table="order_status";
	public function __construct()
	{
		parent::__construct();
	}
	//LIST ALL
	public function getAll(){
		$this->db->select('*');
		$this->db->join('zone_countries','belong_to_country=country_code');
		// $this->db->order_by("country_name", "desc"); 
		$this->db->order_by("order_status_sort", "asc");	
		return $this->db->get($this->_table)->result_array();
	}
	//ADD 
	public function addProgress($data=array()){
		$this->db->insert($this->_table,$data);
	}
	//UPDATE
	public function getToUpdate($id=""){
		$this->db->select('order_status_id,order_status_name,order_status_notes,belong_to_country');
		$this->db->where('order_status_id',$id);
		return $this->db->get($this->_table)->row_array();
	}
	public function updateProgress($id="",$data=array()){
		$this->db->where('order_status_id',$id);
		$this->db->update($this->_table,$data);
	}
	public function getCountries(){
		$this->db->select('country_name,country_code');
		return $this->db->get('zone_countries')->result_array();
	}

	public function delete($id)
	{
		$this->db->where_in('order_status_id',$id);
        $this->db->delete('order_status');
	}
}
?>