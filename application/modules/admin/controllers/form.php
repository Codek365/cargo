<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Form extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_form');
	}

	public function index()
	{
		$this->_data['view']='form/index';
		$this->load->view($this->_data['template'], $this->_data);
	}
	public function strap()
	{
		$this->uri->segment(4);
		$this->_data['title_area']="Form";
		$this->_data['view']='form/'.$this->uri->segment(4);
		$this->load->view($this->_data['template'], $this->_data);
	}
	public function prints()
	{
		$id = $this->input->get('id');
		$arr=$this->m_form->getFormById($id);	
		echo json_encode($arr);
	}
	public function loadForm()
	{
		$id = $this->input->get_post('id');
		$form = $this->input->get_post('form');	
		$this->_data["form"] = $this->m_form->loadFormById($id);	
		// echo $this->_data["form"]['customer_id'];
		$this->_data["customer"] = $this->m_form->loadCustomerById($this->_data["form"]['customer_id']);
		$this->_data["consignee"] = $this->m_form->loadConsigneeById($this->_data["form"]['consignee_id']);

		$this->_data["zone_customer"] = $this->m_form->loadZoneById($this->_data["customer"]['customer_country_code'],$this->_data["customer"]['customer_city']);	

		$this->_data["zone_consignee"] = $this->m_form->loadZoneById($this->_data["consignee"]['consignee_country_code'],$this->_data["consignee"]['consignee_city']);	

		// $this->_data["payment"] = $this->m_form->loadPayment($this->_data["form"]["type_payment_id"]);

		// echo $this->_data["customer"]['customer_name'];
		// echo "<br>";
		// echo $this->_data["customer"]['customer_country_name'];
		// echo "<br>";
		// echo $this->_data["customer"]['customer_country_code'];
		// echo "<br>";
		// echo $this->_data["consignee"]['consignee_name'];
		// echo "<br>";
		// echo $this->_data["consignee"]['consignee_country_name'];
		// echo "<br>";
		// echo $this->_data["consignee"]['consignee_country_code'];

		// echo "<br>";
		// echo $this->_data["zone"]['id'];
		// echo "<br>";
		// echo $this->_data["zone"]['city'];
		// echo "<br>";
		// echo $this->_data["zone"]['state_code'];
		// echo "<br>";
		// echo $this->_data["zone"]['state'];
		// echo "<br>";
		$this->_data['view']='form/'.$form;
		$this->load->view($this->_data['template'], $this->_data);
	}
	public function printForm()
	{
		$data=array();
		$data['id'] = $this->input->get('id');
		$form = $this->input->get('form');	
		$data["form"] = $this->m_form->loadFormById($data['id']);	
		// echo $this->_data["form"]['customer_id'];
		if(!empty($data["form"]['customer_id'])){
			$data["customer"] = $this->m_form->loadCustomerById($data["form"]['customer_id']);
		}
		if(!empty($data["form"]['consignee_id'])){
			$data["consignee"] = $this->m_form->loadConsigneeById($data["form"]['consignee_id']);
		}
		if(!empty($data["customer"]['customer_country_code']) && !empty($data["customer"]['customer_city'])){
			$data["zone_customer"] = $this->m_form->loadZoneById($data["customer"]['customer_country_code'],$data["customer"]['customer_city']);	
		}
		if(!empty($data["consignee"]['consignee_country_code']) && $data["consignee"]['consignee_city']){
			$data["zone_consignee"] = $this->m_form->loadZoneById($data["consignee"]['consignee_country_code'],$data["consignee"]['consignee_city']);
		}
		//---------QR CODE------------------
		$this->load->library('ciqrcode');
		$params['data'] = $data['id'];
		$params['size'] = 2;
		$params['savename'] = './capcha/'.$data['id'].'.png';
		$this->ciqrcode->generate($params);
		//---------QR CODE------------------
		$form = $this->input->get('form');
		$this->load->view('form/'.$form, $data);
	}
	//==================TRINH LÀM=========================
	public function printMemberShipForm(){
		$customer_id=$this->input->get('customer_id',true);
		if(!empty($customer_id)){
			$country_code=$this->m_form->getCountryCodeByCustomerId($customer_id);
			if(!empty($country_code)){
				$customer_info=$this->m_form->getCustomerInfo($customer_id,$country_code);
				if(!empty($customer_info)){
					$this->_data['customer']=$customer_info;
					$this->_data['title']='Print membership form';
					$this->_data['view']='form/membership2';
					$this->load->view($this->_data['view'],$this->_data);
				}
			}
		}
	}
	public function PreviewMembership(){
		$membership_info=$this->input->get();
		if(!empty($membership_info) && $membership_info['customer_type']==1){
			$rs=$this->m_form->getZoneById($membership_info['customer_country'],$membership_info['customer_state'],$membership_info['customer_city']);
			$membership_info['state']=$rs['state'];
			$membership_info['city']=$rs['city'];
			//$country=$this->m_form->getCountryNameById($membership_info['customer_country']);
			//$membership_info['customer_country']=$country['country_name'];
			$this->_data['customer']=$membership_info;
			$this->_data['title']='Print membership form';	
			$this->_data['view']='form/membership2';
			$this->load->view($this->_data['view'],$this->_data);
		}
	}
	public function PreviewOrder(){
		$ship_request=$this->input->get();
		if($this->session->userdata('trackingcode')){
			$ship_request['order_id']=$this->session->userdata('trackingcode');
			$this->load->model('m_order');
			$tracking_code=$this->session->userdata('trackingcode');
			$tracking_code_prefix=$this->m_order->getTrackingCodePrefix();
			$order_id=substr($tracking_code,strlen($tracking_code_prefix['tracking_code_prefix']));
			$this->_data['order_detail_list']=$this->m_order->getOrderDetailByOrderId($order_id);
			$this->_data['id']=$order_id;
			//---------QR CODE------------------
			$this->load->library('ciqrcode');
			$params['data'] =$this->_data['id'];
			$params['size'] = 2;
			$params['savename'] = './capcha/'.$this->_data['id'].'.png';
			$this->ciqrcode->generate($params);
			//---------QR CODE------------------
		}
		if(!empty($ship_request['customer_country'])){
			$rs=$this->m_form->getZoneById($ship_request['customer_country'],$ship_request['customer_state'],$ship_request['customer_city']);
			$ship_request['customer_state']=$rs['state'];
			$ship_request['customer_city']=$rs['city'];
			$country=$this->m_form->getCountryNameById($ship_request['customer_country']);
			$ship_request['customer_country']=$country['country_name'];
		}
		if(!empty($ship_request['consignee_country'])){
			$rs2=$this->m_form->getZoneById($ship_request['consignee_country'],$ship_request['consignee_state'],$ship_request['consignee_city']);
			$ship_request['consignee_state']=$rs2['state'];
			$ship_request['consignee_city']=$rs2['city'];
			$country=$this->m_form->getCountryNameById($ship_request['consignee_country']);
			$ship_request['consignee_country']=$country['country_name'];
		}
		$this->_data['form']=$ship_request;
		$this->_data['title']='Print membership form';	
		$this->_data['view']='form/shiprequest2';
		$this->load->view($this->_data['view'],$this->_data);
	}
	public function PreviewEditOrder(){
		$ship_request=$this->input->get();
		if(!empty($ship_request['order_id'])){
			$order_id=$ship_request['order_id'];
			$this->load->model('m_order');
			$this->_data['order_detail_list']=$this->m_order->getOrderDetailByOrderId($order_id);
			//---------QR CODE------------------
			$this->_data['id']=$order_id;
			$this->load->library('ciqrcode');
			$params['data'] =$this->_data['id'];
			$params['size'] = 2;
			$params['savename'] = './capcha/'.$this->_data['id'].'.png';
			$this->ciqrcode->generate($params);
			//---------QR CODE------------------
		}
		if(!empty($ship_request['customer_country'])){
			$rs=$this->m_form->getZoneById($ship_request['customer_country'],$ship_request['customer_state'],$ship_request['customer_city']);
			$ship_request['customer_state']=$rs['state'];
			$ship_request['customer_city']=$rs['city'];
			$country=$this->m_form->getCountryNameById($ship_request['customer_country']);
			$ship_request['customer_country']=$country['country_name'];
		}
		if(!empty($ship_request['consignee_country'])){
			$rs2=$this->m_form->getZoneById($ship_request['consignee_country'],$ship_request['consignee_state'],$ship_request['consignee_city']);
			$ship_request['consignee_state']=$rs2['state'];
			$ship_request['consignee_city']=$rs2['city'];
			$country=$this->m_form->getCountryNameById($ship_request['consignee_country']);
			$ship_request['consignee_country']=$country['country_name'];
		}
		$this->_data['form']=$ship_request;
		$this->_data['title']='Print membership form';	
		$this->_data['view']='form/shiprequest2';
		$this->load->view($this->_data['view'],$this->_data);
	}
	public function PreviewOrder2(){
		$ship_request=$this->input->get();
		if($this->session->userdata('trackingcode')){
			$ship_request['order_id']=$this->session->userdata('trackingcode');
			$this->load->model('m_order');
			$tracking_code=$this->session->userdata('trackingcode');
			$tracking_code_prefix=$this->m_order->getTrackingCodePrefix();
			$order_id=substr($tracking_code,strlen($tracking_code_prefix['tracking_code_prefix']));
			$this->_data['order_detail_list']=$this->m_order->getOrderDetailByOrderId($order_id);
			//---------QR CODE------------------
			$this->_data['id']=$order_id;
			$this->load->library('ciqrcode');
			$params['data'] =$this->_data['id'];
			$params['size'] = 2;
			$params['savename'] = './capcha/'.$this->_data['id'].'.png';
			$this->ciqrcode->generate($params);
			//---------QR CODE------------------
		}
		if(!empty($ship_request['customer_id'])){
			$customer_country=$this->m_form->getCustomerCountry($ship_request['customer_id']);
			$customer_info=$this->m_form->getFormCustomerInfo($ship_request['customer_id'],$customer_country['customer_country']);
			if(!empty($customer_info)){
				$ship_request['customer_name']=$customer_info['customer_name'];
				$ship_request['customer_phone']=$customer_info['customer_phone'];
				$ship_request['customer_address']=$customer_info['customer_address'];
				$ship_request['customer_address2']=$customer_info['customer_address2'];
				$ship_request['customer_country']=$customer_info['customer_country'];
				$ship_request['customer_state']=$customer_info['customer_state'];
				$ship_request['customer_city']=$customer_info['customer_city'];
			}
		}
		if(!empty($ship_request['consignee_id'])){
			$consignee_country=$this->m_form->getConsigneeCountry($ship_request['consignee_id']);
			$consignee_info=$this->m_form->getFormconsigneeInfo($ship_request['consignee_id'],$consignee_country['consignee_country']);
			if(!empty($consignee_info)){
				$ship_request['consignee_name']=$consignee_info['consignee_name'];
				$ship_request['consignee_phone']=$consignee_info['consignee_phone'];
				$ship_request['consignee_address']=$consignee_info['consignee_address'];
				$ship_request['consignee_address2']=$consignee_info['consignee_address2'];
				$ship_request['consignee_country']=$consignee_info['consignee_country'];
				$ship_request['consignee_state']=$consignee_info['consignee_state'];
				$ship_request['consignee_city']=$consignee_info['consignee_city'];
			}
		}
		$this->_data['form']=$ship_request;
		$this->_data['title']='Print membership form';	
		$this->_data['view']='form/shiprequest2';
		$this->load->view($this->_data['view'],$this->_data);
	}
	public function PreviewOrder3(){
		$ship_request=$this->input->get();
		if($this->session->userdata('trackingcode')){
			$ship_request['order_id']=$this->session->userdata('trackingcode');
			$this->load->model('m_order');
			$tracking_code=$this->session->userdata('trackingcode');
			$tracking_code_prefix=$this->m_order->getTrackingCodePrefix();
			$order_id=substr($tracking_code,strlen($tracking_code_prefix['tracking_code_prefix']));
			$this->_data['order_detail_list']=$this->m_order->getOrderDetailByOrderId($order_id);
			//---------QR CODE------------------
			$this->_data['id']=$order_id;
			$this->load->library('ciqrcode');
			$params['data'] =$this->_data['id'];
			$params['size'] = 2;
			$params['savename'] = './capcha/'.$this->_data['id'].'.png';
			$this->ciqrcode->generate($params);
			//---------QR CODE------------------
		}
		if(!empty($ship_request['customer_id'])){
			$customer_country=$this->m_form->getCustomerCountry($ship_request['customer_id']);
			$customer_info=$this->m_form->getFormCustomerInfo($ship_request['customer_id'],$customer_country['customer_country']);
			$ship_request['customer_name']=$customer_info['customer_name'];
			$ship_request['customer_phone']=$customer_info['customer_phone'];
			$ship_request['customer_address']=$customer_info['customer_address'];
			$ship_request['customer_address2']=$customer_info['customer_address2'];
			$ship_request['customer_country']=$customer_info['customer_country'];
			$ship_request['customer_state']=$customer_info['customer_state'];
			$ship_request['customer_city']=$customer_info['customer_city'];
		}
		if(!empty($ship_request['consignee_country'])){
			$rs2=$this->m_form->getZoneById($ship_request['consignee_country'],$ship_request['consignee_state'],$ship_request['consignee_city']);
			$ship_request['consignee_state']=$rs2['state'];
			$ship_request['consignee_city']=$rs2['city'];
			$country=$this->m_form->getCountryNameById($ship_request['consignee_country']);
			$ship_request['consignee_country']=$country['country_name'];
		}
		$this->_data['form']=$ship_request;
		$this->_data['title']='Print membership form';	
		$this->_data['view']='form/shiprequest2';
		$this->load->view($this->_data['view'],$this->_data);
	}
	//==================###TRINH LÀM=========================

}
