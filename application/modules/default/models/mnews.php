<?php
class Mnews extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    public function getNewsById($id){
        $this->db->select('title,description');
        $this->db->where('id',$id);
        return $this->db->get('news')->row_array();
    }
    public function getRelatedNews($page=1,$numrecord=3){
        $sql="SELECT title,id,title_non_unicode
            FROM news WHERE status=1
            AND id NOT IN(21,21)
            ORDER BY date DESC
            LIMIT 0,10";
        return $this->db->query($sql)->result_array();
    }
}