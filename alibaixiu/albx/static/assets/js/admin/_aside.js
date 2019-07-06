$(function(){
  // 请求头像和昵称
  $.ajax({
    url : '/admin/api/_getUserHeadAndNikename.php',
    type : 'POST',
    dataType : 'json',
    success : function(res){
      // console.log(res);
      if(res.code == 1){
        var data = res.data;
        $(".avatar").attr('src',data.avatar);
        $(".name").text(data.nickname);
      }
    }
  });

  // 展开导航
  // <ul id="menu-posts" class="collapse in" aria-expanded="true" style="">
  // 获取url
  function explodeNav(){
    var href = location.href.split('?')[0];
    var temp = href.split('/');
    var page = temp[temp.length - 1];
    var url = page ? page.split('.')[0] : 'index';
    // 添加active类名
    $("#"+url).addClass('active');
    // 展开导航
    $("#"+url).parent().addClass('in').attr('aria-expanded','true');
  }
  explodeNav();
});