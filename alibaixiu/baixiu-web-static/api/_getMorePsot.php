<?php
require_once("../accomop.php");
require_once("../functions.php");

//获取id对应的页
$postId = $_POST["postId"];
//获取分页信息
$agesFe = $_POST["agesFe"];
//获取加载的个数
$agesFeGs = $_POST["agesFeGs"];


$foAges = ($agesFe - 1) * $agesFeGs;

$connect = connect();
//每次加载十条的sqli语句
$sql = "SELECT p.id,p.title,p.created,p.content,p.views,p.likes,p.feature,c.`name`,u.nickname,
      (SELECT count(id) FROM comments WHERE post_id = p.id) AS commentsCount
      FROM posts p
      LEFT JOIN categories c ON c.id = p.category_id
      LEFT JOIN users u ON u.id = p.user_id
      WHERE p.category_id = {$postId}
      ORDER BY p.created DESC
      LIMIT {$foAges}, {$agesFeGs}";

$poArr = query($connect, $sql);


//文章全部加载完   加载几次的
//查询到对应的分类有多少条
$sqli = "SELECT count(id) as postCount FROM posts WHERE category_id = {$postId}";
$topArr = query($connect, $sqli);
// print_r($topArr);
$boxxArr = $topArr[0]['postCount'];







// print_r($poArr);
$resopt = ["code" => 0, "msg" => "操作失败"];

if ($poArr) {
    $resopt["code"] = 1;
    $resopt["msg"] = '操作成功';
    $resopt["data"] = $poArr;
    $resopt["boxxArr"] = $boxxArr;
}
header("content-type: application/json;charset=utf-8;");
echo json_encode($resopt);
