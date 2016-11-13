<?php
/**
 * Created by PhpStorm.
 * User: huynhth
 * Date: 1/5/15
 * Time: 12:13 PM
 */

include 'includes/config.php';
include 'includes/function_warehoure.php';
require 'includes/function_checkdevice.php';

if(!empty($_POST['username']) && !empty($_POST['token']) && !empty($_POST['deviceid']) && !empty($_POST['shipmentid']))
{
    $username=$_POST['username'];
    $token=$_POST['token'];

    if(isValidToken($db,$username,$token))
    {
        $deviceid=$_POST['deviceid'];
        if(checkStatusDevice($db,$deviceid))
        {
            $shipment_id=$_POST['shipmentid'];
            $result=getListOrderFollow($db,$shipment_id);
            $results= array("listorder"=>$result,"error"=>0,"counting"=>0,"message"=>"");
            header('Content-type: application/json');
            echo json_encode($results);
        }
        else
        {
            $results= array("error"=>1,"message"=>"Your device not permission!");
            header('Content-type: application/json');
            echo json_encode($results);
        }
    }
    else
    {
        $results= array("error"=>1,"message"=>"Authenticate your account incorrect!");
        header('Content-type: application/json');
        echo json_encode($results);
    }
}
else
{
    $results= array("error"=>1,"message"=>"Your device not permission!");
    header('Content-type: application/json');
    echo json_encode($results);
}