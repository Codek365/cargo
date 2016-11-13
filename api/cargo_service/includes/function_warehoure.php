<?php
/**
 * Created by PhpStorm.
 * User: huynhth
 * Date: 11/24/14
 * Time: 9:34 PM
 */
function getListOrderWarehoure($db)
{
    $stmt = $db->prepare("select
                          order_id,CONCAT((select tracking_code_prefix from system_infomation),order_id)as trackingid,order_box,type_ship_name,order_sha1
                          from orders
                          join type_ship on type_ship.type_ship_id=orders.type_ship_id
                          where order_status_id=2 order by order_id desc;");
    $stmt->execute();
    foreach($stmt->fetchAll() as $row){
        $result[]= array("order_id"=>$row['order_id'],"trackingid"=>$row['trackingid'],
                    "order_box"=>$row['order_box'],"type_ship_name"=>$row['type_ship_name'],"order_sha1"=>$row['order_sha1']);
    }
    return $result;
}

function getListOrderFollow($db,$shipment_id)
{
    $stmt = $db->prepare("select
                          order_id,CONCAT((select tracking_code_prefix from system_infomation),order_id)as trackingid,order_box,type_ship_name
                          from orders
                          join type_ship on type_ship.type_ship_id=orders.type_ship_id
                          where order_status_id=3 and shipment_id=? order by order_id desc;");
    $stmt->execute(array($shipment_id));
    foreach($stmt->fetchAll() as $row){
        $result[]= array("order_id"=>$row['order_id'],"trackingid"=>$row['trackingid'],
            "order_box"=>$row['order_box'],"type_ship_name"=>$row['type_ship_name']);
    }
    return $result;
}

function getRecordWarehoure($db,$id)
{
    $stmt = $db->prepare("select listorder from warehoure where id=?;");
    $stmt->execute(array($id));
    foreach($stmt->fetchAll() as $row){
        return $row['listorder'];
    }
    return "";
}

function updateWarehoure($db,$listorder,$id)
{
    if($listorder=='')
    {
        $listorder=null;
    }
    $stmt = $db->prepare("update warehoure set listorder=? where id=?");
    $stmt->execute(array($listorder,$id));
    if($stmt->rowCount()>0)
    {
        return $listorder;
    }
    return $listorder;
}

function getorderdetailwarehoure($db,$listorder)
{
    try{
        $stmt = $db->prepare("select
                            order_id,CONCAT((select tracking_code_prefix from system_infomation),order_id)as trackingid,
                            customers.customer_country,consignees.consignee_country
                            from orders
                                join customers on customers.customer_id=orders.customer_id
                                join consignees on consignees.consignee_id=orders.consignee_id
                            where order_id in ($listorder) order by order_id desc");
        $stmt->execute();
        foreach($stmt->fetchAll() as $row){
            $customer_country=str_replace("us","US",$row['customer_country']);
            $consignee_country=str_replace("vn","VietNam",$row['consignee_country']);
            $results[]= array("order_id"=>$row['order_id'],"trackingid"=>$row['trackingid'],"customer_country"=>$customer_country,"consignee_country"=>$consignee_country);
        }
        return array("listorder"=>$results,"error"=>0,"counting"=>0,"message"=>"");
    }catch (Exception $e)
    {
        return array("listorder"=>'',"error"=>1,"counting"=>0,"message"=>"don't load data!");
    }
}