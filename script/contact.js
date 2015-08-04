$(document).ready(function(){

    $("#header_contact").addClass("curr");

    newFriend();
    setInterval("newFriend()", 10000);
    getContact();
    setInterval("getContact()", 10000);

    $("#addfriend").click(function(){
        if($("#addfriendid").val()==""){
            $(".adding").html("请输入朋友的用户名！");
            $(".adding").fadeIn("slow",function(){
                $(".adding").fadeOut("slow");
            });
        } else {
            $(".adding").html("正在发送加朋友请求…");
            $(".adding").fadeIn("slow");
            $.post("function/sendFriend.php",
                {
                    username: $("#addfriendid").val()
                },
                function(data, status){
                    status = $.trim(status);
                    data = $.trim(data);
                    if(status=="success"&&data=="success"){
                        $(".adding").html("加朋友请求已发送！");
                        $(".adding").fadeOut("slow");
                    } else if(status=="success"&&data=="duplicate"){
                        $(".adding").html("已经添加过这位朋友！");
                        $(".adding").fadeOut("slow");
                    } else if(status=="success"&&data=="notfound"){
                        $(".adding").html("该用户名不存在！");
                        $(".adding").fadeOut("slow");
                    } else if(status=="success"&&data=="fail"){
                        $(".adding").html("加朋友请求发送失败！");
                        $(".adding").fadeOut("slow");
                    } else {
                        $(".adding").html("无响应，请重试！");
                        $(".adding").fadeOut("slow");
                    }
                }
            );
        }
    });

});

function accept(uid){
    $(".adding").html("正在接受加朋友请求…");
        $(".adding").fadeIn("slow");
    $.post("function/setContact.php",{uid: uid},function(data, status){
        status = $.trim(status);
        data = $.trim(data);
        if(status=="success"&&data=="success"){
            $(".adding").html("加朋友成功！");
            $(".adding").fadeOut("slow");
        } else if(status=="success"&&data=="duplicate"){
            $(".adding").html("已经添加过这位朋友！");
            $(".adding").fadeOut("slow");
        } else if(status=="success"&&data=="notfound"){
            $(".adding").html("该用户名不存在！");
            $(".adding").fadeOut("slow");
        } else if(status=="success"&&data=="fail"){
            $(".adding").html("加朋友失败！");
            $(".adding").fadeOut("slow");
        } else {
            $(".adding").html("无响应，请重试！");
            $(".adding").fadeOut("slow");
        }
        getContact();
        newFriend();
    });
}

function getContact(){
    $.post("function/getContact.php",function(data, status){
        status = $.trim(status);
        data = $.trim(data);
        if(status=="success"){
            $(".contact").html(data);
        }
    })
}

function newFriend(){
    $.post("function/newFriend.php",{nocache:$.now()},function(data, status){
        status = $.trim(status);
        data = $.trim(data);
        if(status=="success"){
            $(".newfriend").html(data);
        }
    })
}