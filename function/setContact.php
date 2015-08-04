<?php
/**************************
    setContact

    Input:
        uid: POST
    Output:
        'success'
        'fail'

**************************/

require "permit.php";
require "conn.php";

$uid = req_sec(isset($_POST['uid']) ? $_POST['uid'] : "");
if($uid == ""){
    echo 'fail';
} else {
    $query = "UPDATE `contacts` SET  `permit` = '1' WHERE (`uid2` =$my_uid AND `uid` =$uid)OR(`uid` =$my_uid AND `uid2` =$uid)";
    mysql_query($query);
    $rowsnum = mysql_affected_rows();
    if($rowsnum > 0){
        if($rowsnum == 1){
            $query = "INSERT INTO contacts(uid,uid2,permit) VALUES('$my_uid','$uid','1')";
            mysql_query($query);
        }
        echo 'success';
    } else {
        echo 'fail';
    }
}

?>