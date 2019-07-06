<?php

require_once "../common/db_helper.php";
$id = $_POST['id'];
$pageIndex = $_POST['pageIndex'];
$pageSize = $_POST['pageSize'];

$offset = ($pageIndex - 1) * $pageSize;

$sql = "SELECT p.id,p.title,p.created,p.content,p.views,p.likes,p.feature,u.nickname,c.`name`,
(select count(id) FROM comments WHERE comments.post_id = p.id) as commentCount
 FROM posts p
LEFT JOIN users u ON u.id = p.user_id
LEFT JOIN categories c on c.id = p.category_id
WHERE p.category_id = {$id}
order by created desc
LIMIT {$offset},{$pageSize}";

$connect = connect();
$result = query($connect, $sql);

$sqlCount = "select count(*) as total from posts where category_id = {$id}";
$count = query($connect, $sqlCount, false);
$total = $count['total'];
$pageCount = ceil($total / $pageSize);

$response = ['code' => 0, 'msg' => '操作失败'];
if ($result) {
  $response['code'] = 1;
  $response['msg'] = '操作成功';
  $response['data'] = $result;
  $response['pageCount'] = $pageCount;
}

echo json_encode($response, JSON_UNESCAPED_UNICODE);