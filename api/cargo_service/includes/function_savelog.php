<?php
/**
 * Created by PhpStorm.
 * User: huynhth
 * Date: 11/24/14
 * Time: 4:21 PM
 */

function savelog($db,$message)
{
    $stmt = $db->prepare("insert into savelog(content) value(?)");
    $stmt->execute(array($message));
    if($stmt->rowCount()>0)
    {
        return true;
    }
    else
    {
        return false;
    }
}