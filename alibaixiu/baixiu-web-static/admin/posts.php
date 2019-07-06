<!DOCTYPE html>
<html lang="zh-CN">

<head>
  <meta charset="utf-8">
  <title>Posts &laquo; Admin</title>
  <link rel="stylesheet" href="../assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="../assets/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="../assets/css/admin.css">
  <script src="../assets/vendors/nprogress/nprogress.js"></script>
</head>

<body>
  <script>
    NProgress.start()
  </script>

  <div class="main">
    <!-- <nav class="navbar">
      <button class="btn btn-default navbar-btn fa fa-bars"></button>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="profile.php"><i class="fa fa-user"></i>个人中心</a></li>
        <li><a href="login.php"><i class="fa fa-sign-out"></i>退出</a></li>
      </ul>
    </nav> -->

    <?php include_once("pusuli/navbar.php") ?>

    <div class="container-fluid">
      <div class="page-title">
        <h1>所有文章</h1>
        <a href="post-add.php" class="btn btn-primary btn-xs">写文章</a>
      </div>
      <!-- 有错误信息时展示 -->
      <!-- <div class="alert alert-danger">
        <strong>错误！</strong>发生XXX错误
      </div> -->
      <div class="page-action">
        <!-- show when multiple checked -->
        <a class="btn btn-danger btn-sm" href="javascript:;" style="display: none">批量删除</a>
        <form class="form-inline">
          <select name="" class="form-control input-sm">
            <option value="all">所有分类</option>

          </select>
          <select id="status" name="" class="form-control input-sm">
            <option value="all">所有状态</option>
            <option value="drafted">草稿</option>
            <option value="published">已发布</option>
            <option value="trashed">已删除</option>
          </select>
          <button id="btn-filter" class="btn btn-default btn-sm">筛选</button>
        </form>
        <ul class="pagination pagination-sm pull-right">
          <!-- <li><a href="#">上一页</a></li>
          <li><a href="#">1</a></li>
         
          <li><a href="#">3</a></li>
          <li><a href="#">下一页</a></li> -->
        </ul>
      </div>
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th class="text-center" width="40"><input type="checkbox"></th>
            <th>标题</th>
            <th>作者</th>
            <th>分类</th>
            <th class="text-center">发表时间</th>
            <th class="text-center">状态</th>
            <th class="text-center" width="100">操作</th>
          </tr>
        </thead>
        <tbody>
          <!-- <tr>
            <td class="text-center"><input type="checkbox"></td>
            <td>随便一个名称</td>
            <td>小小</td>
            <td>潮科技</td>
            <td class="text-center">2016/10/07</td>
            <td class="text-center">已发布</td>
            <td class="text-center">
              <a href="javascript:;" class="btn btn-default btn-xs">编辑</a>
              <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
            </td>
          </tr>
          <tr>
            <td class="text-center"><input type="checkbox"></td>
            <td>随便一个名称</td>
            <td>小小</td>
            <td>潮科技</td>
            <td class="text-center">2016/10/07</td>
            <td class="text-center">已发布</td>
            <td class="text-center">
              <a href="javascript:;" class="btn btn-default btn-xs">编辑</a>
              <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
            </td>
          </tr>
          <tr>
            <td class="text-center"><input type="checkbox"></td>
            <td>随便一个名称</td>
            <td>小小</td>
            <td>潮科技</td>
            <td class="text-center">2016/10/07</td>
            <td class="text-center">已发布</td>
            <td class="text-center">
              <a href="javascript:;" class="btn btn-default btn-xs">编辑</a>
              <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
            </td>
          </tr> -->
        </tbody>
      </table>
    </div>
  </div>
  <!-- 
  <div class="aside">
    <div class="profile">
      <img class="avatar" src="../uploads/avatar.jpg">
      <h3 class="name">布头儿</h3>
    </div>
    <ul class="nav">
      <li>
        <a href="index.php"><i class="fa fa-dashboard"></i>仪表盘</a>
      </li>
      <li class="active">
        <a href="#menu-posts" data-toggle="collapse">
          <i class="fa fa-thumb-tack"></i>文章<i class="fa fa-angle-right"></i>
        </a>
        <ul id="menu-posts" class="collapse in">
          <li class="active"><a href="posts.php">所有文章</a></li>
          <li><a href="post-add.php">写文章</a></li>
          <li><a href="categories.php">分类目录</a></li>
        </ul>
      </li>
      <li>
        <a href="comments.php"><i class="fa fa-comments"></i>评论</a>
      </li>
      <li>
        <a href="users.php"><i class="fa fa-users"></i>用户</a>
      </li>
      <li>
        <a href="#menu-settings" class="collapsed" data-toggle="collapse">
          <i class="fa fa-cogs"></i>设置<i class="fa fa-angle-right"></i>
        </a>
        <ul id="menu-settings" class="collapse">
          <li><a href="nav-menus.php">导航菜单</a></li>
          <li><a href="slides.php">图片轮播</a></li>
          <li><a href="settings.php">网站设置</a></li>
        </ul>
      </li>
    </ul>
  </div> -->

  <?php
  $current_page = "posts";
  ?>

  <?php include_once("pusuli/aside.php") ?>

  <script src="../assets/vendors/jquery/jquery.js"></script>
  <script src="../assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script>
    NProgress.done()
  </script>

  <script>
    $(function() {
      //声明一个变量 保存每一页获取多少条数据
      var pageSize = 10;
      //声明一个变量  记录当前是第几页
      var currentPage = 1;
      //最大页码数 = 总得条数 / 每页的个数
      var pageCount = 10;
      makePageButton();

      function makePageButton() {

        //根据当前页数计算出开始的页码和结束的页码
        //开始页码 = 当前页码 - 2
        var start = currentPage - 2;
        //如果开始的页码小于1 则强制控制从一开始
        if (start < 1) {
          start = 1;
        }
        //结束页码 = 开始页码 + 4
        var end = start + 4;

        //判断结束页码超过了最大页码数    特殊处理

        if (end > pageCount) {
          end = pageCount;
        }

        //动态生成分页结构
        var html = "";
        //当前页数不等于一  显示
        if (currentPage != 1) {
          html += '<li class="item" data-page="' + (currentPage - 1) + '"><a href="javascript:;">上一页</a></li>';
        }
        for (var i = start; i <= end; i++) {
          if (i == currentPage) {
            html += '<li class="item active" data-page="' + i + '"><a href="javascript:;">' + i + '</a></li>';
          } else {
            html += '<li class="item" data-page="' + i + '"><a href="javascript:;">' + i + '</a></li>';

          }
        }
        //当前页数不等于最大页数的时候显示
        if (currentPage != pageCount) {
          html += '<li class="item" data-page="' + (currentPage + 1) + '"><a href="javascript:;">下一页</a></li>';
        }



        $(".pagination").html(html);
      }

      function makeTable(data) {
        //遍历数组生成新的元素之前  先把原有的内容清空
        $("tbody").empty()
        // 遍历生成新的结构
        $.each(data, function(index, value) {
          var str = `<tr>
              <td class="text-center"><input type="checkbox"></td>
              <td>${value.title}</td>
              <td>${value.nickname}</td>
              <td>${value.name}</td>
              <td class="text-center">${value.created}</td>
              <td class="text-center">${statusData[value.status]}</td>
              <td class="text-center">
              <a href="javascript:;" class="btn btn-default btn-xs">编辑</a>
              <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
              </td>
              </tr>`;
          $(str).appendTo('tbody');
        })
      }
    }
    //获取数据   动态生成结构
    //判断用户写入的文章是什么类型的
    var statusData = {
      drafted: "草稿",
      published: "已发布",
      trashed: "已作废"
    }

    $.ajax({
      url: "api/_getQuanbuXuanran .php",
      type: "post",
      data: {
        currentPage: currentPage,
        pageSize: pageSize
        status: $("#status").val(),
        categoryId: $("#category").val()
      },
      success: function(res) {
        // console.log(res);
        if (res.code == 1) {
          var data = res.data;

          //计算出页码的最大值
          pageCount = res.pageCount;

          makePageButton();


          makeTable2(data);

        }
      }
    });
    //使用事件委托给每个分页按钮注册点击事件
    $(".pagination").on("click", ".item", function() {
      //根据当前页码获取数据  得到当前是第几页
      currentPage = parseInt($(this).attr('data-page'))

      //根据当前页到服务端请求数据
      $.ajax({
        url: "api/_getQuanbuXuanran .php",
        type: "post",
        dataType: "json",
        data: {
          //当前页数
          currentPage: currentPage,
          // 一页有几条数据
          pageSize: pageSize
          status: $("#status").val(),
          categoryId: $("#category").val()
        },
        success: function(res) {
          if (res.code == 1) {
            var data = res.data;
            //从计算出页码的最大值
            pageCount = res.pageCount;

            makePageButton();


            makeTable2(data);
          }
        }
      });
    });

    //先加载所有分类

    $.ajax({
      url: "api/_getCategoryData.php",
      type: "post",
      data: {},
      dataType: "json",
      success: function(res) {
        if (res.code == 1) {
          var data = res.data;
          $.each(data, function(i, e) {
            var html = '<option value=" ' + e.id + ' ">' + e.name + '</option>';
            $(html).appendTo("#category");
          })
        }
      }
    });

    //、点击筛选功能
    $("#btn-filter").on("click", function(e) {
      //点击筛选按钮获取下拉框的值，就把下拉框的值带回服务器，
      //在根据下拉框的只完成Sql语句的条件部分
      //把状态对应的值储存到option标签的value属性里面
      //点击的时候 直接获取整个value属性就可以指导我们要的状态是哪个了


      // 点击筛选的时候 先得到的状态是什么
      var status = $("#staus").val();

      //获取分类id
      var categoryId = $("#categoryId") val();


      //发送请求
      //获取数据
      $.ajax({
        url: "api/_getQuanbuXuanran .php",
        type: "post",
        data: {
          //当前页数
          currentPage: currentPage,
          //一页几条
          pageSize: pageSize,
          //文章的样式    草稿之类的
          status: status,
          //分类状态
          categoryId: categoryId
        },
        success: function(res) {
          if (res.code == 1) {
            makeTable2(res.data);
          }
        }
      })
      e.preventDefault();
    })


    })
  </script>

</body>

</html>