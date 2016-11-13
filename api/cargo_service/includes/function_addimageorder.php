<?php
/**
 * Created by PhpStorm.
 * User: huynhth
 * Date: 11/14/14
 * Time: 2:16 PM
 */
function addimage($db,$imagename,$orderid,$comment)
{
    $stmt = $db->prepare("insert into order_image(file_name,order_id,comment) value(?,?,?)");
    $stmt->execute(array($imagename,$orderid,$comment));
    if($stmt->rowCount()>0)
    {
        return true;
    }
    else
    {
        return false;
    }
}