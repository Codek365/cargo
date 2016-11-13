<?php
class Warehouse extends Admin_Controller{
	protected $_timezone=-8;
	public function __construct(){		
		parent::__construct();
		$this->load->model('m_warehouse');
	}
	public function Shipment_index(){
		$this->_data['total_rows']=$this->m_warehouse->countAllShipment();
		$this->_data['per_page']=10;
		$page=$this->uri->segment(4);
		if(empty($page) || $page < 1){
			$page=1;
		}
		$this->_data['shipments']=$this->m_warehouse->getALlShipment($this->_data['per_page'],$page);
		$this->_data['title_area']="Shipment list";
		$this->_data['view']='warehouse/warehouse/shipment_list';
	    $this->load->view($this->_data['template'],$this->_data);
	}
	public function addShipment(){
		$data=array();
		$this->load->helper('date');
		$gmt = local_to_gmt(time());
		$current_date=date('mdY',$gmt+($this->_timezone*3600));
		$data_shipment=$this->m_warehouse->getShipmentToday($current_date);
		if(empty($data_shipment)){
			$data['shipment_name']=$current_date.'-1';
		}else{
			$data_shipment=end($data_shipment);
			$peace=explode('-',$data_shipment['shipment_name']);
			$data['shipment_name']=$peace[0].'-'.($peace[1]+1);
		}
		$data['current_date']=$current_date;
		$data['current_date_formated']=date('m/d/Y',$gmt+($this->_timezone*3600));
		$this->m_warehouse->addShipment($data);
		$this->session->set_flashdata('success','The shipment has been inserted successfully');
		redirect(base_url().'admin/warehouse/shipment_index');
	}
	public function deleteShipment(){
		$id=$this->uri->segment(4);
		if(!empty($id) && is_numeric($id)){
			$this->m_warehouse->deldeteShipment($id);
		}
		$this->session->set_flashdata('success','The shipment has been deleted successfully');
		redirect(base_url().'admin/warehouse/shipment_index');
	}
	//AJAX====================================================
	public function getOrderByShipmentId(){
		$res=array();
		$order_id=$this->input->post('order_id');
		if(!empty($order_id)){
			$res['orders']=$this->m_warehouse->getOrderByShipmentId($order_id);
		}
		$this->load->model('m_warehouse_order');
		$trackingcode=$this->m_warehouse_order->getTrackingCodePrefix();
		$res['trackingcode']=$trackingcode['tracking_code_prefix'];
		echo json_encode($res);
	}
}