<?php
/**
 * Created by PhpStorm.
 * User: huynhth
 * Date: 10/27/14
 * Time: 11:21 AM
 */
require 'includes/config.php';
require 'includes/function_checkdevice.php';
require 'includes/function_getprofile.php';
if(!empty($_POST['username']) && !empty($_POST['token']) && !empty($_POST['deviceid']))
{
    $username=$_POST['username'];
    $token=$_POST['token'];

    if(isValidToken($db,$username,$token))
    {
        $deviceid=$_POST['deviceid'];
        if(checkStatusDevice($db,$deviceid))
        {
            $results=getprofile($db,$username);
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