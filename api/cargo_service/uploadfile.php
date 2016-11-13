<?php
/**
 * Created by JetBrains PhpStorm.
 * User: HUYNHTH
 * Date: 20/06/13
 * Time: 1:18 PM
 * To change this template use File | Settings | File Templates.
 */
include 'includes/config.php';
include 'includes/function_addimageorder.php';
$file_path = "../../images/";
$filename=basename( $_FILES['uploaded_file']['name']);
$file_path = $file_path . basename( $_FILES['uploaded_file']['name']);
if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $file_path)) {
    $array=explode("_",$filename);
    $orderid=str_replace(".jpg","",$array[3]);
    if(addimage($db,$filename,trim($orderid)))
    {
        echo "success";
    }
    else
        echo "failed";

} else{
    echo "failed";
}
