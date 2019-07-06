<?php
require_once "../../common/db_helper.php";

$pageIndex = $_POST['pageIndex'];
$pageSize = $_POST['pageSize'];

$connect = connect();
$offset = ($pageIndex - 1) * $pageSize;
$sql = "select c.*,p.title FROM comments c
left JOIN posts p on c.post_id = p.id
order by c.id DESC
LIMIT {$offset},{$pageSize}";

$result = query($connect, $sql);

$response = ['code' => 0, 'msg' => '操作失败'];
$countSql = "select COUNT(*) as total FROM comments";

$countResult = query($connect, $countSql, false);
$total = $countResult['total'];
$pageCount = ceil($total / $pageSize);

close($connect);

if ($result) {
  $response['code'] = 1;
  $response['msg'] = '操作成功';
  $response['data'] = $result;
  $response['pageCount'] = $pageCount;
}

echo json_encode($response, JSON_UNESCAPED_UNICODE);