$(function () {

  var pageIndex = 1;
  var pageSize = 10;
  var pageCount;

  // 加载所有的分类
  $.ajax({
    url: '/admin/api/_getAllCategory.php',
    type: 'POST',
    // data : data,
    dataType: 'json',
    success: function (res) {
      // console.log(res);
      if (res.code == 1) {
        var html = ['<option value="all">所有分类</option>'];
        for (var i = 0; i < res.data.length; i++) {
          html.push('<option value="' + res.data[i].id + '">' + res.data[i].name + '</option>');
        }
        $("#categories").html(html.join(""));

        queryPosts();
      }
    }
  });



  function queryPosts() {
    var data = {
      pageIndex: pageIndex,
      pageSize: pageSize,
      categoryId: $("#categories").val(),
      status: $("#status").val()
    }
    // console.log(data);
    $.ajax({
      url: '/admin/api/_getPostsByQuery.php',
      type: 'POST',
      data: data,
      dataType: 'json',
      success: function (res) {
        // console.log(res);
        if (res.code == 1) {
          $("tbody").html(template("tp", res.data));
          pageCount = res.pageCount;
          pagination();
        }
      }
    })
  }

  function pagination() {
    var buttons = 5;
    var start = pageIndex - Math.ceil(buttons / 2);
    if (start <= 0) {
      start = 1;
    }
    var end = start + buttons - 1;
    if (end > pageCount) {
      end = pageCount;
    }

    var html = [];
    if (pageIndex != 1) {
      html.push('<li><a index=' + (pageIndex - 1) + ' href="javascript:void(0);">上一页</a></li>');
    }
    for (var i = start; i <= end; i++) {
      html.push('<li><a index="' + i + '" href="javascript:void(0);">' + i + '</a></li>');
    }
    if (pageIndex != pageCount) {
      html.push('<li><a index=' + (parseInt(pageIndex) + 1) + ' href="javascript:void(0);">下一页</a></li>');
    }
    $(".pagination").html(html.join(''));
  }

  $(".pagination").on('click', 'a', function () {
    var index = $(this).attr('index');
    pageIndex = index;
    queryPosts();
  });


  $("#filt").on('click', function () {
    pageIndex = 1;
    queryPosts();
  });

  $("tbody").on('click', 'input[type=checkbox]', function () {
    var checked = $('tbody input:checked');
    if (checked.size() >= 2) {
      $("#mult-del").show();
    } else {
      $("#mult-del").hide();
    }
    $("#ckall").prop('checked', checked.size() == $("tbody input").size());
  });

  $("#ckall").on('click', function () {
    var statu = $(this).prop('checked');
    $('tbody input').prop('checked', statu);
    if (statu) {
      $("#mult-del").show();
    } else {
      $("#mult-del").hide();
    }
  });

  $("tbody").on('click', '.del', function () {
    var id = $(this).parent().parent().attr('postid');
    // console.log(id);

    $.ajax({
      url: '/admin/api/_delPostById.php',
      type: 'POST',
      data: {
        id: id
      },
      dataType: 'json',
      success: function (res) {
        if (res.code == 1) {
          location.reload();
        }
      }
    })
  });

  $("#mult-del").on('click', function () {
    var checked = $('tbody input:checked');
    var ids = [];
    checked.each(function (i, e) {
      var id = $(e).parent().parent().attr('postid');
      ids.push(id);
    });
  
    $.ajax({
      url: '/admin/api/_delPostById.php',
      type: 'POST',
      data: {id: ids},
      dataType: 'json',
      success: function (res) {
        if(res.code == 1){
          location.reload();
        }
      }
    })

  });
});