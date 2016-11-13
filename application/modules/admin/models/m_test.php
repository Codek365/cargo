<?php
class M_test extends CI_Model{
    protected $_table="states_vn";
    public function __construct(){
        parent::__construct();
       
    }
    function count_all(){ 
        return $this->db->count_all($this->_table); 
    } 
    public function all(){
        $query=$this->db->get($this->_table);
        return $query->result_array();
    }
    public function add($data){
        $this->db->insert($this->_table,$data);
    }
 }