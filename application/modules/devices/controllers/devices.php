<?php 

class Devices extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_devices');
		$route['admin/devices/(:any)']="devices/devices/$1";
	}

	public function index()
	{
		// title
		$this->_data['title_area']="Devices Manager";
		// get devices
		$this->_data['devices'] = $this->m_devices->getDevices();
		// load view
		$this->_data['view']='devices/index';
	    $this->load->view($this->_data['template'],$this->_data);
	}
	public function history()
	{
		// title
		$this->_data['title_area']="Devices History";
		// get history token
		$this->_data['history'] = $this->m_devices->history();

		// del by line
		// echo $id = $this->input->get('del');

		// if ($id !=NULL) {
		// 	$data = array(
		// 			'id' => $id
		// 		);
		// 	$this->m_devices->token_del($data);
		// 	redirect(base_url().'devices/history');
		// }

		// load view
		$this->_data['view']='devices/history';
		$this->load->view($this->_data['template'],$this->_data);
	}

	public function switchStatus() {
		$status = $this->input->get('status', TRUE);
		$id = $this->input->get('device_id', TRUE);
		$data = array(
			'device_id' => $id,
			);
		if ($status == 'enable') {			
			$this->m_devices->enable($data);
		}
		if ($status == 'disable') {			
			$this->m_devices->disable($data);
		}
		

		// title
		$this->_data['title_area']="Devices Manager";
		// get devices
		$this->_data['devices'] = $this->m_devices->getDevices();
		// load view
		$this->_data['view']='devices/index';
	    $this->load->view($this->_data['template'],$this->_data);
		
	}

	public function add_device() {
		$id = $this->input->get('id', TRUE);
		$name = $this->input->get('name', TRUE);
		
		if (!empty($id)  && !empty($name) ) {
			$data = array(
			'device_id' => $id,
			'device_name' => $name,
			);
		 	$this->m_devices->add_device($data);
		 	redirect(base_url().'devices/index');
		 } 
	}

	public function del_device() {
		echo $id = $this->input->get('id', TRUE);
		if (!empty($id) ) {
			$data = array(
			'device_id ' => $id,			
			);
		 	// $this->m_devices->del_device($data);
		 	$this->db->delete('mb_devices', $data);
		 	$this->db->delete('mb_tokens', $data);
		 	redirect(base_url().'devices/index');
		 } 
	}

}


/* End of file  */
/* Location: ./application/controllers/ */