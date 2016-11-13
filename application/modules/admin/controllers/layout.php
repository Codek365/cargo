<?php
class Layout extends Admin_Controller{
	public function __construct(){
		parent::__construct();
        $this->load->model('m_layout');
	}
    public function header(){
        $data=array();
        $this->_data['info']=$this->m_layout->getHeaderData();
        if($this->input->post("add")!=""){
           if(!empty($_FILES['logo']['name'])){
                $config['upload_path'] = './uploads/logo/';
        		$config['allowed_types'] = 'gif|jpg|png';
        		$config['max_size']	= 15000;
        		$config['max_width']  = 15000;
        		$config['max_height']  = 15000;
        		$this->load->library('upload', $config);
                if ($this->upload->do_upload("logo")){
                    $img_uploaded=$this->upload->data();
                    $data['logo']=$img_uploaded['file_name'];
                }else{
                    $data['logo']=$this->_data['info']['logo'];
                }
           }else{
                $data['logo']=$this->_data['info']['logo'];
           }
           $data['header_info']=$this->input->post('info_header');
           $data=serialize($data);
           $this->m_layout->insertHeaderData($data);
           $this->session->set_flashdata('notify','The header has been changed');
           redirect(base_url().'admin/layout/header');
        }
        $this->_data['scripts']=array('public/scripts/ckeditor/ckeditor.js');
        $this->_data['view']='layout/header';
		$this->load->view($this->_data['template'],$this->_data);
    }
    public function footer(){
        $_SESSION['KCFINDER']['disabled']=false;
        $_SESSION['KCFINDER']['uploadURL'] =base_url().'uploads/kcfinder/'.$this->session->userdata['username'];
        //initial data
        $error="";
        $data=array();
        if($this->input->post("edit")!=""){
        //Input data
            $data['data']=$this->input->post('data');
        //Catch error
            $this->load->library('form_validation');
            $this->form_validation->set_rules('data','data','required');
        //###Catch error
        if($this->form_validation->run()){
                    $this->m_layout->update($data);
                    redirect(base_url().'admin/layout/footer');
                    $this->session->set_flashdata('notify','You have just updated the footer successfully');
                //##prepair data
        }else{
            $error.=validation_errors('<li>','</li>');
        }
        }else{
            $data=$this->m_layout->getFooter();
            
        }
        $this->_data['scripts'][]='public/scripts/ckeditor/ckeditor.js';
        $this->_data['styles'][]='public/admin_layout/css/style1.css';
        $this->_data['data']=$data;
        $this->_data['footer']=$this->m_layout->getFooter();
        $this->_data['title_area']="Layout";
        $this->_data['error']=$error;
		$this->_data['view']='layout/footer';
		$this->load->view($this->_data['template'],$this->_data);
    }
 }
?>