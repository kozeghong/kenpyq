<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo 'Unauthorized';
    exit;
}else{
    $my_usr = isset($_SESSION['username']) ? $_SESSION['username'] : "";
    $my_uid = isset($_SESSION['uid']) ? $_SESSION['uid'] : "";
    $my_nick = isset($_SESSION['nickname']) ? $_SESSION['nickname'] : "";
}
?>