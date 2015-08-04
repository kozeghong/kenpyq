<?php
/**************************
    sendPost

    Input:
        content: POST
    Output:
        'success'
        'fail'

**************************/

require "permit.php";
require "conn.php";

$content = req_sec(isset($_POST['content']) ? $_POST['content'] : "");

if($content == ""){
    echo 'fail';
} else {
    $query = "INSERT INTO posts(uid, content, sendtime) VALUES('$my_uid','$content',UNIX_TIMESTAMP(NOW()))";
    mysql_query($query);
    $rowsnum = mysql_affected_rows();

    if($rowsnum > 0){
        echo 'success';
    } else {
        echo 'fail';
    }

}

?>