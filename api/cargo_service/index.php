<?php
/**
 * Created by PhpStorm.
 * User: huynhth
 * Date: 12/9/14
 * Time: 11:05 AM
 */

error_reporting(0);
define('_URL','http://' . $_SERVER['HTTP_HOST']);
define('_BASE', $_SERVER['DOCUMENT_ROOT']);
//require 'pdo.class.php';
try{
$_host='localhost';
$_db = 'adongcar_db';	// host and database name
$_user='adongcar_ad';
			// database user

$_pass = 'pvS(@ho(%rT{';
//    echo 'ok';// database password

//    $db = new PDO("mysql:host={$_host};dbname={$_db}", $_user, $_pass, array( PDO::ATTR_PERSISTENT => true));
//    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    $db->exec('SET NAMES utf8');
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=adongcar_db', $user, $pass);
        foreach($dbh->query('SELECT * from FOO') as $row) {
            print_r($row);
        }
        $dbh = null;
        print_r("ok");
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }

}
catch (PDOException $ex){
    echo "Connection error: ".$ex->getMessage();
}
echo "ok";
