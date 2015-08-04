<?php
## database server
$db_server = "localhost";

## database username
$db_usr = "kenpyqusr";

## database password
$db_psw = "";

## database name
$db_name = "kenpyq";

## database connection
$con = mysql_connect($db_server,$db_usr,$db_psw);
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}
mysql_select_db($db_name,$con);
mysql_query("set character set 'utf8'");
mysql_query('set names utf8');

## security verification of request data
function req_sec($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>