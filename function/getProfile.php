<?php
/**************************
    getProfile

    Input:
        NULL
    Output:
        JSON:
            nickname
            gender
            whatsup
            region
            regdate
        'fail'

**************************/

require "permit.php";
require "conn.php";

$query = "SELECT * FROM users WHERE username='$my_usr'";
$res = mysql_query($query);
$row = mysql_fetch_array($res);
if($row){
    $nickname = $row["nickname"];
    $gender = $row["gender"];
    $whatsup = $row["whatsup"];
    $region = $row["region"];
    $regdate = $row["regdate"];
    echo "{nickname:'$nickname',gender:'$gender',whatsup:'$whatsup',region:'$region',regdate:'$regdate'}";
} else {
    echo 'fail';
}

?>