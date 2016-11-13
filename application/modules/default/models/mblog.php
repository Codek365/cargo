<?php
class mblog extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    public function getNews($page=1,$numrecord=3){
        $sql="SELECT title,image,id,summary, title_non_unicode
            FROM news WHERE status=1
            AND id NOT IN(21,21)
            AND page='blog'
            ORDER BY date DESC
            LIMIT ".(($page-1)*$numrecord).",".((($page-1)*$numrecord)+$numrecord);
        return $this->db->query($sql)->result_array();
    }
    public function getRelatedNews($page=1,$numrecord=3){
        $sql="SELECT title,id,title_non_unicode
            FROM news WHERE status=1
            AND id NOT IN(21,21)
            AND page='blog'
            ORDER BY date DESC
            LIMIT 3,10";
        return $this->db->query($sql)->result_array();
    }
}
?>