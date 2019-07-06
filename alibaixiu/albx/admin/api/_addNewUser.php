<?php
require_once "../../common/db_helper.php";
$response = ['code' => 0, 'msg' => '操作失败'];
$connect = connect();
$sql = "select count(*) as total from users where email = '{$_POST['email']}'";
$count = query($connect, $sql, false);
if ($count['total'] > 0) {
  $response['msg'] = '用户邮箱已存在';
} else {

  $_POST['password'] = '123456';
  $_POST['avatar'] = '/static/assets/img/default.png';
  $_POST['status'] = 'unactivated';

  $result = insert($connect, 'users', $_POST);
  if ($result) {
    $response['code'] = 1;
    $response['msg'] = "操作成功,用户初始密码为:'123456',请提示用户修改";
    // $response['data'] = ;
  }
}
echo json_encode($response, JSON_UNESCAPED_UNICODE);