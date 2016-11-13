<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
class Radio{
    public function __construct(){
        
    }
    public function radio($data=array(),$datatextfield="name",$datavaluefield="id",$selectedvalue=0,$name="myradio",$html_attr=array()){
        $str='';
        foreach($data as $item){
            $str.='<input type="radio" ';
                if(!empty($html_attr)){
                    foreach($html_attr as $key=>$attr){
                        $str.=' '.$key.'="'.$attr.'"';
                    }
                }
            $str.= ' name="'.$name.'" value="'.$item[$datavaluefield].'"';
            if($item[$datavaluefield]==$selectedvalue){
                $str.= ' checked="checked"';
            }
            $str.= '/>'.$item[$datatextfield].' ';
        }
        return $str;
    }
}
/*
/*
$data=array(
    "0"=>array("Id"=>1,"Name"=>"Vật Lý"),
    "1"=>array("Id"=>2,"Name"=>"Toán"),
    "2"=>array("Id"=>3,"Name"=>"Văn học"),
);
*/
?>