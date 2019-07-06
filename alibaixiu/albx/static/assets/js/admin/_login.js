$(function(){
  $("#login").on("click",function(){
    //验证数据
    var email = $("#email").val();
    var pwd = $("#password").val();
    // 正则验证
    var reg = /\w+[@]\w+[.]\w+/;
    if(!reg.test(email)){
      $(".alert").removeClass('hidden').addClass('show').children('.msg').text('请输入正确的邮箱');
      return;
    }
    $.ajax({
      url: '/admin/api/_userLogin.php',
      data: {
        email : email,
        password : pwd
      },
      type: "POST",
      success : function(res){
        console.log(res);
        if(res.code == 1){
          location.href = 'index.php';
        }else{
          $(".alert").removeClass('hidden').addClass('show').children('.msg').text(res.msg);
        }
      },
      dataType : 'json'
    });
  });
});