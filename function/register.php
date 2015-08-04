<?php
/**************************
    Register

    Input:
        'usr': POST, username
        'psw': POST, password
    Output:
        'duplicate'
        'success'
        'fail'

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

    $query = "SELECT * FROM users WHERE username='".$usr."'";
    $res = mysql_query($query) or die(mysql_error());
    $rowsnum = mysql_num_rows($res);
    if($rowsnum > 0){
        echo 'duplicate';
    } else {
        $query="INSERT INTO users(username,password,nickname,gender,regdate) VALUES('$usr','$psw','$usr','1',NOW())";
        $res2=mysql_query($query) or die(mysql_error());
        $reg = mysql_affected_rows();
        if($reg > 0){
            echo 'success';
        }else{
            echo 'fail';
        }
    }

} else {
    echo 'fail';
}

?>