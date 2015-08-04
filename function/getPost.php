<?php
/**************************
    getPost

    Input:
        lastupdate: POST
    Output:
        HTML

**************************/

require "permit.php";
require "conn.php";

$lastupdate = req_sec(isset($_POST['lastupdate']) ? $_POST['lastupdate'] : "0");

$query = "SELECT * FROM posts WHERE ((sendtime+1)*1000)>$lastupdate AND deleted='0' AND (uid IN (SELECT uid FROM contacts WHERE uid2=$my_uid AND permit=1) OR uid=$my_uid) ORDER BY sendtime DESC";
$res = mysql_query($query);
while($row = mysql_fetch_array($res)){
    $uid = $row['uid'];
    $content = $row['content'];
    $dateStr = date('Y年m月d日 H:i:s',$row['sendtime']);

    $query = "SELECT * FROM users WHERE uid='$uid'";
    $res2 = mysql_query($query);
    if($row2 = mysql_fetch_array($res2)){
        $nickname = $row2['nickname'];
        ?>
            <div class="moments-item">
                <img src="style/images/avatar.jpg" class="avatar" border="0" />
                <p class="nickname"><?php echo $nickname; ?></p>
                <p class="content"><?php echo $content; ?></p>
                <p class="content-footer">
                    <span class="sendtime"><?php echo $dateStr; ?></span>
                    <span class="show-comment-post">评论</span>
                    <span class="sendlike" pid="<?php echo $row['pid']; ?>">赞</span>
                </p>
                <div class="like-list" pid="<?php echo $row['pid']; ?>"></div>
                <div class="comment-list" pid="<?php echo $row['pid']; ?>">

                </div>
                <div class="comment-post" pid="<?php echo $row['pid']; ?>">
                    <p>
                        <input id="comment-text" type="text" class="ipt" />
                        <input type="hidden" id="mention" value="0" />
                        <button class="btn" id="sendcomment">发送</button>
                    </p>
                    <p class="comment-status"></p>
                </div>
            </div>
        <?php
    }
}

?>