<?php
/**************************
    getLike

    Input:
        pid: POST
    Output:
        JSON:
            list
            status

**************************/

require "permit.php";
require "conn.php";

$pid = req_sec(isset($_POST['pid']) ? $_POST['pid'] : "");
if($pid=="")exit;

$query = "SELECT * FROM `like` WHERE pid='$pid' AND (uid IN (SELECT uid FROM contacts WHERE uid2=$my_uid AND permit=1) OR uid=$my_uid) ORDER BY sendtime ASC";
$res = mysql_query($query);
$listcount = mysql_num_rows($res);
$list = "";
$key=0;
while($row=mysql_fetch_array($res)){
    $uid = $row['uid'];
    $query = "SELECT * FROM users WHERE uid='$uid'";
    $res2 = mysql_query($query);
    if($row2 = mysql_fetch_array($res2)){
        $nickname = $row2['nickname'];
        $list .= "<span>".$nickname."</span>";
    }
    
    $key++;
    if($key < $listcount){
        $list .= ", ";
    }
    
}
if($list!="")$list="<span>❤ </span>".$list;

$query = "SELECT * FROM `like` WHERE pid='$pid' AND uid=$my_uid";
$res3 = mysql_query($query);
$resnum = mysql_num_rows($res3);
$status = "0";
if($resnum > 0){
    $status = "1";
}
$returndata = "{list:'".$list."',status:'".$status."'}";

echo $returndata;

?>