<?php
/**
 * Created by PhpStorm.
 * User: huynhth
 * Date: 10/30/14
 * Time: 9:28 AM
 */
function getnotification($db,$username)
{
    $stmt = $db->prepare("SELECT id,title,content FROM notification where username=? or username='all' order by id desc limit 10;");
    $stmt->execute(array($username));
    foreach($stmt->fetchAll() as $row){
        $result[]= array("id"=>$row['id'],"title"=>$row['title'],"content"=>$row['content']);
    }
    return $result;
}