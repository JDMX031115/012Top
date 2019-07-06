<?php
require_once '../../common/db_helper.php';
$response = ['code' => 0, 'msg' => '操作失败'];
session_start();
if (isset($_SESSION['userid'])) {
  $id = $_SESSION['userid'];
  $sql = "SELECT * FROM users WHERE id = {$id}";
  $connect = connect();
  $result = query($connect, $sql, false);
  if ($result) {
    $response['code'] = 1;
    $response['msg'] = '操作成功';
    $response['data'] = [
      'avatar' => $result['avatar'],
      'nickname' => $result['nickname']
    ];
  } else {
    $response['msg'] = '用户不存在';
  }
} else {
  $response[' msg '] = ' 请求未授权';
}
echo json_encode($response, JSON_UNESCAPED_UNICODE);