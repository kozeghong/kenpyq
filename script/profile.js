$(document).ready(function(){

    $("#header_profile").addClass("curr");

    getProfile();

    $(".profile #nickname").change(function(){
        if($(this).val()=="")alert("此处不能留空！");
        $(this).focus();
    });

    $("#saveprofile").click(function(){
        $(".saving").html("正 在 保 存 中");
        $(".saving").show();
        $.post("function/setProfile.php",
            {
                nickname: $(".profile #nickname").val(),
                gender: $(".profile input[name='gender']:checked").val(),
                whatsup:$(".profile #whatsup").val(),
                region:$(".profile #region").val()
            },
            function(data, status){
                status = $.trim(status);
                data = $.trim(data);
                if(status=="success"&&data=="success"){
                    $(".saving").html("保 存 成 功！");
                    $(".saving").fadeOut("slow",function(){
                        getProfile();
                    });
                } else if(status=="success"&&data=="fail"){
                    $(".saving").html("保 存 失 败！");
                    $(".saving").fadeOut("slow",function(){
                        getProfile();
                    });
                } else {
                    $(".saving").html("无响应，请重试！");
                    $(".saving").fadeOut("slow",function(){
                        getProfile();
                    });
                }
            });
    });

});

function getProfile(){
    $.get("function/getProfile.php", function(data, status){
        status = $.trim(status);
        data = $.trim(data);
        if(status=="success"&&data=="Unauthorized"){
            window.location.href="index.php";
        } else if(status=="success"){
            var me = eval("(" + data + ")");
            $("#nickname").val(me.nickname);
            if(me.gender=="1")$("#male").attr("checked", true);
            if(me.gender=="2")$("#female").attr("checked", true);
            if(me.whatsup!="null")$("#whatsup").val(me.whatsup);
            if(me.region!="null")$("#region").val(me.region);
            $("#regdate").text(me.regdate);
        }
    });
}