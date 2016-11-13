<?php
/**
 * Created by PhpStorm.
 * User: huynhth
 * Date: 12/13/14
 * Time: 2:58 PM
 */
include 'includes/config.php';
include 'includes/function_addimageorder.php';
require 'includes/function_checkdevice.php';
if(!empty($_POST['username']) && !empty($_POST['token']) && !empty($_POST['deviceid']) && !empty($_POST['filename']) && !empty($_POST['orderid']))
{
    $username=$_POST['username'];
    $token=$_POST['token'];
    if(isValidToken($db,$username,$token))
    {
        $deviceid=$_POST['deviceid'];
        if(checkStatusDevice($db,$deviceid))
        {
            $filename=$_POST['filename'];
            $orderid=$_POST['orderid'];
            $comment=$_POST['comment'];
            if(addimage($db,$filename,trim($orderid),$comment))
            {
                $results= array("error"=>0,"message"=>"success");
                header('Content-type: application/json');
                echo json_encode($results);
            }
            else{
                $results= array("error"=>1,"message"=>"failed");
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