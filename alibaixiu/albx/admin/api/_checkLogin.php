<?php
  function checkLogin($url){
    session_start();
    if(!isset($_SESSION['userid'])){
      header("Location:{$url}");
    }
  }