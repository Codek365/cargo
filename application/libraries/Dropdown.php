<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
class Dropdown{
    public function __construct(){
        
    }
    public function dropdown($data=array(),$datatextfield="name",$datavaluefield="id",$selectedvalue=0,$html_attr=array()){
        $str='<select';
            if(!empty($html_attr)){
                foreach($html_attr as $key=>$attr){
                    $str.=' '.$key.'="'.$attr.'"';
                }
            }
        $str.='>';
        foreach($data as $item){
            $str.='<option value="'.$item[$datavaluefield].'"';
            if($item[$datavaluefield]==$selectedvalue){
                $str.=' selected="selected"';
            }
            $str.='>'.$item[$datatextfield].'</option>';
        }
        $str.='</select>';
        return $str;
    }
}
/*
$data=array(
    "0"=>array("Id"=>1,"Name"=>"Vật Lý"),
    "1"=>array("Id"=>2,"Name"=>"Toán"),
    "2"=>array("Id"=>3,"Name"=>"Văn học"),
);
*/ 
?>