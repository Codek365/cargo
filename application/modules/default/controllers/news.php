<?php
class News extends Default_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function detail($id){
        $this->load->model('mnews');
        $this->_data['news_detail']=$this->mnews->getNewsById($id);
        $this->_data['related_data']=$this->mnews->getRelatedNews(0,10);
        $this->_data['title_page']="";
        $this->_data['view']='news/detail';
        $this->load->view('default/blog_template',$this->_data);
    }
}
?>