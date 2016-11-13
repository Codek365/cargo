<?php
/**
 * Created by PhpStorm.
 * User: huynhth
 * Date: 1/10/15
 * Time: 3:20 PM
 */
include 'includes/config.php';
include 'includes/function_versionapp.php';

$result=getlistversionapp($db);
$results= array("listorder"=>$result,"error"=>0,"counting"=>0,"message"=>"");
header('Content-type: application/json');
echo json_encode($results);