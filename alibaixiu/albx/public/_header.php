<div class="header">
  <h1 class="logo"><a href="index.php"><img src="static/assets/img/logo.png" alt=""></a></h1>
  <ul class="nav">
    <!-- <li><a href="javascript:;"><i class="fa fa-glass"></i>奇趣事</a></li>
    <li><a href="javascript:;"><i class="fa fa-phone"></i>潮科技</a></li>
    <li><a href="javascript:;"><i class="fa fa-fire"></i>会生活</a></li>
    <li><a href="javascript:;"><i class="fa fa-gift"></i>美奇迹</a></li> -->
  </ul>
  <div class="search">
    <form>
      <input type="text" class="keys" placeholder="输入关键字">
      <input type="submit" class="btn" value="搜索">
    </form>
  </div>
  <div class="slink">
    <a href="javascript:;">链接01</a> | <a href="javascript:;">链接02</a>
  </div>
</div>
<script type="text/template" id="mt">
  {{each $data value}}
    <li><a href="list.php?id={{value.id}}"><i class="fa {{value.classname}}"></i>{{value.name}}</a></li>
  {{/each}}
</script>
<script src="/static/assets/vendors/jquery/jquery.js"></script>
<script src="/static/assets/vendors/art-template/template-web.js"></script>
<script src="/static/assets/js/_header.js"></script>