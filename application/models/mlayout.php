<?php
class Mlayout extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    public function getLayout(){
        $layout=$this->db->get('layout')->result_array();
        return $layout;
    }
}
?>