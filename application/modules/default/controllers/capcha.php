<?php
class Capcha extends Default_Controller{
    public function __construct(){
        parent::__construct();
    }
   public function get(){
        $this->load->helper('captcha');
        $time=time();
        $val = array(
                "word"      => substr($time,strlen($time)-6,strlen($time)),
                "img_path"  =>  "./capcha/",
                "img_url"   => base_url()."capcha/",
                "img_width" => 150,
                "img_height"=> 30,
                "expiration"=> 7200
                );
        $cap = create_captcha($val);
        $this->session->set_userdata('capcha',$cap['word']);
        echo $cap['image'];
    }
}
?>