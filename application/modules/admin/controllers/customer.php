<?php
class Customer extends Admin_Controller{	
	public function __construct(){		
		parent::__construct();        
		$this->_data['title_area']='Customer Manager';        
		$this->load->model('m_customer');	
	}  

	public function editajax(){        
		$data=array();        
		$notify['error']="";        
		$notify['result']="";        
		$id=$this->uri->segment(4);        
		if($this->input->post()!=""){            
			$this->load->library("form_validation");            
			$this->form_validation->set_rules("fullname","fullname","required");            
			$this->form_validation->set_rules("email","email","valid_email");            
			$this->form_validation->set_rules("phone","phone","required|numeric");            
			$this->form_validation->set_rules("customer_type","customer type","required");            
			$data['fullname']=$this->input->post('fullname');            
			$data['email']=$this->input->post('email');            
			$data['address']=$this->input->post('address');            
			$data['country_id']=$this->input->post('country_id');            
			$data['states']=$this->input->post('states');            
			$data['city_id']=$this->input->post('city_id');            
			$data['customer_type']=$this->input->post('customer_type');            
			if($this->form_validation->run()){                
				$this->m_customer->updateCustomer($data,$id);                
				$notify['result'].='Update successfully!!!';            
			}else{               
				$notify['error'].=validation_errors("<li>","</li>");            
			}        
		}else{            
			$notify['error'].="Error";        
		}        
		echo json_encode($notify);    
	}    

	public function editajax2(){        
		$data=array();        
		$notify['error']="";        
		$notify['result']="";        
		$id=$this->uri->segment(4);        
		if($this->input->post()!=""){            
			$this->load->library("form_validation");            
			$this->form_validation->set_rules("fullname","fullname","required");            
			$this->form_validation->set_rules("zipcode","zipcode","required");            
			$this->form_validation->set_rules("address","address","required");            
			$this->form_validation->set_rules("email","email","valid_email");            
			$this->form_validation->set_rules("phone","phone","required|numeric");            
			$data['customer_name']=$this->input->post('fullname');            
			$data['customer_email']=$this->input->post('email');            
			$data['customer_address']=$this->input->post('address');            
			$data['customer_state']=$this->input->post('state');            
			$data['customer_city']=$this->input->post('city');            
			$data['customer_zipcode']=$this->input->post('zipcode');            
			$data['customer_phone']=$this->input->post('phone');            
			if($this->form_validation->run()){                
				$this->m_customer->updateCustomer($data,$id);                
				$notify['result'].='Update successfully!!!';            
			}else{               
				$notify['error'].=validation_errors("<li>","</li>");            
			}        
		}else{            
			$notify['error'].="Error";        
		}        
		echo json_encode($notify);    
	} 

	public function edit(){        
		$id=$this->uri->segment(4);        
		if(empty($id)){            
			redirect(base_url().'admin/customer/index');            
			exit();        
		}        
		$data=array();        
		$data['country_id']=2;        
		$data['states']=2;        
		$data=$this->m_customer->getDataForEdit($id);        
		$this->_data['info']=$data;        $this->_data['id']=$id;        
		$this->_data['listCustomerType']=$this->m_customer->getCustomerType(); 

	
	       $this->_data['listCountry']=$this->m_customer->getCountry();        
	       $this->_data['listState']=$this->m_customer->getState($data['country_id']);        
	       $this->_data['listCity']=$this->m_customer->getCity($data['states']);        
	       $this->_data['styles'][]='public/admin_layout/css/jquery-ui.min.css';        
	       $this->_data['scripts'][]='public/admin_layout/js/jquery-ui.min.js';        
	       $this->_data['view']='customer/edit';		
	       $this->load->view($this->_data['template'],$this->_data);    
	   
}    
	       public function index(){        
	       $page=$this->uri->segment(4);        
	       if(!is_numeric($page) || $page<1 || empty($page)){            
	       $page=1;        
	   }        
	       $per_page=20;        
	       $this->_data['info']=$this->m_customer->listCustomer($page,$per_page);        
	       $this->_data['total_rows']=$this->m_customer->countRecord();        
	       $this->_data['listCustomerType']=$this->m_customer->getAllCustomerType();        
	       $type = $this->input->get('type');                
	       $this->_data['customer_type_selected'] = $type;        
	       $this->_data['page']=$page;        
	       $this->_data['per_page']=$per_page;          
	       $this->_data['view']='customer/index';		
	       $this->load->view($this->_data['template'],$this->_data);    
	       }    
	   	       public function search(){        
	       $page=$this->uri->segment(4);        
	       if(!is_numeric($page) || $page<1 || empty($page)){            
	       $page=1;        }        
	       $this->load->helper('cookie');        
	       if($this->input->post('search')!=""){            
	       $this->load->library('unicode');            
	       $type=$this->input->post('customer_type',true);            $name=$this->input->post('fullname',true);            $phone=$this->input->post('phone',true);            $name=trim(strtoupper($this->unicode->convert($name)));            $this->input->set_cookie('customer_search',serialize(array('name'=>$name,'phone'=>$phone)), time()+3600*2);        }else{            $customer_search=$this->input->cookie('customer_search');            if(!empty($customer_search)){                $customer_search=unserialize($customer_search);                $name=$customer_search['name'];                $phone=$customer_search['phone'];                
	       $type=$customer_search['type'];            
	       }else{                $name="";                $phone="";                
	       $type=1;            }        }        $per_page=20;        $this->_data['info']=$this->m_customer->listCustomer_search($page,$per_page,$name,$phone);        
	       $this->_data['listCustomerType']=$this->m_customer->getAllCustomerType();        $this->_data['total_rows']=$this->m_customer->countRecord_search($name,$phone);        
	       $this->_data['customer_type_selected']=$type;        $this->_data['page']=$page;        $this->_data['name']=$name;        $this->_data['phone']=$phone;        $this->_data['per_page']=$per_page;          $this->_data['view']='customer/search';		$this->load->view($this->_data['template'],$this->_data);    }    public function getConsigneeInfo(){        $consignee_id=$this->input->post('consignee_id');        if(!empty($consignee_id)){            $consignee_country=$this->m_customer->getConsigneeCountry($consignee_id);            $consignee_info=$this->m_customer->getConsigneeInfo($consignee_id,$consignee_country['consignee_country']);            if(!empty($consignee_info)){                echo json_encode($consignee_info);            }        }    }    public function view(){        
	       	$id=$this->uri->segment(4);        
	       	if(!empty($id) && is_numeric($id)){            
	       		$this->_data['id']=$id;            
	       //==============================================================================================            
	       		$this->_data['data']=$this->m_customer->view($id);            $this->_data['listState']=$this->m_customer->listState($this->_data['data']['customer_country']);            $this->_data['listCity']=$this->m_customer->listCity($this->_data['data']['customer_state'],$this->_data['data']['customer_country']);            $this->_data['listOrder']=$this->m_customer->getOrderByCustomerId($id);            $this->_data['descriptions']=$this->m_customer->getDesciptionForOrder($id);            
	       //==============================================================================================            
	       $this->_data['view']='customer/view_2';            
	       $this->load->view($this->_data['template'],$this->_data);        
	   }else{            
	   	redirect(base_url().'admin/customer/index');        
	}    
}    
	public function getOrderToEdit(){        
		$order_id=$this->input->post('order_id',true);        
		if(!empty($order_id)){            
			$data=array();            
			$data['order']=$this->m_customer->getOrderDataToEdit($order_id);            
			$data['order_status_data']=$this->m_customer->getOrderStatus();            
			echo json_encode($data);        }    }    
			public function delete()    {        
				$id=$this->uri->segment(4);        
				$this->m_customer->deleteById($id);        
				redirect(base_url().'admin/customer/index');    
			}    
				public function deleteConsignee()    {        
					$sender = $this->input->get('sender');        
					$consignee = $this->input->get('receiver');        
					echo $consignee.$sender;        
					$this->m_customer->deleteConsigneeById($consignee);        
					redirect(base_url().'admin/customer/view/'.$sender);    
				}    
	       public function editreceiver(){       
	        $id=$this->input->get('receiver');        
	        $sender=$this->input->get('sender');        
	        $this->_data['sender_id']=$sender;        
	        $this->_data['receiver_id']=$id;        
	        $this->_data['info']=$this->m_customer->getInfoReceiver($id);        
	        $this->_data['listCountry']=$this->m_customer->listCountry();        
			$this->_data['listState']=$this->m_customer->listState($this->_data['info']['consignee_country']);        
			$this->_data['listCity']=$this->m_customer->listCity($this->_data['info']['consignee_state'],$this->_data['info']['consignee_country']);        
			$this->_data['styles'][]='public/admin_layout/css/jquery-ui.min.css';        
			$this->_data['scripts'][]='public/admin_layout/js/jquery-ui.min.js';        
			$this->_data['view']='customer/editreceiver';        
			$this->load->view($this->_data['template'],$this->_data);    
	    }    
	       public function updatereceiver(){        
	       	$data=array();        
	       	$notify['error']="";        
	       	$notify['result']="";        
	       	if($this->input->post()){            
	       		$this->load->library("form_validation");            
	       		$this->form_validation->set_rules("receiver_name","consignee name","required");            
	       		$this->form_validation->set_rules("receiver_phone","consignee phone","required");            
	       		$this->form_validation->set_rules("receiver_address","consignee address","required");            
	       		$this->form_validation->set_rules("receiver_country_id","receiver country","required");            
	       		$this->form_validation->set_rules("receiver_city_id","receiver city","required");            
	       		$this->form_validation->set_rules("receiver_states","receiver state","required");           
	       		$this->form_validation->set_rules("receiver_zipcode","receiver zipcode","required");            $data['receiver_name']=$this->input->post('receiver_name',true);            $data['receiver_phone']=$this->input->post('receiver_phone',true);            $data['receiver_address']=$this->input->post('receiver_address',true);            $data['receiver_email']=$this->input->post('receiver_email',true);            $data['receiver_zipcode']=$this->input->post('receiver_zipcode',true);            $data['receiver_states']=$this->input->post('receiver_states',true);            $data['receiver_city_id']=$this->input->post('receiver_city_id',true);            $data['receiver_country_id']=$this->input->post('receiver_country_id',true);            
	       		$receiver_id=$this->input->post('receiver_id',true);            
	       		if($this->form_validation->run()){                
	       			$this->load->library('unicode');                
	       			$receiver_data['consignee_name']=strtoupper($this->unicode->convert($data['receiver_name']));                $receiver_data['consignee_phone']=$data['receiver_phone'];                $receiver_data['consignee_address']=$data['receiver_address'];                $receiver_data['consignee_email']=$data['receiver_email'];                $receiver_data['consignee_zipcode']=$data['receiver_zipcode'];                $receiver_data['consignee_state']=$data['receiver_states'];                $receiver_data['consignee_city']=$data['receiver_city_id'];                $receiver_data['consignee_country']=$data['receiver_country_id'];                
	       			if(!empty($receiver_id)){                    
	       				$this->m_customer->updateReceiver($receiver_id,$receiver_data);                    
	       				$notify['result']="successfully";                
	       			}            
	       			}else{                
	       				$notify["error"].=validation_errors("<li>","</li>");            
	       			}        
	       		}        
	       			echo json_encode($notify);    
	   } 
	} 