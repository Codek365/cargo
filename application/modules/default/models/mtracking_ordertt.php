<?php
class Mtracking_ordertt extends CI_Model{
    protected $_table="order_status";
    public function __construct(){
        parent::__construct();
    }
    public function getall(){
        $this->db->select();
        $this->db->where('order_status_notes !=',1);//khong lay cac trang thai tren mobile
        return $this->db->get($this->_table)->result_array(); 
    }
    public function countall(){ 
        $this->db->from($this->_table);
		return $this->db->count_all_results();
    }
    
}