<?php
/**************************
    sendFriend

    Input:
        usr2: POST
    Output:
        'notfound'
        'duplicate'
        'success'
        'fail'

**************************/

require "permit.php";
require "conn.php";

$usr2 = req_sec(isset($_POST['username']) ? $_POST['username'] : "");

if($usr2 == "" || $usr2 === $my_usr){
    echo 'fail';
} else {
    $query = "SELECT username,uid FROM users WHERE username='$usr2'";
    $res = mysql_query($query);
    $row = mysql_fetch_array($res);

    if(!$row){
        echo 'notfound';
    } else {
        $uid2 = $row['uid'];
        $query = "SELECT uid,uid2,permit FROM contacts WHERE uid='$my_uid' AND uid2='$uid2'";
        $res2 = mysql_query($query);
        $row2 = mysql_fetch_array($res2);

        if($row2){
            $permit = $row2['permit'];
            if($permit == 1){
                echo 'duplicate';
            } else {
                echo 'success';
            }
        } else {
            $query = "INSERT INTO contacts(uid,uid2,permit) VALUES('$my_uid','$uid2','0')";
            mysql_query($query);
            $rowsnum = mysql_affected_rows();

            if($rowsnum > 0){
                echo 'success';
            } else {
                echo 'fail';
            }

        }

    }

}

?>