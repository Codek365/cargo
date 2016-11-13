<?php
/**
 * Created by PhpStorm.
 * User: huynhth
 * Date: 1/4/15
 * Time: 10:48 PM
 */
include 'includes/config.php';
include 'includes/function_operations.php';
require 'includes/function_checkdevice.php';

if(!empty($_POST['username']) && !empty($_POST['token']) && !empty($_POST['deviceid']))
{
    $username=$_POST['username'];
    $token=$_POST['token'];

    if(isValidToken($db,$username,$token))
    {
        $deviceid=$_POST['deviceid'];
        if(checkStatusDevice($db,$deviceid))
        {
            $result=getListShipmentOperration($db);
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