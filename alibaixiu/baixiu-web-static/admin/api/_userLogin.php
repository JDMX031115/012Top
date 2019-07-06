<?php
//建立连接先引入文件
require_once("../../accomop.php");
require_once("../../functions.php");

$email = $_POST["email"];
$password = $_POST["password"];
// 建议数据连接
$connect = connect();
$sql = "SELECT * FROM users WHERE email = '{$email}' and `password` = '{$password}' and `status` = 'activated'";
$queryPot = query($connect, $sql);
// print_r($queryPot);
// $boxPst = $queryPot[0]['id'];

$response = ["code" => 0, "msg" => "操作失败"];
if ($queryPot) {

    session_start();
    $_SESSION['isLogin'] = 1;



    $response["code"] = 1;
    $response["msg"] = "操作成功";
    $response["data"] = $queryPot[0];


    // $response["email"] = $email;
}
header("content-type: application/json;charset=utf-8");
echo json_encode($response);
