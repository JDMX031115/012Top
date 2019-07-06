$(function () {
  

  var id = location.search.substring(1).split('=')[1];
  getPostData();
  function getPostData() {
    $.ajax({
      url: '/api/getPostById.php',
      type: 'POST',
      data: {
        id: id
      },
      dataType: 'json',
      success: function (res) {
        console.log(res);
        if(res.code == 1){
          var html = '<div class="breadcrumb">\
                        <dl>\
                          <dt>当前位置：</dt>\
                          <dd><a href="list.php?id='+ res.data.id +'">'+ res.data.name +'</a></dd>\
                          <dd>'+ res.data.title +'</dd>\
                        </dl>\
                      </div>\
                      <h2 class="title">\
                        <a href="detail.php?id='+ res.data.id +'">'+ res.data.title +'</a>\
                      </h2>\
                      <div class="meta">\
                        <span>'+ res.data.nickname +' 发布于 '+ res.data.created +'</span>\
                        <span>分类: <a href="list.php?id='+ res.data.category_id +'">'+ res.data.name +'</a></span>\
                        <span>阅读: ('+ res.data.views +')</span>\
                        <span>喜欢: ('+ res.data.likes +')</span>\
                      </div>\
                      <div class="content-detail">'+ res.data.content +'</div>'
          $(".article").html(html);
        }
      }
    })
  }
})