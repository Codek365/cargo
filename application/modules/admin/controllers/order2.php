<?php

class Order extends Admin_Controller{

	public function __construct(){

		parent::__construct();

		$this->load->model('m_order');

	}

	public function index(){

		$per_page=20;

		$page=$this->uri->segment(4);

		if(empty($page) || !is_numeric($page)){

			$page=1;

		}

		$this->_data['trackingcode']=$this->m_order->getTrackingCodePrefix();

		$this->_data['order_status_data']=$this->m_order->getOrderStatus();

		$this->_data['countries_data']=$this->m_order->getAllCountry();

		$this->_data['total_rows']=$this->m_order->getNumOrders();
		//=======================================BỔ SUNG(10/12/2014)=======================================

		$this->_data['all_users']=$this->m_order->getAllUser();

		//=======================================BỔ SUNG===================================================
		$this->_data['info']=$this->m_order->listOrder($page,$per_page);

		$this->_data['per_page']=$per_page;

		$this->_data['title_area']="Order management";

		$this->_data['view']='order/list';

		$this->_data['styles']=array('public/scripts/jquery-ui/jquery-ui.css');

		$this->load->view($this->_data['template'], $this->_data);

	}

	public function index_vn(){

		$per_page=20;

		$page=$this->uri->segment(4);

		if(empty($page) || !is_numeric($page)){

			$page=1;

		}

		$this->_data['trackingcode']=$this->m_order->getTrackingCodePrefix();

		$this->_data['order_status_data']=$this->m_order->getVnOrderStatus();

		$this->_data['countries_data']=$this->m_order->getAllCountry();

		$this->_data['total_rows']=$this->m_order->getNumOrders();

		$this->_data['info']=$this->m_order->listOrder($page,$per_page);

		$this->_data['per_page']=$per_page;

		$this->_data['title_area']="Order management";

		$this->_data['view']='order/list_vn';

		$this->_data['styles']=array('public/scripts/jquery-ui/jquery-ui.css');

		$this->load->view($this->_data['template'], $this->_data);

	}

	public function search_vn(){

		$per_page=20;

		$page=$this->uri->segment(4);

		if(empty($page) || !is_numeric($page)){

			$page=1;

		}

		$this->load->helper('cookie');

		$this->_data['trackingcode']=$this->m_order->getTrackingCodePrefix();

		$tracking_code_prefix=$this->_data['trackingcode']['tracking_code_prefix'];

		$this->_data['order_status_data']=$this->m_order->getVnOrderStatus();

		$this->_data['countries_data']=$this->m_order->getAllCountry();

		if($this->input->post('search')!=""){

            $customer_phone=$this->input->post('customer_phone',true);

            $consignee_phone=$this->input->post('consignee_phone',true);

            $tracking=$this->input->post('tracking',true);

            if(strlen($tracking)>strlen($tracking_code_prefix)){

				$order_id=substr($tracking,strlen($tracking_code_prefix));

			}else{

				$order_id=$tracking;

			}

            $this->input->set_cookie('order_search',serialize(array('customer_phone'=>$customer_phone,'consignee_phone'=>$consignee_phone,'tracking'=>$tracking)), time()+3600*2);

        }else{

            $order_search=$this->input->cookie('order_search');

            if(!empty($order_search)){

                $order_search=unserialize($order_search);

                $customer_phone=$order_search['customer_phone'];

                $consignee_phone=$order_search['consignee_phone'];

                $tracking=$order_search['tracking'];

                if(strlen($tracking)>strlen($tracking_code_prefix)){

					$order_id=substr($tracking,strlen($tracking_code_prefix));

				}else{

					$order_id=$tracking;

				}

            }else{

                $customer_phone="";

                $consignee_phone="";

                $tracking="";

                $order_id="";

            }

        }

        $this->_data['customer_phone']=$customer_phone;

        $this->_data['consignee_phone']=$consignee_phone;

        $this->_data['tracking']=$tracking;

        $this->_data['info']=$this->m_order->search($order_id,$customer_phone,$consignee_phone,$page,$per_page);

        $this->_data['total_rows']=$this->m_order->search_count($order_id,$customer_phone,$consignee_phone);

        $this->_data['per_page']=$per_page;

		$this->_data['title_area']="Order management";

		$this->_data['view']='order/search_vn';

		$this->_data['styles']=array('public/scripts/jquery-ui/jquery-ui.css');

		$this->load->view($this->_data['template'], $this->_data);

	}

	public function findConsigneeByOrder_vn(){

		$order_id=$this->input->post('order_id');

		if(!empty($order_id)){

			$country=$this->m_order->getConsigneeCountryByOrderId($order_id);

			$data=$this->m_order->getConsigneeByOrderId($order_id,$country);

			echo json_encode($data);

		}

	}

	public function search(){

		$per_page=20;

		$page=$this->uri->segment(4);

		if(empty($page) || !is_numeric($page)){

			$page=1;

		}

		$this->load->helper('cookie');

		$this->_data['trackingcode']=$this->m_order->getTrackingCodePrefix();

		$tracking_code_prefix=$this->_data['trackingcode']['tracking_code_prefix'];

		$this->_data['order_status_data']=$this->m_order->getOrderStatus();

		$this->_data['countries_data']=$this->m_order->getAllCountry();

		if($this->input->post('search')!=""){

            $customer_phone=$this->input->post('customer_phone',true);

            $consignee_phone=$this->input->post('consignee_phone',true);

            $tracking=$this->input->post('tracking',true);

            if(strlen($tracking)>strlen($tracking_code_prefix)){

				$order_id=substr($tracking,strlen($tracking_code_prefix));

			}else{

				$order_id=$tracking;

			}

            $this->input->set_cookie('order_search',serialize(array('customer_phone'=>$customer_phone,'consignee_phone'=>$consignee_phone,'tracking'=>$tracking)), time()+3600*2);

        }else{

            $order_search=$this->input->cookie('order_search');

            if(!empty($order_search)){

                $order_search=unserialize($order_search);

                $customer_phone=$order_search['customer_phone'];

                $consignee_phone=$order_search['consignee_phone'];

                $tracking=$order_search['tracking'];

                if(strlen($tracking)>strlen($tracking_code_prefix)){

					$order_id=substr($tracking,strlen($tracking_code_prefix));

				}else{

					$order_id=$tracking;

				}

            }else{

                $customer_phone="";

                $consignee_phone="";

                $tracking="";

                $order_id="";

            }

        }

        $this->_data['customer_phone']=$customer_phone;

        $this->_data['consignee_phone']=$consignee_phone;

        $this->_data['tracking']=$tracking;

        $this->_data['info']=$this->m_order->search($order_id,$customer_phone,$consignee_phone,$page,$per_page);

        $this->_data['total_rows']=$this->m_order->search_count($order_id,$customer_phone,$consignee_phone);

        $this->_data['per_page']=$per_page;

		$this->_data['title_area']="Order management";

		$this->_data['view']='order/search';

		$this->_data['styles']=array('public/scripts/jquery-ui/jquery-ui.css');

		$this->load->view($this->_data['template'], $this->_data);

	}

	public function edit(){

		$order_id=$this->input->get('order_id',true);

		$data=array();

		$error="";

		$success="";

		$this->_data['countries_data']=array();

		$this->_data['cities_data']=array();

		$this->_data['states_data']=array();

		$this->_data['type_payment_data']=array();

		$this->_data['type_shipment_data']=array();

		$this->_data['type_delivery_data']=array();

		$this->_data['order_detail_list']=array();

		$this->_data['unit_data']=array();

		$data['type_payment_id']="";

		$data['type_ship_id']="";

		$data['type_delivery_id']="";

		$data['unit_id']="";

		$data['customer_state']="";

		$data['consignee_state']="";

		$data['customer_country']="us";

		$data['consignee_country']="vn";

		$data['customer_city']="";

		$data['consignee_city']="";

		if($this->input->post('save')!=""){

				$data['customer_name']=$this->input->post('customer_name',true);

				$data['customer_phone']=$this->input->post('customer_phone',true);

				$data['customer_address']=$this->input->post('customer_address',true);

				$data['customer_address2']=$this->input->post('customer_address2',true);

				$data['customer_zipcode']=$this->input->post('customer_zipcode',true);

				$data['customer_country']=$this->input->post('customer_country',true);

				$data['customer_state']=$this->input->post('customer_state',true);

				$data['customer_city']=$this->input->post('customer_city',true);

				$data['customer_email']=$this->input->post('customer_email',true);



				$data['consignee_name']=$this->input->post('consignee_name',true);

				$data['consignee_phone']=$this->input->post('consignee_phone',true);

				$data['consignee_address']=$this->input->post('consignee_address',true);

				$data['consignee_address2']=$this->input->post('consignee_address2',true);

				$data['consignee_zipcode']=$this->input->post('consignee_zipcode',true);

				$data['consignee_country']=$this->input->post('consignee_country',true);

				$data['consignee_state']=$this->input->post('consignee_state',true);

				$data['consignee_city']=$this->input->post('consignee_city',true);

				$data['consignee_email']=$this->input->post('consignee_email',true);

				

				$data['order_shipment_rate']=$this->input->post('order_shipment_rate',true);

				$data['order_declared_value']=$this->input->post('order_declared_value',true);

				$data['order_box']=$this->input->post('order_box',true);

				$data['order_ibs']=$this->input->post('order_ibs',true);

				//$data['order_end_date']=$this->input->post('order_end_date',true);

				$data['order_insurance_fee']=$this->input->post('order_insurance_fee',true);

				$data['order_packing_fee']=$this->input->post('order_packing_fee',true);

				$data['order_ship_charge']=$this->input->post('order_ship_charge',true);

				$data['other_charge']=$this->input->post('other_charge',true);

				$data['type_payment_id']=$this->input->post('type_payment_id',true);

				$data['type_ship_id']=$this->input->post('type_ship_id',true);

				$data['type_delivery_id']=$this->input->post('type_delivery_id',true);

				//$data['unit_id']=$this->input->post('unit_id',true);

				$data['order_sum_price']=$this->input->post('order_sum_price',true);

				$data['customer_type']=$this->input->post('customer_type',true);

				if($data['customer_type']==1){

					$data['customer_remark']=$this->input->post('customer_remark',true);

					$data['customer_passcode']=$this->input->post('customer_passcode',true);

				}

				$data['order_message']=$this->input->post('order_message',true);

				$order_id=$this->input->post('order_id',true);

				$customer_id=$this->input->post('customer_id',true);

				$consignee_id=$this->input->post('consignee_id',true);



				$this->load->library('form_validation');

				$this->form_validation->set_rules('customer_name','customer name','required');

				$this->form_validation->set_rules('customer_phone','customer phone','required|numeric');

				$this->form_validation->set_rules('customer_address','customer address','required');

				$this->form_validation->set_rules('customer_zipcode','customer zipcode','numeric');

				$this->form_validation->set_rules('customer_country','customer country','required');

				$this->form_validation->set_rules('customer_state','customer state','required');

				$this->form_validation->set_rules('customer_email','customer email','valid_email');



				$this->form_validation->set_rules('consignee_name','consignee name','required');

				$this->form_validation->set_rules('consignee_phone','consignee phone','required|numeric');

				$this->form_validation->set_rules('consignee_address','consignee address','required');

				$this->form_validation->set_rules('consignee_zipcode','consignee zipcode','numeric');

				$this->form_validation->set_rules('consignee_country','consignee country','required');

				$this->form_validation->set_rules('consignee_state','consignee country','required');

				$this->form_validation->set_rules('consignee_email','consignee email','valid_email');



				$this->form_validation->set_rules('order_shipment_rate','shipment rate','numeric');

				$this->form_validation->set_rules('order_box','box','required|numeric');

				$this->form_validation->set_rules('order_ibs','ibs','required|numeric');

				//$this->form_validation->set_rules('order_end_date','end date','required');

				//$this->form_validation->set_rules('order_insurance_fee','insurance fee','required|numeric');

				//$this->form_validation->set_rules('order_packing_fee','packing fee','required|numeric');

				$this->form_validation->set_rules('order_ship_charge','ship charge','required|numeric');

				//$this->form_validation->set_rules('other_charge','order charge','required|numeric');

				$this->form_validation->set_rules('type_payment_id','payment method','required');

				$this->form_validation->set_rules('type_ship_id','shipment method','required');

				$this->form_validation->set_rules('type_delivery_id','delivery method','required');

				//$this->form_validation->set_rules('unit_id','unit','required');

				$this->form_validation->set_rules('order_sum_price','sum price','required|numeric');

				$this->form_validation->set_rules('customer_type','customer type','required');

				if($data['customer_type']==1){

					$this->form_validation->set_rules('customer_remark','customer remark','required');

					$this->form_validation->set_rules('customer_passcode','customer passcode','required');

				}

				if($this->form_validation->run()){

					if(!empty($order_id)){

						$this->load->helper('date');

						$customer_data['customer_name']=$data['customer_name'];

						$customer_data['customer_phone']=$data['customer_phone'];

						$customer_data['customer_address']=$data['customer_address'];

						$customer_data['customer_address2']=$data['customer_address2'];

						$customer_data['customer_zipcode']=$data['customer_zipcode'];

						$customer_data['customer_country']=$data['customer_country'];

						$customer_data['customer_state']=$data['customer_state'];

						$customer_data['customer_city']=$data['customer_city'];

						$customer_data['customer_email']=$data['customer_email'];

						$customer_data['customer_type']=$data['customer_type'];

						$customer_data['customer_date']=local_to_gmt(now());

						if($data['customer_type']==1){

							$customer_data['customer_remark']=$data['customer_remark'];

							$customer_data['customer_passcode']=$data['customer_passcode'];

						}



						$consignee_data['consignee_name']=$data['consignee_name'];

						$consignee_data['consignee_phone']=$data['consignee_phone'];

						$consignee_data['consignee_address']=$data['consignee_address'];

						$consignee_data['consignee_address2']=$data['consignee_address2'];

						$consignee_data['consignee_zipcode']=$data['consignee_zipcode'];

						$consignee_data['consignee_country']=$data['consignee_country'];

						$consignee_data['consignee_city']=$data['consignee_city'];

						$consignee_data['consignee_state']=$data['consignee_state'];

						$consignee_data['consignee_email']=$data['consignee_email'];

						$consignee_data['consignee_date']=local_to_gmt(now());

						$this->m_order->updateCustomer($customer_id,$customer_data);

						$this->m_order->updateConsignee($consignee_id,$consignee_data);



						$order_data['customer_id']=$customer_id;

						$order_data['consignee_id']=$consignee_id;

						$order_data['type_ship_id']=$data['type_ship_id'];

						$order_data['type_delivery_id']=$data['type_delivery_id'];

						$order_data['order_box']=$data['order_box'];

						$order_data['order_ibs']=$data['order_ibs'];

						$order_data['order_insurance_fee']=$data['order_insurance_fee'];

						$order_data['order_packing_fee']=$data['order_packing_fee'];

						$order_data['order_ship_charge']=$data['order_ship_charge'];

						$order_data['order_other_charge']=$data['other_charge'];

						$order_data['type_payment_id']=$data['type_payment_id'];

						$order_data['user_id']=$this->session->userdata('user_id');

						$order_data['unit_id']=1;//$data['unit_id'];

						$order_data['order_sum_price']=$data['order_insurance_fee']+$data['order_packing_fee']+$data['order_ship_charge']+$data['other_charge'];

						$order_data['order_message']=$data['order_message'];

						$order_data['order_creation_date']=local_to_gmt(now());

						$order_data['order_sha1']=sha1($order_id);

						$order_data['order_shipment_rate']=$data['order_shipment_rate'];

						$order_data['order_declared_value']=$data['order_declared_value'];

						if(!empty($order_id)){

							$this->m_order->updateDataOrder($order_data,$order_id);

							if($data['customer_type']==1){

								$this->session->set_flashdata('customer_id',$customer_id);

							}

							$this->session->set_flashdata('order_id',$order_id);

							$this->session->set_flashdata('success',$order_id);

							redirect(base_url().'admin/order/edit?order_id='.$order_id);

						}

					}else{

						$error="Your order id is empty";

						$this->_data['info']=$data;

					}

				}else{

					$this->_data['info']=$data;

				}

		}else{

			$data=$this->m_order->getInfoOrderToEdit($order_id);

			if(!empty($data['order_other_charge'])){

				$data['other_charge']=$data['order_other_charge'];

			}

			if(!empty($data['customer_id'])){

				$customer_id=$data['customer_id'];

			}

			if(!empty($data['consignee_id'])){

				$consignee_id=$data['consignee_id'];

			}

		}

		$this->_data['error']=$error;

		$this->_data['info']=$data;

		//$this->_data['unit_data']=$this->m_order->getUnitData();

		$this->_data['order_id']=$order_id;

		if(!empty($customer_id)){

			$this->_data['customer_id']=$customer_id;

		}

		if(!empty($consignee_id)){

			$this->_data['consignee_id']=$consignee_id;

		}

		$this->_data['type_payment_data']=$this->m_order->getPaymentData();

		$this->_data['type_shipment_data']=$this->m_order->getShipMethod();

		$this->_data['countries_data']=$this->m_order->getAllCountry();

		if(empty($data['type_ship_id'])){

			$data['type_ship_id']=$this->_data['type_shipment_data'][0]['type_ship_id'];

		}

		$this->_data['type_delivery_data']=$this->m_order->getDelivery($data['type_ship_id']);

		if(empty($data['customer_country'])){

			$data['customer_country']=$this->_data['countries_data'][0]['country_code'];

		}

		$this->_data['customer_states_data']=$this->m_order->getStates($data['customer_country']);



		if(empty($data['customer_state'])){

			$data['customer_state']=$this->_data['customer_states_data'][0]["state_code"];

		}

		$this->_data['customer_cities_data']=$this->m_order->getCities($data['customer_country'],$data['customer_state']);


		if(empty($data['consignee_country'])){

			$data['consignee_country']=$this->_data['countries_data'][0]['country_code'];

		}

		$this->_data['consignee_states_data']=$this->m_order->getStates($data['consignee_country']);

		if(empty($data['consignee_state'])){

			$data['consignee_state']=$this->_data['consignee_states_data'][0]["state_code"];

		}

		$this->_data['order_detail_list']=$this->m_order->getOrderDetailByOrderId($order_id);

		$this->_data['consignee_cities_data']=$this->m_order->getCities($data['consignee_country'],$data['consignee_state']);

		$this->_data['title_area']="Order management";

		$this->_data['scripts']=array('public/scripts/jquery_validation/jquery.validate.min.js');

		$this->_data['styles']=array('public/scripts/jquery-ui/jquery-ui.css');

		$this->_data['view']='order/edit';

		if($this->_data['info']['user_id']!=$this->session->userdata('user_id')){
			redirect(base_url().'admin/order/index');
			exit();
		}
		$this->load->view($this->_data['template'], $this->_data);

	}

	public function add(){

		$data=array();

		$error="";

		$success="";

		$this->_data['countries_data']=array();

		$this->_data['cities_data']=array();

		$this->_data['states_data']=array();

		$this->_data['type_payment_data']=array();

		$this->_data['type_shipment_data']=array();

		$this->_data['type_delivery_data']=array();

		$this->_data['order_detail_list']=array();

		$this->_data['unit_data']=array();

		$data['type_payment_id']="";

		$data['type_ship_id']="";

		$data['type_delivery_id']="";

		$data['unit_id']="";

		$data['customer_state']="";

		$data['consignee_state']="";

		$data['customer_country']="us";

		$data['consignee_country']="vn";

		$data['customer_city']="";

		$data['consignee_city']="";

		if($this->session->userdata('trackingcode')){

			$tracking_code=$this->session->userdata('trackingcode');

			$tracking_code_prefix=$this->m_order->getTrackingCodePrefix();

			$order_id=substr($tracking_code,strlen($tracking_code_prefix['tracking_code_prefix']));

			$this->_data['order_detail_list']=$this->m_order->getOrderDetailByOrderId($order_id);

		}

			if($this->input->post('save')!=""){

				$data['customer_name']=$this->input->post('customer_name',true);

				$data['customer_phone']=$this->input->post('customer_phone',true);

				$data['customer_address']=$this->input->post('customer_address',true);

				$data['customer_address2']=$this->input->post('customer_address2',true);

				$data['customer_zipcode']=$this->input->post('customer_zipcode',true);

				$data['customer_country']=$this->input->post('customer_country',true);

				$data['customer_state']=$this->input->post('customer_state',true);

				$data['customer_city']=$this->input->post('customer_city',true);

				$data['customer_email']=$this->input->post('customer_email',true);



				$data['consignee_name']=$this->input->post('consignee_name',true);

				$data['consignee_phone']=$this->input->post('consignee_phone',true);

				$data['consignee_address']=$this->input->post('consignee_address',true);

				$data['consignee_address2']=$this->input->post('consignee_address2',true);

				$data['consignee_zipcode']=$this->input->post('consignee_zipcode',true);

				$data['consignee_country']=$this->input->post('consignee_country',true);

				$data['consignee_state']=$this->input->post('consignee_state',true);

				$data['consignee_city']=$this->input->post('consignee_city',true);

				$data['consignee_email']=$this->input->post('consignee_email',true);

				

				$data['order_shipment_rate']=$this->input->post('order_shipment_rate',true);

				$data['order_declared_value']=$this->input->post('order_declared_value',true);

				$data['order_box']=$this->input->post('order_box',true);

				$data['order_ibs']=$this->input->post('order_ibs',true);

				$data['order_insurance_fee']=$this->input->post('order_insurance_fee',true);

				$data['order_packing_fee']=$this->input->post('order_packing_fee',true);

				$data['order_ship_charge']=$this->input->post('order_ship_charge',true);

				$data['other_charge']=$this->input->post('other_charge',true);

				$data['type_payment_id']=$this->input->post('type_payment_id',true);

				$data['type_ship_id']=$this->input->post('type_ship_id',true);

				$data['type_delivery_id']=$this->input->post('type_delivery_id',true);

				$data['unit_id']=$this->input->post('unit_id',true);

				$data['order_sum_price']=$this->input->post('order_sum_price',true);

				$data['customer_type']=$this->input->post('customer_type',true);

				if($data['customer_type']==1){

					$data['customer_remark']=$this->input->post('customer_remark',true);

					$data['customer_passcode']=$this->input->post('customer_passcode',true);

				}

				$data['order_message']=$this->input->post('order_message',true);

				$timezone=$this->input->post('timezone',true);



				$this->load->library('form_validation');

				$this->form_validation->set_rules('customer_name','customer name','required');

				$this->form_validation->set_rules('customer_phone','customer phone','required|numeric');

				$this->form_validation->set_rules('customer_address','customer address','required');

				$this->form_validation->set_rules('customer_zipcode','customer zipcode','numeric');

				$this->form_validation->set_rules('customer_country','customer country','required');

				$this->form_validation->set_rules('customer_state','customer state','required');

				$this->form_validation->set_rules('customer_email','customer email','valid_email');



				$this->form_validation->set_rules('consignee_name','consignee name','required');

				$this->form_validation->set_rules('consignee_phone','consignee phone','required|numeric');

				$this->form_validation->set_rules('consignee_address','consignee address','required');

				$this->form_validation->set_rules('consignee_zipcode','consignee zipcode','numeric');

				$this->form_validation->set_rules('consignee_country','consignee country','required');

				$this->form_validation->set_rules('consignee_state','consignee country','required');

				$this->form_validation->set_rules('consignee_email','consignee email','valid_email');



				$this->form_validation->set_rules('order_shipment_rate','shipment rate','numeric');

				$this->form_validation->set_rules('order_box','box','required|numeric');

				$this->form_validation->set_rules('order_ibs','ibs','required|numeric');

				//$this->form_validation->set_rules('order_end_date','end date','required');

				//$this->form_validation->set_rules('order_insurance_fee','insurance fee','required|numeric');

				//$this->form_validation->set_rules('order_packing_fee','packing fee','required|numeric');

				$this->form_validation->set_rules('order_ship_charge','ship charge','required|numeric');

				//$this->form_validation->set_rules('other_charge','order charge','required|numeric');

				$this->form_validation->set_rules('type_payment_id','payment method','required');

				$this->form_validation->set_rules('type_ship_id','shipment method','required');

				$this->form_validation->set_rules('type_delivery_id','delivery method','required');

				//$this->form_validation->set_rules('unit_id','unit','required');

				$this->form_validation->set_rules('order_sum_price','sum price','required|numeric');

				$this->form_validation->set_rules('customer_type','customer type','required');

				if($data['customer_type']==1){

					$this->form_validation->set_rules('customer_remark','customer remark','required');

					$this->form_validation->set_rules('customer_passcode','customer passcode','required');

				}

				if($this->form_validation->run()){

					if(!empty($order_id)){

						$this->load->helper('date');

						$customer_data['customer_name']=$data['customer_name'];

						$customer_data['customer_phone']=$data['customer_phone'];

						$customer_data['customer_address']=$data['customer_address'];

						$customer_data['customer_address2']=$data['customer_address2'];

						$customer_data['customer_zipcode']=$data['customer_zipcode'];

						$customer_data['customer_country']=$data['customer_country'];

						$customer_data['customer_state']=$data['customer_state'];

						$customer_data['customer_city']=$data['customer_city'];

						$customer_data['customer_email']=$data['customer_email'];

						$customer_data['customer_type']=$data['customer_type'];

						$customer_data['customer_date']=local_to_gmt(now());

						if($data['customer_type']==1){

							$customer_data['customer_remark']=$data['customer_remark'];

							$customer_data['customer_passcode']=$data['customer_passcode'];

						}



						$consignee_data['consignee_name']=$data['consignee_name'];

						$consignee_data['consignee_phone']=$data['consignee_phone'];

						$consignee_data['consignee_address']=$data['consignee_address'];

						$consignee_data['consignee_address2']=$data['consignee_address2'];

						$consignee_data['consignee_zipcode']=$data['consignee_zipcode'];

						$consignee_data['consignee_country']=$data['consignee_country'];

						$consignee_data['consignee_city']=$data['consignee_city'];

						$consignee_data['consignee_state']=$data['consignee_state'];

						$consignee_data['consignee_email']=$data['consignee_email'];

						$consignee_data['consignee_date']=local_to_gmt(now());



						$customer_id=$this->m_order->insertCustomer($customer_data);

						$consignee_id=$this->m_order->insertConsignee($consignee_data);

						$order_data['customer_id']=$customer_id;

						$order_data['consignee_id']=$consignee_id;

						$order_data['type_ship_id']=$data['type_ship_id'];

						$order_data['type_delivery_id']=$data['type_delivery_id'];

						$order_data['order_box']=$data['order_box'];

						$order_data['order_ibs']=$data['order_ibs'];

						$order_data['order_insurance_fee']=$data['order_insurance_fee'];

						$order_data['order_packing_fee']=$data['order_packing_fee'];

						$order_data['order_ship_charge']=$data['order_ship_charge'];

						$order_data['order_other_charge']=$data['other_charge'];

						$order_data['type_payment_id']=$data['type_payment_id'];

						$order_data['user_id']=$this->session->userdata('user_id');

						$order_data['unit_id']=1;//$data['unit_id'];

						$order_data['order_sum_price']=$data['order_insurance_fee']+$data['order_packing_fee']+$data['order_ship_charge']+$data['other_charge'];

						$order_data['order_message']=$data['order_message'];

						$order_data['order_creation_date']=local_to_gmt(now());

						$order_data['order_sha1']=sha1($order_id);

						$order_data['order_shipment_rate']=$data['order_shipment_rate'];

						$order_data['order_declared_value']=$data['order_declared_value'];

						//$end_date=$data['order_end_date'].date(' h:i:s',$order_data['order_creation_date']+($timezone*3600));

						//$end_date=strtotime($end_date)-($timezone*3600);

						//$order_data['order_end_date']=$end_date;

						if(!empty($order_id)){

							$this->m_order->updateDataOrder($order_data,$order_id);

							if($data['customer_type']==1){

								$this->session->set_flashdata('customer_id',$customer_id);

							}

							$this->session->set_flashdata('order_id',$order_id);

							$this->session->set_flashdata('success',$this->session->userdata('trackingcode'));

							$this->session->unset_userdata(array('trackingcode'=>""));

							redirect(base_url().'admin/order/add');

						}

					}else{

						$error="Please get tracking code";

						$this->_data['info']=$data;

					}

				}else{

					$this->_data['info']=$data;

				}

			}

		$this->_data['error']=$error;

		$this->_data['info']=$data;

		//$this->_data['unit_data']=$this->m_order->getUnitData();

		$this->_data['type_payment_data']=$this->m_order->getPaymentData();

		$this->_data['type_shipment_data']=$this->m_order->getShipMethod();

		$this->_data['countries_data']=$this->m_order->getAllCountry();

		if($data['type_ship_id']==""){

			$data['type_ship_id']=$this->_data['type_shipment_data'][0]['type_ship_id'];

		}

		$this->_data['type_delivery_data']=$this->m_order->getDelivery($data['type_ship_id']);

		if($data['customer_country']==""){

			$data['customer_country']=$this->_data['countries_data'][0]['country_code'];

		}

		$this->_data['customer_states_data']=$this->m_order->getStates($data['customer_country']);



		if($data['customer_state']==""){

			$data['customer_state']=$this->_data['customer_states_data'][0]["state_code"];

		}

		$this->_data['customer_cities_data']=$this->m_order->getCities($data['customer_country'],$data['customer_state']);





		if($data['consignee_country']==""){

			$data['consignee_country']=$this->_data['countries_data'][0]['country_code'];

		}

		$this->_data['consignee_states_data']=$this->m_order->getStates($data['consignee_country']);

		if($data['consignee_state']==""){

			$data['consignee_state']=$this->_data['consignee_states_data'][0]["state_code"];

		}

		$this->_data['consignee_cities_data']=$this->m_order->getCities($data['consignee_country'],$data['consignee_state']);

		$this->_data['title_area']="Order management";

		$this->_data['scripts']=array('public/scripts/jquery_validation/jquery.validate.min.js');

		$this->_data['styles']=array('public/scripts/jquery-ui/jquery-ui.css');

		$this->_data['view']='order/add';

		$this->load->view($this->_data['template'], $this->_data);

	}

	public function quickadd(){

		$data_insert=array();

		$sender=$this->input->get('sender');

    	$consignee=$this->input->get('consignee');

    	if(!empty($sender)){

    		$data_insert['customer_id']=$sender;

    	}

    	if(!empty($consignee)){

    		$data_insert['consignee_id']=$consignee;

    	}

    	$customer_data['customer_name']="";

    	$customer_id=$this->m_order->insertCustomer($customer_data);



    	$consignee_data['consignee_name']="";

		$consignee_id=$this->m_order->insertConsignee($consignee_data);

		

		$data_insert['customer_id']=$customer_id;

		$data_insert['consignee_id']=$consignee_id;

    	$data_insert['user_id']=$this->session->userdata('user_id');

		$order_id=$this->m_order->getTrackingCode($data_insert);

  		redirect(base_url().'admin/order/index');

	}

	public function addonly(){

		$data=array();

		$error="";

		$success="";

		$customer_id=$this->input->get('sender',true);

		$consignee_id=$this->input->get('consignee',true);

		$this->_data['countries_data']=array();

		$this->_data['cities_data']=array();

		$this->_data['states_data']=array();

		$this->_data['type_payment_data']=array();

		$this->_data['type_shipment_data']=array();

		$this->_data['type_delivery_data']=array();

		$this->_data['order_detail_list']=array();

		$this->_data['unit_data']=array();

		$data['type_payment_id']="";

		$data['type_ship_id']="";

		$data['type_delivery_id']="";

		$data['unit_id']="";

		if($this->session->userdata('trackingcode')){

			$tracking_code=$this->session->userdata('trackingcode');

			$tracking_code_prefix=$this->m_order->getTrackingCodePrefix();

			$order_id=substr($tracking_code,strlen($tracking_code_prefix['tracking_code_prefix']));

			$this->_data['order_detail_list']=$this->m_order->getOrderDetailByOrderId($order_id);

		}

			if($this->input->post('save')!=""){

				$data['order_shipment_rate']=$this->input->post('order_shipment_rate',true);

				$data['order_declared_value']=$this->input->post('order_declared_value',true);

				$data['order_box']=$this->input->post('order_box',true);

				$data['order_ibs']=$this->input->post('order_ibs',true);

				//$data['order_end_date']=$this->input->post('order_end_date',true);

				$data['order_insurance_fee']=$this->input->post('order_insurance_fee',true);

				$data['order_packing_fee']=$this->input->post('order_packing_fee',true);

				$data['order_ship_charge']=$this->input->post('order_ship_charge',true);

				$data['other_charge']=$this->input->post('other_charge',true);

				$data['type_payment_id']=$this->input->post('type_payment_id',true);

				$data['type_ship_id']=$this->input->post('type_ship_id',true);

				$data['type_delivery_id']=$this->input->post('type_delivery_id',true);

				//$data['unit_id']=$this->input->post('unit_id',true);

				$data['order_sum_price']=$this->input->post('order_sum_price',true);

				$data['order_message']=$this->input->post('order_message',true);

				$customer_id=$this->input->post('customer_id',true);

				$consignee_id=$this->input->post('consignee_id',true);

				$timezone=$this->input->post('timezone',true);



				$this->load->library('form_validation');

				$this->form_validation->set_rules('order_box','box','required|numeric');

				$this->form_validation->set_rules('order_ibs','ibs','required|numeric');

				//$this->form_validation->set_rules('order_end_date','end date','required');

				//$this->form_validation->set_rules('order_insurance_fee','insurance fee','required|numeric');

				//$this->form_validation->set_rules('order_packing_fee','packing fee','required|numeric');

				$this->form_validation->set_rules('order_ship_charge','ship charge','required|numeric');

				//$this->form_validation->set_rules('other_charge','order charge','required|numeric');

				$this->form_validation->set_rules('type_payment_id','payment method','required');

				$this->form_validation->set_rules('type_ship_id','shipment method','required');

				$this->form_validation->set_rules('type_delivery_id','delivery method','required');

				//$this->form_validation->set_rules('unit_id','unit','required');

				$this->form_validation->set_rules('order_sum_price','sum price','required|numeric');

				$this->form_validation->set_rules('customer_id','customer','required');

				$this->form_validation->set_rules('consignee_id','consignee','required');

				if($this->form_validation->run()){

					if(!empty($order_id)){

						$this->load->helper('date');

						$order_data['customer_id']=$customer_id;

						$order_data['consignee_id']=$consignee_id;

						$order_data['type_ship_id']=$data['type_ship_id'];

						$order_data['type_delivery_id']=$data['type_delivery_id'];

						$order_data['order_box']=$data['order_box'];

						$order_data['order_ibs']=$data['order_ibs'];

						$order_data['order_insurance_fee']=$data['order_insurance_fee'];

						$order_data['order_packing_fee']=$data['order_packing_fee'];

						$order_data['order_ship_charge']=$data['order_ship_charge'];

						$order_data['order_other_charge']=$data['other_charge'];

						$order_data['type_payment_id']=$data['type_payment_id'];

						$order_data['user_id']=$this->session->userdata('user_id');

						$order_data['unit_id']=1;//$data['unit_id'];

						$order_data['order_sum_price']=$data['order_insurance_fee']+$data['order_packing_fee']+$data['order_ship_charge']+$data['other_charge'];

						$order_data['order_message']=$data['order_message'];

						$order_data['order_creation_date']=local_to_gmt(now());

						$order_data['order_sha1']=sha1($order_id);

						$order_data['order_shipment_rate']=$data['order_shipment_rate'];

						$order_data['order_declared_value']=$data['order_declared_value'];

						//$end_date=$data['order_end_date'].date(' h:i:s',$order_data['order_creation_date']+($timezone*3600));

						//$end_date=strtotime($end_date)-($timezone*3600);

						//$order_data['order_end_date']=$end_date;

						if(!empty($customer_id) && !empty($consignee_id)){

							$this->m_order->updateDataOrder($order_data,$order_id);

							$this->session->set_flashdata('order_id',$order_id);

							$this->session->set_flashdata('success',$this->session->userdata('trackingcode'));

							$this->session->unset_userdata(array('trackingcode'=>""));

							redirect(base_url().'admin/order/addonly?sender='.$customer_id.'&consignee='.$consignee_id);

						}

					}else{

						$error="Please get tracking code";

						$this->_data['info']=$data;

					}

				}else{

					$this->_data['info']=$data;

				}

			}

		$this->_data['error']=$error;

		$this->_data['info']=$data;

		//$this->_data['unit_data']=$this->m_order->getUnitData();

		$this->_data['type_payment_data']=$this->m_order->getPaymentData();

		$this->_data['type_shipment_data']=$this->m_order->getShipMethod();

		$this->_data['countries_data']=$this->m_order->getAllCountry();

		if($data['type_ship_id']==""){

			$data['type_ship_id']=$this->_data['type_shipment_data'][0]['type_ship_id'];

		}

		if(!empty($customer_id)){

			$this->_data['customer_id']=$customer_id;

		}

		if(!empty($consignee_id)){

			$this->_data['consignee_id']=$consignee_id;

		}

		$this->_data['type_delivery_data']=$this->m_order->getDelivery($data['type_ship_id']);

		$this->_data['title_area']="Order management";

		$this->_data['scripts']=array('public/scripts/jquery_validation/jquery.validate.min.js');

		$this->_data['styles']=array('public/scripts/jquery-ui/jquery-ui.css');

		$this->_data['view']='order/add_only_order';

		$this->load->view($this->_data['template'], $this->_data);

	}

	public function addbysender(){

		$customer_id=$this->input->get('sender',true);

		$data=array();

		$error="";

		$success="";

		$this->_data['countries_data']=array();

		$this->_data['cities_data']=array();

		$this->_data['states_data']=array();

		$this->_data['type_payment_data']=array();

		$this->_data['type_shipment_data']=array();

		$this->_data['type_delivery_data']=array();

		$this->_data['order_detail_list']=array();

		$this->_data['unit_data']=array();

		$data['type_payment_id']="";

		$data['type_ship_id']="";

		$data['type_delivery_id']="";

		$data['unit_id']="";

		$data['consignee_state']="";

		$data['consignee_country']="vn";

		$data['consignee_city']="";

		if($this->session->userdata('trackingcode')){

			$tracking_code=$this->session->userdata('trackingcode');

			$tracking_code_prefix=$this->m_order->getTrackingCodePrefix();

			$order_id=substr($tracking_code,strlen($tracking_code_prefix['tracking_code_prefix']));

			$this->_data['order_detail_list']=$this->m_order->getOrderDetailByOrderId($order_id);

		}

		if($this->input->post('save')!=""){

			$data['consignee_name']=$this->input->post('consignee_name',true);

			$data['consignee_phone']=$this->input->post('consignee_phone',true);

			$data['consignee_address']=$this->input->post('consignee_address',true);

			$data['consignee_address2']=$this->input->post('consignee_address2',true);

			$data['consignee_zipcode']=$this->input->post('consignee_zipcode',true);

			$data['consignee_country']=$this->input->post('consignee_country',true);

			$data['consignee_state']=$this->input->post('consignee_state',true);

			$data['consignee_city']=$this->input->post('consignee_city',true);

			$data['consignee_email']=$this->input->post('consignee_email',true);

			

			$data['order_shipment_rate']=$this->input->post('order_shipment_rate',true);

			$data['order_declared_value']=$this->input->post('order_declared_value',true);

			$data['order_box']=$this->input->post('order_box',true);

			$data['order_ibs']=$this->input->post('order_ibs',true);

			//$data['order_end_date']=$this->input->post('order_end_date',true);

			$data['order_insurance_fee']=$this->input->post('order_insurance_fee',true);

			$data['order_packing_fee']=$this->input->post('order_packing_fee',true);

			$data['order_ship_charge']=$this->input->post('order_ship_charge',true);

			$data['other_charge']=$this->input->post('other_charge',true);

			$data['type_payment_id']=$this->input->post('type_payment_id',true);

			$data['type_ship_id']=$this->input->post('type_ship_id',true);

			$data['type_delivery_id']=$this->input->post('type_delivery_id',true);

			//$data['unit_id']=$this->input->post('unit_id',true);

			$data['order_sum_price']=$this->input->post('order_sum_price',true);

			$data['order_message']=$this->input->post('order_message',true);

			$timezone=$this->input->post('timezone',true);

			$customer_id=$this->input->post('customer_id',true);



			$this->load->library('form_validation');

			$this->form_validation->set_rules('consignee_name','consignee name','required');

			$this->form_validation->set_rules('consignee_phone','consignee phone','required|numeric');

			$this->form_validation->set_rules('consignee_address','consignee address','required');

			$this->form_validation->set_rules('consignee_zipcode','consignee zipcode','numeric');

			$this->form_validation->set_rules('consignee_country','consignee country','required');

			$this->form_validation->set_rules('consignee_state','consignee country','required');

			$this->form_validation->set_rules('consignee_email','consignee email','valid_email');



			$this->form_validation->set_rules('order_box','box','required|numeric');

			$this->form_validation->set_rules('order_ibs','ibs','required|numeric');

			//$this->form_validation->set_rules('order_end_date','end date','required');

			//$this->form_validation->set_rules('order_insurance_fee','insurance fee','required|numeric');

			//$this->form_validation->set_rules('order_packing_fee','packing fee','required|numeric');

			$this->form_validation->set_rules('order_ship_charge','ship charge','required|numeric');

			//$this->form_validation->set_rules('other_charge','order charge','required|numeric');

			$this->form_validation->set_rules('type_payment_id','payment method','required');

			$this->form_validation->set_rules('type_ship_id','shipment method','required');

			$this->form_validation->set_rules('type_delivery_id','delivery method','required');

			//$this->form_validation->set_rules('unit_id','unit','required');

			$this->form_validation->set_rules('order_sum_price','sum price','required|numeric');

			$this->form_validation->set_rules('customer_id','customer','required');

			if($this->form_validation->run()){

				if(!empty($order_id)){

					$this->load->helper('date');



					$consignee_data['consignee_name']=$data['consignee_name'];

					$consignee_data['consignee_phone']=$data['consignee_phone'];

					$consignee_data['consignee_address']=$data['consignee_address'];

					$consignee_data['consignee_address2']=$data['consignee_address2'];

					$consignee_data['consignee_zipcode']=$data['consignee_zipcode'];

					$consignee_data['consignee_country']=$data['consignee_country'];

					$consignee_data['consignee_city']=$data['consignee_city'];

					$consignee_data['consignee_state']=$data['consignee_state'];

					$consignee_data['consignee_email']=$data['consignee_email'];

					$consignee_data['consignee_date']=local_to_gmt(now());

					$consignee_id=$this->m_order->insertConsignee($consignee_data);



					$order_data['customer_id']=$customer_id;

					$order_data['consignee_id']=$consignee_id;

					$order_data['type_ship_id']=$data['type_ship_id'];

					$order_data['type_delivery_id']=$data['type_delivery_id'];

					$order_data['order_box']=$data['order_box'];

					$order_data['order_ibs']=$data['order_ibs'];

					$order_data['order_insurance_fee']=$data['order_insurance_fee'];

					$order_data['order_packing_fee']=$data['order_packing_fee'];

					$order_data['order_ship_charge']=$data['order_ship_charge'];

					$order_data['order_other_charge']=$data['other_charge'];

					$order_data['type_payment_id']=$data['type_payment_id'];

					$order_data['user_id']=$this->session->userdata('user_id');

					$order_data['unit_id']=1;//$data['unit_id'];

					$order_data['order_sum_price']=$data['order_insurance_fee']+$data['order_packing_fee']+$data['order_ship_charge']+$data['other_charge'];

					$order_data['order_message']=$data['order_message'];

					$order_data['order_creation_date']=local_to_gmt(now());

					$order_data['order_sha1']=sha1($order_id);

					$order_data['order_shipment_rate']=$data['order_shipment_rate'];

					$order_data['order_declared_value']=$data['order_declared_value'];

					//$end_date=$data['order_end_date'].date(' h:i:s',$order_data['order_creation_date']+($timezone*3600));

					//$end_date=strtotime($end_date)-($timezone*3600);

					//$order_data['order_end_date']=$end_date;

					if(!empty($customer_id)){

						$this->m_order->updateDataOrder($order_data,$order_id);

						$this->session->set_flashdata('order_id',$order_id);

						$this->session->set_flashdata('success',$this->session->userdata('trackingcode'));

						$this->session->unset_userdata(array('trackingcode'=>""));

						redirect(base_url().'admin/order/addbysender?sender='.$customer_id);

					}

				}else{

					$error.="Please get tracking code";

					$this->_data['info']=$data;

				}

			}else{

				$this->_data['info']=$data;

			}

		}

		$this->_data['error']=$error;

		$this->_data['info']=$data;

		//$this->_data['unit_data']=$this->m_order->getUnitData();

		$this->_data['type_payment_data']=$this->m_order->getPaymentData();

		$this->_data['type_shipment_data']=$this->m_order->getShipMethod();

		$this->_data['countries_data']=$this->m_order->getAllCountry();

		if($data['type_ship_id']==""){

			$data['type_ship_id']=$this->_data['type_shipment_data'][0]['type_ship_id'];

		}

		$this->_data['type_delivery_data']=$this->m_order->getDelivery($data['type_ship_id']);



		if($data['consignee_country']==""){

			$data['consignee_country']=$this->_data['countries_data'][0]['country_code'];

		}

		$this->_data['consignee_states_data']=$this->m_order->getStates($data['consignee_country']);

		if($data['consignee_state']==""){

			$data['consignee_state']=$this->_data['consignee_states_data'][0]["state_code"];

		}

		if(!empty($customer_id)){

			$this->_data['customer_id']=$customer_id;

		}

		$this->_data['consignee_cities_data']=$this->m_order->getCities($data['consignee_country'],$data['consignee_state']);

		$this->_data['title_area']="Order management";

		$this->_data['scripts']=array('public/scripts/jquery_validation/jquery.validate.min.js');

		$this->_data['styles']=array('public/scripts/jquery-ui/jquery-ui.css');

		$this->_data['view']='order/sender_order';

		$this->load->view($this->_data['template'], $this->_data);

	}

	public function deleteDescription(){

		$notify['error']="";

		$notify['success']="";

		$id=$this->input->get('order_detail_id',true);

		if(!empty($id)){

			$this->m_order->deleteOrderDetail($id);

			$notify['success']="ok";

		}else{

			$notify['error']="Id order detail is empty";

		}

		echo json_encode($notify);

	}

	public function updateDescription(){

		$notify['error']="";

		$notify['success']="";

		if($this->input->post()!=""){

			$this->load->library('form_validation');

			$this->form_validation->set_rules('order_detail_quantity','quantity','required|numeric');

			$this->form_validation->set_rules('order_detail_description','description','required');

			$this->form_validation->set_rules('order_detail_id','detail id','required');

			$data['order_detail_description']=$this->input->post('order_detail_description',true);

			$data['order_detail_quantity']=$this->input->post('order_detail_quantity',true);

			$order_detail_id=$this->input->post('order_detail_id',true);

			if($this->form_validation->run()){

				$this->m_order->updateOrderDetail($data,$order_detail_id);

				$notify['success']=$order_detail_id;

			}else{

				$notify['error'].=validation_errors('<div class="red">','</div>');

			}

		}

		echo json_encode($notify);

	}

	public function addDescription(){

		$tracking_code=$this->session->userdata('trackingcode');

		$notify['error']="";

		$notify['success']="";

		if($this->input->post()!=""){

			if(!empty($tracking_code)){

				$this->load->library('form_validation');

				$this->form_validation->set_rules('order_detail_quantity','quantity','required|numeric');

				$this->form_validation->set_rules('order_detail_description','description','required');

				$tracking_code_prefix=$this->m_order->getTrackingCodePrefix();

				$data['order_detail_description']=$this->input->post('order_detail_description',true);

				$data['order_detail_quantity']=$this->input->post('order_detail_quantity',true);

				$data['order_id']=substr($tracking_code,strlen($tracking_code_prefix['tracking_code_prefix']));

				if($this->form_validation->run()){

					$insert_id=$this->m_order->insertOrderDetail($data);

					$notify['success']=$insert_id;

				}else{

					$notify['error'].=validation_errors('<div class="red">','</div>');

				}

			}else{

				$notify['error'].="<div class='red'>Please get tracking code</div>";

			}

		}

		echo json_encode($notify);

	}

	public function editDescription(){

		$notify['error']="";

		$notify['success']="";

		if($this->input->post()!=""){

				$this->load->library('form_validation');

				$this->form_validation->set_rules('order_detail_quantity','quantity','required|numeric');

				$this->form_validation->set_rules('order_detail_description','description','required');

				$tracking_code_prefix=$this->m_order->getTrackingCodePrefix();

				$data['order_detail_description']=$this->input->post('order_detail_description',true);

				$data['order_detail_quantity']=$this->input->post('order_detail_quantity',true);

				$data['order_id']=$this->input->post('order_id',true);

				if($this->form_validation->run()){

					$insert_id=$this->m_order->insertOrderDetail($data);

					$notify['success']=$insert_id;

				}else{

					$notify['error'].=validation_errors('<div class="red">','</div>');

				}

		}

		echo json_encode($notify);

	}

	public function getStates(){

        $country_name=$_POST['country_name'];

        // echo $cid;

        $states = $this->m_order->getStates($country_name);

        $num=0;

        foreach ($states as $state) 

        {

            if($num==0)

            {

                echo '<option value="'.$state['state_code'].'" selected=selected>'.$state['state'].'</option>';

            }

            else

            {

                echo '<option value="'.$state['state_code'].'">'.$state['state'].'</option>';

            }

            $num=$num+1;

        }

       

    }



     public function getCities(){

        $country_id =$_POST['country_name'];

        $states_code=$_POST['states_code'];

        $cities = $this->m_order->getCities($country_id,$states_code);

         $num=0;

        foreach ($cities as $city)

        {

            if($num==0)
            {

                echo '<option value="'.$city['id'].'" selected=selected>'.$city['city'].'</option>';

            }
            else

            {

                echo '<option value="'.$city['id'].'">'.$city['city'].'</option>';

            }

            $num=$num+1;

        }

    }

    public function getDelivery(){

    	$shipment_id=$this->input->post('shipment_id',true);

    	$shipments_data=$this->m_order->getDelivery($shipment_id);

    	$num=0;

    	foreach ($shipments_data as $shipment) 

        {

            if($num==0)

            {

                echo '<option value="'.$shipment['type_delivery_id'].'" selected=selected>'.$shipment['type_delivery_name'].'</option>';

            }

            else

            {

                echo '<option value="'.$shipment['type_delivery_id'].'">'.$shipment['type_delivery_name'].'</option>';

            }

            $num=$num+1;

        }

    }

    public function getTrackingCode(){

    	$data=array();

    	$data['user_id']=$this->session->userdata('user_id');

    	$order_id=$this->m_order->getTrackingCode($data);

    	$tracking=$this->m_order->getTrackingCodePrefix();

    	if(empty($order_id) || empty($tracking)){

    		echo "error";

    	}else{

    		$trackingCode=$tracking['tracking_code_prefix'].$order_id;

    		$this->session->set_userdata('trackingcode',$trackingCode);

    		echo $trackingCode;

    	}

    }

    public function getOrderDetailInfo($order_id=""){

    	$data=array();

    	$order_detail_id=$this->input->get('order_detail_id');

    	if(!empty($order_detail_id)){

    		$data=$this->m_order->getOrderDetailById($order_detail_id);

    	}

    	echo json_encode($data);



    }

    public function deleteAjax(){

		$id=$this->input->get('id');

		if(!empty($id)){

			$id=json_decode($id);

			$this->m_order->deleteOrderDetailByOrderId($id);

			$this->m_order->deleteOrder($id);

			echo 0;

		}else{

			echo 1;

		}

	}

	public function deleteCurrentOrder(){

		$tracking_code=$this->session->userdata('trackingcode');

		$tracking_code_prefix=$this->m_order->getTrackingCodePrefix();

		$id=substr($tracking_code,strlen($tracking_code_prefix['tracking_code_prefix']));

		if(!empty($id)){

			$this->m_order->deleteOrderDetailByOrderId(array($id));

			$this->m_order->deleteOrder(array($id));

			$this->session->unset_userdata(array('trackingcode'=>""));

		}

		redirect(base_url().'admin/order/index');

	}

	public function updateOrderStatus(){

		$status_id=$this->input->get('status_id');

		$order_id=$this->input->get('order_id');

		if(!empty($order_id) || !empty($status_id)){

			$this->m_order->updateOrderStatus($order_id,$status_id);

			echo 0;

		}else{

			echo 1;

		}

	}
	public function checkAddedUser(){
		$order_id=$_GET['order_id'];
		$rs=$this->m_order->checkAddedUser($order_id);
		if(!empty($rs)){
			$user_id=$this->session->userdata('user_id');
			if($rs['user_id']==$user_id){
				echo 1;
			}else{
				echo 0;
			}
		}else{
			echo 0;
		}
	}

}

?>