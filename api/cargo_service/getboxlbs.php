<?php
/**
 * Created by PhpStorm.
 * User: huynhth
 * Date: 1/16/15
 * Time: 4:47 PM
 */
include 'includes/config.php';
include 'includes/function_getorder.php';
if(!empty($_POST['orderid']))
{
    $orderid=$_POST['orderid'];
    $result=get_box_lbs($db,$orderid);
    header('Content-type: application/json');
    echo json_encode($result);
}
else{
    $result=array("error"=>1,"counting"=>"","message"=>"");
    header('Content-type: application/json');
    echo json_encode($result);
}