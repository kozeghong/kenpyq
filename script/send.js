$(document).ready(function(){

    $("#header_send").addClass("curr");

    $("#sendpost").click(function(){
        if($(".content").val()==""){
            $(".sending").html("请输入内容！");
            $(".sending").fadeIn("slow",function(){
                $(".sending").fadeOut("slow");
            });
        } else {
            $(".sending").html("正在发送朋友圈…");
            $(".sending").fadeIn("slow");
            $.post("function/sendPost.php",
                {
                    content: $(".content").val()
                },
                function(data, status){
                    status = $.trim(status);
                    data = $.trim(data);
                    if(status=="success"&&data=="success"){
                        $(".sending").html("朋友圈已发送！");
                        $(".sending").fadeOut("slow",function(){
                            window.location.href="moments.php";
                        });
                    } else if(status=="success"&&data=="fail"){
                        $(".sending").html("朋友圈发送失败！");
                        $(".sending").fadeOut("slow");
                    } else {
                        $(".sending").html("无响应，请重试！");
                        $(".sending").fadeOut("slow");
                    }
                }
            );
        }
    });

});