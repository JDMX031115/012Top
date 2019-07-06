<?php
require_once "../common/db_helper.php";
$sql = "SELECT p.id,p.title,p.created,p.content,p.views,p.likes,p.feature,c.`name`,u.nickname,
(SELECT count(id) FROM comments WHERE post_id = p.id) as commentsCount
 FROM posts p
LEFT JOIN categories c on c.id = p.category_id
LEFT JOIN users u on u.id = p.user_id
WHERE p.category_id != 1
order BY p.created desc
LIMIT 5";

$connect = connect();
$result = query($connect, $sql);
$response = ['code' => 0, 'msg' => '操作失败'];
if ($result) {
  $response['code'] = 1;
  $response['msg'] = '操作成功';
  $response['data'] = $result;
}
echo json_encode($response, JSON_UNESCAPED_UNICODE);