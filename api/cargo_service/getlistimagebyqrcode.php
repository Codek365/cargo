<?php
/**
 * Created by PhpStorm.
 * User: huynhth
 * Date: 1/12/15
 * Time: 6:01 PM
 */
include 'includes/config.php';
//require 'includes/function_authentication.php';
require 'includes/function_checkdevice.php';
include 'includes/function_image.php';
if(!empty($_POST['username']) && !empty($_POST['token']) && !empty($_POST['deviceid'])&& !empty($_POST['orderid']))
{
    $username=$_POST['username'];
    $token=$_POST['token'];

    if(isValidToken($db,$username,$token))
    {
        $deviceid=$_POST['deviceid'];
        if(checkStatusDevice($db,$deviceid))
        {
            $orderid=$_POST['orderid'];
            $results=getListImageOrderQRcode($db,$orderid);
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