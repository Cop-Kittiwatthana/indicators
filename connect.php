<?php

$host = "localhost";
$username = "root";
$password = "";
$db_name = "pkpm"; //ชื่อฐานข้อมูล

$conn = mysqli_connect($host, $username, $password, $db_name);
mysqli_set_charset($conn, "utf8");
error_reporting(error_reporting() & ~E_NOTICE);
date_default_timezone_set('Asia/Bangkok');
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>