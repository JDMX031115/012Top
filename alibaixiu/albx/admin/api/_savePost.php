<?php
// print_r($_POST);
require_once "../../common/db_helper.php";

if (empty($_POST['feature'])) {
  unset($_POST['feature']);
}

// 添加一个user_id
session_start();
$id = $_SESSION['userid'];
$_POST['user_id'] = $id;

$connect = connect();
$result = insert($connect, "posts", $_POST);
close($connect);
$response = ['code' => 0, 'msg' => '操作失败'];
if ($result) {
  $response['code'] = 1;
  $response['msg'] = '操作成功';
}
echo json_encode($response, JSON_UNESCAPED_UNICODE);