<?php
/**
 * Created by PhpStorm.
 * User: huynhth
 * Date: 12/27/14
 * Time: 11:58 AM
 */
include 'includes/config.php';
include 'includes/function_checkonoff.php';
if(!empty($_POST['deviceid']) && !empty($_POST['devicename']) && !empty($_POST['status']) && !empty($_POST['username']))
{
    $deviceid=$_POST['deviceid'];
    $devicename=$_POST['devicename'];
    $status=$_POST['status'];
    $username=$_POST['username'];
    if(statusdevice($db,$deviceid,$devicename,$status,$username))
    {
        $results= array("error"=>0,"message"=>"success");
        header('Content-type: application/json');
        echo json_encode($results);
    }else{
        $results= array("error"=>1,"message"=>"failed");
        header('Content-type: application/json');
        echo json_encode($results);
    }
}