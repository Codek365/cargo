<?php
class M_system_report extends CI_Model{
	protected $_table="system_infomation";
	public function __construct(){
		parent::__construct();
       
	}
    public function all(){
        $query=$this->db->get($this->_table);
        return $query->row_array();//row//////////////////////
    }
 }