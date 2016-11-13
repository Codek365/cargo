<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class CI_System {

    public function field($data)
    {
    	$CI =   &get_instance();    

    	$CI->db->where('field_name', $data);

    	$query = $CI->db->get('system_field');

    	echo $query->row()->field_value;
    	
    }
}

/* End of file Someclass.php */