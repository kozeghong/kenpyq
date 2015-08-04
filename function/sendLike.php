<?php
/**************************
    sendLike

    Input:
        lastupdate: POST
    Output:
        'cancelled'
        'fail'
        'liked'

**************************/

require "permit.php";
require "conn.php";

$pid = req_sec(isset($_POST['pid']) ? $_POST['pid'] : "");

if(pid == ""){
    echo 'fail';
} else {
    $query = "SELECT * FROM `like` WHERE pid=$pid AND uid=$my_uid";
    $res = mysql_query($query);
    if($row = mysql_fetch_array($res)){
        $query = "DELETE FROM `like` WHERE pid=$pid AND uid=$my_uid";
        mysql_query($query);
        $cancelled = mysql_affected_rows();
        if($cancelled > 0){
            echo "cancelled";
        } else {
            echo "fail";
        }
    } else {
        $query = "INSERT INTO `like`(pid, uid, sendtime) VALUES('$pid', '$my_uid',UNIX_TIMESTAMP(NOW()))";
        mysql_query($query);
        $liked = mysql_affected_rows();
        if($liked > 0){
            echo "liked";
        } else {
            echo "fail";
        }
    }

}

?>