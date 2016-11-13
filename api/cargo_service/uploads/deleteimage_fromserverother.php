<?php
/**
 * Created by PhpStorm.
 * User: huynhth
 * Date: 12/13/14
 * Time: 5:19 PM
 */
if(!empty($_POST['imgage_name']))
{
    $img_name=$_POST['imgage_name'];
    if (file_exists("images/".$img_name)) {
        unlink("images/".$img_name);
        $results= array("error"=>0,"message"=>"Move image from server success!");
        header('Content-type: application/json');
        echo json_encode($results);
    }
    else
    {
        $results= array("error"=>1,"message"=>$img_name);
        header('Content-type: application/json');
        echo json_encode($results);
    }
}