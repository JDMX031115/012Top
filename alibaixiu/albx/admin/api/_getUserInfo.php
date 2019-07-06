<?php
require_once '../../common/db_helper.php';
$response = ['code' => 0, 'msg' => '请求未授权'];
session_start();
if (isset($_SESSION['userid'])) {
  $id = $_SESSION['userid'];
  $connect = connect();
  $sql = "SELECT * FROM users WHERE id = {$id}";
  $result = query($connect, $sql, false);
  if ($result) {
    $response['code'] = 1;
    $response['msg'] = '请求成功';
    unset($result['password']);
    unset($result['status']);
    $response['data'] = $result;
  }
}

echo json_encode($response, JSON_UNESCAPED_UNICODE);

