<?php
	class Default_Controller extends MY_Controller{
	   protected $_data=array();
		public function __construct(){
			parent::__construct();
            $this->_data["titlepage"]="Unknown";
            $mod=$this->router->fetch_module();
            $this->_data["module"]=$mod;
            $this->_data["view"]="default/error";
            $this->_data["scripts"]=array();
            $this->_data["styles"]=array();
            //LAYOUT
            $this->load->model('mlayout');
            $this->_data['layout']=$this->mlayout->getLayout();
		}
	}
?>