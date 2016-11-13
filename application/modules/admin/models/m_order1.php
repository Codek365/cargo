<?php
class M_order extends CI_Model
{
	protected $_table="orders";
	public function __construct()
	{
		parent::__construct();
	}
	//LOAD STATE
	public function getStates($country_name){
        return $this->db->get('zone_states_'.$country_name)->result_array();
    }

    public function getCities($country_id,$states_code){
        $this->db->where('state_code',$states_code);
        return $this->db->get('zone_cities_'.$country_id)->result_array();
    }
    public function getAllCountry(){
    	$this->db->select('country_name,country_code');
    	return $this->db->get('zone_countries')->result_array();
    }
    //GET DROPDOWN
    public function getPaymentData(){
    	$this->db->select('type_payment_id,type_payment_name');
    	return $this->db->get('type_payment')->result_array();
    }
    public function getShipMethod(){
    	$this->db->select('type_ship_id,type_ship_name');
    	return $this->db->get('type_ship')->result_array();
    }
    public function getDeliveryData(){
    	$this->db->select('type_delivery_id,type_delivery_name');
    	return $this->db->get('type_delivery')->result_array();
    }
    public function getUnitData(){
    	$this->db->select('unit_id,unit_name');
    	return $this->db->get('units')->result_array();
    }
    public function getDelivery($shipment_id=""){
    	$this->db->select('type_ship_type_delivery.type_delivery_id,type_delivery_name');
    	$this->db->from('type_delivery');
    	$this->db->where('type_ship_id',$shipment_id);
    	$this->db->join('type_ship_type_delivery','type_ship_type_delivery.type_delivery_id=type_delivery.type_delivery_id');
    	return $this->db->get()->result_array();
    }
    //GET TRACKING CODE
 	public function getTrackingCode($data=array()){
 		$this->db->insert($this->_table,$data);
 		$insert_id = $this->db->insert_id('order_id');
 		return $insert_id;
 	}
 	public function getTrackingCodePrefix(){
 		$this->db->select('tracking_code_prefix');
 		$this->db->where('system_info_id',1);
 		return $this->db->get('system_infomation',1)->row_array();
 	}
 	//DELETE ORDER DETAIL
 	public function deleteOrderDetail($id){
 		$this->db->where('order_detail_id',$id);
 		$this->db->delete('order_detail');
 	}
    //DELETE ORDER DETAIL BY ORDER ID
    public function deleteOrderDetailByOrderId($id){
        $this->db->where_in('order_id',$id);
        $this->db->delete('order_detail');
    }
 	//INSERT ORDER DETAIL
 	public function insertOrderDetail($data=array()){
 		$this->db->insert('order_detail',$data);
 		return $this->db->insert_id('order_detail_id');
 	}
 	//UPDATE ORDER DETAIL
 	public function updateOrderDetail($data=array(),$id){
 		$this->db->where('order_detail_id',$id);
 		$this->db->update('order_detail',$data);
 	}
 	//GET ORDER DETAIL BY ORDER ID
 	public function getOrderDetailByOrderId($order_id=""){
 		$this->db->select('order_detail_id,order_detail_description,order_detail_quantity');
 		$this->db->where('order_id',$order_id);
 		$this->db->order_by("order_detail_id", "desc"); 
 		return $this->db->get('order_detail')->result_array();
 	}
    //GET ALL USERS
    public function getAllUser(){
        $this->db->select('user_id,user_username');
        $query=$this->db->get('users')->result_array();
        return $query;
    }
    //CHECK ADDED USER
    public function checkAddedUser($order_id=""){
        $this->db->select('user_id');
        $this->db->where('order_id',$order_id);
        return $this->db->get('orders')->row_array();
    }
 	//GET ORDER DETAIL BY ORDER DETAIL ID
 	public function getOrderDetailById($id=""){
 		$this->db->select('order_detail_id,order_detail_description,order_detail_quantity');
 		$this->db->where('order_detail_id',$id);
 		return $this->db->get('order_detail')->row_array();
 	}
 	//INSERT CUSTOMER
 	public function insertCustomer($data=array()){
 		$this->db->insert('customers',$data);
 		return $this->db->insert_id('customer_id');
 	}
 	public function insertConsignee($data=array()){
 		$this->db->insert('consignees',$data);
 		return $this->db->insert_id('consignee_id');
 	}
 	//GET TIMEZONE
 	public function getTimeZone(){
 		$this->db->select('timezone');
 		$this->db->where('system_info_id',1);
 		$data=$this->db->get('system_infomation')->row_array();
 		return $data['timezone'];
 	}
    //GET ORDER STATUS
    public function getOrderStatus(){
        $this->db->select('order_status_id,order_status_name');
        return $this->db->get('order_status')->result_array();
    }
    public function getVnOrderStatus(){
        $this->db->select('order_status_id,order_status_name');
        $this->db->where('belong_to_country','vn');
        return $this->db->get('order_status')->result_array();
    }
 	public function updateDataOrder($data=array(),$id=""){
 		$this->db->where('order_id',$id);
 		$this->db->update($this->_table,$data);
 	}
    public function listOrder($page=1,$record=20){
        $from=($page-1)*$record;
        $sql='SELECT order_id,user_id,customer_country,consignee_country,order_sum_price,order_ibs,order_box,order_message,order_status_id,type_ship_name,type_payment_name';
        $sql.=' FROM (((orders LEFT JOIN customers ON orders.customer_id=customers.customer_id) LEFT JOIN consignees ON orders.consignee_id=consignees.consignee_id)';
        $sql.='     LEFT JOIN type_ship ON orders.type_ship_id=type_ship.type_ship_id) LEFT JOIN type_payment ON orders.type_payment_id=type_payment.type_payment_id';
        // $sql.='WHERE order_status_id != "15"';
        $sql.=' ORDER BY orders.order_id DESC';
        $sql.=' LIMIT ?,?';

        return $this->db->query($sql,array($from,$record))->result_array();
    }
    //GET NUM ORDERS
    public function getNumOrders(){
        $sql='SELECT COUNT(order_id) AS numrows';
        $sql.=' FROM (orders INNER JOIN customers ON orders.customer_id=customers.customer_id) INNER JOIN consignees ON orders.consignee_id=consignees.consignee_id';
        $rs=$this->db->query($sql)->row_array();
        return $rs['numrows'];
    }
    public function search($order_id="",$customer_phone="",$consignee_phone="",$page=1,$record=20){
        $from=($page-1)*$record;
        $sql='SELECT order_id,customer_country,consignee_country,order_sum_price,order_ibs,order_box,order_message,order_status_id,type_ship_name,type_payment_name';
        $sql.=' FROM (((orders INNER JOIN customers ON orders.customer_id=customers.customer_id) INNER JOIN consignees ON orders.consignee_id=consignees.consignee_id)';
        $sql.='     INNER JOIN type_ship ON orders.type_ship_id=type_ship.type_ship_id) INNER JOIN type_payment ON orders.type_payment_id=type_payment.type_payment_id';
        $sql.=' WHERE order_id LIKE "%'.$order_id.'%" AND customer_phone LIKE "%'.$customer_phone.'%" AND consignee_phone LIKE "%'.$consignee_phone.'%"';
        $sql.=' ORDER BY order_id DESC';
        $sql.=' LIMIT ?,?';
        return $this->db->query($sql,array($from,$record))->result_array();
    }
     public function search_count($order_id="",$customer_phone="",$consignee_phone=""){
        $sql='SELECT COUNT(order_id) AS numrows';
        $sql.=' FROM (orders INNER JOIN customers ON orders.customer_id=customers.customer_id) INNER JOIN consignees ON orders.consignee_id=consignees.consignee_id';
        $sql.=' WHERE order_id LIKE "%'.$order_id.'%" AND customer_phone LIKE "%'.$customer_phone.'%" AND consignee_phone LIKE "%'.$consignee_phone.'%"';
        $rows=$this->db->query($sql)->row_array();
        return $rows['numrows'];
    }
    //DELETE ORDER
    public function deleteOrder($id_arr=array()){
        $this->db->where_in('order_id',$id_arr);
        $this->db->delete('orders');
    }
    //UPDATE ORDER STATUS
    public function updateOrderStatus($order_id="",$status_id=""){
        $this->db->where('order_id',$order_id);
        $this->db->update($this->_table,array("order_status_id"=>$status_id));
    }
    //EDIT ORDER
    public function getInfoOrderToEdit($order_id=""){
        $sql="SELECT type_ship_id,type_delivery_id,user_id,order_box,order_ibs,order_declared_value,order_shipment_rate,order_ship_charge,order_insurance_fee,order_other_charge,order_packing_fee,order_sum_price,order_message,type_payment_id,";
        $sql.=" orders.customer_id,customer_name,customer_phone,customer_address,customer_address2,customer_city,customer_state,customer_country,customer_zipcode,customer_email,customer_type,customer_remark,customer_passcode,";
        $sql.=" orders.consignee_id AS consignee_id,consignee_name,consignee_phone,consignee_address,consignee_address2,consignee_city,consignee_state,consignee_country,consignee_zipcode,consignee_email";
        $sql.=" FROM (orders INNER JOIN customers ON orders.customer_id=customers.customer_id) INNER JOIN consignees ON orders.consignee_id=consignees.consignee_id";
        $sql.=" WHERE order_id=?";
        return $this->db->query($sql,array($order_id))->row_array();
    }
    //UPDATE CUSTOMER
    public function updateCustomer($customer_id="",$customer_data=array()){
        $this->db->where('customer_id',$customer_id);
        $this->db->update('customers',$customer_data);
    }
    public function updateConsignee($consignee_id="",$consignee_data=array()){
        $this->db->where('consignee_id',$consignee_id);
        $this->db->update('consignees',$consignee_data);
    }
    //SHOW CONSIGNEE INFO VN
    public function getConsigneeByOrderId($order_id="",$country="vn"){
        $sql="SELECT consignee_name,consignee_phone,consignee_address,consignee_address2,consignee_zipcode,country_name,city,consignee_email";
        $sql.=" FROM ((orders INNER JOIN consignees ON orders.consignee_id=consignees.consignee_id)";
        $sql.=" INNER JOIN zone_countries ON consignees.consignee_country=zone_countries.country_code)";
        $sql.=" INNER JOIN zone_cities_".$country." ON consignee_city=zone_cities_".$country.".id";
        $sql.=" WHERE order_id=".$order_id;
        return $this->db->query($sql)->row_array();
    }
    public function getConsigneeCountryByOrderId($order_id=""){
        $sql="SELECT consignee_country 
            FROM consignees INNER JOIN orders ON consignees.consignee_id=orders.consignee_id
            WHERE order_id=".$order_id;
        $rs=$this->db->query($sql)->row_array();
        return $rs['consignee_country'];
    }
}
?>