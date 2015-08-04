<?php require "permit.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN" lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="Content-Language" content="zh-CN" />
    <title>发表朋友圈 - 朋友圈</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="HandheldFriendly" content="true" />
    <link rel="stylesheet" href="style/global.css" type="text/css" />
    <link rel="stylesheet" href="style/send.css" type="text/css" />
    <script type="text/javascript" src="script/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="script/send.js"></script>
</head>
<body>
    <?php require "header.php"; ?>
    <div class="wrapper">

        <div class="title">
            <h1>发表朋友圈</h1>
            <button class="btn" id="sendpost">发送</button>
        </div>
        <div class="sending"></div>
        <div class="send">
            <textarea class="content"></textarea>
        </div>

    </div>

    <div class="footer">
        <p>All Rights Reserved © 2015 Ken</p>
    </div>

</body>
</html>