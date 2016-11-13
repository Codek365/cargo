<?php
/**
 * Created by JetBrains PhpStorm.
 * User: minhthang
 * Date: 8/2/12
 * Time: 3:34 PM
 * To change this template use File | Settings | File Templates.
 */
 error_reporting(0);
define('_URL','http://' . $_SERVER['HTTP_HOST']);
define('_BASE', $_SERVER['DOCUMENT_ROOT']);
//require 'pdo.class.php';
$_host='localhost';
$_db = 'adongcar_db';	// host and database name
$_user='adongcar_ad';				// database user
$_pass = 'G{,z4TT-RoN!';			// database password

try{
    $db = new PDO("mysql:host={$_host};dbname={$_db}", $_user, $_pass, array( PDO::ATTR_PERSISTENT => true));
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec('SET NAMES utf8');
}
catch (PDOException $ex){
    echo "Connection error: ";
}
