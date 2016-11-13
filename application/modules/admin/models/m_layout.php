<?php
class M_layout extends CI_Model{
	protected $_table="layout";
	public function __construct(){
		parent::__construct();
	}
    //HEADER
    public function getHeaderData(){
        $this->db->select('data');
        $this->db->where('id','header');
        $arr=$this->db->get($this->_table)->row_array();
        return unserialize($arr['data']);
    }
    public function insertHeaderData($str){
        $data['data']=$str;
        $this->db->where('id','header');
        $this->db->update($this->_table,$data);
    }
    //FOOTER
    public function update($data){
        $this->db->where('id','footer');
        $this->db->update($this->_table,$data);
    }
    public function getFooter(){
        $this->db->select('data');
        $this->db->where('id','footer');
        return $this->db->get($this->_table)->row_array();
    }
 }
?>