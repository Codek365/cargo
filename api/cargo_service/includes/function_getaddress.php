<?php
/**
 * Created by PhpStorm.
 * User: huynhth
 * Date: 11/6/14
 * Time: 10:17 AM
 */
function getaddress($db,$sha1)
{
    $stmt = $db->prepare("select
                          order_id,customer_name,customer_address,customer_city,customer_phone,
                          consignee_name,consignee_address,consignee_city,consignee_phone
                          from orders
                          join consignees on orders.consignee_id=consignees.consignee_id
                          join customers on orders.customer_id=customers.customer_id where orders.order_sha1=?;");
    $stmt->execute(array($sha1));
    foreach($stmt->fetchAll() as $row){
        $result= array("order_id"=>$row['order_id'],"customer_name"=>$row['customer_name'],"customer_address"=>$row['customer_address'],
                        "customer_city"=>$row['customer_city'],"customer_phone"=>$row['customer_phone'],
                        "consignee_name"=>$row['consignee_name'],"consignee_address"=>$row['consignee_address'],
                        "consignee_city"=>$row['consignee_city'],"consignee_phone"=>$row['consignee_phone'],"error"=>0,"message"=>"");
        return $result;
    }
    return array("error"=>1,"message"=>"not found data!");
}