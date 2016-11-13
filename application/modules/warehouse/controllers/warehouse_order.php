<?php
class Warehouse_order extends Admin_Controller{
	protected $_timezone=-8;
	public function __construct(){		
		parent::__construct();
		$this->load->model('m_warehouse_order');
	}
	public function addOrderToShipment(){
		$this->_data['per_page']=10;
		$this->_data['trackingcode']=$this->m_warehouse_order->getTrackingCodePrefix();
		$this->_data['shipment_type']=$this->m_warehouse_order->getAllShipmentType();
		//==============STORE IN=======================
		$this->_data["store_in_orders_page"]=$this->uri->segment(5);
		if($this->_data['store_in_orders_page']<1){
			$this->_data['store_in_orders_page']=1;
		}

		$this->_data['store_in_orders']=$this->m_warehouse_order->getOrderWithStatusStoreIn(2,$this->_data['per_page'],$this->_data['store_in_orders_page']);
		$this->_data['numStore_in_orders']=$this->m_warehouse_order->countOrderWithStatusStoreIn(2);
		//===========###STORE IN###====================
		//==============STORE OUT=======================
		$shipment_id=$this->uri->segment(4);
		if(!empty($shipment_id)){
			$this->_data['store_out_orders']=$this->m_warehouse_order->getOrderByShipmentId($shipment_id);
			$this->_data['shipment_id']=$shipment_id;
		}
		//===========###STORE OUT###====================
		$this->_data['title_area']="Warehouse";
		$this->_data['view']='warehouse/warehouse/change_order_list';
	    $this->load->view($this->_data['template'],$this->_data);
	}
	public function chageToStoreOut(){
		$order_id=$this->input->get('order_id',true);
		$shipment_id=$this->input->get('shipment_id',true);
		$page=$this->input->get('page',true);
		if(!empty($order_id)){
			$shipment_info=$this->m_warehouse_order->getShipmentInfoById($shipment_id);
			if(!empty($shipment_info)){
				$data_update=array();
				$data_update['order_status_id']=3;
				$data_update['shipment_id']=$shipment_info[0]['id'];
				$data_update['shipment_name']=$shipment_info[0]['shipment_name'];
				$this->m_warehouse_order->updateShipmentInfoToOrder($order_id,$data_update);
			}
		}
		redirect(base_url().'admin/warehouse_order/addOrderToShipment/'.$shipment_id.'/'.$page);
	}
	public function chageToStoreIn(){
		$order_id=$this->input->get('order_id',true);
		$shipment_id=$this->input->get('shipment_id',true);
		$page=$this->input->get('page',true);
		$data_update=array();
		$data_update['order_status_id']=2;
		$data_update['shipment_id']=null;
		$data_update['shipment_name']=null;
		$this->m_warehouse_order->updateShipmentInfoToOrder($order_id,$data_update);
		redirect(base_url().'admin/warehouse_order/addOrderToShipment/'.$shipment_id.'/'.$page);
	}
}