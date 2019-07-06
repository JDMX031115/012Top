<?php
//封装链接数据库
function connect()
{
    $connect = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME);
    return $connect;
}
//执行查询
function query($connent, $sql)
{
    $result = mysqli_query($connent, $sql);
    //调用函数 feach
    return fetch($result);
};
//循环
function fetch($result)
{
    $arr = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $arr[] = $row;
    }
    return $arr;
}
