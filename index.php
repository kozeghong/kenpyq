<?php
session_start();
if (isset($_SESSION['username'])) {
    echo '<script>location="moments.php";</script>';
    exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN" lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="Content-Language" content="zh-CN" />
    <title>朋友圈首页</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="HandheldFriendly" content="true" />
    <link rel="stylesheet" href="style/global.css" type="text/css" />
    <link rel="stylesheet" href="style/index.css" type="text/css" />
    <script type="text/javascript" src="script/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="script/index.js"></script>
</head>
<body>

    <div class="wrapper">

        <div class="loginheader">
            <h1>朋友圈</h1>
        </div>
        
        <div class="loginmenu">
            <h2 class="cur" id="slogin">登录</h2>
            <h2 id="sreg">注册</h2>
        </div>

        <div class="err"></div>

        <div id="loginbox">
            <p>
                <label>用户名</label>
                <input type="text" class="ipt" id="usr" name="usr" />
            </p>
            <p>
                <label>密码</label>
                <input type="password" class="ipt" id="psw" name="psw" />
            </p>
            <p style="text-align: center;">
                <button class="btn" id="loginbtn" name="loginbtn">登录</button>
            </p>
        </div>

        <div id="regbox">
            <p>
                <label>用户名</label>
                <input type="text" class="ipt" id="usr" name="usr" />
            </p>
            <p>
                <label>密码</label>
                <input type="password" class="ipt" id="psw" name="psw" />
            </p>
            <p>
                <label>确认密码</label>
                <input type="password" class="ipt" id="psw2" name="psw2" />
            </p>
            <p style="text-align: center;">
                <button class="btn" id="regbtn" name="regbtn">注册</button>
            </p>
        </div>

    </div>

    <div class="footer">
        <p>All Rights Reserved © 2015 Ken</p>
    </div>

</body>
</html>