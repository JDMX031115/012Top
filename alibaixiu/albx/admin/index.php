<?php
  //验证是否登录
require_once "api/_checkLogin.php";
checkLogin('login.php');
?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
  <meta charset="utf-8">
  <title>Dashboard &laquo; Admin</title>
  <link rel="stylesheet" href="../static/assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../static/assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="../static/assets/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="../static/assets/css/admin.css">
  <script src="../static/assets/vendors/nprogress/nprogress.js">
  </script>
  
  </script>
</head>

<body>
  <script>
    NProgress.start()
  </script>

  <div class="main">
    <?php include_once "public/_nav.php"; ?>
    <div class="container-fluid">
      <div class="jumbotron text-center">
        <h1>One Belt, One Road</h1>
        <p>Thoughts, stories and ideas.</p>
        <p><a class="btn btn-primary btn-lg" href="post-add.php" role="button">写文章</a></p>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">站点内容统计：</h3>
            </div>
            <ul class="list-group">
              <li class="list-group-item"><strong id="postsCount">10</strong>篇文章（<strong id="draftedCount">2</strong>篇草稿）</li>
              <li class="list-group-item"><strong id="categoryCount">6</strong>个分类</li>
              <li class="list-group-item"><strong id="commentsCount">5</strong>条评论（<strong id="heldCount">1</strong>条待审核）</li>
            </ul>
          </div>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
      </div>
    </div>
  </div>

  <?php include_once "public/_aside.php"; ?>
  </script>
  <script>
    NProgress.done()
  </script>
</body>

</html>
<script src="/static/assets/js/admin/_index.js"></script>