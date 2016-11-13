<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class System extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_sfield');
	}

	public function Index()
	{
		$this->_data['sfield'] = $this->m_sfield->load();

		/*Base load template*/
		$this->_data['title_area']="System Manager";
        $this->_data["view"]="system/index";
        $this->load->view($this->_data["template"],$this->_data);
	}

	public function Update()
	{
		$this->m_sfield->Update(array('field_value'=>$this->input->get('value')),$this->input->get('id'));
		redirect(base_url().'admin/system');
	}

	public function Insert()
	{
		$this->m_sfield->Insert(array('field_name'=>$this->input->get('name'),'field_value'=>$this->input->get('value')));
		redirect(base_url().'admin/system');
	}
	public function Delete()
	{
		$this->m_sfield->Delete($this->input->get('id'));
		redirect(base_url().'admin/system');
	}
}

/* End of file system.php */
/* Location: ./application/controllers/system.php */