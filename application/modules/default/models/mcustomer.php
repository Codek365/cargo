<?php
class Mcustomer extends CI_Model{
    protected $_table="customers";
    public function __construct(){
        parent::__construct();
    }
    public function checkUsername($username){
        $sql="SELECT id FROM customers WHERE username='".$username."'";
        $rs=$this->db->query($sql)->result_array();
        if(empty($rs)){
            return true;
        }else{
            return false;
        }
    }
    public function checkEmail($email){
        $sql="SELECT id FROM customers WHERE email='".$email."'";
        $rs=$this->db->query($sql)->result_array();
        if(empty($rs)){
            return true;
        }else{
            return false;
        }
    }
    public function checkPhone($phone){
        $sql="SELECT id FROM customers WHERE phone='".$phone."'";
        $rs=$this->db->query($sql)->result_array();
        if(empty($rs)){
            return true;
        }else{
            return false;
        }
    }
    //ADD
    public function Register($data=array()){
        $this->db->insert($this->_table,$data);
    }
    //Login
    public function Login($username="",$password=""){
        $sql="SELECT id,username,active FROM customers WHERE username='".$username."' AND password='".$password."'";
        $rs=$this->db->query($sql)->row_array();
        return $rs;
    }
    //UPDATE
    public function active($data=array(),$code_active){
        $this->db->where('code_active',$code_active);
        $this->db->update($this->_table,$data);
    }
    public function checkActive($active_code){
        $this->db->select('id');
        $this->db->where('code_active',$active_code);
        $n=$this->db->get($this->_table);
        if(empty($n)){
            return false;
        }else{
            return true;
        }
    }
    //My account
    public function getAccount($id){
        $this->db->select('id,username,email,phone,address,fullname,avatar');
        $this->db->where('id',$id);
        return $this->db->get($this->_table)->row_array();
    }
    public function getAvatar($id){
        $this->db->select('avatar,username');
        $this->db->where('id',$id);
        return $this->db->get($this->_table)->row_array();
    }
    public function updateAccount($id,$data){
        $this->db->where('id',$id);
        $this->db->update($this->_table,$data);
    }
    //Change password
    public function checkOldPassword($id,$username,$oldPassword){
        $sql="SELECT id FROM customers WHERE id=".$id." AND username='".$username."' AND password='".$oldPassword."'";
        $row=$this->db->query($sql)->result_array();
        if(count($row)>0){
            return true;
        }else{
            return false;
        }
    }
    public function changePass($id,$newpass){
        $data['password']=$newpass;
        $this->db->where('id',$id);
        $this->db->update('customers',$data);
    }
        public function checkForgotPassword($username,$email){
        $this->db->select('id');
        $this->db->where('username',$username);
        $this->db->where('email',$email);
        return $this->db->get($this->_table)->result_array();
        }
     public function updatePassword($username,$email,$password){
        $this->db->where('username',$username);
        $this->db->where('email',$email);
        $this->db->set('password',$password);
        $this->db->update($this->_table);
    }
    public function checkUser($id,$password){
        $this->db->select('id');
        $this->db->where('id',$id);
        $this->db->where('password',$password);
        return $this->db->get($this->_table)->result_array();
   }
   //Change password
   public function changePassword($newpassword,$id){
        $this->db->where('id',$id);
        $this->db->set('password',$newpassword);
        $this->db->update($this->_table);
   }
}
?>