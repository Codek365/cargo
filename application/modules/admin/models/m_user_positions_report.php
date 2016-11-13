<?php
class M_user_positions_report extends CI_Model{
	protected $_table="user_positions";
	public function __construct(){
		parent::__construct();
       
	}
    public function all(){
        $query=$this->db->get($this->_table);
        return $query->result_array();//row//////////////////////
    }
	// public function user_pos_id($id){
	// public function user_pos_id(){
 //        $query=$this->db->select("user_position_name");
	// 	// $query=$this->db->where("user_position_id",$id);
	// 	$query=$this->db->get($this->_table);
 //        return $query->row_array();//row//////////////////////
 //    }
 }