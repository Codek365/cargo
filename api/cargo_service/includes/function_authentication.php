<?php
/**
 * Created by PhpStorm.
 * User: huynhth
 * Date: 9/23/14
 * Time: 12:24 PM
 */

function generateToken()
{
    $hash = md5(mt_rand(1, 1000000) );
    return $hash;
}

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

function addtoken($db,$username,$token,$device_id)
{
    $currentdate= date('Y-m-d H:i:s',time()+((-8)*3600));
    $stmt = $db->prepare("insert into mb_tokens(user_name,token,device_id,create_date) values(?,?,?,?)");
    $stmt->execute(array($username,$token,$device_id,$currentdate));
    if($stmt->rowCount()>0)
    {
        return $token;
    }
    return '';
}
// check login
function login($db,$username,$password)
{
    $stmt = $db->prepare("select user_username from users where user_username=? and user_password=? and user_type=1");
    $stmt->execute(array($username,$password));
    foreach($stmt->fetchAll() as $row){
        if($row['user_username']==$username)
        {
            return true;
        }
    }
    return false;
}
//get permission
function getpermission($db,$username)
{
    $stmt = $db->prepare("select user_username,user_groupmobile from users where user_username=?");
    $stmt->execute(array($username));
    foreach($stmt->fetchAll() as $row){
        if($row['user_username']==$username)
        {
            return $row['user_groupmobile'];
        }
    }
    return '';
}

//check login
/*
 * check login
 * true=> get token, get permission name, insert token to table token
 *
 */
function checkLogin($db,$username,$password,$device_id)
{
    if(login($db,$username,$password))
    {
        $token=generateToken();
        $permission_name=getpermission($db,$username);
        $tokensave=addtoken($db,$username,$token,$device_id);
        if($tokensave!='')
        {
            return array("token"=>$tokensave,"permission"=>$permission_name,"error"=>0,"message"=>"Login success.");
        }
    }
    return array("token"=>'',"permission"=>'',"error"=>1,"message"=>"Login failed, please login again!");
}