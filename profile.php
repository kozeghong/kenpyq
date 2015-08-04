<?php require "permit.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN" lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="Content-Language" content="zh-CN" />
    <title>我 - 朋友圈</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="HandheldFriendly" content="true" />
    <link rel="stylesheet" href="style/global.css" type="text/css" />
    <link rel="stylesheet" href="style/profile.css" type="text/css" />
    <script type="text/javascript" src="script/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="script/profile.js"></script>
</head>
<body>
    <?php require "header.php"; ?>
    <div class="wrapper">

        <div class="saving">正 在 保 存 中</div>

        <div class="title">
            <h1>个人信息</h1>
            <button class="btn" id="saveprofile">保存</button>
        </div>

        <div class="profile">
            <p class="avatar">
                <label>头像</label>
                <img src="style/images/avatar.jpg" border="0" />
            </p>
            <p>
                <label>用户名</label>
                <span id="username"><?php echo $my_usr; ?></span>
            </p>
            <p>
                <label>昵称</label>
                <input type="text" class="ipt" name="nickname" id="nickname" />
            </p>
            <p>
                <label>性别</label>
                <input type="radio" class="rad" name="gender" id="male" value="1" /><label for="male" class="radval">男</label>
                <input type="radio" class="rad" name="gender" id="female" value="2" /><label for="female" class="radval">女</label>
            </p>
            <p>
                <label>地区</label>
                <input type="text" class="ipt" name="region" id="region" />
            </p>
            <p>
                <label>个性签名</label>
                <input type="text" class="ipt" name="whatsup" id="whatsup" />
            </p>
            <p>
                <label>注册日期</label>
                <span id="regdate"></span>
            </p>
        </div>

    </div>

    <div class="footer">
        <p>All Rights Reserved © 2015 Ken</p>
    </div>

</body>
</html>