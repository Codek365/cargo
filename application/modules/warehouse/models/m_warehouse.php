<?php
class M_warehouse extends CI_Model{
	protected $_table="shipment";
    public function __construct(){
       parent::__construct();
    }
    //ADD SHIPMENT
    public function addShipment($data=array()){
    	$this->db->insert($this->_table,$data);
    }
    //GET ALL SHIPMENT TODAY
    public function getShipmentToday($current_date=""){
    	$this->db->select('shipment_name');
    	$this->db->where('current_date',$current_date);
    	$data=$this->db->get('shipment')->result_array();
    	return $data;
    }
    //GET ALL SHIPMENT
    public function getALlShipment($per_page=10,$page=1){
        $from=$per_page*($page-1);
        $sql="SELECT COUNT(order_id) AS 'numOrder',SUM(order_box) AS 'numBox',shipment.current_date_formated,shipment.shipment_name,shipment.id";
        $sql.=" FROM orders RIGHT JOIN shipment ON orders.shipment_id=shipment.id";
        $sql.=" GROUP BY shipment.id";
        $sql.=" ORDER BY current_date_formated DESC";
        $sql.=" LIMIT ".$from.",".$per_page;
    	return $this->db->query($sql)->result_array();
    }
    //COUNT ALL SHIPMENT
    public function countAllShipment(){
    	return $this->db->count_all($this->_table);
    }
    //DELETE SHIPMENT
    public function deldeteShipment($id=""){
    	$this->db->where('id',$id);
    	$this->db->delete($this->_table);
        //UPDATE SHIPMENT ON  ORDER ==NULL
        $this->updateShipmentOnOrderTable($id);
    }
    public function updateShipmentOnOrderTable($shipment_id=""){
        $data=array(
                'shipment_id'=>null,
                'shipment_name'=>null,
                'order_status_id'=>2,
            );
        $this->db->where('shipment_id',$shipment_id);
        $this->db->update('orders',$data);
    }
    //GET ORDERS OF SHIPMENT
    public function getOrderByShipmentId($shipment_id=""){
        $this->db->select('order_id,order_box,order_ibs');
        $this->db->where('shipment_id',$shipment_id);
        return $this->db->get('orders')->result_array();
    }
}
?>