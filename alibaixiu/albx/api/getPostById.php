<?php
require_once "../common/db_helper.php";
$id = $_POST['id'];

$sql = "SELECT p.title,p.created,p.views,p.likes,p.content,c.`name`,u.nickname,p.category_id FROM posts p
LEFT JOIN categories c ON c.id = p.category_id
LEFT JOIN users u ON u.id = p.user_id
WHERE p.id = {$id}";

$connect = connect();
$result = query($connect, $sql, false);
$response = ['code' => 0, 'msg' => '操作失败'];
if ($result) {
  $response['code'] = 1;
  $response['msg'] = '操作成功';
  $response['data'] = $result;
}
echo json_encode($response, JSON_UNESCAPED_UNICODE);