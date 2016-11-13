<?php
class M_cities_us extends CI_Model{
	protected $_table="zone_cities_us";
	public function __construct(){
		parent::__construct();
       
	}
    public function listState($data,$offset){
        $this->db->where('state_code',$data['id']);
        $query=$this->db->get($this->_table,$data['per_page'],$offset);
        return $query->result_array();
    }
    function count_all_where($id){ 
        $this->db->where('state_code',$id);
        return $this->db->count_all_results($this->_table); 
    } 
    public function addcity($data){
        $this->db->insert($this->_table,$data);
    }
    public function delus($id){
        $this->db->where('id',$id);
        $this->db->delete($this->_table);
    }
    public function listcityone($id){
        $query = $this->db->get_where($this->_table, array('id' => $id));
        return $query->result_array();
    }
    public function editcity($id,$data){
        $this->db->where('id',$id);
        $this->db->update($this->_table,$data);
    }
 }