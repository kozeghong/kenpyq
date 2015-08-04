<?php
/**************************
    newFriend

    Input:
        NONE
    Output:
        HTML

**************************/

require "permit.php";
require "conn.php";

$query = "SELECT uid,uid2,permit FROM contacts WHERE permit=0 AND uid2='$my_uid'";
$res = mysql_query($query);
while($row = mysql_fetch_array($res)){
	$uid = $row['uid'];
	$query = "SELECT * FROM users WHERE uid='$uid'";
	$res2 = mysql_query($query);
	if($row2 = mysql_fetch_array($res2)){
		$nickname = $row2['nickname'];
		echo "<p><img src='style/images/avatar.jpg' /> <span>".$nickname." 希望添加您为好友</span><button onclick='accept(".$uid."); '>添加</button></p>";
	}
}

?>