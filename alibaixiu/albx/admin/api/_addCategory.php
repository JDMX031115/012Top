<?php
require_once "../../common/db_helper.php";
$connect = connect();
$response = ['code' => 0, 'msg' => '操作失败'];
$result = insert($connect, 'categories', $_POST);
if ($result) {
  $response['code'] = 1;
  $response['msg'] = '操作成功';
}
echo json_encode($response, JSON_UNESCAPED_UNICODE);