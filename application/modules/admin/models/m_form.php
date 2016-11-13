<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_form extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	// Load form detail 
	public function getFormById($id)
	{
		$this->db->select('order_id');
		$this->db->where('order_id', $id);
		$this->db->like('order_id', $id, 'both');
		return $this->db->get('orders')->result_array();

	}
	// End
	/*public function loadFormById($id)
	{
		$subfix= "_us";
		  $sql ="SELECT  orders.order_id,
		  customers.customer_name,
		  customers.customer_phone,
		  customers.customer_address,
		  customers.customer_address2,
		  ustomers.customer_city,
		  customers.customer_state,
				customers.country_name AS customer_country_name,
				consignees.country_name AS consignee_country_name,
				consignees.consignee_city,
				consignees.consignee_state,
		        consignees.consignee_name,
		        consignees.consignee_phone,
		        consignees.consignee_address,
		        consignees.consignee_address2
				FROM (orders      
				INNER JOIN (
		           	SELECT 	customers.customer_name,
		            		customers.customer_id,
		            		customers.customer_phone,
		            		customers.customer_address,
		            		customers.customer_address2,
		            		zone_cities$subfix.id AS customer_city_id,
		            		zone_cities$subfix.city AS customer_city,
		            		zone_states$subfix.id AS customer_state_id,
		            		zone_states$subfix.state AS customer_state,
		            		zone_countries.country_name
					FROM ((customers 
		            		INNER JOIN zone_countries ON zone_countries.country_id=customers.customer_country)
		            		INNER JOIN zone_cities_us ON zone_cities_us.id=customers.customer_city)
		            		INNER JOIN zone_states_us ON zone_states_us.id=customers.customer_state
		            
		        		) customers ON orders.customer_id=customers.customer_id) 

				INNER JOIN (
		            	SELECT 	consignees.consignee_name,
		            			consignees.consignee_id,
		            			consignees.consignee_phone,
		            			consignees.consignee_address,
		            			consignees.consignee_address2,
		            			zone_cities$subfix.id as consignee_city_id,
		            			zone_cities$subfix.city AS consignee_city,
		            			zone_states$subfix.id as consignee_state_id,
		            			zone_states$subfix.state AS consignee_state,
		            			zone_countries.country_name
						FROM ((consignees 
						INNER JOIN zone_countries ON zone_countries.country_id=consignees.consignee_country)
		    			INNER JOIN zone_cities_us ON zone_cities_us.id=consignees.consignee_city)
		    			INNER JOIN zone_states_us ON zone_states_us.id=consignees.consignee_state
		            
		            ) consignees ON orders.consignee_id=consignees.consignee_id

		WHERE orders.order_id=?";
		return $this->db->query($sql,array($id))->row_array();
		

	}*/
	public function loadFormById($id)
	{
		$this->db->where('order_id', $id);
		return $this->db->get('orders')->row_array();

	}
	// Load all information of customers and consignee
	public function loadCustomerById($id)
	{
		$this->db->select(
			'*,
			country_name AS customer_country_name,
			country_code AS customer_country_code
			');
		$this->db->join('zone_countries', 'zone_countries.country_code = customers.customer_country', 'left');
		$this->db->where('customer_id', $id);
		return $this->db->get('customers')->row_array();
	}
	public function loadConsigneeById($id)
	{
		$this->db->select(
			'*,
			country_name AS consignee_country_name,
			country_code AS consignee_country_code
			');
		$this->db->join('zone_countries', 'zone_countries.country_code = consignees.consignee_country', 'left');
		$this->db->where('consignee_id', $id);
		return $this->db->get('consignees')->row_array();
	}
	// End 

	// Load zone by country subfix and id
	public function loadZoneById($country_code,$id)	
	{	 
	 	$this->db->select('*');
	 	$this->db->join('zone_states_'.$country_code, 'zone_states_'.$country_code.'.state_code = zone_cities_'.$country_code.'.state_code', 'left');
	 	$this->db->where('zone_cities_'.$country_code.'.id', $id);
		return $this->db->get('zone_cities_'.$country_code)->row_array();
	} 
	// Load payment
	public function loadPayment()
	{
		return $this->db->get('type_payment')->row_array();
	}
	// Load detail 

	public function loadOrderdetail($id)
	{
		$this->db->where('order_id',$id);
		return $this->db->get('order_detail')->result_array();
	}
	//==================TRINH LÀM=========================
	//GET CUSTOMER INFO TO FILL ON MEMBERSHIP FORM
	public function getCustomerInfo($customer_id="",$country_code="us"){
		$sql='SELECT customer_id,customer_name,customer_remark,customer_passcode,customer_phone,customer_zipcode,customer_address,customer_date, zone_cities_'.$country_code.'.city, zone_states_'.$country_code.'.state
				FROM ((customers INNER JOIN zone_countries ON customers.customer_country=zone_countries.country_code)
						INNER JOIN zone_states_'.$country_code.' ON customers.customer_state=zone_states_'.$country_code.'.state_code)
						INNER JOIN zone_cities_'.$country_code.' ON customers.customer_city=zone_cities_'.$country_code.'.id
				WHERE customers.customer_id='.$customer_id;
		return $this->db->query($sql)->row_array();
	}
	public function getCountryCodeByCustomerId($customer_id=""){
		$this->db->select('customer_country');
		$this->db->where('customer_id',$customer_id);
		$rs=$this->db->get('customers')->row_array();
		return $rs['customer_country'];
	}
	public function getCountryNameById($country_code=""){
		$this->db->select('country_name');
		$this->db->where('country_code',$country_code);
		return $this->db->get('zone_countries')->row_array();
	}
	public function getZoneById($country_code="us",$state_code="",$cities_id=""){
		$sql='SELECT zone_states_'.$country_code.'.state AS state,zone_cities_'.$country_code.'.city AS city 
			FROM zone_states_'.$country_code.' INNER JOIN zone_cities_'.$country_code.' ON zone_states_'.$country_code.'.state_code=zone_cities_'.$country_code.'.state_code 
			WHERE zone_states_'.$country_code.'.state_code="'.$state_code.'" AND zone_cities_'.$country_code.'.id='.$cities_id;
		return $this->db->query($sql)->row_array();
	}
	public function getCustomerCountry($customer_id=""){
		$sql="SELECT customer_country FROM customers WHERE customer_id=?";
		return $this->db->query($sql,array($customer_id))->row_array();
	}
	public function getFormCustomerInfo($customer_id="",$country="us"){
		$sql="SELECT customer_name,customer_phone,customer_address,customer_address2, zone_cities_".$country.".city AS customer_city,zone_states_".$country.".state AS customer_state,zone_countries.country_name AS customer_country
			FROM ((customers INNER JOIN zone_cities_".$country." ON customers.customer_city=zone_cities_".$country.".id)
				INNER JOIN zone_states_".$country." ON customers.customer_state=zone_states_".$country.".state_code)
				INNER JOIN zone_countries ON customers.customer_country=zone_countries.country_code
			WHERE customer_id=?";
		return $this->db->query($sql,array($customer_id))->row_array();
	}
	public function getConsigneeCountry($consignee_id=""){
		$sql="SELECT consignee_country FROM consignees WHERE consignee_id=?";
		return $this->db->query($sql,array($consignee_id))->row_array();
	}
	public function getFormConsigneeInfo($consignee_id="",$country="us"){
		$sql="SELECT consignee_name,consignee_phone,consignee_address,consignee_address2, zone_cities_".$country.".city AS consignee_city,zone_states_".$country.".state AS consignee_state,zone_countries.country_name AS consignee_country
			FROM ((consignees INNER JOIN zone_cities_".$country." ON consignees.consignee_city=zone_cities_".$country.".id)
				INNER JOIN zone_states_".$country." ON consignees.consignee_state=zone_states_".$country.".state_code)
				INNER JOIN zone_countries ON consignees.consignee_country=zone_countries.country_code
			WHERE consignee_id=?";
		return $this->db->query($sql,array($consignee_id))->row_array();
	}
	//==================###TRINH LÀM======================
}
