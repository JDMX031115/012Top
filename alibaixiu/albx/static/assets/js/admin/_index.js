$(function () {
  // 请求数据
  $.ajax({
    url: '/admin/api/_getIndexInfo.php',
    type: 'POST',
    // data: data,
    dataType: 'json',
    success: function (res) {
      console.log(res);
      if(res.code == 1){
        $("#postsCount").text(res.data.postsCount);
        $("#draftedCount").text(res.data.draftedCount);
        $("#categoryCount").text(res.data.categoryCount);
        $("#commentsCount").text(res.data.commentsCount);
        $("#heldCount").text(res.data.heldCount);
      }
    }
  })
});