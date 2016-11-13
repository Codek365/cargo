<?php
/**
 * Created by PhpStorm.
 * User: huynhth
 * Date: 12/13/14
 * Time: 11:31 AM
 */
$file_path = "images/";
$filename=basename( $_FILES['uploaded_file']['name']);
$file_path = $file_path . basename( $_FILES['uploaded_file']['name']);
if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $file_path)) {
    echo $filename;
} else{
    echo "failed";
}