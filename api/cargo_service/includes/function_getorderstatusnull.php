<?php
/**
 * Created by PhpStorm.
 * User: huynhth
 * Date: 11/14/14
 * Time: 4:26 PM
 */

function getorderstatusnull($db,$offSet,$pageSize)
{
    try{
        $stmt = $db->prepare("select
                            order_id,CONCAT((select tracking_code_prefix from system_infomation),order_id)as trackingid,order_creation_date,
                            customers.customer_country,consignees.consignee_country
                            from orders
                                join customers on customers.customer_id=orders.customer_id
                                join consignees on consignees.consignee_id=orders.consignee_id
                            where order_status_id is null or order_status_id=1 or order_status_id=2  order by order_id desc LIMIT $offSet,$pageSize");
        $stmt->execute();
        foreach($stmt->fetchAll() as $row){
            $currentdate= date('m/d/Y',$row['order_creation_date']+((-8)*3600));
            $customer_country=str_replace("us","US",$row['customer_country']);
            $consignee_country=str_replace("vn","VietNam",$row['consignee_country']);
            $results[]= array("order_id"=>$row['order_id'],"trackingid"=>$row['trackingid'],"customer_country"=>$customer_country,"consignee_country"=>$consignee_country,"currentdate"=>$currentdate);
        }
        return array("listorder"=>$results,"error"=>0,"counting"=>0,"message"=>"");
    }catch (Exception $e)
    {
        return array("listorder"=>'',"error"=>1,"counting"=>0,"message"=>"don't load data!");
    }
}

function searchOrder($db,$orderid)
{
    try{
        $stmt = $db->prepare("select
                            order_id,CONCAT((select tracking_code_prefix from system_infomation),order_id)as trackingid,
                            customers.customer_country,consignees.consignee_country
                            from orders
                                join customers on customers.customer_id=orders.customer_id
                                join consignees on consignees.consignee_id=orders.consignee_id
                            where order_sha1=? order by order_id desc");
        $stmt->execute(array($orderid));
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