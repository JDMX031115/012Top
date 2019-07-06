<?php
require_once "../../common/db_helper.php";
$connect = connect();

$pageSize = $_POST['pageSize'];
$pageIndex = $_POST['pageIndex'];
$categoryId = $_POST['categoryId'];
$status = $_POST['status'];

$sql = "select p.id,p.title,p.created,p.`status`,u.nickname,c.`name` FROM posts p
left JOIN users u on p.user_id = u.id
left JOIN categories c on c.id = p.category_id";

$puglic = "";

if ($categoryId != 'all' || $status != 'all') {
  $puglic .= " where ";
}
if ($categoryId != 'all') {
  $puglic .= " p.category_id = {$categoryId} ";
}
if ($status != 'all') {
  if ($categoryId != 'all') {
    $puglic .= " and ";
  }
  $puglic .= " p.`status` = '{$status}' ";
}

$offset = ($pageIndex - 1) * $pageSize;

$sql .= $puglic . " ORDER BY id DESC LIMIT {$offset},{$pageSize}";

$sqlCount = "select count(*) as total from posts p " . $puglic;
$total = query($connect, $sqlCount, false);
$total = $total['total'];
$pageCount = ceil($total / $pageSize);

$result = query($connect, $sql);
$response = ['code' => 0, 'msg' => '操作失败'];
if ($result) {
  $response['code'] = 1;
  $response['msg'] = '操作成功';
  $response['data'] = $result;
  $response['pageCount'] = $pageCount;
}

echo json_encode($response, JSON_UNESCAPED_UNICODE);

close($connect);