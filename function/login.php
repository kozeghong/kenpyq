<?php
/**************************
    Login

    Input:
        'usr': POST, username
        'psw': POST, password
    Output:
        'success'
        'password'
        'username'

**************************/

session_start();
if (isset($_SESSION['username'])) {
    echo 'Unauthorized Access';
    exit;
}

require "conn.php";

$usr = req_sec(isset($_POST['usr']) ? $_POST['usr'] : "");
$psw = req_sec(isset($_POST['psw']) ? $_POST['psw'] : "");

if($usr != "" && $psw != ""){
    $query = "SELECT * FROM users WHERE username='$usr'";
    $res = mysql_query($query) or die(mysql_error());
    $row = mysql_fetch_array($res);
    if($row){
        $password = $row['password'];
        if($psw===$password){
            $_SESSION['username'] = $usr;
            $_SESSION['uid'] = $row['uid'];
            $_SESSION['nickname'] = $row['nickname'];
            setcookie(session_name(),session_id(),time()+18000,'/');
            echo 'success';
        } else {
            echo 'password';
        }
    } else {
        echo 'username';
    }
}
?>