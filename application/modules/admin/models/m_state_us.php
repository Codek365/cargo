<?php
class M_state_us extends CI_Model{
	protected $_table="zone_states_us";
	public function __construct(){
		parent::__construct();
       
	}
    public function listStateall(){
        $query=$this->db->get($this->_table);
        return $query->result_array();
    }
    public function listState($number, $offset){
        $query=$this->db->get($this->_table,$number,$offset);
        return $query->result_array();
    }
    public function listStateone($id){
        $query = $this->db->get_where($this->_table, array('id' => $id));
        return $query->result_array();
    }
    function count_all(){ 
        return $this->db->count_all($this->_table); 
    } 
    public function addstate($data){
        $this->db->insert($this->_table,$data);
    }
    public function editstate($id,$data){
        $this->db->where('id',$id);
        $this->db->update($this->_table,$data);
    }
    public function delus($id){
        $this->db->where('id',$id);
        $this->db->delete($this->_table);
    }
    // public function countRecord(){
    //     $this->db->from($this->_table);
    //     return $this->db->count_all_results();
    // }
    // public function getCountry(){
    //     return $this->db->get('countries')->result_array();
    // }
    // public function getCountryNameById($id=""){
    //     $this->db->select('country_name');
    //     $this->db->where('country_id',$id);
    //     $rs=$this->db->get('countries')->row_array();
    //     return $rs['country_name'];
    // }
    // public function getStates($id_country=""){
    //     $this->db->where('contry_id',$id_country);
    //     return $this->db->get('states')->result_array();
    // }

    // public function getStateById($id=""){
    //     $this->db->where('state_code',$id);
    //     return $this->db->get($this->_table)->row_array();
    // }
    // public function editState($id,$data){
    //     $this->db->where('state_code',$id);
    //     $this->db->update($this->_table,$data);
    // }
    // //DELETE CITY BY ID
    // public function deleteCity($id){
    //     $this->db->where('state_code',$id);
    //     $this->db->delete('cities');
    // }
    // public function deleteState($id){
    //     $this->db->where('state_code',$id);
    //     $this->db->delete($this->_table);
    // }
 }