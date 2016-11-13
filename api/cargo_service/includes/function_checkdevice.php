<?php
/**
 * Created by PhpStorm.
 * User: huynhth
 * Date: 12/9/14
 * Time: 10:53 AM
 */
function isValidToken($db,$username,$token)
{
    $stmt = $db->prepare("select user_name from mb_tokens where user_name=? and token=?");
    $stmt->execute(array($username,$token));
    foreach($stmt->fetchAll() as $row){
        if($row['user_name']==$username)
        {
            return true;
        }
    }
    return false;
}

// check status device nếu return về false là device bị lock
function checkStatusDevice($db,$device_id)
{
    $stmt = $db->prepare("select device_name from mb_devices where device_id=? and device_status=?");
    $stmt->execute(array($device_id,false));
    if($stmt->rowCount()>0)
    {
        return true;
    }
    return false;
}
//update device as lock device
function updateStatusDevice($db,$device_id)
{
    $stmt = $db->prepare("update mb_devices set device_status=false where device_id=?");
    $stmt->execute(array($device_id));
    if($stmt->rowCount()>0)
    {
        return true;
    }
    return false;
}