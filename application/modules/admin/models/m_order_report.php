<?php
class M_order_report extends CI_Model{
	protected $_table="orders";
	public function __construct(){
		parent::__construct();
       
	}
    public function all(){
        $query=$this->db->get($this->_table);
        return $query->result_array();
    }
    public function user_day_test($now,$tomorrow,$user){
        $query = $this->db->query("
            select user_position,orders.order_id,user_username,orders.user_id,order_ship_charge,
            order_insurance_fee, order_other_charge,order_packing_fee ,
            order_ship_charge+order_insurance_fee +order_other_charge +order_packing_fee as total ,
             order_box,order_ibs,type_payment_id, type_ship_id,type_delivery_id
            from orders INNER JOIN users ON orders.user_id=users.user_id 
            where (order_creation_date-25200) BETWEEN $now AND $tomorrow and orders.user_id=$user 
            ");
        return $query->result_array();
    }
     public function user_day($now,$user){
        $query = $this->db->query("
            select user_position,orders.order_id,user_username,orders.user_id,order_ship_charge,
            order_insurance_fee, order_other_charge,order_packing_fee ,
            order_ship_charge+order_insurance_fee +order_other_charge +order_packing_fee as total ,
             order_box,order_ibs,type_payment_id, type_ship_id,type_delivery_id
            from orders INNER JOIN users ON orders.user_id=users.user_id 
            where  FROM_UNIXTIME(order_creation_date-25200,'%Y-%m-%d ') = '$now' and orders.user_id=$user 
            ");
        if($query->num_rows() == 0)
            return FALSE;
        return $query->result_array();

    }
    public function user_day_sum_test($now,$tomorrow,$user){
       // $this->db->select("count(*) as count");
       // $this->db->where("order_creation_date BETWEEN $now AND $tomorrow");
       // $query=$this->db->get($this->_table);
        $query = $this->db->query("
            select sum(order_ship_charge) as total_shipment_charge,sum(order_insurance_fee) as total_insurance_charge,
            sum(order_other_charge) as total_other_charge,sum(order_packing_fee) as total_packing_fee
            ,sum(order_ship_charge)+sum(order_insurance_fee) +sum(order_other_charge) +sum(order_packing_fee) as total ,
            sum(order_box) as order_box,sum(order_ibs) as order_ibs
            from orders INNER JOIN users ON orders.user_id=users.user_id 
            where (order_creation_date-25200) BETWEEN $now AND $tomorrow and orders.user_id=$user 
            ");
        return $query->row_array();
    }
     public function user_day_sum($now,$user){
       // $this->db->select("count(*) as count");
       // $this->db->where("order_creation_date BETWEEN $now AND $tomorrow");
       // $query=$this->db->get($this->_table);
        $query = $this->db->query("
            select sum(order_ship_charge) as total_shipment_charge,sum(order_insurance_fee) as total_insurance_charge,
            sum(order_other_charge) as total_other_charge,sum(order_packing_fee) as total_packing_fee
            ,sum(order_ship_charge)+sum(order_insurance_fee) +sum(order_other_charge) +sum(order_packing_fee) as total ,
            sum(order_box) as order_box,sum(order_ibs) as order_ibs
            from orders INNER JOIN users ON orders.user_id=users.user_id 
            where FROM_UNIXTIME(order_creation_date-25200,'%Y-%m-%d') = '$now' and orders.user_id=$user 
            ");
        return $query->row_array();
    }
    
    public function listordera_alluser_today($now,$tomorrow){
       // $this->db->select("count(*) as count");
       // $this->db->where("order_creation_date BETWEEN $now AND $tomorrow");
       // $query=$this->db->get($this->_table);
        $query = $this->db->query("
            select count(*) as total_order,sum(order_ship_charge) as total_shipment_charge,sum(order_insurance_fee) as total_insurance_charge,
                        sum(order_other_charge) as total_other_charge,sum(order_packing_fee) as total_packing_fee
                        ,sum(order_ship_charge)+sum(order_insurance_fee) +sum(order_other_charge) +sum(order_packing_fee) as total  
            FROM orders
            where order_creation_date BETWEEN $now AND $tomorrow
            ");
        return $query->row_array();
    }
    public function listordera_alluser_today2($now,$tomorrow){
       // $this->db->select("count(*) as count");
       // $this->db->where("order_creation_date BETWEEN $now AND $tomorrow");
       // $query=$this->db->get($this->_table);
        $query = $this->db->query("
            select FROM_UNIXTIME(order_creation_date-25200,'%Y-%m-%d ') as order_date,count(*) as total_order,sum(order_ship_charge) as total_shipment_charge,sum(order_insurance_fee) as total_insurance_charge,
                        sum(order_other_charge) as total_other_charge,sum(order_packing_fee) as total_packing_fee
                        ,sum(order_ship_charge)+sum(order_insurance_fee) +sum(order_other_charge) +sum(order_packing_fee) as total  
            FROM orders
            where FROM_UNIXTIME(order_creation_date-25200,'%Y-%m-%d ') between'2014-09-23' and '2014-09-24'
            group by FROM_UNIXTIME(order_creation_date-25200,'%Y-%m-%d ')
            ");
        return $query->result_array();
    }
    public function listordera_alluser_today3($now,$tomorrow){
        $query = $this->db->query("
            SELECT user_position,user_username,orders.user_id,sum(order_ship_charge) as total_ship_charge,sum(order_insurance_fee) as total_insurance_charge,
            sum(order_other_charge) as total_other_charge,sum(order_packing_fee) as total_packing_fee,
            sum(order_ship_charge)+sum(order_insurance_fee) +sum(order_other_charge) +sum(order_packing_fee) as total,
            sum(order_box) as order_box,sum(order_ibs) as order_ibs
            from orders INNER JOIN users ON orders.user_id=users.user_id
            where FROM_UNIXTIME(order_creation_date-25200,'%Y-%m-%d ') between '$now' and '$tomorrow'  
            group by user_position
            ");
        //
        return $query->result_array();
    }
    public function listordera_alluser_today4($now,$tomorrow,$user_position){
        $query = $this->db->query("
            SELECT user_position,user_username,orders.user_id,sum(order_ship_charge) as total_ship_charge,sum(order_insurance_fee) as total_insurance_charge,
            sum(order_other_charge) as total_other_charge,sum(order_packing_fee) as total_packing_fee,
            sum(order_ship_charge)+sum(order_insurance_fee) +sum(order_other_charge) +sum(order_packing_fee) as total,
            sum(order_box) as order_box,sum(order_ibs) as order_ibs
            from orders INNER JOIN users ON orders.user_id=users.user_id
            where FROM_UNIXTIME(order_creation_date-25200,'%Y-%m-%d ') between '$now' and '$tomorrow'  and user_position = '$user_position'
            group by user_position
            ");
        //
        return $query->result_array();
    }
    public function listordera_alluser_fromto3($now,$tomorrow){
        $query = $this->db->query("
            SELECT 
            sum(order_ship_charge) as total_ship_charge,
            sum(order_insurance_fee) as total_insurance_charge,
            sum(order_other_charge) as total_other_charge,
            sum(order_packing_fee) as total_packing_fee,
            sum(order_ship_charge)+sum(order_insurance_fee) +sum(order_other_charge) +sum(order_packing_fee) as total,
            sum(order_box) as order_box,sum(order_ibs) as order_ibs
            from orders 
            where FROM_UNIXTIME(order_creation_date-25200,'%Y-%m-%d ') between '$now' and '$tomorrow'  
            ");
        //
        return $query->row_array();
    }
    public function listordera_alluser_fromto4($now,$tomorrow,$user_position){
        $query = $this->db->query("
            SELECT 
            sum(order_ship_charge) as total_ship_charge,
            sum(order_insurance_fee) as total_insurance_charge,
            sum(order_other_charge) as total_other_charge,
            sum(order_packing_fee) as total_packing_fee,
            sum(order_ship_charge)+sum(order_insurance_fee) +sum(order_other_charge) +sum(order_packing_fee) as total,
            sum(order_box) as order_box,sum(order_ibs) as order_ibs
            from orders INNER JOIN users ON orders.user_id=users.user_id
            where FROM_UNIXTIME(order_creation_date-25200,'%Y-%m-%d ') between '$now' and '$tomorrow'  and user_position = '$user_position'
            ");
        //
        return $query->row_array();
    }
    public function listorderatoday($now,$tomorrow){
        $query = $this->db->query("
            select user_fullname,user_username,orders.user_id,count(*) as total_order,sum(order_ship_charge) as total_shipment_charge,sum(order_insurance_fee) as total_insurance_charge,
            sum(order_other_charge) as total_other_charge,sum(order_packing_fee) as total_packing_fee
            ,sum(order_ship_charge)+sum(order_insurance_fee) +sum(order_other_charge) +sum(order_packing_fee) as total  
            from orders INNER JOIN users ON orders.user_id=users.user_id
            where (order_creation_date-25200) BETWEEN $now AND $tomorrow 
            group by orders.user_id
            ");
        return $query->result_array();
    }
    public function listorderatoday1($now){
        $query = $this->db->query("
            select user_fullname,user_username,orders.user_id,count(*) as total_order,sum(order_ship_charge) as total_shipment_charge,sum(order_insurance_fee) as total_insurance_charge,
            sum(order_other_charge) as total_other_charge,sum(order_packing_fee) as total_packing_fee
            ,sum(order_ship_charge)+sum(order_insurance_fee) +sum(order_other_charge) +sum(order_packing_fee) as total  
            from orders INNER JOIN users ON orders.user_id=users.user_id
            where FROM_UNIXTIME(order_creation_date-25200,'%Y-%m-%d ') = '$now' 
            group by orders.user_id
            ");
        return $query->result_array();
    }
 }