<?php
require_once "../../common/db_helper.php";

$id = $_POST['id'];
$connect = connect();
$result = delete($connect, 'categories', $id);
$response = ['code' => 0, 'msg' => '操作失败'];
if ($result) {
  $response['code'] = 1;
  $response['msg'] = '操作成功';
}
echo json_encode($response, JSON_UNESCAPED_UNICODE);