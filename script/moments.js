var lastupdate = "0";

$(document).ready(function(){

    $("#header_moments").addClass("curr");
    getPost();
    setInterval("getPost()", 2000);

    $(".moments").on("click","#sendcomment",function(){
        var p = $(this).parent();
        //var status = $(p).parent().children(".comment-status");
        var pid = $(p).parent().attr("pid");
        var mention = $(p).children("#mention").val();
        var content = $(p).children("#comment-text").val();
        $.post("function/sendComment.php",{
            pid: pid,
            content: content,
            mention: mention
        },function(data, status){
            status = $.trim(status);
            data = $.trim(data);
            if(status=="success"&&data=="success"){
                $(p).children("#comment-text").val("");
                getComment();
            } else {
                $(status).html("发送失败！");
            }
        });
    });

    $(".moments").on("click",".sendlike",function(){
        var pid = $(this).attr("pid");
        $.post("function/sendLike.php",{pid: pid},function(data, status){
            status = $.trim(status);
            data = $.trim(data);
            if(status=="success"&&data=="liked"){
                getLike();
            } else if(status=="success"&&data=="cancelled"){
                getLike();
            } else {
                console.log("like: fail");
            }
        });
    });

    $(".moments").on("click",".show-comment-post",function(){
        var p = $(this).parent().parent();
        $(p).children(".comment-post").fadeToggle();
        $(p).children(".comment-post").children("p").children("#mention").val("0");
        $(p).children(".comment-post").children("p").children("#comment-text").focus();
    });

    $(".moments").on("click",".comment-list p.reply",function(){
        var p = $(this).parent().parent().children(".comment-post");
        $(p).children("p").children("#mention").val($(this).attr("uid"));
        $(p).children(".comment-status").html("回复 " + $(this).attr("nick"));
        $(p).show(function(){
            $(p).children(".comment-status").fadeIn("fast",function(){
                $(p).children(".comment-status").fadeOut("slow");
                $(p).children("p").children("#comment-text").focus();
            });
        });
    });
});

function getComment(){
    $(".comment-list").each(function(){
        var e = $(this);
        var pid = $(this).attr("pid");
        $.post("function/getComment.php",{pid: pid},function(data, status){
            status = $.trim(status);
            data = $.trim(data);
            if(status=="success"&&data!="Unauthorized"){
                $(e).html(data);
                if(data!=""){
                    $(e).show();
                } else {
                    $(e).hide();
                }
            }
        });
    });
}

function getPost(){
    $.post("function/getPost.php",{lastupdate: lastupdate},function(data, status){
        status = $.trim(status);
        data = $.trim(data);
        if(status=="success"&&data!=""&&data!="Unauthorized"){
            $(".moments").prepend(data);
            lastupdate = $.now();
            console.log(lastupdate);
        }
        getComment();
        getLike();
    });
}

function getLike(){
    $(".like-list").each(function(){
        var e = $(this);
        var pid = $(this).attr("pid");
        $.post("function/getLike.php",{pid: pid},function(data, status){
            status = $.trim(status);
            data = $.trim(data);
            if(status=="success"&&data!="Unauthorized"){
                var like = eval("(" + data + ")");
                $(e).html(like.list);
                if(like.list!=""){
                    $(e).show();
                } else {
                    $(e).hide();
                }
                if(like.status=="1"){
                    $(e).parent().children(".content-footer").children(".sendlike").addClass("act");
                } else {
                    $(e).parent().children(".content-footer").children(".sendlike").removeClass("act");
                }
            }
        });
    });
}