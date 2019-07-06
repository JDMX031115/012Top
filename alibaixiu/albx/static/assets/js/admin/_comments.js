$(function () {

  var pageIndex = 1;
  var pageSize = 10;

  getData();

  function getData() {
    var data = {
      pageIndex : pageIndex,
      pageSize : pageSize
    };
    $.ajax({
      url: '/admin/api/_getCommentsByQuery.php',
      type: 'POST',
      data: data,
      dataType: 'json',
      success: function (res) {
        if(res.code == 1){
          $('tbody').html(template('mt',res.data));
          initPagination(res.pageCount);
        }
      }
    })
  }


  function initPagination(pageCount){
    $('.pagination').twbsPagination({
      totalPages: pageCount,//最大的页码数
      first : '首页',
      last : '尾页',
      prev : '上一页',
      next : '下一页',
      visiblePages: 5,// 总共显示多少个分页按钮
      onPageClick: function (event, page) { // 点击每个分页按钮的时候执行的操作
        // 回调函数有两个参数，第一个是事件对象，第二个是当前的页码数
        pageIndex = page;
        //每次点击分页的按钮，也要获取数据
        getData();
      }
    });
  }

});