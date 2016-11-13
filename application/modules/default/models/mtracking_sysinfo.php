<?php
class Mtracking_sysinfo extends CI_Model{
    protected $_table="system_infomation";
    public function __construct(){
        parent::__construct();
    }
    public function getany(){
    	$this->db->select('tracking_code_prefix');
        return $this->db->get($this->_table)->row_array(); 
    }
    public function getall(){
        // $this->db->select();
        return $this->db->get($this->table)->result_array(); 
    }
    
}
?>