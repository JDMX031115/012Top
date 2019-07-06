<?php
require_once "../../common/db_helper.php";

$connect = connect();
$sql = "select * from users";
$result = query($connect, $sql);
$response = ['code' => 0, 'msg' => '操作失败'];
if ($result) {
  $response['code'] = 1;
  $response['msg'] = '操作成功';
  $response['data'] = $result;
}
echo json_encode($response, JSON_UNESCAPED_UNICODE);