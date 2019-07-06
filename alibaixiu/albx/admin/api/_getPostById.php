<?php
require_once "../../common/db_helper.php";
$id = $_POST['id'];
$connect = connect();
$sql = "SELECT * FROM posts WHERE id = {$id}";
$result = query($connect, $sql, false);
close($connect);
$response = ['code' => 0, 'msg' => '操作失败'];
if ($result) {
  $response['code'] = 1;
  $response['msg'] = '操作成功';
  $response['data'] = $result;
}
echo json_encode($response, JSON_UNESCAPED_UNICODE);