<?php

class M_customer extends CI_Model{

    protected $_table="customers";

    public function __construct(){

       parent::__construct();

    }

    

    public function listCustomer($page=1,$record=20){

        $from=($page-1)*$record;

//        $this->db->select('id,fullname,phone,address,creation_date,customer_type.name AS customer_type');

        $this->db->select('`customer_id`, `customer_name`, `customer_phone`, `customer_address`, `customer_date`, `type_customer`.`type_customer_name` AS customer_type');

        $this->db->order_by('customer_date','DESC');

        $this->db->join('type_customer','customers.customer_type = type_customer.type_customer_id');

        return $this->db->get($this->_table,$record,$from)->result_array();

    }

   

    public function countRecord(){

        $this->db->from($this->_table);

        return $this->db->count_all_results();

    }

    //GET ALL CUSTOMER TYPE

    public function getAllCustomerType($type=""){

        $this->db->where('type_customer_id !=', 3);

        $this->db->select('type_customer_id,type_customer_name');

        return $this->db->get('type_customer')->result_array();

    }

    //SEARCH CUSTOMER

    public function listCustomer_search($page=1,$record=20,$name="",$phone=""){

        $from=($page-1)*$record;

        //$sql="SELECT id,fullname,phone,address,creation_date,customer_type.name AS customer_type";

        $sql="SELECT customer_id,customer_name,customer_phone,customer_address,customer_date,type_customer.type_customer_name AS customer_type,customer_state,customer_country,customer_city";

        $sql.=" FROM $this->_table INNER JOIN type_customer ON $this->_table.customer_type=type_customer.type_customer_id";

        if(!empty($name) || !empty($phone)){

            $sql.=" WHERE";

        }

        if(!empty($name) && !empty($phone)){

           $sql.=" customer_name LIKE '%$name%' AND customer_phone LIKE '%$phone%'";

        }elseif(!empty($name) && empty($phone)){

            $sql.=" customer_name LIKE '%$name%'";

        }elseif(empty($name) && !empty($phone)){

            $sql.=" customer_phone LIKE '%$phone%'";

        }

        //$sql.=" ORDER BY customer_date DESC";

        $sql.=" LIMIT $from,$record";

        return $this->db->query($sql)->result_array();

    }

    public function countRecord_search($name="",$phone=""){

        $sql="SELECT COUNT('customer_id') AS numrows FROM customers";

        if(!empty($name) || !empty($phone)){

            $sql.=" WHERE";

        }

        if(!empty($name) && !empty($phone)){

           $sql.=" customer_name LIKE '%$name%' OR customer_phone LIKE '%$phone%'";

        }elseif(!empty($name) && empty($phone)){

            $sql.=" customer_name LIKE '%$name%'";

        }elseif(empty($name) && !empty($phone)){

            $sql.=" customer_phone LIKE '%$phone%'";

        }

        $rs=$this->db->query($sql)->row_array();

        return $rs['numrows'];

    }

    //VIEW

    public function view($id){

        $sql='SELECT customers.customer_id,type_customer.type_customer_name AS name,customer_remark as username,customer_passcode as password,customer_name,customer_phone,customer_address,customer_date,customer_state,customer_city,customer_country,customer_zipcode,customer_email ';

        $sql.=" FROM customers INNER JOIN type_customer ON customers.customer_type=type_customer.type_customer_id";

        $sql.=" WHERE customer_id=".$id;

        return $this->db->query($sql)->row_array();

    }

    //EDIT

    public function getDataForEdit($id=""){

        $this->db->select('id,email,phone,address,fullname,city_id,states,country_id,customer_type');

        $this->db->where('id',$id);

        return $this->db->get($this->_table)->row_array();

    }

    public function getCustomerType(){

        $this->db->where('customer_type_id !=',4);

        return $this->db->get('customer_type')->result_array();

    }

    public function getCountry(){

        return $this->db->get('countries')->result_array();

    }

    public function getState($country_id){

        $this->db->where('contry_id',$country_id);

        return $this->db->get('states')->result_array();

    }

    public function getCity($state){

        $this->db->select('city_id,city');

        $this->db->where('state_code',$state);

        return $this->db->get('cities')->result_array();

    }

    public function updateCustomer($data=array(),$id=""){

        $this->db->where('customer_id',$id);

        $this->db->update('customers',$data);

    }



    public function getCityById($id,$country_id)

    {

        // $this->db->select('city');

        $this->db->where('id',$id);

        return $this->db->get('zone_cities_'.$country_id)->row()->city;

    }

    public function getCityByIdCountry($id,$country_id)

    {

        // $this->db->select('city');

        //$this->db->where('city_id',$id);

        $this->db->where('id',$id);

        // $this->db->where('contry_id',$country_id);

        return $this->db->get('zone_cities_'.$country_id)->row()->city;

    }

    public function getStateByCode($code,$country)

    {

        // $this->db->select('city');

        $this->db->where('state_code',$code);

       // $this->db->where('id',$code);

        return $this->db->get('zone_states_'.$country)->row()->state;

    }

    // get order theo customer Id

    public function getOrderById($id)

    {

        // $this->db->select('id');

        $this->db->where('customer_id',$id);

        $this->db->order_by("order_id","desc");

        $this->db->limit(1);

        return $this->db->get('orders')->row_array();

    }

    //huynh add

//$this->db->where('customer_id',$id);

//        $this->db->order_by("order_id","desc");

//        $this->db->limit(1);

    // get history theo consignee_id and order id

    public function getOrderById1($id)

    {

        $this->db->where('consignee_id',$id);

        $this->db->order_by("order_id","desc");

        $this->db->limit(1);

        return $this->db->get('orders')->result_array();

    }

    public function getOrderStatusById($id)

    {

        $this->db->where('order_status_id',$id);

        return $this->db->get('order_status')->row()->order_status_name;

    }

    public function getReceiverById($id)

    {

        $this->db->where('consignee_id',$id);

        return $this->db->get('consignees')->result_array();

    }

    public function getOrderReceiverById($id)

    {

        $this->db->where('consignee_id',$id);

        return $this->db->get('consignees')->row()->receiver_name;

    }

    public function getShipmethod($id)

    {

//        $sql = "select name from ship_method where id = (select method_ship_id from shipment where id = '".$id."')";

        $sql = "select type_ship_name as name from type_ship where type_ship_id = '".$id."'";



        return $this->db->query($sql)->row()->name;

    }

    public function getPaymethod($id)

    {

        $this->db->where('type_payment_id',$id);

        return $this->db->get('type_payment')->row()->type_payment_name;

    }

    public function deleteById($id)

    {

        $this->db->where('customer_id', $id);

        $this->db->delete('customers');

    }

    // delet consignee by id 

    public function deleteConsigneeById($id)

    {

        $this->db->where('consignee_id', $id);

        $this->db->delete('consignees');

    }



    public function getInfoReceiver($id=""){

        $this->db->where('consignee_id',$id);

        return $this->db->get('consignees')->row_array();

    }

//    public function listCountry(){

//        return $this->db->get('countries')->result_array();

//    }

    public function listState($state_code,$country_id=""){

        $this->db->select('state,state_code');

        //$this->db->where('state_code',$state_code);

        return $this->db->get('zone_states_'.$state_code)->result_array();

    }

    public function listCity($state_id="",$country_id){

        $this->db->select('city,id');

        $this->db->where('state_code',$state_id);

        return $this->db->get('zone_cities_'.$country_id)->result_array();

    }

    public function updateReceiver($id="",$data=array()){

        $this->db->where('consignee_id',$id);

        $this->db->update('consignees',$data);

    }

    public function getOrderDetailByOrderId($order_id=""){

        $this->db->select('order_detail_id,order_detail_description,order_detail_quantity');

        $this->db->where('order_id',$order_id);

        $this->db->order_by("order_detail_id", "desc"); 

        return $this->db->get('order_detail')->result_array();

    }

 }

 ?>