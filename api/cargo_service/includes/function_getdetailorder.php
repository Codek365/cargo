<?php
/**
 * Created by PhpStorm.
 * User: huynhth
 * Date: 10/4/14
 * Time: 11:21 PM
 */
function getorderid($db,$orderid,$listorderdetail)
{
    try{
    $stmt = $db->prepare("select CONCAT((select tracking_code_prefix from system_infomation),order_id)as trackingid,orders.order_message,
                        orders.order_creation_date, type_ship.type_ship_name,type_delivery.type_delivery_name,customers.customer_name,
                        customers.customer_phone,customers.customer_country,consignees.consignee_name,consignees.consignee_phone,
                        consignees.consignee_country
                        from orders left join type_ship on orders.type_ship_id=type_ship.type_ship_id
                        left join type_delivery on orders.type_delivery_id=type_delivery.type_delivery_id
                        left join customers on orders.customer_id=customers.customer_id
                        left join consignees on orders.consignee_id=consignees.consignee_id
                        where order_id=$orderid;");
    $stmt->execute();
    foreach($stmt->fetchAll() as $row){
        $trackingcode=$row['trackingid'];
        $ordermessage=$row['order_message'];
        $createdate=$row['order_creation_date'];
        $shiptype=$row['type_ship_name'];
        $deliverytye=$row['type_delivery_name'];
        $customername=$row['customer_name'];
        $customerphone=$row['customer_phone'];
        $customercountry=str_replace("us","USA",$row['customer_country']);
        $consigneename=$row['consignee_name'];
        $consigneephone=$row['consignee_phone'];
        $consigneecountry=str_replace("vn","VietNam",$row['consignee_country']);

         return array("trackingcode"=>$trackingcode,"ordermessage"=>$ordermessage,"createdate"=>$createdate,"shiptype"=>$shiptype,"deliverytye"=>$deliverytye,
                        "customername"=>$customername,"customerphone"=>$customerphone,"customercountry"=>$customercountry,"consigneename"=>$consigneename,
                        "consigneephone"=>$consigneephone,"consigneecountry"=>$consigneecountry,"listorderdetail"=>$listorderdetail,"error"=>0,"message"=>"");
    }
    return null;
    }catch (Exception $e)
    {
        return array("error"=>1,"message"=>"load data error!");
    }
}

function getorderdetail($db,$orderid)
{
    $stmt = $db->prepare("select order_detail_id,order_detail_description,order_detail_quantity from order_detail where order_id=?;");
    $stmt->execute(array($orderid));
    foreach($stmt->fetchAll() as $row){
        $result[]= array("detail_id"=>$row['order_detail_id'],"detail_description"=>$row['order_detail_description'],"detail_quantity"=>$row['order_detail_quantity']);
    }
    return $result;
}