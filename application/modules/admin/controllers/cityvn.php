<?php
class Cityvn extends Admin_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('m_cities_vn');
        $this->load->model('m_state_vn');
    }
    
    public function index($id){
        $this->load->library('pagination');
        //format
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        //format
        $this->_data['titlepage']="City";
        if($id!=""){
        $config['base_url'] = base_url('admin/cityvn/index/'.$id); // xác định trang phân trang 
        $config['total_rows'] = $this->m_cities_vn->count_all_where($id); // xác định tổng số record 
        $this->_data['total_rows'] = $this->m_cities_vn->count_all_where($id); // xác định tổng số record 
        $config['per_page'] = 20; // xác định số record ở mỗi trang 
        $config['uri_segment'] = 5; // xác định segment chứa page number 
        $param['per_page'] = 20;
        $param['id'] = $id;
        $this->_data['info'] = $this->m_cities_vn->listState($param,$this->uri->segment(5),$id);
        $this->_data['state_code']=$id;
        $this->pagination->initialize($config);  
        $this->_data['view']='cityvn/index';
        $this->load->view($this->_data['template'],$this->_data);
    }
    else{
        redirect(base_url().'admin/state/index');
    }

    }
    public function addvn($id){
        $this->load->library("form_validation");
        $this->_data['link']=base_url()."admin/state/addvn";
        $this->_data['linkback']=base_url()."admin/cityvn/index/".$id;
        $this->_data['view']='cityvn/addvn';
        $this->_data['titlepage']="Add State";
        if($id!=""){
            $this->_data['state_code']=$id;
            $this->load->view($this->_data['template'],$this->_data);
         }
         else{
            redirect(base_url().'admin/state/statesvn');
         }
    }
    public function addingvn($id){
        $this->load->library("form_validation");
        $this->_data['linkback']=base_url()."admin/cityvn/index/".$id;
        $this->form_validation->set_rules("city","City","required"); 
        $this->_data['success']="";
        if($this->input->post()){
            $sql['city']=$this->input->post('city');
            $sql['state_code']=$id;
            if($this->form_validation->run() == TRUE){
                $this->_data['state_code']=$id;
                $this->_data['view']='cityvn/addvn';
                $this->_data['success']="Successfully";
                $this->_data['titlepage']="Add State";
                $this->m_cities_vn->addcity($sql);
                $this->load->view($this->_data['template'],$this->_data);
             }
             else{
                $this->_data['state_code']=$id;
                $this->_data['view']='cityvn/addvn';
                $this->_data['titlepage']="Add State";
                $this->load->view($this->_data['template'],$this->_data);
            }
        }
        else{
            redirect(base_url().'admin/state/statesvn');
        }
    }
    public function delvn($data){
        $id=$this->uri->segment(4);
         if(!empty($id)){      
            $state_code=$this->m_cities_vn->listcityone($data);
            $this->m_cities_vn->delvn($data);
            redirect(base_url().'admin/cityvn/index/'.$state_code[0]["state_code"]);
         }else{
            redirect(base_url().'admin/state/statesvn');
        }     
    }
    public function loadonevn($data){
        $this->load->library("form_validation");
        $stadecode=$this->m_cities_vn->listcityone($data);
        $this->_data['linkback']=base_url()."admin/cityvn/index/".$stadecode[0]["state_code"];
        $this->_data['id']=$data;
        if($this->uri->segment(4)){
            $this->_data['titlepage']="Edit City";
            $this->_data['view']='cityvn/editvn';
            $this->_data['info']=$this->m_cities_vn->listcityone($data);
            $this->_data['info1'] = $this->m_state_vn->listStateall();
            $this->load->view($this->_data['template'],$this->_data);
         }
         else{
            redirect(base_url().'admin/state/index');
         }
    }
    public function editvn(){
        $this->load->library("form_validation");
        $id=$this->uri->segment(4);
        $this->_data['id']=$this->uri->segment(4);
        $stadecode=$this->m_cities_vn->listcityone($id);
        $this->_data['linkback']=base_url()."admin/cityvn/index/".$stadecode[0]["state_code"];
        $this->form_validation->set_rules("city","State","required"); 
        $sql['city']=$this->input->post('city');
        $sql['state_code']=$this->input->post('state_code');
       if($this->form_validation->run() == TRUE){
            $this->_data['info1'] = $this->m_state_vn->listStateall();
            $this->_data['view']='cityvn/editvn';
            $this->_data['titlepage']="Edit State";
            $this->_data['success']="Successfully";
            $this->m_cities_vn->editcity($id,$sql);
            $this->_data['info']=$this->m_cities_vn->listcityone($id);
            $this->load->view($this->_data['template'],$this->_data);

         }
         else{
            $this->_data['view']='cityvn/editvn';
            $this->_data['titlepage']="Edit State";
            $this->_data['info']=$this->m_cities_vn->listcityone($id);
            $this->load->view($this->_data['template'],$this->_data);
        }
    }
 }
 ?>