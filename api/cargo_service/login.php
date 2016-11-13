<?php
/**
 * Created by PhpStorm.
 * User: huynhth
 * Date: 9/23/14
 * Time: 12:38 PM
 */
require 'includes/config.php';
require 'includes/function_authentication.php';

if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['deviceid'])) {
    $u = $_POST['username'];
    $p = $_POST['password'];
    $device = $_POST['deviceid'];
    if (checkStatusDevice($db, $device)) {
        $results = checkLogin($db, $u, $p, $device);
        header('Content-type: application/json');
        echo json_encode($results);
    } else {
        addtoken($db,$u,"",$device);
        $results = array("error" => 1, "message" => "Your device not permission!");
        header('Content-type: application/json');
        echo json_encode($results);
    }
}


