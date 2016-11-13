<?php
class Mabout extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    public function get4news(){
        $this->db->select('title,image,summary,id,title_non_unicode,description');
        $this->db->where('page','about');
         $this->db->where('id','21');
        $this->db->order_by('date','desc');
        return $this->db->get('news',5)->result_array();
    }
    // public function getAbout()
    // {
    //     $this->db->where('page','about');
    //     $query = $this->db->get('news');
    //     return $query->result();
    // }
    public function getMember(){
        $this->db->select('name,image,id,summary,description');
        return $this->db->get('members',4)->result_array();
    }
    public function getIntro(){
        $this->db->select('id,title,summary');
        return $this->db->get('introduce',3)->result_array();
    }
}
?>