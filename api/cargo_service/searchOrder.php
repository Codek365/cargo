<?php
/**
 * Created by PhpStorm.
 * User: huynhth
 * Date: 11/14/14
 * Time: 5:12 PM
 */
require 'includes/config.php';
//require 'includes/function_authentication.php';
require 'includes/function_checkdevice.php';
require 'includes/function_getorderstatusnull.php';
if(!empty($_POST['username']) && !empty($_POST['token']) && !empty($_POST['deviceid'])&& !empty($_POST['code']))
{
    $username=$_POST['username'];
    $token=$_POST['token'];

    if(isValidToken($db,$username,$token))
    {
        $deviceid=$_POST['deviceid'];
        if(checkStatusDevice($db,$deviceid))
        {
            $code=$_POST['code'];
            $results=searchOrder($db,$code);
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