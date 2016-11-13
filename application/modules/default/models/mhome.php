<?php
class Mhome extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    public function getSlider(){
        $this->db->select('image');
        return $this->db->get('slide')->result_array();
    }
    public function getHomeNews(){
        $this->db->select('id,title,title_non_unicode,summary,image,type,page');
        $this->db->where("(type='hello' OR type='about' OR page='home') AND status=1");
        $this->db->order_by("sort","desc"); 
        return $this->db->get('news')->result_array();
    }
    public function get3NewsLastest(){
        $sql='SELECT id,date,title_non_unicode,LEFT(summary,300) as summary FROM news WHERE status=1 AND id NOT IN(21,22) ORDER BY date DESC LIMIT 0,3';
        return $this->db->query($sql)->result_array();
    }
}
?>