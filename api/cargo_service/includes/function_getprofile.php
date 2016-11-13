<?php
/**
 * Created by PhpStorm.
 * User: huynhth
 * Date: 10/27/14
 * Time: 11:25 AM
 */
function getprofile($db,$username)
{
    $stmt = $db->prepare("select user_email,user_fullname,user_gender,user_phone from users where user_username=?;");
    $stmt->execute(array($username));
    foreach($stmt->fetchAll() as $row){
        $result= array("user_email"=>$row['user_email'],"user_fullname"=>$row['user_fullname'],"user_gender"=>$row['user_gender'],"user_phone"=>$row['user_phone'],"error"=>0,"message"=>"");
    }
    return $result;
}

function checkExistPass($db,$passold,$username)
{
    $stmt = $db->prepare("select user_username from users where user_password=? and user_username=?");
    $stmt->execute(array(md5($passold),$username));
    if($stmt->rowCount()>0)
    {
        return true;
    }
    return false;
}
function editProfilePass($db,$username,$email,$fullname,$gender,$phone,$passold,$pass)
{
    if(checkExistPass($db,$passold,$username))
    {
        $stmt = $db->prepare("update users set user_password=?,user_email=?,user_fullname=?,user_gender=?,user_phone=? where user_username=?");
        $stmt->execute(array(md5($pass),$email,$fullname,$gender,$phone,$username));
        if($stmt->rowCount()>0)
        {
            $results= array("error"=>0,"message"=>"update profile info success!");
        }
        else
        {
            $results= array("error"=>1,"message"=>"Profile update failed!");
        }
    }
    else
    {
        $results= array("error"=>1,"message"=>"Password old incorrect!");
    }
    return $results;
}

function editProfile($db,$username,$email,$fullname,$gender,$phone)
{
    $stmt = $db->prepare("update users set user_email=?,user_fullname=?,user_gender=?,user_phone=? where user_username=?");
    $stmt->execute(array($email,$fullname,$gender,$phone,$username));
    if($stmt->rowCount()>0)
    {
        return true;
    }
    return false;
}