<?php
/**************************
    getContact

    Input:
        NONE
    Output:
        HTML

**************************/

require "permit.php";
require "conn.php";

$query = "SELECT uid,uid2,permit FROM contacts WHERE permit=1 AND uid='$my_uid'";
$res = mysql_query($query);
while($row = mysql_fetch_array($res)){
	$uid2 = $row['uid2'];
	$query2 = "SELECT * FROM users WHERE uid='$uid2'";
	$res2 = mysql_query($query2);
	$row2 = mysql_fetch_array($res2);
	if($row2){
		$nickname=$row2['nickname'];
		$whatsup=$row2['whatsup'];
		echo "<p><img src='style/images/avatar.jpg' /> <span>".$nickname."</span><span class='whatsup'>".$whatsup."</span></p>";
	}
}
?>