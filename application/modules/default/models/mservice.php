<?php
class Mservice extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    public function getNews(){
        $this->db->select('id,title,image,summary,date,title_non_unicode');
        $this->db->where('page','services');
        return $this->db->get('news',16)->result_array();
    }
}
?>