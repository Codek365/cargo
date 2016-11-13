<?php
/**
 * Created by PhpStorm.
 * User: huynhth
 * Date: 9/26/14
 * Time: 4:13 PM
 */
require 'includes/config.php';
//require 'includes/function_updatestatusorder.php';
require 'includes/function_checkdevice.php';
require 'includes/function_authentication.php';
if(!empty($_GET['token']) && !empty($_GET['username']) && !empty($_GET['deviceid']))
{
    $username=$_GET['username'];
    $token=$_GET['token'];
   if(isValidToken($db,$username,$token))
   {
       $deviceid=$_GET['deviceid'];
       if(checkStatusDevice($db,$deviceid))
       {
            $p=file_get_contents('php://input');
            $obj = json_decode($p);
            $orderstatusid=getOrderStatusId($db,"Shipping");
            if($orderstatusid!='')
            {
                $results=updateOrderStatus($db,$obj,$orderstatusid);
                header('Content-type: application/json');
                echo json_encode($results);
            }
       }
       else
       {
           $results= array("error"=>1,"message"=>"Your device not permission! ");
           header('Content-type: application/json');
           echo json_encode($results);
       }
   }
    else
    {
        $results= array("error"=>1,"message"=>"Authenticate your account incorrect! ");
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