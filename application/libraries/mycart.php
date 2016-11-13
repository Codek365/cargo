<?php
class Mycart{
    protected $_CI;
    public function __construct(){
        $this->_CI=& get_instance();
        $this->_CI->load->library(array('session'));
    }
    public function insert($data=array()){
        if(!empty($data['id']) && !empty($data['qty']) && is_numeric($data['qty']) && $data['qty']>0){
            $userdata=$this->_CI->session->userdata('cart');
            if(empty($userdata)){
                $userdata[]=$data;
            }else{
                $flag=false;
                foreach($userdata as $key=>$item){
                    if($item['id']==$data['id']){
                        $userdata[$key]['qty']=$userdata[$key]['qty']+$data['qty'];
                        $flag=true;
                        break;
                    }
                }
                if($flag==false){
                    $userdata[]=$data;
                }
            }
            $this->_CI->session->set_userdata('cart',$userdata);           
        }
    }
    public function update($data=array()){
        if(!empty($data['id']) && is_numeric($data['qty'])){
            $userdata=$this->_CI->session->userdata('cart');
            if(!empty($userdata)){
                foreach($userdata as $key=>$item){
                    if($item['id']==$data['id']){
                            if($data['qty']<=0){
                                unset($userdata[$key]);
                            }else{
                                $userdata[$key]['qty']=$data['qty'];
                            }
                            break;
                    }
                }
            }
            $this->_CI->session->set_userdata('cart',$userdata);
        }
    }
    public function delete($id){
        if(!empty($id)){
            $userdata=$this->_CI->session->userdata('cart');
            if(!empty($userdata)){
                foreach($userdata as $key=>$item){
                    if($item['id']==$id){
                        unset($userdata[$key]);
                    }
                }
            }
            $this->_CI->session->set_userdata('cart',$userdata);
        }
    }
    public function numItem(){
        $userdata=$this->_CI->session->userdata('cart');
            if(!empty($userdata)){
                $num=0;
                foreach($userdata as $item){
                    $num=$num+$item['qty'];
                }
            }else{
                return 0;
            }
            return $num;
    }
    public function sumPrice(){
        $userdata=$this->_CI->session->userdata('cart');
        $totalprice=0;
            if(!empty($userdata)){
                $this->_CI->load->model('mcart');
                $data=$this->_CI->mcart->listPrice($this->listId());
                foreach($data as $product){
                    foreach($userdata as $ud){
                        if($product['id']==$ud['id']){
                            if($product['discount']>0){
                                $price=$product['price']-(($product['discount']*$product['price'])/100);
                            }else{
                                $price=$product['price'];
                            }
                            $totalprice+=$price*$ud['qty'];       
                        }
                    }
                }   
            }
            return $totalprice;
    }
    public function listId(){
        $userdata=$this->_CI->session->userdata('cart');
            if(!empty($userdata)){
                $ids=array();
                foreach($userdata as $item){
                    $ids[]=$item['id'];
                }
            }else{
                return'';
            }
            return $ids;
    }
    public function remove(){
        $this->_CI->session->unset_userdata('cart');
    }
    public function getDataCCart(){
        $this->_CI->load->model('mcart');
        $data=$this->_CI->mcart->getDataTable($this->listId());
        return $data;
    }
    public function sumPriceProduct($id,$qty){
        $this->_CI->load->model('mcart');
        $item=$this->_CI->mcart->sumPriceAProduct($id);
         if($item['discount']>0){
            $price=$item['price']-(($item['discount']*$item['price'])/100);
        }else{
            $price=$item['price'];
        }
        return ($price*$qty);
    }
}
?>