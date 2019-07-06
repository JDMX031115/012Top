<?php

$currentPage = $_POST["currentPage"];
$pageSize = $_POST["pageSize"];


$connect = connect();
$sql = "SELECT * from categories;";
$queryResult = query($connect, $sql);
$response = ["code" => 0, "msg" => "操作失败"];
if ($queryResult) {
    $response["code"] = 1;
    $response["msg"] = "操作成功";
    $response["data"] = $queryResult;
}

// 5 以json格式返回数据
header("content-type: application/json;charset=utf-8");
echo json_encode($response);
