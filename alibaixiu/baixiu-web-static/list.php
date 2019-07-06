<?php
require_once("accomop.php");
require_once("functions.php");
//获取ID

$postId = $_GET["postId"];
// print_r($postId);
$connect = connect();
$sql = "SELECT p.id,p.title,p.created,p.content,p.views,p.likes,p.feature,c.`name`,u.nickname,
(SELECT count(id) FROM comments WHERE post_id = p.id) AS commentsCount
FROM posts p
LEFT JOIN categories c ON c.id = p.category_id
LEFT JOIN users u ON u.id = p.user_id
WHERE p.category_id = {$postId}
ORDER BY p.created DESC
LIMIT 10";
$boxArr = query($connect, $sql);
// print_r($boxArr)
?>

<!DOCTYPE html>
<html lang="zh-CN">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>阿里百秀-发现生活，发现美!</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.css">
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




    <?php include_once('hredde/_herde.php'); ?>
    <?php include_once('hredde/_right.php'); ?>


    <div class="content">
      <div class="panel new">
        <h3><?php echo $boxArr[0]["name"] ?></h3>
        <!-- <div class="entry">
          <div class="head">
            <a href="javascript:;">星球大战：原力觉醒视频演示 电影票68</a>
          </div>
          <div class="main">
            <p class="info">admin 发表于 2015-06-29</p>
            <p class="brief">星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯</p>
            <p class="extra">
              <span class="reading">阅读(3406)</span>
              <span class="comment">评论(0)</span>
              <a href="javascript:;" class="like">
                <i class="fa fa-thumbs-up"></i>
                <span>赞(167)</span>
              </a>
              <a href="javascript:;" class="tags">
                分类：<span>星球大战</span>
              </a>
            </p>
            <a href="javascript:;" class="thumb">
              <img src="uploads/hots_2.jpg" alt="">
            </a>
          </div>
        </div>
        <div class="entry">
          <div class="head">
            <a href="javascript:;">星球大战：原力觉醒视频演示 电影票68</a>
          </div>
          <div class="main">
            <p class="info">admin 发表于 2015-06-29</p>
            <p class="brief">星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯</p>
            <p class="extra">
              <span class="reading">阅读(3406)</span>
              <span class="comment">评论(0)</span>
              <a href="javascript:;" class="like">
                <i class="fa fa-thumbs-up"></i>
                <span>赞(167)</span>
              </a>
              <a href="javascript:;" class="tags">
                分类：<span>星球大战</span>
              </a>
            </p>
            <a href="javascript:;" class="thumb">
              <img src="uploads/hots_2.jpg" alt="">
            </a>
          </div>
        </div>
        <div class="entry">
          <div class="head">
            <a href="javascript:;">星球大战：原力觉醒视频演示 电影票68</a>
          </div>
          <div class="main">
            <p class="info">admin 发表于 2015-06-29</p>
            <p class="brief">星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯</p>
            <p class="extra">
              <span class="reading">阅读(3406)</span>
              <span class="comment">评论(0)</span>
              <a href="javascript:;" class="like">
                <i class="fa fa-thumbs-up"></i>
                <span>赞(167)</span>
              </a>
              <a href="javascript:;" class="tags">
                分类：<span>星球大战</span>
              </a>
            </p>
            <a href="javascript:;" class="thumb">
              <img src="uploads/hots_2.jpg" alt="">
            </a>
          </div>
        </div> -->
        <?php foreach ($boxArr as $value) : ?>
          <div class="entry">
            <div class="head">
              <a href="detail.php?listId=<?php echo $value["id"] ?>"><?php echo $value["title"] ?></a>
            </div>
            <div class="main">
              <p class="info"><?php echo $value["nickname"] ?> 发表于 <?php echo $value["created"] ?></p>
              <p class="brief"><?php echo $value["content"] ?></p>
              <p class="extra">
                <span class="reading">阅读(<?php echo $value["views"] ?>)</span>
                <span class="comment">评论(<?php echo $value["commentsCount"] ?>)</span>
                <a href="javascript:;" class="like">
                  <i class="fa fa-thumbs-up"></i>
                  <span>赞(<?php echo $value["likes"] ?>)</span>
                </a>
                <a href="javascript:;" class="tags">
                  分类：<span><?php echo $value["name"] ?></span>
                </a>
              </p>
              <a href="javascript:;" class="thumb">
                <img src="<?php echo $value["feature"] ?>" alt="">
              </a>
            </div>
          </div>

        <?php endforeach ?>
        <!-- 加载更多文章 -->
        <div class="booxxp">
          <span class="btn">点击加载更多</span>
        </div>
      </div>
    </div>
    <div class="footer">
      <p>© 2016 XIU主题演示 本站主题由 themebetter 提供</p>
    </div>
  </div>
  <script src="assets/vendors/jquery/jquery.min.js"></script>
  <script>
    $(function() {

      var agesFe = 1;
      $(".booxxp .btn").on("click", function() {
        var postId = location.search.split("=")[1];
        // console.log(postId);
        agesFe++;
        // console.log(agesFe);

        // return;
        $.ajax({
          type: 'post',
          url: "api/_getMorePsot.php",
          data: {
            postId: postId,
            agesFe: agesFe,
            agesFeGs: 10
          },
          success: function(box) {
            // console.log(box);
            if (box.code == 1) {
              var data = box.data;
              $.each(data, function(index, value) {
                var str = '<div class="entry">\
                 <div class="head">\
                   <a href="detail.php?listId=' + value['id'] + '">' + value['title'] + '</a>\
                 </div>\
                 <div class="main">\
                   <p class="info">' + value['nickname'] + ' 发表于 ' + value['created'] + '</p>\
                   <p class="brief">' + value['content'] + '</p>\
                   <p class="extra">\
                     <span class="reading">阅读(' + value['views'] + ')</span>\
                     <span class="comment">评论(' + value['commentsCount'] + ')</span>\
                     <a href="javascript:;" class="like">\
                       <i class="fa fa-thumbs-up"></i>\
                       <span>赞(' + value['likes'] + ')</span>\
                     </a>\
                     <a href="javascript:;" class="tags">\
                       分类：<span>' + value['name'] + '</span>\
                     </a>\
                   </p>\
                   <a href="javascript:;" class="thumb">\
                     <img src="' + value['feature'] + '" alt="">\
                   </a>\
                 </div>\
               </div>';
                // console.log(str);

                var entry = $(str);
                entry.insertBefore('.booxxp')
              });

              var slirNut = Math.ceil(box.boxxArr / 10);
              // console.log(slirNut);
              if (agesFe == slirNut) {
                $(".booxxp .btn").hide();
              }

            }

          }
        })

      })



    })
  </script>
</body>

</html>