<?php
class State extends Admin_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('m_state_us');
        $this->load->model('m_state_vn');
    }
    public function index(){
        $this->_data['titlepage']="Country";
        $this->_data['view']='state/index';
        $this->load->view($this->_data['template'],$this->_data);
    }
    // public function index(){
    //     $page=$this->uri->segment(4);
    //     if(!is_numeric($page) || $page < 1 || empty($page)){
    //         $page=1;
    //     }
    //     $per_page=20;
    //     $this->_data["info"]=$this->m_state->listState($page,20);
    //     $this->_data['total_rows']=$this->m_state->countRecord();
    //     $this->_data['page']=$page;
    //     $this->_data['per_page']=$per_page;
    //     $this->_data['title_area']="Cities";
    //     $this->_data['view']='state/index';
    //     $this->load->view($this->_data['template'],$this->_data);
    // }
    public function states(){
        $country=$this->input->post("country");
        if($country=="us"){
            redirect(base_url().'admin/state/statesus');
        }
        else{
            redirect(base_url().'admin/state/statesvn');
        }
    }
    public function statesus(){
        $this->load->library('pagination');
        $country="";
        $this->_data['titlepage']="State"; 
        $this->_data['link']="";
        $this->_data['linkedit']="";
        $this->_data['linkedel']="";
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
        // $config['use_page_numbers'] = TRUE;
        //format
        // if($this->input->post()){
            // $country=$this->input->post("country");
            // if($country=="us")
            // {
        $this->_data['country']="USA";
        $this->_data['link']=base_url()."admin/state/addus";
        $this->_data['linkedit']=base_url()."admin/state/loadoneus";
        $this->_data['linkdel']=base_url()."admin/state/delus";
        $this->_data['linkdetail']=base_url().'admin/cityus/index';
        $config['base_url'] = base_url('admin/state/statesus'); // xác định trang phân trang 
        $config['total_rows'] = $this->m_state_us->count_all(); // xác định tổng số record 
        $config['per_page'] = 20; // xác định số record ở mỗi trang 
        $config['uri_segment'] = 4; // xác định segment chứa page number 
        $this->pagination->initialize($config); 
        $this->_data['info'] = $this->m_state_us->listState($config['per_page'],$this->uri->segment(4)); 
        $this->_data['view']='state/states';
        $this->_data['country']=$country;
            // }
            // else
            // {
                // $this->_data['link']=base_url()."admin/state/addvn";
                // $this->_data['linkedit']=base_url()."admin/state/loadonevn";
                // $this->_data['linkdel']=base_url()."admin/state/delvn";
                // $config['base_url'] = base_url('admin/state/states'); // xác định trang phân trang 
                // $config['total_rows'] = $this->m_state_vn->count_all(); // xác định tổng số record 
                // $config['per_page'] = 20; // xác định số record ở mỗi trang 
                // $config['uri_segment'] = 4; // xác định segment chứa page number 
                // $this->pagination->initialize($config); 
                // $this->_data['info'] = $this->m_state_vn->listState($config['per_page'],$this->uri->segment(4)); 
                // $this->_data['view']='state/states';
                // $this->_data['country']=$country;           
            // }
                $this->load->view($this->_data['template'],$this->_data);// view us và view vn dùng chung 1 layout 
        //     }
        // else{
        //     redirect(base_url().'admin/state/index');
        // }
       
    }
     public function statesvn(){
        $this->load->library('pagination');
        $country="";
        $this->_data['titlepage']="State"; 
        $this->_data['link']="";
        $this->_data['linkedit']="";
        $this->_data['linkedel']="";
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
        // $config['use_page_numbers'] = TRUE;
        //format
        // if($this->input->post()){
            // $country=$this->input->post("country");
            // if($country=="us")
            // {
            //     $this->_data['link']=base_url()."admin/state/addus";
            //     $this->_data['linkedit']=base_url()."admin/state/loadoneus";
            //     $this->_data['linkdel']=base_url()."admin/state/delus";
            //     $config['base_url'] = base_url('admin/state/states'); // xác định trang phân trang 
            //     $config['total_rows'] = $this->m_state_us->count_all(); // xác định tổng số record 
            //     $config['per_page'] = 20; // xác định số record ở mỗi trang 
            //     $config['uri_segment'] = 4; // xác định segment chứa page number 
            //     $this->pagination->initialize($config); 
            //     $this->_data['info'] = $this->m_state_us->listState($config['per_page'],$this->uri->segment(4)); 
            //     $this->_data['view']='state/states';
            //     $this->_data['country']=$country;
            // }
            // else
            // {
                $this->_data['country']="vn";
                $this->_data['link']=base_url()."admin/state/addvn";
                $this->_data['linkedit']=base_url()."admin/state/loadonevn";
                $this->_data['linkdetail']=base_url().'admin/cityvn/index';
                $this->_data['linkdel']=base_url()."admin/state/delvn";
                $config['base_url'] = base_url('admin/state/statesvn'); // xác định trang phân trang 
                $config['total_rows'] = $this->m_state_vn->count_all(); // xác định tổng số record 
                $config['per_page'] = 20; // xác định số record ở mỗi trang 
                $config['uri_segment'] = 4; // xác định segment chứa page number 
                $this->pagination->initialize($config); 
                $this->_data['info'] = $this->m_state_vn->listState($config['per_page'],$this->uri->segment(4)); 
                $this->_data['view']='state/states';
                // $this->_data['country']=$country;           
            // }
                $this->load->view($this->_data['template'],$this->_data);// view us và view vn dùng chung 1 layout 
        //     }
        // else{
        //     redirect(base_url().'admin/state/index');
        // }
       
    }
    public function addus(){
        $this->_data['link']=base_url()."admin/state/addus";
        $this->_data['linkback']=base_url()."admin/state/statesus";
        $this->_data['view']='state/add';
        $this->_data['titlepage']="Add State";
        $this->load->library("form_validation");
        $this->form_validation->set_rules("state","State","required"); 
        $this->form_validation->set_rules("statecode","State Code","required"); 
        $sql['state']=$this->input->post('state');
        $sql['state_code']=$this->input->post('statecode');
        $this->_data['success']="";
        if($this->form_validation->run() == TRUE){
            $this->_data['view']='state/add';
            $this->_data['titlepage']="State";
            $this->_data['success']="Successfully";
            $this->m_state_us->addstate($sql);
            $this->load->view($this->_data['template'],$this->_data);
         }
         else{
            $this->_data['view']='state/add';
            $this->_data['titlepage']="State";
            $this->load->view($this->_data['template'],$this->_data);
        }
    }
    public function addvn(){
        $this->_data['link']=base_url()."admin/state/addvn";
        $this->_data['linkback']=base_url()."admin/state/statesvn";
        $this->_data['view']='state/add';
        $this->_data['titlepage']="Add State";
        $this->load->library("form_validation");
        $this->form_validation->set_rules("state","State","required"); 
        $this->form_validation->set_rules("statecode","State Code","required"); 
        $sql['state']=$this->input->post('state');
        $sql['state_code']=$this->input->post('statecode');
        $this->_data['success']="";
        if($this->form_validation->run() == TRUE){
            $this->_data['view']='state/add';
            $this->_data['titlepage']="State";
            $this->_data['success']="Successfully";
            $this->m_state_vn->addstate($sql);
            $this->load->view($this->_data['template'],$this->_data);
         }
         else{
            $this->_data['view']='state/add';
            $this->_data['titlepage']="State";
            $this->load->view($this->_data['template'],$this->_data);
        }
    }
    public function loadoneus($data){
        $this->load->library("form_validation");
        $this->_data['linkback']=base_url()."admin/state/statesus";
        $this->_data['id']=$this->uri->segment(4);
        if($this->uri->segment(4)){
            $this->_data['link']=base_url()."admin/state/editus";
            $this->_data['actionedit']=base_url().'admin/state/editus/';
            $this->_data['titlepage']="Edit State";
            $this->_data['view']='state/edit';
            $this->_data['info']=$this->m_state_us->listStateone($data);
            $this->load->view($this->_data['template'],$this->_data);
         }
         else{
            redirect(base_url().'admin/state/index');
         }
    }
    public function editus(){
        $this->load->library("form_validation");
        $this->_data['linkback']=base_url()."admin/state/statesus";
        $id=$this->uri->segment(4);
        $this->_data['id']=$this->uri->segment(4);
        $this->_data['actionedit']=base_url().'admin/state/editus/';
        $this->form_validation->set_rules("state","State","required"); 
        $this->form_validation->set_rules("statecode","State Code","required"); 
        $sql['state']=$this->input->post('state');
        $sql['state_code']=$this->input->post('statecode');

        $this->_data['success']="";
        if($this->input->post('state')){
           if($this->form_validation->run() == TRUE){
                $this->_data['view']='state/edit';
                $this->_data['titlepage']="Edit State";
                $this->_data['success']="Successfully";
                $this->m_state_us->editstate($id,$sql);
                $this->load->view($this->_data['template'],$this->_data);
             }
             else{
                $this->_data['view']='state/edit';
                $this->_data['titlepage']="Edit State";
                $this->load->view($this->_data['template'],$this->_data);
            }
         }
         else{
            redirect(base_url().'admin/state/index');
         }
    }
    public function loadonevn($data){
        $this->load->library("form_validation");
        $this->_data['linkback']=base_url()."admin/state/statesvn";
        $this->_data['id']=$this->uri->segment(4);
        if($this->uri->segment(4)){
            $this->_data['link']=base_url()."admin/state/editus";
            $this->_data['actionedit']=base_url().'admin/state/editvn/';
            $this->_data['titlepage']="Edit State";
            $this->_data['view']='state/edit';
            $this->_data['info']=$this->m_state_vn->listStateone($data);
            $this->load->view($this->_data['template'],$this->_data);
         }
         else{
            redirect(base_url().'admin/state/index');
         }
    }
    public function editvn(){
        $this->load->library("form_validation");
        $this->_data['linkback']=base_url()."admin/state/statesvn";
        $id=$this->uri->segment(4);
        $this->_data['id']=$this->uri->segment(4);
        $this->_data['actionedit']=base_url().'admin/state/editvn/';
        $this->form_validation->set_rules("state","State","required"); 
        $this->form_validation->set_rules("statecode","State Code","required"); 
        $sql['state']=$this->input->post('state');
        $sql['state_code']=$this->input->post('statecode');

        $this->_data['success']="";
        if($this->input->post('state')){
           if($this->form_validation->run() == TRUE){
                $this->_data['view']='state/edit';
                $this->_data['titlepage']="Edit State";
                $this->_data['success']="Successfully";
                $this->m_state_vn->editstate($id,$sql);
                $this->load->view($this->_data['template'],$this->_data);
             }
             else{
                $this->_data['view']='state/edit';
                $this->_data['titlepage']="Edit State";
                $this->load->view($this->_data['template'],$this->_data);
            }
         }
         else{
            redirect(base_url().'admin/state/index');
         }
    }
    public function delus($data){
       $id=$this->uri->segment(4);
       if(!empty($id)){
             $this->m_state_us->delus($data);
             redirect(base_url().'admin/state/statesus');
       }
       redirect(base_url().'admin/state/index');
    }
    public function delvn($data){
       $id=$this->uri->segment(4);
       if(!empty($id)){
             $this->m_state_vn->delvn($data);
             redirect(base_url().'admin/state/statesvn');
       }
       redirect(base_url().'admin/state/index');
    }
     // public function editus(){
     // }
    // public function addProcess(){
    //     $notify=array();
    //     $notify['error']="";
    //     $notify['result']="";
    //     $this->load->library("form_validation");
    //     $this->form_validation->set_rules("contry_id","country","required");
    //     $this->form_validation->set_rules("state_code","state code","required");
    //     $this->form_validation->set_rules("state","state","required");
    //     $data['contry_id']=$this->input->post('contry_id');
    //     $data['state_code']=$this->input->post('state_code');
    //     $data['state']=$this->input->post('state');
    //     if($this->form_validation->run()){
    //         $data['country_name']=$this->m_state->getCountryNameById($data['contry_id']);
    //         $this->m_state->addState($data);
    //        $notify['result'].='ok';
    //     }else{
    //         $notify["error"].=validation_errors("<li>","</li>");
    //     }
    //     echo json_encode($notify);
    // }
    //  public function edit(){
    //     $id=$this->uri->segment(4);
    //     $this->_data['id']=$id;
    //     $notify=array();
    //     $notify['error']="";
    //     $notify['result']="";
    //     $this->_data['info']=$this->m_state->getStateById($id);
    //     $this->_data['view']='state/edit';
    //     $this->_data['listCountry']=$this->m_state->getCountry();
    //     $this->_data['styles'][]='public/admin_layout/css/jquery-ui.min.css';
    //     $this->_data['scripts'][]='public/admin_layout/js/jquery-ui.min.js';
    //     $this->load->view($this->_data['template'],$this->_data);
    // }
    // public function editProcess(){
    //     $id=$this->uri->segment(4);
    //     $notify=array();
    //     $notify['error']="";
    //     $notify['result']="";
    //     if($this->input->post()){
    //         $this->load->library("form_validation");
    //         $this->form_validation->set_rules("contry_id","country","required");
    //         $this->form_validation->set_rules("state_code","state code","required");
    //         $this->form_validation->set_rules("state","state","required");
    //         $data['contry_id']=$this->input->post('contry_id');
    //         $data['state_code']=$this->input->post('state_code');
    //         $data['state']=$this->input->post('state');
    //         if($this->form_validation->run()){
    //             $data['country_name']=$this->m_state->getCountryNameById($data['contry_id']);
    //             $this->m_state->editState($id,$data);
    //            $notify['result'].='ok';
    //         }else{
    //             $notify["error"].=validation_errors("<li>","</li>");
    //         } 
    //     }
    //     echo json_encode($notify);
    // }
    // public function delete(){
    //    $id=$this->uri->segment(4);
    //    if(!empty($id)){
    //         $this->m_state->deleteCity($id);
    //         $this->m_state->deleteState($id);
    //    }
    //    redirect(base_url().'admin/state/index');
    // }
 }
 ?>