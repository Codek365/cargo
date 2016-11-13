<?php
/**
 * Created by PhpStorm.
 * User: huynhth
 * Date: 12/27/14
 * Time: 11:48 AM
 */

function addstatusdevice($db,$device_id,$device_name,$username)
{
    $stmt = $db->prepare("insert into deviceonline(deviceid,devicename,username,`status`) values(?,?,?,?)");
    $stmt->execute(array($device_id,$device_name,$username,"on"));
    if($stmt->rowCount()>0)
    {
        return true;
    }
    return false;
}

function checkstatusdevice($db,$device_id)
{
    $stmt = $db->prepare("select deviceid from deviceonline where deviceid=?");
    $stmt->execute(array($device_id));
    foreach($stmt->fetchAll() as $row){
        if($row['deviceid']==$device_id)
        {
            return true;
        }
    }
    return false;
}

function updateStatusDevice($db,$device_id,$status)
{
    $stmt = $db->prepare("update deviceonline set `status`=? where deviceid=?");
    $stmt->execute(array($status,$device_id));
    if($stmt->rowCount()>0)
    {
        return true;
    }
    return false;
}

function statusdevice($db,$deviceid,$devicename,$status,$username)
{
    if(checkstatusdevice($db,$deviceid))
    {
       return updateStatusDevice($db,$deviceid,$status);
    }
    else{
       return addstatusdevice($db,$deviceid,$devicename,$username);
    }
}