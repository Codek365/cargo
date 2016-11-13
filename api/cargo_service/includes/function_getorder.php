<?php
/**
 * Created by PhpStorm.
 * User: huynhth
 * Date: 9/25/14
 * Time: 10:11 AM
 */
//count order transport
function countOrderTransport($db)
{
    $stmt = $db->prepare("select order_id from orders where order_status_id is null or order_status_id=13;");
    $stmt->execute();
    return $stmt->rowCount();
}
//get list order
function getListOrderTransport($db,$couting,$offSet,$pageSize)
{
    try{
            $stmt = $db->prepare("select order_id,CONCAT((select tracking_code_prefix from system_infomation),order_id)as trackingid,type_delivery_name,order_status_id
                              from orders join type_delivery on orders.type_delivery_id=type_delivery.type_delivery_id where order_status_id=1
                              order by order_id desc LIMIT $offSet,$pageSize");
        $stmt->execute();
        foreach($stmt->fetchAll() as $row){
           $status=($row['order_status_id']==1)?false:true;
           $results[]= array("order_id"=>$row['order_id'],"trackingid"=>$row['trackingid'],"delivery_name"=>$row['type_delivery_name'],"status"=>$status);
        }
        return array("listorder"=>$results,"error"=>0,"counting"=>$couting,"message"=>"");
    }catch (Exception $e)
    {
        return array("listorder"=>'',"error"=>1,"counting"=>0,"message"=>"don't load data!");
    }
}

function refreshOrderTransport($db,$offSet,$pageSize)
{
    try{
            $stmt = $db->prepare("select order_id,CONCAT((select tracking_code_prefix from system_infomation),order_id)as trackingid,type_delivery_name,order_status_id
                              from orders join type_delivery on orders.type_delivery_id=type_delivery.type_delivery_id where order_status_id is null and order_id>$orderid");
        $stmt->execute();
        $counting=$stmt->rowCount();
        foreach($stmt->fetchAll() as $row){
            $status=($row['order_status_id']=='')?false:true;
            $results[]= array("order_id"=>$row['order_id'],"trackingid"=>$row['trackingid'],"delivery_name"=>$row['type_delivery_name'],"status"=>$status);
        }
        return array("listorder"=>$results,"error"=>0,"counting"=>$counting,"message"=>"");
    }catch (Exception $e)
    {
        return array("listorder"=>'',"error"=>1,"counting"=>0,"message"=>"don't load data!");
    }
}

//storeMainUS
//count order transport
function countOrderStoreMainUS($db)
{
    $stmt = $db->prepare("select order_id from orders where order_status_id=13 or order_status_id=14;");
    $stmt->execute();
    return $stmt->rowCount();
}
//get list order
function getListOrderStoreMainUS($db,$couting,$offSet,$pageSize)
{
    try{
        $stmt = $db->prepare("select order_id,CONCAT((select tracking_code_prefix from system_infomation),order_id)as trackingid,type_delivery_name,order_status_id
                              from orders join type_delivery on orders.type_delivery_id=type_delivery.type_delivery_id where order_status_id =13 or order_status_id=14
                              order by order_id desc LIMIT $offSet,$pageSize");
        $stmt->execute();
        foreach($stmt->fetchAll() as $row){
            $status=($row['order_status_id']==13)?false:true;
            $results[]= array("order_id"=>$row['order_id'],"trackingid"=>$row['trackingid'],"delivery_name"=>$row['type_delivery_name'],"status"=>$status);
        }
        return array("listorder"=>$results,"error"=>0,"counting"=>$couting,"message"=>"");
    }catch (Exception $e)
    {
        return array("listorder"=>'',"error"=>1,"counting"=>0,"message"=>"don't load data!");
    }
}

//count order transport
function countOrderStoreMainVN($db)
{
    $stmt = $db->prepare("select order_id from orders where order_status_id=14 or order_status_id=15;");
    $stmt->execute();
    return $stmt->rowCount();
}
//get list order
function getListOrderStoreMainVN($db,$couting,$offSet,$pageSize)
{
    try{
        $stmt = $db->prepare("select order_id,CONCAT((select tracking_code_prefix from system_infomation),order_id)as trackingid,type_delivery_name,order_status_id
                              from orders join type_delivery on orders.type_delivery_id=type_delivery.type_delivery_id where order_status_id =14 or order_status_id=15
                              order by order_id desc LIMIT $offSet,$pageSize");
        $stmt->execute();
        foreach($stmt->fetchAll() as $row){
            $status=($row['order_status_id']==14)?false:true;
            $results[]= array("order_id"=>$row['order_id'],"trackingid"=>$row['trackingid'],"delivery_name"=>$row['type_delivery_name'],"status"=>$status);
        }
        return array("listorder"=>$results,"error"=>0,"counting"=>$couting,"message"=>"");
    }catch (Exception $e)
    {
        return array("listorder"=>'',"error"=>1,"counting"=>0,"message"=>"don't load data!");
    }
}

function get_box_lbs($db,$orderid)
{
    $stmt = $db->prepare("select order_box,order_ibs from orders where order_id=?");
    $stmt->execute(array($orderid));
    foreach($stmt->fetchAll() as $row){

        return array("order_box"=>$row['order_box'],"order_ibs"=>$row['order_ibs'],"message"=>"","error"=>0);
    }
    return array("error"=>1,"counting"=>"","message"=>"");
}