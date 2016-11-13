<?php
/**
 * Created by PhpStorm.
 * User: huynhth
 * Date: 1/4/15
 * Time: 10:38 PM
 */

function updateStatusOperation($db,$orderid,$status,$shipmentid,$shipmentname)
{
    $stmt = $db->prepare("update orders set order_status_id=?, shipment_id=?,shipment_name=? where order_id=?");
    $stmt->execute(array($status,$shipmentid,$shipmentname,$orderid));
    if($stmt->rowCount()>0)
    {
        return true;
    }
    return false;
}
//status give shipment
function updateStatusShipment($db,$id,$status)
{
    $stmt = $db->prepare("UPDATE `shipment` SET `status`= WHERE `id`=?");
    $stmt->execute(array($status,$id));
    if($stmt->rowCount()>0)
    {
        return true;
    }
    return false;
}

function addShipmentOperation($db,$shipment_name,$current_date,$current_date_format)
{
    $stmt = $db->prepare("insert into shipment(shipment_name,`current_date`,current_date_formated) value(?,?,?)");
    $stmt->execute(array($shipment_name,$current_date,$current_date_format));
    if($stmt->rowCount()>0)
    {
        return true;
    }
    else
    {
        return false;
    }
}

function getListShipmentOperration($db)
{
    $stmt = $db->prepare("select id,shipment_name,`current_date`,current_date_formated,status from shipment");
    $stmt->execute();
    foreach($stmt->fetchAll() as $row){
        $result[]= array("id"=>$row['id'],"shipment_name"=>$row['shipment_name'],"current_date"=>$row['current_date'],
            "current_date_formated"=>$row['current_date_formated'],"status"=>$row['status']);
    }
    return $result;
}

function getShipmentName($db,$currentdate)
{
    $stmt = $db->prepare("select id,shipment_name,`current_date`,current_date_formated from shipment where `current_date`=? order by shipment_name desc limit 1");
    $stmt->execute(array($currentdate));
    if($stmt->rowCount()>0)
    {
        foreach($stmt->fetchAll() as $row){
            $shipmentname=explode("-",$row['shipment_name']);
            return $currentdate."-".($shipmentname[1]+1);
        }
    }
    else
    {
        return $currentdate."-"."1";
    }
    return "";
}