<?php
require_once "../../common/db_helper.php";

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email = '{$email}'";
$connect = connect();
$result = query($connect, $sql, false);

$response = ["code" => 0, "msg" => "操作失败"];

  // if(!$result){
    
  //   echo json_encode($response,JSON_UNESCAPED_UNICODE);
  //   return;
  // }
if ($result) {
  if ($result['password'] == $password) {
    if ($result['status'] == 'activated') {
        //login success
      $response['code'] = 1;
      $response['msg'] = '登录成功';
        // 把用户的id存到session里面
      session_start();
      $_SESSION['userid'] = $result['id'];
    } else {
      $response['msg'] = '该用户没有激活，请联系管理员';
    }
  } else {
    $response['msg'] = '密码不正确';
  }
} else {
  $response['msg'] = '用户名不存在';
}
close($connect);
echo json_encode($response, JSON_UNESCAPED_UNICODE);