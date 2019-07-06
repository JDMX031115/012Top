$(function(){
  $("#logout").on('click',function(){
    $.ajax({
      url : '/admin/api/_logout.php',
      dataType : 'json',
      success: function(res){
        if(res.code == 1){
          location.href = '/admin/login.php';
        }
      }
    });
  });
});