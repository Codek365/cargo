<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_Action_Role extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
	}

	public function addRole()
	{
		$role['user_position_name'] = $this->input->get('name');
		$role['user_position_notes'] = $this->input->get('note');
		$this->m_user->addRole($role);
		redirect(base_url().'admin/user/role');
	}
	public function delete()
	{
		$id = $this->input->get('id', TRUE);
		$this->m_user->deleteRole($id);
		redirect(base_url().'admin/user/role');
	}

	public function loadRoleById()
	{
		$id = $this->input->post('id');
		$result = array();
		$result = $this->m_user->loadRoutersById($id);
		echo json_encode($result);

	}

}

/* End of file  */
/* Location: ./application/controllers/ */