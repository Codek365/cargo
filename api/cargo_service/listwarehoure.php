<?php
/**
 * Created by PhpStorm.
 * User: huynhth
 * Date: 11/24/14
 * Time: 11:10 PM
 */
include 'includes/config.php';
//require 'includes/function_authentication.php';
require 'includes/function_checkdevice.php';
include 'includes/function_warehoure.php';
if(!empty($_POST['username']) && !empty($_POST['token']) && !empty($_POST['deviceid']) && !empty($_POST['listorder']))
{
    $username=$_POST['username'];
    $token=$_POST['token'];

    if(isValidToken($db,$username,$token))
    {
        $deviceid=$_POST['deviceid'];
        if(checkStatusDevice($db,$deviceid))
        {
            $lsorder=$_POST['listorder'];
            $results=getorderdetailwarehoure($db,$lsorder);
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
