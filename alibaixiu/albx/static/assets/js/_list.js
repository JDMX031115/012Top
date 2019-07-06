$(function () {
  var pageIndex = 1;
  var pageSize = 5;
  var pageCount = 0;
  var id = location.search.substring(1).split('=')[1];
  console.log(id);

  function getListData() {
    var data = {
      pageIndex: pageIndex,
      pageSize: pageSize,
      id: id
    }
    $.ajax({
      url: '/api/getPostListById.php',
      type: 'POST',
      data: data,
      dataType: 'json',
      success: function (res) {
        console.log(res);
        if(res.code == 1){
          renderData(res.data);
          pageCount = res.pageCount;
          if(pageIndex >= pageCount){
            $(".loadMore").hide();
          }
        }
      }
    })
  }

  function renderData(data){
    var html = '';
    data.forEach(e => {
      html += '<div class="entry">\
                <div class="head">\
                  <a href="detail.php?id='+ e.id +'">'+ e.title +'</a>\
                </div>\
                <div class="main">\
                  <p class="info">'+ e.nickname +' 发表于 '+ e.created +'</p>\
                  <div class="brief">'+ e.content +'</div>\
                  <p class="extra">\
                    <span class="reading">阅读('+ e.views +')</span>\
                    <span class="comment">评论('+ e.commentCount +')</span>\
                    <a href="javascript:;" class="like">\
                      <i class="fa fa-thumbs-up"></i>\
                      <span>赞('+ e.likes +')</span>\
                    </a>\
                  </p>\
                  <a href="detail.php?id='+ e.id +'" class="thumb">\
                    <img src="'+ e.feature +'" alt="">\
                  </a>\
                </div>\
              </div>';
    });
    $('.new').append(html);
  }

  getListData();

  $(".btn-load-more").on('click',function(){
    pageIndex++;
    getListData();
  });
});