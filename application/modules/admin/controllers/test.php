<?php
class M_state_vn extends CI_Model{
    protected $_table="zone_states_vn";
    protected $_table="zone_states_us";
    protected $_table="zone_cities_vn";
    protected $_table="zone_cities_us";
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
    public function listStateone($id){
        $query = $this->db->get_where($this->_table, array('id' => $id));
        return $query->result_array();
    }
    public function delvn($id){
        $this->db->where('id',$id);
        $this->db->delete($this->_table);
    }
 }