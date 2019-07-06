<?php
require_once "../../common/db_helper.php";
$id = $_POST['id'];
unset($_POST['id']);

$result = update('posts', $_POST, $id);
$response = ['code' => 0, 'msg' => '操作失败'];
if ($result) {
  $response['code'] = 1;
  $response['msg'] = '操作成功';
}

echo json_encode($response, JSON_UNESCAPED_UNICODE);