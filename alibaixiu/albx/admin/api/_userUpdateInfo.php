<?php
require_once "../../common/db_helper.php";
$response = ['code' => 0, 'msg' => '操作失败'];
session_start();
if (isset($_SESSION['userid'])) {
  $id = $_SESSION['userid'];
  unset($_POST['email']);
  $res = update('users', $_POST, $id);
  if ($res) {
    $response['code'] = 1;
    $response['msg'] = '操作成功';
  }
} else {
  $response['msg'] = '请求未授权';
}

echo json_encode($response, JSON_UNESCAPED_UNICODE);