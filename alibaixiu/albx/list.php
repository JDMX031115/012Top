<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>阿里百秀-发现生活，发现美!</title>
  <link rel="stylesheet" href="static/assets/css/style.css">
  <link rel="stylesheet" href="static/assets/vendors/font-awesome/css/font-awesome.css">
  <!-- <base target="_blank"> -->
</head>
<body>
  <div class="wrapper">
    <div class="topnav">
      <ul>
        <li><a href="javascript:;"><i class="fa fa-glass"></i>奇趣事</a></li>
        <li><a href="javascript:;"><i class="fa fa-phone"></i>潮科技</a></li>
        <li><a href="javascript:;"><i class="fa fa-fire"></i>会生活</a></li>
        <li><a href="javascript:;"><i class="fa fa-gift"></i>美奇迹</a></li>
      </ul>
    </div>
    <?php include_once "public/_header.php"; ?>
    <?php include_once "public/_aside.php"; ?>    
    <div class="content">
      <div class="panel new">
        <h3>会生活</h3>
        
        
      </div>
      <div class="loadMore">
        <span class="btn-load-more">加载更多</span>
      </div>
    </div>
    <div class="footer">
      <p>© 2016 XIU主题演示 本站主题由 themebetter 提供</p>
    </div>
  </div>
</body>
</html>
<script type="text/template" id="listtp">
  {{each $data value}}
    <div class="entry">
      <div class="head">
        <a href="detail.php?id={{value.id}}">{{value.title}}</a>
      </div>
      <div class="main">
        <p class="info">{{value.nickname}} 发表于 {{value.created}}</p>
        <div class="brief">{{value.content}}</div>
        <p class="extra">
          <span class="reading">阅读({{value.views}})</span>
          <span class="comment">评论({{value.commentCount}})</span>
          <a href="javascript:;" class="like">
            <i class="fa fa-thumbs-up"></i>
            <span>赞({{value.likes}})</span>
          </a>          
        </p>
        <a href="detail.php?id={{value.id}}" class="thumb">
          <img src="{{value.feature}}" alt="">
        </a>
      </div>
    </div>
  {{/each}}
</script>
<script src="/static/assets/js/_list.js"></script>