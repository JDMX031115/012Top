<!DOCTYPE html>
<html lang="zh-CN">

<head>
  <meta charset="utf-8">
  <title>Sign in &laquo; Admin</title>
  <link rel="stylesheet" href="../assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../assets/css/admin.css">
</head>

<body>
  <div class="login">
    <form class="login-wrap">
      <img class="avatar" src="../assets/img/default.png">
      <!-- 有错误信息时展示 -->
      <!-- <div class="alert alert-danger">
        <strong>错误！</strong> 用户名或密码错误！
      </div> -->
      <div class="alert alert-danger" style="display: none">
        <strong>错误！</strong>
        <span id="msg">用户名或密码错误！</span>
      </div>
      <div class="form-group">
        <label for="email" class="sr-only">邮箱</label>
        <input id="email" type="email" class="form-control" placeholder="邮箱" autofocus value="ligoudan@bx.com">
      </div>
      <div class=" form-group">
        <label for="password" class="sr-only">密码</label>
        <input id="password" type="password" class="form-control" placeholder="密码" value="goudan">
      </div>
      <span class="btn btn-primary btn-block" id="btn-log">登 录</span>
    </form>
  </div>
  <script src="../assets/vendors/jquery/jquery.min.js"></script>
  <script>
    $(function() {

      $("#btn-log").on("click", function() {
        var email = $("#email").val();
        var password = $("#password").val();

        var reg = /\w+[@]\w+[.]\w+/;
        if (!reg.test(email)) {
          $("#msg").text("请输入正确的邮箱");
          $(".alert").show();
        }

        if (password == "") {
          $("#msg").text("请输入正确的密码");
          $(".alert").show();
        }

        $.ajax({
          type: "post",
          url: "api/_userLogin.php",
          data: {
            email: email,
            password: password
          },
          success: function(res) {
            console.log(res);
            if (res.code == 1) {
              localStorage.setItem("avatar", res.data.avatar);
              localStorage.setItem("nickname", res.data.nickname);

              location.href = "index.php";
            } else {
              $("#msg").text("用户名或密码错误！");
              $(".alert").show();
            }

          }
        })
      })


    })
  </script>
</body>

</html>