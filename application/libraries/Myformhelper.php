<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
/**

              $Db_Arr_config=array(
                  "DbArr"=>array(
                              "1"=>array(
                                      "id"=>"1",
                                      "name"=>"Vat ly",
                              ),
                              "2"=>array(
                                      "id"=>"2",
                                      "name"=>"Toán",
                              ),
                              "3"=>array(
                                      "id"=>"3",
                                      "name"=>"Anh văn",
                              ),
                  ),
                  "TextField"=>"name",
                  "ValueField"=>"id",
                  "SelectedValue"=>2,
                  "Name"="myradio";
            );
 */
    class Myformhelper{
        protected $_DbArr=array();
        protected $_TextField="";
        protected $_ValueField="";
        protected $_SelectedValue="";
        protected $_ValueFirst="";
        protected $_Name="my";
        public function __construct($Db_Arr_config=array()){
            if(!empty($Db_Arr_config["DbArr"]) && is_array($Db_Arr_config["DbArr"])){
                $this->setDatabase_Arr($Db_Arr_config["DbArr"]);
            }
            if(!empty($Db_Arr_config["TextField"])){
                $this->setTextField($Db_Arr_config["TextField"]);
            }
            if(!empty($Db_Arr_config["ValueField"])){
                $this->setValueField($Db_Arr_config["ValueField"]);
            }
            if(!empty($Db_Arr_config["SelectedValue"])){
                $this->setSelectedValue($Db_Arr_config["SelectedValue"]);
            }
            if(!empty($Db_Arr_config["Name"])){
                $this->setName($Db_Arr_config["Name"]);
            }
            if(!empty($Db_Arr_config["ValueFirst"])){
                $this->setValueFirst($Db_Arr_config["ValueFirst"]);
            }
        }
        public function setValueFirst($ValueFirst){
            if(!empty($ValueFirst)){
                $this->_ValueFirst=$ValueFirst;
            }
        }
        public function setName($name=""){
            if(!empty($name)){
                $this->_Name=$name;
            }
        }
        public function setTextField($TextField){
            if(!empty($TextField)){
                $this->_TextField=$TextField;
            }
        }
        public function setValueField($ValueField){
            if(!empty($ValueField)){
                $this->_ValueField=$ValueField;
            }
        }
        public function setSelectedValue($SelectedValue){
            if(!empty($SelectedValue)){
                $this->_SelectedValue=$SelectedValue;
            }
        }
        public function setDatabase_Arr($DbArr){
            if(!empty($DbArr) && is_array($DbArr)){
                $this->_DbArr=$DbArr;
            }
        }
        public function convertArrDb(){
            $rs=array();
            foreach($this->_DbArr as $val){
               $rs[$val[$this->_ValueField]]=$val[$this->_TextField];
            }
            return $rs;
        }
        public function form_radio(){
                $arr=$this->convertArrDb();  
            $str="";
            foreach($arr as $key=>$val){
                if($this->_SelectedValue==$key){
                    $str.='<input type="radio" name="'.$this->_Name.'" value="'.$key.'" checked="checked"> '.$val.' ';
                }else{
                    $str.='<input type="radio" name="'.$this->_Name.'" value="'.$key.'"> '.$val.' ';
                }
            }
            return $str;
        }
        public function form_dropdown($class=""){
            $arr=$this->convertArrDb();
            $str='<select name="'.$this->_Name.'" class='.$class.'>';
                if(!empty($this->_ValueFirst)){
                    $str.='<option value="none">'.$this->_ValueFirst.'</option>';
                }
                foreach($arr as $key=>$val){
                    if($this->_SelectedValue==$key){
                        $str.='<option value="'.$key.'" selected="selected">'.$val.'</option>';   
                    }else{
                        $str.='<option value="'.$key.'">'.$val.'</option>';
                    }
                }
            $str.='</select>';
            return $str;
        }
        
    }
?>