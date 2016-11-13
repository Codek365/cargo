<?php
/**
 * Created by PhpStorm.
 * User: huynhth
 * Date: 11/18/14
 * Time: 9:53 AM
 */
function updateorderbox($db, $box, $lss, $orderid)
{
    try {
        $stmt = $db->prepare("update orders set order_box=?,order_ibs=? where order_id=?");
        $stmt->execute(array($box, $lss, $orderid));
        if ($stmt->rowCount() > 0) {
            return array("error" => 0, "message" => "Update data success!");
        }
        return array("error" => 0, "message" => "Data no change!");
    } catch (Exception $e) {
        return array("error" => 1, "counting" => 0, "message" => "Update failed!");
    }
}