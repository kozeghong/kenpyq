$(document).ready(function(){

    $("#slogin,#sreg").click(function(){
        if($(this).css("cursor")=="pointer"){
            $(".err").hide();
            $("#slogin,#sreg").toggleClass("cur");
            $("#loginbox,#regbox").toggle();
        }
        
    });

    $("#loginbtn").click(function(){
        $(".err").hide();
        if($("#loginbox #usr").val()==""){
            $(".err").html("请输入用户名！");
            $(".err").show();
        } else if($("#loginbox #psw").val()==""){
            $(".err").html("请输入密码！");
            $(".err").show();
        } else {
            $.post("function/login.php",
                {
                usr:$("#loginbox #usr").val(),
                psw:$("#loginbox #psw").val()
                },
                function(data, status){
                    status = $.trim(status);
                    data = $.trim(data);
                    if(status=="success"&&data=="success"){
                        window.location.href="moments.php";
                    } else if(status=="success"&&data=="password"){
                        $(".err").html("密码错了！");
                        $(".err").show();
                    } else if(status=="success"&&data=="username"){
                        $(".err").html("用户名无效！");
                        $(".err").show();
                    } else {
                        $(".err").html("无响应，请重试！");
                        $(".err").show();
                    }
                });
        }
    });


    $("#regbtn").click(function(){
        $(".err").hide();
        if($("#regbox #usr").val()==""){
            $(".err").html("请输入用户名！");
            $(".err").show();
        } else if($("#regbox #psw").val()==""){
            $(".err").html("请输入密码！");
            $(".err").show();
        } else if($("#regbox #psw2").val()==""){
            $(".err").html("请确认密码！");
            $(".err").show();
        } else if($("#regbox #psw2").val() != $("#regbox #psw").val()){
            $(".err").html("密码输入不一致！");
            $(".err").show();
        } else {
            $.post("function/register.php",
                {
                usr:$("#regbox #usr").val(),
                psw:$("#regbox #psw").val()
                },
                function(data, status){
                    status = $.trim(status);
                    data = $.trim(data);
                    if(status=="success"&&data=="success"){
                        $(".err").html("注册成功！");
                        $("#regbox #usr").val("");
                        $("#regbox #psw").val("");
                        $("#regbox #psw2").val("");
                        $("#slogin").click();
                        $(".err").show();

                    } else if(status=="success"&&data=="fail"){
                        $(".err").html("注册失败！");
                        $(".err").show();
                    } else if(status=="success"&&data=="duplicate"){
                        $(".err").html("注册失败！用户名已存在！");
                        $(".err").show();
                    } else {
                        $(".err").html("无响应，请重试！");
                        $(".err").show();
                    }
                });
        }
    });

});