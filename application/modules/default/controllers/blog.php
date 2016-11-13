<?php
class Blog extends Default_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function index(){
            $this->load->model('mblog');
            $this->_data['blog_data']=$this->mblog->getNews(1,3);
            $this->_data['related_data']=$this->mblog->getRelatedNews(2,10);
            $this->_data['title_page']="Tin tức";
            $this->_data['view']='blog_template/blog';
            $this->load->view('default/blog_template',$this->_data);
    }
}
?>