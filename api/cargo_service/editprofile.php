<?php
/**
 * Created by PhpStorm.
 * User: huynhth
 * Date: 10/27/14
 * Time: 11:58 AM
 */

require 'includes/config.php';
//require 'includes/function_authentication.php';
require 'includes/function_getprofile.php';
require 'includes/function_checkdevice.php';
if(!empty($_POST['username']) && isset($_POST['passold']) && isset($_POST['pass']) && !empty($_POST['email']) && !empty($_POST['fullname'])
 && !empty($_POST['gender']) && !empty($_POST['phone']) && !empty($_POST['token']) && !empty($_POST['deviceid']))
{
    $username=$_POST['username'];
    $token=$_POST['token'];
    if(isValidToken($db,$username,$token))
    {
        $deviceid=$_POST['deviceid'];
        if(checkStatusDevice($db,$deviceid))
        {
            $passold=$_POST['passold'];
            $pass=$_POST['pass'];
            $email=$_POST['email'];
            $fullname=$_POST['fullname'];
            $gender=$_POST['gender'];
            $phone=$_POST['phone'];
            if($pass!=null)
            {
                $results=editProfilePass($db,$username,$email,$fullname,$gender,$phone,$passold,$pass);
            }
            else
            {
                editProfile($db,$username,$email,$fullname,$gender,$phone);
                $results= array("error"=>0,"message"=>"update profile info success!");
            }
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
    $results= array("error"=>1,"message"=>"Parameter not null!");
    header('Content-type: application/json');
    echo json_encode($results);
}