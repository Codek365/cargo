<?php
/**
 * Created by PhpStorm.
 * User: huynhth
 * Date: 10/30/14
 * Time: 9:28 AM
 */
require 'includes/config.php';
//require 'includes/function_authentication.php';
require 'includes/function_checkdevice.php';
require 'includes/function_notification.php';
if(!empty($_POST['username']) && !empty($_POST['token']) && !empty($_POST['deviceid']))
{
    $username=$_POST['username'];
    $token=$_POST['token'];

    if(isValidToken($db,$username,$token))
    {
        $deviceid=$_POST['deviceid'];
        if(checkStatusDevice($db,$deviceid))
        {
            $results=getnotification($db,$username);
            header('Content-type: application/json');
            echo json_encode(array("listorder"=>$results,"error"=>0,"counting"=>$couting,"message"=>""));
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