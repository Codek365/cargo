<?php
class News extends Admin_Controller{
	public function __construct(){
		parent::__construct();
        session_start();
        $this->load->model('m_news');
	}
    public function index(){
        $this->_data['info']=$this->m_news->listNews();
        $this->_data['title_area']="News";
		$this->_data['view']='news/index';
		$this->load->view($this->_data['template'],$this->_data);
    }
    public function add(){
        $_SESSION['KCFINDER']['disabled']=false;
        $_SESSION['KCFINDER']['uploadURL'] =base_url().'uploads/kcfinder/';//.$this->session->userdata['username'];
        //initial data
        $error="";
        $data=array();
        $data["status"]=1;
        if(!empty($_GET['pageurl'])){
            $this->_data['pageurl']=$_GET['pageurl'];
        }
        //###initial data
        if($this->input->post("addnews")!=""){
            //Input data
                $this->_data['pageurl']=$this->input->post('pageurl');
                $data['title']=$this->input->post('title');
                $data['title_en']=$this->input->post('title_en');
                $data['sort']=$this->input->post('sort');
                $data['summary']=$this->input->post('summary');
                $data['description']=$this->input->post('description');
                //$data['parent']=$this->input->post('parent');
                $data['description']=$this->input->post('description');
                $data['status']=$this->input->post('status');
                if(!empty($this->_data['pageurl'])){
                    $data['page']=$this->_data['pageurl'];
                }else{
                    $data['page']=$this->input->post('page');
                }
                $data['category']=$this->input->post('category');
                if(!empty($_FILES['image']['name'])){
                    $data['image']=$_FILES['image']['name'];
                }
            //###Input data
            //Catch error
                $this->load->library('form_validation');
                $this->form_validation->set_rules('title','title','required');
                $this->form_validation->set_rules('title_en','title_en','required');
                $this->form_validation->set_rules('sort','sort','numeric');
            //###Catch error
            if($this->form_validation->run()){
                    //----Upload and fix image
                    if(!empty($data['image'])){
                        $config['upload_path'] = './uploads/news_image/';
                		$config['allowed_types'] = 'gif|jpg|png';
                		$config['max_size']	= 15000;
                		$config['max_width']  = 15000;
                		$config['max_height']  = 15000;
                		$this->load->library('upload', $config);
                        if ($this->upload->do_upload("image"))
                		{
          		            $img_uploaded=$this->upload->data();
          		            $config['image_library'] = 'gd2';
                            $config['source_image']	= './uploads/news_image/'.$img_uploaded["file_name"];
                            $config['create_thumb'] = TRUE;
                            $config['maintain_ratio'] = TRUE;
                            $config['width']= 400;
                            $config['height']= 400;
                            $this->load->library('image_lib',$config);
                            if(!$this->image_lib->resize()){
                                $error.=$this->image_lib->display_errors("<li>","</li>");
                            }
              		    }else{
                		      $error.=$this->upload->display_errors("<li>","</li>");
                		}
                    }
                    //--##Upload and fix image
                    if(empty($error)){
                    //prepair data
                        $this->load->library("unicode");
                        $data['title_non_unicode']=$this->unicode->convert($this->input->post("title"));
                        $data['user']=$this->session->userdata('id');
                        $this->load->helper('date');
                        $data["date"]=local_to_gmt(now());
                        if(!empty($_FILES['image']['name'])){
                            $data['image']=$img_uploaded["file_name"];
                        }
                        $this->m_news->insert($data);
                        $this->session->set_flashdata('notify','You have just inserted a news successfully');
                        if(!empty($this->_data['pageurl'])){
                            redirect(base_url().'admin/pagenews/news/'.$this->_data['pageurl']);
                        }else{
                            redirect(base_url().'admin/news/add');   
                        }
                    //##prepair data
                    }
                }else{
                    $error.=validation_errors('<li>','</li>');
                }
        }else{
                    $data['category']=1;
                    if(!empty($this->_data['pageurl'])){
                        $data['page']=$this->_data['pageurl'];
                    }else{
                        $data['page']='';
                    }
        }
        $this->_data['scripts'][]='public/scripts/ckeditor/ckeditor.js';
        $this->_data['styles'][]='public/admin_layout/css/style1.css';
        
        $this->_data['page_data']=$this->m_news->getPage();
        $this->_data['category_data']=$this->m_news->getCategory();
        
        $this->_data['title_area']="News";
        $this->_data['error']=$error;
        $this->_data['data']=$data;
		$this->_data['view']='news/add';
		$this->load->view($this->_data['template'],$this->_data);
    }
    public function edit(){
        $id=$this->uri->segment(4);
        if(empty($id) || !is_numeric($id)){
            redirect(base_url().'admin/news/index');
        }
        $_SESSION['KCFINDER']['disabled']=false;
        $_SESSION['KCFINDER']['uploadURL'] =base_url().'uploads/kcfinder/';//.$this->session->userdata['username'];
        //initial data
        $error="";
        $data=array();
        $data["status"]=1;
        if(!empty($_GET['pageurl'])){
            $this->_data['pageurl']=$_GET['pageurl'];
        }
        $arr_id[]=$id;
        $img=$this->m_news->getImage($arr_id);
        if($this->input->post("editnews")!=""){
        //Input data
            $this->_data['pageurl']=$this->input->post('pageurl');
            $data['title']=$this->input->post('title');
            $data['title_en']=$this->input->post('title_en');
            $data['sort']=$this->input->post('sort');
            $data['summary']=$this->input->post('summary');
            $data['category']=$this->input->post('category');
            $data['description']=$this->input->post('description');
            $data['status']=$this->input->post('status');
             if(!empty($this->_data['pageurl'])){
                    $data['page']=$this->_data['pageurl'];
            }else{
                $data['page']=$this->input->post('page');
            }
            if(!empty($_FILES['image']['name'])){
                $data['image']=$_FILES['image']['name'];
            }
        //###Input data
        //Catch error
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title','title','required');
            $this->form_validation->set_rules('title_en','title_en','required');
            $this->form_validation->set_rules('sort','sort','numeric');
        //###Catch error
        if($this->form_validation->run()){
                //----Upload and fix image
                if(!empty($_FILES['image']['name'])){
                    $config['upload_path'] = './uploads/news_image/';
            		$config['allowed_types'] = 'gif|jpg|png';
            		$config['max_size']	= 15000;
            		$config['max_width']  = 15000;
            		$config['max_height']  = 15000;
            		$this->load->library('upload', $config);
                    if ($this->upload->do_upload("image"))
            		{
      		            $img_uploaded=$this->upload->data();
      		            $config['image_library'] = 'gd2';
                        $config['source_image']	= './uploads/news_image/'.$img_uploaded["file_name"];
                        $config['create_thumb'] = TRUE;
                        $config['maintain_ratio'] = TRUE;
                        $config['width']= 150;
                        $config['height']= 150;
                        $this->load->library('image_lib',$config);
                        if(!$this->image_lib->resize()){
                            $error.=$this->image_lib->display_errors("<li>","</li>");
                        }
          		    }else{
            		      $error.=$this->upload->display_errors("<li>","</li>");
            		}
                }
                //--##Upload and fix image
                if(empty($error)){
                //prepair data
                    $this->load->library("unicode");
                    $data['title_non_unicode']=$this->unicode->convert($this->input->post("title"));
                    $data['user']=$this->session->userdata('id');
                    $this->load->helper('date');
                    $data["date"]=local_to_gmt(now());
                    if(!empty($img_uploaded["file_name"])){
                        $data['image']=$img_uploaded["file_name"];
                        if(!empty($img)){
                            if(file_exists('./uploads/news_image/'.$img[0]['image'])){
                                unlink('./uploads/news_image/'.$img[0]['image']);
                            }
                            if(file_exists('./uploads/news_image/thumb_'.$img[0]['image'])){
                                unlink('./uploads/news_image/thumb_'.$img[0]['image']);
                            }
                        }
                    }
                    $this->m_news->update($id,$data);
                    $this->session->set_flashdata('notify','You have just updated a news successfully');
                    if(!empty($this->_data['pageurl'])){
                            redirect(base_url().'admin/pagenews/news/'.$this->_data['pageurl']);
                    }else{
                        redirect(base_url().'admin/news/edit/'.$id);   
                    }
                    echo '<pre>';
                        print_r($data);
                    echo '</pre>';
                //##prepair data
                }
            }else{
                $error.=validation_errors('<li>','</li>');
            }
        }else{
            $data=$this->m_news->getNewsById($id);
        }
        $this->_data['scripts'][]='public/scripts/ckeditor/ckeditor.js';
        $this->_data['styles'][]='public/admin_layout/css/style1.css';
        $this->_data['page_data']=$this->m_news->getPage();
        $this->_data['category_data']=$this->m_news->getCategory();
        $this->_data['data']=$data;
        $this->_data['title_area']="News";
        $this->_data['image']=$img[0]['image'];
        $this->_data['error']=$error;
        $this->_data['id']=$id;
		$this->_data['view']='news/edit';
		$this->load->view($this->_data['template'],$this->_data);
    }
    public function delete(){
        $id=$this->uri->segment(4);
        $page=$_GET['pageurl'];
        if(empty($id) || !is_numeric($id) || $id==21 || $id==22){
            redirect(base_url().'admin/news/index');
        }else{
            $img=$this->m_news->getImage(array($id));
            foreach($img as $item){
                if(file_exists('./uploads/news_image/'.$item['image'])){
                    unlink('./uploads/news_image/'.$item['image']);
                }
                if(file_exists('./uploads/news_image/thumb_'.$item['image'])){
                    unlink('./uploads/news_image/thumb_'.$item['image']);
                }
            }
            $this->m_news->delete(array($id));
            if(empty($page)){
                redirect(base_url().'admin/news/index');   
            }else{
                redirect(base_url().'admin/pagenews/news/'.$page);
            }
        }
    }
    public function deleteAjax(){
        $id=$this->input->get('id',true);
        $error=0;
        if(empty($id)){
            $error=1;
        }else{
            $arr_id=json_decode($id);
            foreach($arr_id as $item){
                if(!is_numeric($item) || $item==21 || $item==22){
                    $error==1;
                    break;
                }
            }
            if($error==0){
                $img=$this->m_news->getImage(json_decode($id));
                foreach($img as $item){
                    if(!empty($item['image'])){
                        if(file_exists('./uploads/news_image/'.$item['image'])){
                            unlink('./uploads/news_image/'.$item['image']);
                        }
                        if(file_exists('./uploads/news_image/thumb_'.$item['image'])){
                            unlink('./uploads/news_image/thumb_'.$item['image']);
                        }   
                    }
                }
                $this->m_news->delete(json_decode($id));
            }
        }
        echo $error;
    }
    public function copyAjax(){
        $id=$this->input->get('id',true);
        if(empty($id)){
            echo $error=1;
        }else{
            $id_str=$this->m_news->copy(json_decode($id));
            $data['info']=$this->m_news->copy_result($id_str);
            $this->load->view('news/copyajax',$data);
        }
    }
 }
?>