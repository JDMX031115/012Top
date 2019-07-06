<?php

require_once "../../common/db_helper.php";
$connect = connect();
$sql = "SELECT * FROM (SELECT COUNT(*) AS postsCount FROM posts) a 
join  (SELECT COUNT(*) AS draftedCount FROM posts WHERE status= 'drafted') b 
JOIN (select count(*) as categoryCount FROM categories c) c 
JOIN (SELECT COUNT(*) AS commentsCount FROM comments c) d 
JOIN (SELECT COUNT(*) AS heldCount from comments WHERE status= 'held') e";
$result = query($connect, $sql, false);
$response = ['code' => 0, 'msg' => '操作失败'];
if ($result) {
  $response['code'] = 1;
  $response['msg'] = '操作成功';
  $response['data'] = $result;
}
echo json_encode($response, JSON_UNESCAPED_UNICODE);