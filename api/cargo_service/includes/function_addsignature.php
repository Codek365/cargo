<?php
/**
 * Created by PhpStorm.
 * User: huynhth
 * Date: 12/16/14
 * Time: 10:57 AM
 */
function addimagesignature($db,$imagename,$orderid)
{
    $stmt = $db->prepare("insert into signatures(imagename,orderid) value(?,?)");
    $stmt->execute(array($imagename,$orderid));
    if($stmt->rowCount()>0)
    {
        return true;
    }
    else
    {
        return false;
    }
}