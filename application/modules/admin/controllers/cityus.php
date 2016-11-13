<?php
class Cityus extends Admin_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('m_cities_us');
        $this->load->model('m_state_us');
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
        $config['base_url'] = base_url('admin/cityus/index/'.$id); // xác định trang phân trang 
        $config['total_rows'] = $this->m_cities_us->count_all_where($id); // xác định tổng số record 
        $this->_data['total_rows'] = $this->m_cities_us->count_all_where($id); // xác định tổng số record 
        $config['per_page'] = 20; // xác định số record ở mỗi trang 
        $config['uri_segment'] = 5; // xác định segment chứa page number 
        $param['per_page'] = 20;
        $param['id'] = $id;
        //$this->_data['info'] = $this->m_cities_us->listState($config['per_page'],$this->uri->segment(4),$id); 
        $this->_data['info'] = $this->m_cities_us->listState($param,$this->uri->segment(5),$id);
        $this->_data['state_code']=$id;
        $this->pagination->initialize($config);  
        $this->_data['view']='cityus/index';
        $this->load->view($this->_data['template'],$this->_data);
    }
    else{
        redirect(base_url().'admin/state/index');
    }

    }
    public function addus($id){
        $this->load->library("form_validation");
        $this->_data['link']=base_url()."admin/state/addus";
        $this->_data['linkback']=base_url()."admin/cityus/index/".$id;
        $this->_data['view']='cityus/addus';
        $this->_data['titlepage']="Add State";
        if($id!=""){
            $this->_data['state_code']=$id;
            $this->load->view($this->_data['template'],$this->_data);
         }
         else{
            redirect(base_url().'admin/state/statesus');
         }
    }
    public function addingus($id){
        $this->load->library("form_validation");
        $this->_data['linkback']=base_url()."admin/cityus/index/".$id;
        $this->form_validation->set_rules("city","City","required"); 
        $this->_data['success']="";
        if($this->input->post()){
            $sql['city']=$this->input->post('city');
            $sql['state_code']=$id;
            if($this->form_validation->run() == TRUE){
                $this->_data['state_code']=$id;
                $this->_data['view']='cityus/addus';
                $this->_data['success']="Successfully";
                $this->_data['titlepage']="Add State";
                $this->m_cities_us->addcity($sql);
                $this->load->view($this->_data['template'],$this->_data);
             }
             else{
                $this->_data['state_code']=$id;
                $this->_data['view']='cityus/addus';
                $this->_data['titlepage']="Add State";
                $this->load->view($this->_data['template'],$this->_data);
            }
        }
        else{
            redirect(base_url().'admin/state/statesus');
        }
    }
    // public function delus($data){
    //     $id=$this->uri->segment(4);
    //     if(!empty($id)){
    //         $this->m_cities_us->delus($data);
    //         redirect(base_url().'admin/state/statesus');
    //     }
    //     redirect(base_url().'admin/state/statesus');
    // }
    public function delus($data){
        $id=$this->uri->segment(4);
         if(!empty($id)){      
            $state_code=$this->m_cities_us->listcityone($data);
            $this->m_cities_us->delus($data);
            redirect(base_url().'admin/cityus/index/'.$state_code[0]["state_code"]);
         }else{
            redirect(base_url().'admin/state/statesus');
        }     
    }
    public function loadoneus($data){
        $this->load->library("form_validation");
        $stadecode=$this->m_cities_us->listcityone($data);
        $this->_data['linkback']=base_url()."admin/cityus/index/".$stadecode[0]["state_code"];
        $this->_data['id']=$data;
        if($this->uri->segment(4)){
            $this->_data['titlepage']="Edit City";
            $this->_data['view']='cityus/editus';
            $this->_data['info']=$this->m_cities_us->listcityone($data);
            $this->_data['info1'] = $this->m_state_us->listStateall();
            $this->load->view($this->_data['template'],$this->_data);
         }
         else{
            redirect(base_url().'admin/state/index');
         }
    }
    public function editus(){
        $this->load->library("form_validation");
        $id=$this->uri->segment(4);
        $this->_data['id']=$this->uri->segment(4);
        $stadecode=$this->m_cities_us->listcityone($id);
        $this->_data['linkback']=base_url()."admin/cityus/index/".$stadecode[0]["state_code"];
        $this->form_validation->set_rules("city","State","required"); 
        $sql['city']=$this->input->post('city');
        $sql['state_code']=$this->input->post('state_code');
       if($this->form_validation->run() == TRUE){
            $this->_data['view']='cityus/editus';
            $this->_data['titlepage']="Edit State";
            $this->_data['success']="Successfully";
            $this->m_cities_us->editcity($id,$sql);
            $this->_data['info']=$this->m_cities_us->listcityone($id);
            $this->load->view($this->_data['template'],$this->_data);

         }
         else{
            $this->_data['view']='cityus/editus';
            $this->_data['titlepage']="Edit State";
            $this->_data['info']=$this->m_cities_us->listcityone($id);
            $this->load->view($this->_data['template'],$this->_data);
        }
    }
 }
 ?>