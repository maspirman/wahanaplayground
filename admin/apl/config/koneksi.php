<?php
require_once "xdns.php";
$base_url='http://localhost/wahanaplayground/';
$host = DB_HOST;
$db_user = DB_USER;
$db_password = DB_PASS;
$db_name = DB_NAME;

/*
$host = DB_HOST;
$db_user = DB_USER;
$db_password = DB_PASS;
$db_name = DB_NAME;
*/
 $conn = new mysqli("localhost", "$db_user", "$db_password", "$db_name");

try {
  $koneksi = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $db_user, $db_password);
  $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $koneksi;
} catch (PDOException $e) {
  echo "pesan eror : " . $e->getMessage();
}

