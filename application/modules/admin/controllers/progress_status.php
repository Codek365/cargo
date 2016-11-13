<?php
class progress_status extends Admin_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('m_progress_status');
		$this->_data['title_area']="Cargo progress";
	}
	public function index(){
		$this->_data['title_area']="Tracking status";
		$this->_data['info']=$this->m_progress_status->getAll();
		$this->_data['view']='progress_status/index';
		$this->load->view($this->_data['template'], $this->_data);
	}
	public function add(){
		$data=array();
		$this->_data['error']="";
		$this->_data['info']['selected_country']='vn';
		if($this->input->post('save')!=""){
			$this->load->library('form_validation');
			$data['order_status_name']=$this->input->post('order_status_name',true);
			$data['order_status_notes']=$this->input->post('order_status_notes',true);
			$data['belong_to_country']=$this->input->post('belong_to_country',true);
			$this->_data['info']['selected_country']=$data['belong_to_country'];
			$this->form_validation->set_rules('order_status_name', 'order status name', 'trim|required|xss_clean');
			if($this->form_validation->run()){
				$this->m_progress_status->addProgress($data);
				$this->session->set_flashdata('success','A progress status item has been inserted successfully');
				redirect(base_url().'admin/progress_status');
			}
		}
		$this->_data['countries_data']=$this->m_progress_status->getCountries();
		$this->_data['view']='progress_status/add';
		$this->load->view($this->_data['template'], $this->_data);
	}
	public function update(){
		$data=array();
		$this->_data['error']="";
		$id=$this->uri->segment(4);
		$this->_data['info']['belong_to_country']='vn';
		if(!empty($id)){
			if($this->input->post('save')!=""){
			$this->load->library('form_validation');
			$data['order_status_name']=$this->input->post('order_status_name',true);
			$data['order_status_sort']=$this->input->post('order_status_sort',true);
			$data['order_status_notes']=$this->input->post('order_status_notes',true);
			$data['belong_to_country']=$this->input->post('belong_to_country',true);
			$this->form_validation->set_rules('order_status_name', 'order status name', 'trim|required|xss_clean');
			if($this->form_validation->run()){
				$this->m_progress_status->updateProgress($id,$data);
				$this->session->set_flashdata('success','A progress status item has been updated successfully');
				redirect(base_url().'admin/progress_status/index');
			}
			}else{
				$data=$this->m_progress_status->getToUpdate($id);
			}
			$this->_data['id']=$id;
			$this->_data['info']=$data;
			$this->_data['countries_data']=$this->m_progress_status->getCountries();
			$this->_data['view']='progress_status/edit';
			$this->load->view($this->_data['template'], $this->_data);
		}
	}
	public function delete()
	{
		$id = $this->uri->segment(4);
		$this->m_progress_status->delete($id);
		redirect(base_url().'admin/progress_status/index');
	}
} 
?>