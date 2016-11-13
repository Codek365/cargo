<?php
/**
 * Created by PhpStorm.
 * User: huynhth
 * Date: 10/3/14
 * Time: 2:14 AM
 */
require 'includes/config.php';
require 'includes/function_getorder.php';
//require 'includes/function_authentication.php';
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
            $pageIndex = 0;
            $pageSize = -1;
            if (isset($_POST['p']) && is_numeric($_POST['p'])) {
                $pageIndex = intval($_POST['p']);
                if (isset($_POST['ps']) && is_numeric($_POST['ps'])) {
                    $pageSize = intval($_POST['ps']);
                }
            }
            if ($pageSize == -1) {
                $pageSize = 20;
            }
            $offSet = $pageIndex * $pageSize;

            $couting= countOrderStoreMainVN($db);
            $results=getListOrderStoreMainVN($db,$couting,$offSet,$pageSize);
            header('Content-type: application/json');
            echo json_encode($results);
        }
        else
        {
            $results= array("listorder"=>'',"error"=>1,"counting"=>0,"message"=>"Your device not permission!");
            header('Content-type: application/json');
            echo json_encode($results);
        }
    }
    else
    {
        $results= array("listorder"=>'',"error"=>1,"counting"=>0,"message"=>"Authenticate your account incorrect!");
        header('Content-type: application/json');
        echo json_encode($results);
    }
}
