<?php
/**
 * Created by PhpStorm.
 * User: huynhth
 * Date: 9/30/14
 * Time: 11:44 AM
 */
function getOrderStatusId($db,$statusname)
{
    $stmt = $db->prepare("select order_status_id from order_status where order_status_name=?");//order_status(order_status_name,order_status_notes
    $stmt->execute(array($statusname));
    foreach($stmt->fetchAll() as $row){
        return $row['order_status_id'];
    }
    return '';
}

function updateOrderStatus($db,$obj,$statusid)
{
    try{
        $db->beginTransaction();
        foreach($obj as $row){
            $orderid= $row->orderid;
            $status=$row->status;
            if($status==true)
            {
                $stmt = $db->prepare("update orders set order_status_id=? where order_id=?");
                $stmt->execute(array($statusid,$orderid));
            }
//            else
//            {
//                $stmt = $db->prepare("update orders set order_status_id=null where order_id=?");
//                $stmt->execute(array($orderid));
//            }
        }
        $db->commit();
        $results= array("error"=>0,"message"=>"Data save success");
    }catch (PDOException $e)
    {
        $db->rollBack();
        $results= array("error"=>1,"message"=>"Can not save data to system.");
    }
    return $results;
}