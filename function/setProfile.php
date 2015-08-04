<?php
/**************************
    setProfile

    Input:
        'nickname': POST
        'gender': POST
        'whatsup': POST
        'region': POST
    Output:
        'success'
        'fail'

**************************/

require "permit.php";
require "conn.php";

$nickname = req_sec(isset($_POST['nickname']) ? $_POST['nickname'] : "");
$gender = req_sec(isset($_POST['gender']) ? $_POST['gender'] : "");
$whatsup = req_sec(isset($_POST['whatsup']) ? $_POST['whatsup'] : "");
$region = req_sec(isset($_POST['region']) ? $_POST['region'] : "");

$usrstr = req_sec(isset($_SESSION['username']) ? $_SESSION['username'] : "");
if($nickname != "" && $gender != ""){
    $query = "UPDATE `users` SET  `nickname` =  '$nickname', `gender` =  '$gender', `whatsup` =  '$whatsup', `region` =  '$region' WHERE  `uid` =$my_uid";
    $res = mysql_query($query);
    if($res){
        $_SESSION['nickname'] = $nickname;
        echo 'success';
    } else {
        echo 'fail';
    }
} else {
    echo 'fail';
}

?>