$(function () {
  // ckeditor
  // CKEDITOR.replace("content");


  // upload
  $("#feature").on('change', function () {
    var file = this.files[0];
    var fd = new FormData();
    fd.append("file", file);

    $.ajax({
      url: '/admin/api/_uploadFile.php',
      type: 'POST',
      data: fd,
      contentType: false,
      processData: false,
      dataType: 'json',
      success: function (res) {
        // console.log(res);
        $(".thumbnail").show().attr('src', res.data);
        $("#feature-url").val(res.data);
      }
    })
  });

  // 加载所有的分类
  $.ajax({
    url: '/admin/api/_getAllCategory.php',
    type: 'POST',
    dataType: 'json',
    success: function (res) {
      if (res.code == 1) {
        var html = [];
        for (var i = 0; i < res.data.length; i++) {
          html.push('<option value="' + res.data[i].id + '">' + res.data[i].name + '</option>');
        }
        $("#category").html(html.join(""));

        initPage();
      }
    }
  })

  $("#save").on('click', function () {
    // 把内容同步回来
    CKEDITOR.instances.content.updateElement();
    var data = $("#form").serialize();
    if (opt == "add") {
      $.ajax({
        url: '/admin/api/_savePost.php',
        type: 'POST',
        data: data,
        dataType: 'json',
        success: function (res) {
          // console.log(res);
          if (res.code == 1) {
            alert(res.msg);
            location.href = 'posts.php';
          }
        }
      })
    } else if (opt == 'edit') {
      $.ajax({
        url: '/admin/api/_updatePostById.php',
        type: 'POST',
        data: data,
        dataType: 'json',
        success: function (res) {
          if (res.code == 1) {
            alert(res.msg);
          }
        }
      })
    }

  });

  var opt = "add";
  var postId = 0;
  getOpration();
  // 编辑操作
  function getOpration() {
    var search = location.search.substring(1);
    if (search) {
      var arr = search.split('?');
      var obj = {};
      for (var i = 0; i < arr.length; i++) {
        var temp = arr[i].split('=');
        obj[temp[0]] = temp[1];
      }
      opt = obj.opt;
      postId = obj.id;
    }
  }

  function initPage() {
    if (opt == "add") {
      CKEDITOR.replace("content");
    } else {
      $.ajax({
        url: '/admin/api/_getPostById.php',
        type: 'POST',
        data: {
          id: postId
        },
        dataType: 'json',
        success: function (res) {
          if (res.code == 1) {
            var uidEle = $('<input type="hidden" name="user_id" value="' + res.data.user_id + '">');
            // console.log(uidEle);
            var pidEle = $('<input type="hidden" name="id" value="' + res.data.id + '">');
            // console.log(pidEle);
            $("#form").prepend(uidEle).prepend(pidEle);
            $("#title").val(res.data.title);
            $("#content").val(res.data.content);
            $("#slug").val(res.data.slug);
            $("#feature-url").val(res.data.feature);
            $(".thumbnail").show().attr('src', res.data.feature);
            $("#category").val(res.data.category_id);
            $("#status").val(res.data.status);
            res.data.created = res.data.created.replace(" ", "T");
            $("#created").val(res.data.created);


            CKEDITOR.replace("content");
          }
        }
      })
    }
  }

});