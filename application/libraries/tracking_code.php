<?php
    class tracking_code{
        protected $CI;
        public function __construct(){
            $this->CI=&get_instance();
        }
        public function generate($table="",$id="id",$numCharacter=10,$prefix="LH"){
            $code="";
            $year=date('Y',time());
            $this->CI->load->model("mtracking_code");
            $oldId=$this->CI->mtracking_code->countRows($table,$id);
            $pre_letter=$prefix.$year;
            if(empty($oldId)){
                $tamp="";
                for($i=0;$i<$numCharacter-strlen($pre_letter);$i++){
                    $tamp.='0';
                }
                $code=$pre_letter.$tamp;
            }else{
                $oldnum=substr($oldId[$id],strlen($pre_letter));
                $oldnum=$oldnum+1;
                $tamp="";
                for($i=0;$i<$numCharacter-(strlen($pre_letter)+strlen($oldnum));$i++){
                    $tamp.="0";
                }
                $code=$pre_letter.$tamp.$oldnum;
            }
            return $code;
        }
    }
?>