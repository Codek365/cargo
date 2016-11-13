<?php
class M_type_delivery_report extends CI_Model{
	protected $_table="type_delivery";
	public function __construct(){
		parent::__construct();
       
	}
    public function all(){
        $query=$this->db->get($this->_table);
        return $query->result_array();//row//////////////////////
    }
 }