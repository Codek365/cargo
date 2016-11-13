<?php
class Mcontact extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    public function getInfo(){
        $this->db->where('id',1);
        return $this->db->get('infomation')->row_array();
    }
    public function insertEmail($data){
        $this->db->insert('email',$data);
    }
}
?>