<?php
class M_verify extends CI_Model{
	protected $_table="users";
	public function __construct(){
		parent::__construct();
	}
	public function checkLogin($username,$password){
		$this->db->select('user_id,user_username,user_position');
		$this->db->where('user_username',$username);
		$this->db->where('user_password',$password);
		return $this->db->get($this->_table)->row_array();
	}
    public function checkForgotPassword($username,$email){
        $this->db->select('user_id');
        $this->db->where('user_username',$username);
        $this->db->where('user_email',$email);
        return $this->db->get($this->_table)->result_array();
    }
    public function updatePassword($username,$email,$password){
        $this->db->where('user_username',$username);
        $this->db->where('user_email',$email);
        $this->db->set('user_password',$password);
        $this->db->update($this->_table);
    }

    public function defaultRouter($user)
    {
        $this->db->select('default_router');
        $this->db->where('user_position_id',$user);
        return $this->db->get('user_positions')->row_array();
    }
}
?>