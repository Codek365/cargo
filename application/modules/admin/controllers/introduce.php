<?php
class Introduce extends Admin_Controller{
	public function __construct(){
		parent::__construct();
        $this->load->model('m_introduce');
	}
    public function index(){
        $this->_data['info']=$this->m_introduce->listInfo();
        $this->_data['title_area']="Introduction";
		$this->_data['view']='introduce/index';
		$this->load->view($this->_data['template'],$this->_data);
    }
    public function edit(){
        $id=$this->uri->segment(4);
        if(empty($id) || !is_numeric($id)){
            redirect(base_url().'admin/introduct/index');
        }
        $_SESSION['KCFINDER']['disabled']=false;
        $_SESSION['KCFINDER']['uploadURL'] =base_url().'uploads/kcfinder/'.$this->session->userdata['username'];
        //initial data
        $error="";
        $data=array();
        $arr_id[]=$id;
        if($this->input->post("editintroduce")!=""){
        //Input data
            $data['title']=$this->input->post('title');
            $data['summary']=$this->input->post('summary');
            $data['description']=$this->input->post('description');
        //###Input data
        //Catch error
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title','title','required');
        //###Catch error
        if($this->form_validation->run()){
                    $this->m_introduce->update($id,$data);
                    redirect(base_url().'admin/introduce/index');
                    $this->session->set_flashdata('notify','You have just updated a introduction news successfully');
                //##prepair data
        }else{
            $error.=validation_errors('<li>','</li>');
        }
        }else{
            $data=$this->m_introduce->getIntroById($id);
            
        }
        $this->_data['scripts'][]='public/scripts/ckeditor/ckeditor.js';
        $this->_data['styles'][]='public/admin_layout/css/style1.css';
        $this->_data['data']=$data;
        $this->_data['title_area']="Introduction news";
        $this->_data['error']=$error;
        $this->_data['id']=$id;
		$this->_data['view']='introduce/edit';
		$this->load->view($this->_data['template'],$this->_data);
    }
 }
 ?>