<?php
class M_introduce extends CI_Model{
	protected $_table="introduce";
	public function __construct(){
		parent::__construct();
	}
        //LIST
    public function listInfo(){
        $this->db->select('id,title,summary');
        return $this->db->get($this->_table)->result_array();
    }
    //EDIT
    public function getIntroById($id){
        $this->db->where('id',$id);
        return $this->db->get($this->_table)->row_array();
    }
    public function update($id,$data){
        $this->db->where('id',$id);
        $this->db->update($this->_table,$data);
    }
 }
 ?>