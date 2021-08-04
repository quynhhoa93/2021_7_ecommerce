$(document).ready(function (){
    $("#current_pwd").keyup(function (){
        var current_pwd = $('#current_pwd').val();
        // alert(current_pwd);
        $.ajax({
            type:'post',
            url:'/admin/check-current-pwd',
            data:{current_pwd:current_pwd},
            success:function (resp){
                if (resp == "false"){
                    $('#chkCurrentPwd').html("<font color='red'> Mật khẩu không đúng </font>");
                } else {
                    $('#chkCurrentPwd').html("<font color='green'> Mật khẩu đúng  </font>");
                }
            },error:function (){
                // alert("Error");
            }
        });
    });
});
