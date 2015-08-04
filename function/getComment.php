<?php
/**************************
    sendComment

    Input:
        pid: POST
    Output:
        HTML

**************************/

require "permit.php";
require "conn.php";

$pid = req_sec(isset($_POST['pid']) ? $_POST['pid'] : "");
if($pid=="")exit;

$query = "SELECT * FROM comments WHERE pid='$pid' AND deleted='0' AND (uid IN (SELECT uid FROM contacts WHERE uid2=$my_uid AND permit=1) OR uid=$my_uid)AND(uid2 IN (SELECT uid FROM contacts WHERE uid2=$my_uid AND permit=1) OR uid2=0 OR uid2=$my_uid) ORDER BY sendtime ASC";
$res = mysql_query($query);
while($row = mysql_fetch_array($res)){
    $uid = $row['uid'];
    $uid2 = $row['uid2'];
    $content = $row['content'];
    $replystr = "";
    if($uid != $my_uid){
        $replystr = "class='reply' ";
    }
    $query = "SELECT * FROM users WHERE uid='$uid'";
    $res2 = mysql_query($query);
    if($row2 = mysql_fetch_array($res2)){
        $nickname = $row2['nickname'];

        if($uid2!=0){
            $query = "SELECT * FROM users WHERE uid='$uid2'";
            $res3 = mysql_query($query);

            if($row3 = mysql_fetch_array($res3)){
                $nickname2 = $row3['nickname'];
                echo "<p ".$replystr."nick='".$nickname."' uid='".$uid."'><span>".$nickname."</span>回复 <span>".$nickname2."</span>: ".$content."</p>";
            }

        } else {
            echo "<p ".$replystr."nick='".$nickname."' uid='".$uid."'><span>".$nickname."</span>: ".$content."</p>";
        }

    }
}

?>