<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_user extends CI_Model {

	public $variable;
	protected $_table="users";

	public function __construct()
	{
		parent::__construct();
		
	}

	// Load detail user 
	public function updateUser($user_id,$data){
        $this->db->where('user_id',$user_id);
        $this->db->update($this->_table,$data);
    }
    public function getProfile($user_id){
        $this->db->where('user_id',$user_id);
        return $this->db->get($this->_table)->row_array();
    }
    public function getAvatarById($user_id=""){
    	$this->db->select('user_avatar');
    	$this->db->where('user_id',$user_id);
    	return $this->db->get($this->_table)->row_array();
    }
    public function getAvatar($user_id){
        $this->db->select('user_avatar');
        $this->db->where('user_id',$user_id);
        return $this->db->get($this->_table)->row_array();
    }
	 public function checkPassord($user_id,$oldpassword){
        $this->db->where('user_id',$user_id);
        $this->db->where('user_password',md5($oldpassword));
        $check=$this->db->get('users')->result_array();
        return count($check);
    }
    // End

	public function loadUserList()
	{
		$this->db->select('*');
		$this->db->join('user_positions', 'user_positions.user_position_id = users.user_position', 'left');
		$this->db->where('user_id !=',1);
		return $this->db->get('users')->result_array();
	}

	public function loadRole()
	{
		$this->db->where('user_position_id !=', 1);
		return $this->db->get('user_positions')->result_array();
	}
	public function loadRouters()
	{
		$this->db->order_by('user_router_id', 'asc');
		$this->db->where('hide',0);
		$this->db->where('user_router_id_lv',0);
		return $this->db->get('user_routers')->result_array();
	}

	
	public function loadRoutersById($id)
	{
		$sql = "SELECT id, 'user_routers.user_router_id' AS user_router_id, user_router_link,user_router_name
				FROM user_routers JOIN user_positions_router 
				ON user_routers.user_router_id=user_positions_router.user_router_id where hide = '0' AND user_router_id_lv = '0' AND user_positions_router.user_position_id = '".$id."'";
		return $this->db->query($sql)->result_array();
	}

	public function loadRoutersByPermission()
	{
		$this->db->order_by('user_router_name', 'asc');
		// $this->db->join('users', 'users. = table2.field', 'left');
		return $this->db->get('user_routers')->result_array();
	}
	public function loadRoutersByPermissionLv1()
	{
		$this->db->select('*');
		$this->db->where('user_router_id_lv',0);
		$this->db->order_by('sort', 'asc');
		return $this->db->get('user_routers')->result_array();
	}
	public function loadRoutersByPermissionLv2($id)
	{
		$this->db->select('*');
		$this->db->where('user_router_id_lv',$id);
		$this->db->where('hide',0);
		$this->db->order_by('sort', 'asc');
		return $this->db->get('user_routers')->result_array();
	}
	public function loadPermissionGroup($id)
	{
		
		$sql = "SELECT * FROM user_routers JOIN user_positions_router 
		ON user_routers.user_router_id=user_positions_router.user_router_id where hide = '0' AND user_router_id_lv = '0' AND user_positions_router.user_position_id = '".$id."'";
		return $this->db->query($sql)->result_array();
	}
	public function loadPermissionGroupLink($id,$link)
	{
		
		$sql = "SELECT user_router_link,edit FROM user_routers JOIN user_positions_router 
		ON user_routers.user_router_id=user_positions_router.user_router_id where hide = '0' AND user_router_id_lv = '0' AND user_positions_router.user_position_id = '".$id."'";
		$sql .= "AND user_router_link = '".$link."'";
		return $this->db->query($sql)->row_array();
	}
	// insert data into database => please comment all new code header_remove()
	public function addUser($data)	
	{
		$this->db->insert('users', $data); 
	}
	public function addRole($data)	
	{
		$this->db->insert('user_positions', $data); 
	}
	public function addRoleRouter($data)
	{
		$this->db->insert('user_positions_router', $data); 
	}
	// det data into database => please take care
	public function deleteUser($id)
	{
		$this->db->delete('users', array('user_id' => $id)); 
	}
	public function deleteRole($id)
	{
		$this->db->delete('user_positions', array('user_position_id' => $id)); 
	}
	public function deleteRoleRouter($id)
	{
		$this->db->delete('user_positions_router', array('id' => $id)); 
	}
	public function updateRole($user_id,$role)
	{
		$this->db->where('user_id',$user_id);
        $this->db->update('users',$role);
	}
	public function updateUserRouter($user_router_id,$router)
	{
		$this->db->where('user_position_id',$user_router_id);
        $this->db->update('user_positions',$router);
	}
}

