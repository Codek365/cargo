<?php
class Mtracking_order extends CI_Model{
    protected $_table="orders";
    public function __construct(){
        parent::__construct();
    }
    public function getorderbyid($order_id){
        $this->db->select('order_id,order_status_id');
        $this->db->where('order_id ',intval($order_id)); 
        $query=$this->db->get($this->_table);
        if($query->num_rows()>0)
            return $query->row_array(); 
        else
            return FALSE;
    }
    public function getall(){
        $this->db->select('order_id,order_status_id');
        return $this->db->get($this->_table)->result_array(); 
    }
    
}
?>