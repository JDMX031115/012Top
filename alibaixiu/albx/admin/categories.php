<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Categories &laquo; Admin</title>
 
  <link rel="stylesheet" href="../static/assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../static/assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="../static/assets/vendors/nprogress/nprogress.css">  
  <link rel="stylesheet" href="/static/assets/vendors/jquery-ui/jquery-ui.css">
  <link rel="stylesheet" href="../static/assets/css/admin.css">
  <script src="../static/assets/vendors/nprogress/nprogress.js"></script>
</head>
<body>
  <script>NProgress.start()</script>
  <div class="modal fade" id="msgModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            &times;
          </button>
          <h4 class="modal-title" id="modalLabel">
            提示消息
          </h4>
        </div>
        <div class="modal-body">
          text
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">确定</button>
        </div>
      </div>
    </div>
  </div>
  <div class="main">
    <?php include_once "public/_nav.php"; ?>
    <div class="container-fluid">
      <div class="page-title">
        <h1>分类目录</h1>
      </div>
      <!-- 有错误信息时展示 -->
      <div class="alert alert-danger alert-dismissible hidden">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>错误！</strong><span class="msg"></span>
      </div>
      <div class="row">
        <div class="col-md-4">
          <form id="form">
            <h2>添加新分类目录</h2>
            <div class="form-group">
              <label for="name">名称</label>
              <input id="name" class="form-control" name="name" type="text" placeholder="分类名称">
            </div>
            <div class="form-group">
              <label for="slug">别名</label>
              <input id="slug" class="form-control" name="slug" type="text" placeholder="slug">
              <p class="help-block">https://zce.me/category/<strong>slug</strong></p>
            </div>
            <div class="form-group">
              <label for="slug">图标</label>
              <input id="classname" name="classname" type="hidden" value="fa-glass">
              <div class="icons">
                <span class="fa fa-glass"></span>
                <div class="icons-contain">
                  <i class="closeBut fa fa-times"></i>
                  <div class="handle">请选择一个图标</div>
                  <div class="icons-outer">
                    <div class="icons-inner"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <span class="btn btn-primary" id="add">添加</span>
              <div class="saves hidden">
                <span class="btn btn-primary" id="save">保存</span>
                <span class="btn btn-primary" id="cancle">取消</span>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-8">
          <div class="page-action">
            <!-- show when multiple checked -->
            <a id="mult-del" class="btn btn-danger btn-sm" href="javascript:;" style="display: none">批量删除</a>
          </div>
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th class="text-center" width="40"><input id="ckall" type="checkbox"></th>
                <th>名称</th>
                <th>Slug</th>
                <th>图标</th>
                <th class="text-center" width="100">操作</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="text-center"><input type="checkbox"></td>
                <td>未分类</td>
                <td>uncategorized</td>
                <td><span class="fa fa-glass"></span></td>
                <td class="text-center">
                  <a href="javascript:;" class="btn btn-info btn-xs">编辑</a>
                  <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
                </td>
              </tr>
              <tr>
                <td class="text-center"><input type="checkbox"></td>
                <td>未分类</td>
                <td>uncategorized</td>
                <td><span class="fa fa-glass"></span></td>
                <td class="text-center">
                  <a href="javascript:;" class="btn btn-info btn-xs">编辑</a>
                  <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
                </td>
              </tr>
              <tr>
                <td class="text-center"><input type="checkbox"></td>
                <td>未分类</td>
                <td>uncategorized</td>
                <td><span class="fa fa-glass"></span></td>
                <td class="text-center">
                  <a href="javascript:;" class="btn btn-info btn-xs">编辑</a>
                  <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <?php include_once "public/_aside.php"; ?>

  <script>NProgress.done()</script>
</body>
</html>
<script type="text/taplate" id="mt">
  {{each $data value}}
    <tr categoryid="{{value.id}}">
      <td class="text-center"><input type="checkbox"></td>
      <td>{{value.name}}</td>
      <td>{{value.slug}}</td>
      <td><span class="fa {{value.classname}}"></span></td>
      <td class="text-center">
        <a href="javascript:;" class="btn edit btn-info btn-xs">编辑</a>
        <a href="javascript:;" class="btn del btn-danger btn-xs">删除</a>
      </td>
    </tr>
  {{/each}}
</script>
<script src="/static/assets/vendors/art-template/template-web.js"></script>
<script src="/static/assets/js/admin/_category.js"></script>
