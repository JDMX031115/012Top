<?php

//建立连接先引入文件
require_once("../../accomop.php");
require_once("../../functions.php");

//获取数据 当前页数    一共要获取多少条
$currentPage = $_POST["currentPage"];
$pageSize = $_POST["pageSize"];
//获取筛选的条件
$status = $_POST["status"];
//获取分类Id
$categoryId = $_POST["categoryId"];


// 如果是有时候需要条件筛选, 有时候又不需要条件筛选,
// 通过判断是否又条件再来决定是否有where是比较麻烦的, 
//习惯的处理方式是: where 1=1
// 只有当有条件的时候, 我们再来把条件拼接到where的后面
$where = " where 1=1";
//判断有无啥选条件，修改￥where即可
if ($status != "all") {
    $where .= " and p.status = '{$status}'";
}

//判断分类ID是否也属于筛选条件
if ($categoryId != "all") {
    $where .= " and p.category_id = '{$categoryId}'";
}


//从那块开始查询  
$offset = ($currentPage - 1) * 10;
//连接数据库
$connect = connect();
//sql语句
$sql = "SELECT p.id,p.title,p.created,p.`status`,u.nickname,c.`name` FROM posts p
LEFT JOIN users u ON u.id = p.user_id
LEFT JOIN categories c on c.id = p.category_id " . $where . "limit {$offset}, {$pageSize}";

// 执行查询
$resultr = query($connect, $sql);
//全部文章的总数
$countSql = "select count(*) as count from posts";
$countArr = query($connect, $countSql);
$pageCount = $countArr[0]["count"];
//计算出页码的最大值 = ceil(文章 / 每页的数据条数)
$pageCount = ceil($pageCount / $pageSize);
// 返回
$response = ["code" => 0, "msg" => "操作失败"];
if ($resultr) {
    $response["code"] = 1;
    $response["msg"] = "操作成功";
    $response["data"] = $resultr;
    $response["pageCount"] = $pageCount;
}
header("content-type: application/json;charset=utf-8");
echo json_encode($response);
