<?php
$file = $_FILES['file'];
// print_r($file);
// 获取后缀
$ext = strrchr($file['name'], '.');
// echo $ext;
// 时间戳
$time = date('Y-m-d-H-i-s');
// 随机数
$round = rand(10000, 99999);
$fileName = $time . '-' . $round . $ext;
// echo $fileName;
$response = ['code' => 0, 'msg' => '操作失败'];
$res = move_uploaded_file($file['tmp_name'], '../../static/uploads/' . $fileName);
if ($res) {
  $response['code'] = 1;
  $response['msg'] = '操作成功';
  $response['data'] = '/static/uploads/' . $fileName;
}
echo json_encode($response, JSON_UNESCAPED_UNICODE);

