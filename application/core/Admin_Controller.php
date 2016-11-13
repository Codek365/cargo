﻿<?php
      class Admin_Controller extends MY_Controller{
         protected $_data=array();
            public function __construct(){
                  parent::__construct();
                  /*======================================*/
                  /*
                  Create session for user, user group. Make point and position where 
                  user action width controller
                  */
                  
                  $this->load->library('session');
                  $this->load->model('admin/m_user');
                  $this->_data["position"] = $this->uri->segment(2);
                  $user_id=$this->session->userdata('user_id');
                  $this->_data["user"] = $user_id;
                  
                  $user_E = $this->m_user->loadPermissionGroupLink($this->session->userdata('usergroup'),$this->uri->segment(2));
                  if(count($user_E) >0) {
                        $this->_data["user_E"] = $user_E['edit'];
                  } else{
                       $this->_data["user_E"] = ''; 
                  }
                  
                  $this->_data["user_group"] = $this->session->userdata('usergroup'); 
                  /*End*/                  
                  /*======================================*/
                  /* Auto logout and attact virtual connect*/
                  $class=$this->router->fetch_class();
                  $module=$this->router->fetch_module();
                  if(trim(strtolower($module))=='admin'){
                        if(trim(strtolower($class))!='verify'){
                              $user_id=$this->session->userdata('user_id');
                              if(empty($user_id)){
                                    redirect(base_url().'admin/verify/login');
                              }
                        }
                  }
                  /*======================================*/
                  $this->load->library('system');
                  
                  /*======================================*/
                  $this->load->helper('date');
                  $this->_data['now']=local_to_gmt(time());
                  /*======================================*/      
                  $this->_data["titlepage"]="Unknown";
                  $mod=$this->uri->segment(1);
                  $this->_data["module"]=$mod;
                  $this->_data["template"]="admin/template";
                  $this->_data["view"]="$mod/error";
                  $this->_data["scripts"]=array();
                  $this->_data["styles"]=array();
                        
                  }
      }
?>