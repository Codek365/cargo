<?php
/**
 * Created by PhpStorm.
 * User: huynhth
 * Date: 2/3/15
 * Time: 3:36 PM
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
        $id=$_POST['id'];
        $status=$_POST['status'];
        if(checkStatusDevice($db,$deviceid))
        {
            if(updateStatusShipment($db,$id,$status))
            {
                $results= array("error"=>0,"counting"=>0,"message"=>"success");
                header('Content-type: application/json');
                echo json_encode($results);
            }else{
                $results= array("error"=>1,"counting"=>0,"message"=>"failed");
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