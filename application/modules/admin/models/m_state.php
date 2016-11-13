<?php
class M_State extends CI_Model{
	protected $_table="states";
	public function __construct(){
		parent::__construct();
	}
    // public function listState($page=1,$record=20){
    //     $from=($page-1)*$record;
    //     $sql="SELECT state_code,state,countries.country_name";
    //     $sql.=" FROM states INNER JOIN countries ON states.contry_id=countries.country_id";
    //     $sql.=" LIMIT ".$from.','.$record;
    //     return $this->db->query($sql)->result_array();
    // }
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
    // public function addState($data){
    //     $this->db->insert($this->_table,$data);
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