<?php
/**
 * Created by PhpStorm.
 * User: huynhth
 * Date: 1/5/15
 * Time: 10:20 AM
 */
include 'includes/config.php';
include 'includes/function_operations.php';
require 'includes/function_checkdevice.php';
$currentdate= date('m/d/Y',time()+((-8)*3600));
$replacedate=str_replace("/","",$currentdate);
if(!empty($_POST['username']) && !empty($_POST['token']) && !empty($_POST['deviceid']))
{
    $username=$_POST['username'];
    $token=$_POST['token'];
    if(isValidToken($db,$username,$token))
    {
        $deviceid=$_POST['deviceid'];
        if(checkStatusDevice($db,$deviceid))
        {
            $replacedate=str_replace("/","",$currentdate);
            $shipment_name=getShipmentName($db,$replacedate);
            $result=addShipmentOperation($db,$shipment_name,$replacedate,$currentdate);
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