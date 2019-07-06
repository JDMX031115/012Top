<?php
session_start();
unset($_SESSION['userid']);

echo json_encode(['code' => 1], JSON_UNESCAPED_UNICODE);