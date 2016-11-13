<?php
class M_warehouse_order extends CI_Model{
    public function __construct(){
       parent::__construct();
    }
    public function getTrackingCodePrefix(){
 		$this->db->select('tracking_code_prefix');
 		$this->db->where('system_info_id',1);
 		return $this->db->get('system_infomation',1)->row_array();
 	}
 	//GET ALL SHIPMENT TYPE
 	public function getAllShipmentType(){
 		$this->db->select('type_ship_id,type_ship_name');
 		return $this->db->get('type_ship')->result_array();
 	}
 	//GET ORDER WITH ORDER STATUS STORE IN
 	public function getOrderWithStatusStoreIn($order_status_id=2,$per_page=10,$currentPage=1){
 		$from=($currentPage-1)*$per_page;
 		$this->db->select('order_id,type_ship_id,order_box');
 		$this->db->where('order_status_id',$order_status_id);
 		return $this->db->get('orders',$per_page,$from)->result_array();
 	}
 	//COUNT ORDER WITH ORDER STATUS STORE IN
 	public function countOrderWithStatusStoreIn($order_status_id=2){
 		$this->db->where('order_status_id',$order_status_id);
 		return $this->db->count_all_results('orders');
 	}
 	//GET ORDER BY SHIPMENT ID
 	public function getOrderByShipmentId($shipment_id=""){
 		$this->db->select('order_id,type_ship_id,order_box');
 		$this->db->where('shipment_id',$shipment_id);
 		return $this->db->get('orders')->result_array();
 	}
 	//GET SHIPMENT INFO
 	public function getShipmentInfoById($shipment_id=""){
 		$this->db->select('id,shipment_name');
 		$this->db->where('id',$shipment_id);
 		return $this->db->get('shipment')->result_array();
 	}
 	//UPDATE ORDER STATUS AND SHIPMENT INFO
 	public function updateShipmentInfoToOrder($order_id="",$data=array()){
 		$this->db->where('order_id',$order_id);
 		$this->db->update('orders',$data);
 	}
}