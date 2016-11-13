<?php
/**
 * Created by PhpStorm.
 * User: huynhth
 * Date: 1/5/15
 * Time: 2:20 PM
 */
include 'includes/config.php';
include 'includes/function_operations.php';
require 'includes/function_checkdevice.php';

if(!empty($_POST['username']) && !empty($_POST['token']) && !empty($_POST['deviceid']) && !empty($_POST['orderid']) && !empty($_POST['shipmentid']) && !empty($_POST['status']))
{
    $username=$_POST['username'];
    $token=$_POST['token'];

    if(isValidToken($db,$username,$token))
    {
        $deviceid=$_POST['deviceid'];
        if(checkStatusDevice($db,$deviceid))
        {
            $orderid=$_POST['orderid'];
            $status=$_POST['status'];
            $shipmentid=$_POST['shipmentid'];
            $shipmentname=$_POST['shipmentname'];
            $result=updateStatusOperation($db,$orderid,$status,$shipmentid,$shipmentname);
            if($result)
            {
                $results= array("error"=>0,"message"=>"success!");
            }
            else
            {
                $results= array("error"=>1,"message"=>"failed!");
            }
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