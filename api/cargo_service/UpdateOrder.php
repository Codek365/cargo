<?php
/**
 * Created by PhpStorm.
 * User: huynhth
 * Date: 11/18/14
 * Time: 9:52 AM
 */
include 'includes/config.php';
//include 'includes/function_authentication.php';
require 'includes/function_checkdevice.php';
include 'includes/function_updateorder.php';

if(!empty($_POST['username']) && !empty($_POST['token']) && !empty($_POST['deviceid'])
  && !empty($_POST['boxs']) && !empty($_POST['lss']) && !empty($_POST['orderid']))
{
    $username=$_POST['username'];
    $token=$_POST['token'];
    if(isValidToken($db,$username,$token))
    {
        $deviceid=$_POST['deviceid'];
        if(checkStatusDevice($db,$deviceid))
        {
            $boxs=$_POST['boxs'];
            $lss=$_POST['lss'];
            $orderid=$_POST['orderid'];
            $results=updateorderbox($db,$boxs,$lss,$orderid);
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
