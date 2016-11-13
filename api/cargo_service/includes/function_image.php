<?php
/**
 * Created by PhpStorm.
 * User: huynhth
 * Date: 11/27/14
 * Time: 9:22 AM
 */

function getListImageOrder($db,$order_id)
{
    try{
        $stmt = $db->prepare("select id,file_name,comment from order_image where order_id=? order by id desc");
        $stmt->execute(array($order_id));
        foreach($stmt->fetchAll() as $row){
            $results[]= array("id"=>$row['id'],"file_name"=>$row['file_name'],"comment"=>$row['comment']);
        }
        return array("listorder"=>$results,"error"=>0,"counting"=>0,"message"=>"");
    }catch (Exception $e)
    {
        return array("listorder"=>'',"error"=>1,"counting"=>0,"message"=>"don't found data!");
    }
}

function getListImageOrderQRcode($db,$qrcode)
{
    try{
        $stmt = $db->prepare("select id,file_name,`comment` from order_image join orders on order_image.order_id=orders.order_id where  order_sha1=? order by id desc");
        $stmt->execute(array($qrcode));
        foreach($stmt->fetchAll() as $row){
            $results[]= array("id"=>$row['id'],"file_name"=>$row['file_name'],"comment"=>$row['comment']);
        }
        return array("listorder"=>$results,"error"=>0,"counting"=>0,"message"=>"");
    }catch (Exception $e)
    {
        return array("listorder"=>'',"error"=>1,"counting"=>0,"message"=>"don't found data!");
    }
}

function deleteImage($db,$img_id,$img_name)
{
    $stmt = $db->prepare("delete from order_image where id=?;");
    $stmt->execute(array($img_id));
    if($stmt->rowCount()>0)
    {
        return true;
    }
    else
    {
        return false;
    }
}
