<?php
/**
 * Created by PhpStorm.
 * User: huynhth
 * Date: 10/4/14
 * Time: 12:07 AM
 */
require 'includes/config.php';
//require 'includes/function_getdetailorder.php';
require 'includes/function_checkdevice.php';
require 'includes/function_authentication.php';
if(!empty($_POST['username']) && !empty($_POST['token']) && !empty($_POST['deviceid']))
{
    $username=$_POST['username'];
    $token=$_POST['token'];
    if(isValidToken($db,$username,$token))
    {
        $deviceid=$_POST['deviceid'];
        if(checkStatusDevice($db,$deviceid))
        {
            $orderid=$_POST['orderid'];
            $listdetailorder=getorderdetail($db,$orderid);
            $results=getorderid($db,$orderid,$listdetailorder);
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