<?php
/**
 * Created by PhpStorm.
 * User: huynhth
 * Date: 1/10/15
 * Time: 3:17 PM
 */
function getlistversionapp($db)
{
    $stmt = $db->prepare("select id,nameapp,version,packagename,linkapp,modify_date from list_update_app");
    $stmt->execute();
    foreach($stmt->fetchAll() as $row){
        $result[]= array("id"=>$row['id'],"nameapp"=>$row['nameapp'],"version"=>$row['version'],"packagename"=>$row['packagename'],
                        "linkapp"=>$row['linkapp'],"modify_date"=>$row['modify_date']);
    }
    return $result;
}