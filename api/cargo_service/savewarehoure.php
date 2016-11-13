<?php
/**
 * Created by PhpStorm.
 * User: huynhth
 * Date: 11/25/14
 * Time: 12:24 AM
 */
include 'includes/config.php';
//require 'includes/function_authentication.php';
require 'includes/function_checkdevice.php';
include 'includes/function_warehoure.php';
if(!empty($_POST['username']) && !empty($_POST['token']) && !empty($_POST['deviceid'])&& !empty($_POST['id'])&& !empty($_POST['listorder']))
{
    $username=$_POST['username'];
    $token=$_POST['token'];

    if(isValidToken($db,$username,$token))
    {
        $deviceid=$_POST['deviceid'];
        if(checkStatusDevice($db,$deviceid))
        {
            $id=$_POST['id'];
            $listorder=$_POST['listorder'];
            $strdb=getRecordWarehoure($db,$id);
            $strarraydb=explode(',',$strdb);
            $array =explode(",",$listorder);
            if(count($array)>0)
            {
                $str=null;
                foreach($strarraydb as $r)
                {
                    if (in_array($r, $array)) {
                       // echo 'this array contains kitchen'.$r;

                    }
                    else
                    {
                        $str.=$r.",";
                    }
                }
                if($str!=null)
                {
                    $str=substr($str,0,strlen($str)-1);
                }
            //    echo $str;
                $listid=updateWarehoure($db,$str,$id);
                $results= array("listorder"=>$listid,"error"=>0,"message"=>"ok");
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