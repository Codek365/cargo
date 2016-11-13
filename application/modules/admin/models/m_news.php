<?php
class M_news extends CI_Model{
	protected $_table="news";
	public function __construct(){
		parent::__construct();
	}
    public function getPage(){
        $this->db->select('id,name');
        return $this->db->get('pages')->result_array();
    }
     public function getCategory(){
        $this->db->select('id,name');
        return $this->db->get('categories')->result_array();
    }
    //LIST
    public function listNews(){
        $this->db->select('*');
        $this->db->where('id !=',21);
        $this->db->where('id !=',22);
        return $this->db->get($this->_table)->result_array();
    }
    public function listNewsByPage($page){
        $this->db->select('news.id,news.title,date,image,news.status');
        $this->db->where('id !=',21);
        $this->db->where('id !=',22);
        $this->db->where('page',$page);
        return $this->db->get($this->_table)->result_array();
    }
    //ADD
    public function insert($data){
        $this->db->insert($this->_table,$data);
    }
    //DELETE
    public function delete($id_arr=array()){
        $this->db->where_in('id',$id_arr);
        $this->db->delete($this->_table);
    }
    //COPY
    public function copy($id_arr=array()){
        $id=array();
        $this->db->where_in('id',$id_arr);
        $data=$this->db->get($this->_table)->result_array();
        foreach($data as $item){
           $sql="INSERT INTO news(title,title_non_unicode,title_en,date,user,sort,image,summary,description,parent,status)";
           $sql.="VALUES('".$item["title"]."','".$item['title_non_unicode']."','".$item['title_en']."',".$item['date'].",".$item['user'].",".$item['sort'].",'".$item['image']."','".$item['summary']."','".$item['description']."',".$item['parent'].",".$item['status'].")";
            $this->db->query($sql);
            $id[]=$this->db->insert_id('menu_id');
        }
        return $id;
    }
    public function copy_result($id=array()){
        $id=implode($id,',');
        $this->db->select('news.id,news.title,date,image,menu.name,news.status');
        $this->db->where_in('id',$id);
        $this->db->join('menu','menu.menu_id=news.parent');
        return $this->db->get($this->_table)->result_array();
    }
    public function getImage($id=array()){
        $this->db->select('image');
        $this->db->where_in('id',$id);
        return $this->db->get($this->_table)->result_array();
    }
    //EDIT
    public function getNewsById($id){
        $this->db->where('id',$id);
        return $this->db->get($this->_table)->row_array();
    }
    public function update($id,$data){
        $this->db->where('id',$id);
        $this->db->update($this->_table,$data);
    }
 }
 ?>