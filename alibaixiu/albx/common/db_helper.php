<?php
require_once "config.php";

function connect()
{
  $connect = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME);
  mysqli_set_charset($connect, 'utf8');
  return $connect;
}

function close($connect)
{
  mysqli_close($connect);
}

function query($connect, $sql, $assoc = true)
{
  $result = mysqli_query($connect, $sql);
  $data = [];
  if ($result) {
    if ($assoc) {
      while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
      }
    } else {
      $data = mysqli_fetch_assoc($result);
    }
  }
  return $data;
}

function update($table, $arr, $id)
{
  $connect = connect();
  $sql = "UPDATE {$table} SET ";
  $temp = [];
  foreach ($arr as $key => $value) {
    $temp[] = "{$key}='{$value}'";
  }
  $sql .= implode(',', $temp);
  $sql .= " WHERE id = {$id}";
  $result = mysqli_query($connect, $sql);
  close($connect);
  return $result;
}

function insert($connect, $table, $arr)
{
  $sql = "insert into {$table} set ";
  $temp = [];
  foreach ($arr as $key => $value) {
    $temp[] = "{$key} = '{$value}'";
  }
  $sql .= implode(",", $temp);
  $result = mysqli_query($connect, $sql);
  return $result;
}

function delete($connect, $table, $id)
{
  $sql = "delete from {$table} where id ";
  if (is_numeric($id)) {
    $sql .= " = {$id}";
  } else if (is_array($id)) {
    $sql .= " in (" . implode(",", $id) . ")";
  }
  $result = mysqli_query($connect, $sql);
  return $result;
}