<?php
class Tracking extends Default_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('mtracking_order');
        $this->load->model('mtracking_sysinfo');
        $this->load->model('mtracking_ordertt');
    }
    public function index(){
    	$this->load->library("form_validation");
        $this->_data['title_page']="Search";
        $this->form_validation->set_rules("track","Tracking Number","required"); 
        if($this->form_validation->run() == TRUE){
        	 $this->_data['view']="default/trackingsearch";
	        $track=$this->input->post('track');
            // $this->_data['track']=$track
	        
			$tk=$this->mtracking_sysinfo->getany();
	        $prefix_len= strlen($tk['tracking_code_prefix']);//lấy số ký tự trên bản system_infomation
	        $order_id=substr($track,$prefix_len);
            $this->_data['track']=$tk['tracking_code_prefix'].$order_id;
	        if(is_numeric($order_id) && $this->mtracking_order->getorderbyid($order_id)!=FALSE ){
		        $this->_data['info']=$this->mtracking_order->getorderbyid($order_id);
		        $this->_data['status']=$this->mtracking_ordertt->getall();
		        $this->load->view('default/tracking',$this->_data);
		    }else{
		      $this->_data['view']="default/trackingnot";
    	 	  $this->_data['info']="Please Enter Your Code";
    		  $this->load->view('default/tracking',$this->_data);
		    }
    	 }else{
    	 	  $this->_data['view']="default/trackingnot";
    	 	  $this->_data['info']="<center>Please Try Again Or Check Your Tracking Number</center>";
    		  $this->load->view('default/tracking',$this->_data);
    	 	
    	}
    }
    public function app(){
        $this->load->library("form_validation");
        $this->_data['title_page']="Search";
        $this->form_validation->set_rules("track","Tracking Number","required"); 
        if($this->form_validation->run() == TRUE){
             $this->_data['view']="default/trackingsearch";
            $track=$this->input->post('track');
            $this->_data['track']=$track;
            $tk=$this->mtracking_sysinfo->getany();
            $prefix_len= strlen($tk['tracking_code_prefix']);//lấy số ký tự trên bản system_infomation
            $order_id=substr($track,$prefix_len);
            if(is_numeric($order_id) && $this->mtracking_order->getorderbyid($order_id)!=FALSE){
                $info=$this->mtracking_order->getorderbyid($order_id);
                // $this->_data['status']=$this->mtracking_ordertt->getall();
                $status=$this->mtracking_ordertt->getall();
                foreach ($status as $status_item) {
                    if($info["order_status_id"]== $status_item["order_status_id"])
                        $status_name=$status_item["order_status_name"];
                }
                if(!empty($info["order_status_id"]))
                    echo $status_name;
                else
                    echo "-2";//lỗi

            }else{
              echo "-1";//tracking
            }
         }else{
              echo "0";//lỗi
            
        }
    }
}
?>