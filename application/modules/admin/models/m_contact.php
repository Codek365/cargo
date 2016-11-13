<?php
class M_Contact extends CI_Model{
	protected $_table="infomation";
	public function __construct(){
		parent::__construct();
	}
    public function getInfoData(){
        return $this->db->get($this->_table)->row_array();
    }
    public function update($data){
        $this->db->where('id',1);
        $this->db->update($this->_table,$data);
    }
    public function listEmail(){
        $this->db->order_by('status','asc');
        return $this->db->get('email')->result_array();
    }
    public function countNewMail(){
        $this->db->select('status');
        $this->db->where('status',0);
        return $this->db->get('email')->result_array();
    }
    public function getMailById($id){
        $this->db->where('id',$id);
        return $this->db->get('email')->row_array();
    }
    public function read($id){
        $this->db->where('id',$id);
        $this->db->update('email',array('status'=>1));
    }
    public function deleteEmail($id){
        $this->db->where('id',$id);
        $this->db->delete('email');
    }
 }
 ?>