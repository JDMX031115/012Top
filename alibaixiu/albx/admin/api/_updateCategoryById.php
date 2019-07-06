<?php
require_once "../../common/db_helper.php";
$id = $_POST['id'];
unset($_POST['id']);
$connect = connect();
$result = update('categories', $_POST, $id);
if ($result) {
  $response['code'] = 1;
  $response['msg'] = '操作成功';
}
echo json_encode($response, JSON_UNESCAPED_UNICODE);