$(function(){
  $.ajax({
    url : '/admin/api/_getUserInfo.php',
    dataType: 'json',
    success : function(res){
      console.log(res);
      if(res.code == 1){
        $("#avatar").siblings('img').attr('src',res.data.avatar);
        $("#avata-src").val(res.data.avatar);
        $("#email").val(res.data.email);
        $("#slug").val(res.data.slug);
        $("#nickname").val(res.data.nickname);
        $("#bio").val(res.data.bio);
      } 
    }
  });

  $("#avatar").on('change',function(){
    var file = this.files[0];
    var fd = new FormData();
    fd.append('file',file);

    $.ajax({
      url : "/admin/api/_uploadFile.php",
      type : 'POST',
      data : fd,
      dataType : 'json',
      processData : false,
      contentType :false,
      success : function(res){
        console.log(res);
        if(res.code == 1){
          $("#avatar").siblings('img').attr('src',res.data);
          $("#avata-src").val(res.data);
        }
      }
    });
  });

  // 更新
  $("#update").on('click',function(){
    var slug = $("#slug").val();
    if(slug.trim() == ''){
      $(".alert").removeClass('hidden').children('.msg').text('请填写别名(slug)');
      return;
    }

    $.ajax({
      url: '/admin/api/_userUpdateInfo.php',
      type: "POST",
      data : $("#form").serialize(),
      dataType: 'json',
      success : function(res){
        if(res.code == 1){
          alert(res.msg);
          location.reload();
        }else{
          $(".alert").removeClass('hidden').children('.msg').text(res.msg);
        }
      }
    });
  });
});