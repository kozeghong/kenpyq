<?php
/**************************
    sendComment

    Input:
        pid: POST
        mention: POST
        content: POST
    Output:
        'success'
        'fail'

**************************/

require "permit.php";
require "conn.php";

$pid = req_sec(isset($_POST['pid']) ? $_POST['pid'] : "");
$uid2 = req_sec(isset($_POST['mention']) ? $_POST['mention'] : "");
$content = req_sec(isset($_POST['content']) ? $_POST['content'] : "");
if($uid2==$my_uid)$uid2="0";

if(content == "" || uid2 == "" || pid == ""){
    echo 'fail';
} else {
    $query = "INSERT INTO comments(pid, uid, content, sendtime, uid2) VALUES('$pid', '$my_uid','$content',UNIX_TIMESTAMP(NOW()), '$uid2')";
    mysql_query($query);
    $addnew = mysql_affected_rows();
    if($addnew > 0){
        echo 'success';
    } else {
        echo 'fail';
    }
}

?>