<?php

require_once '../apl/config/xhelper.php';
require_once '../apl/config/koneksi.php';
require_once "../apl/core/xfunction.php";

$username = username(trim($_POST['username']));
$password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
$re_password = repass(trim($_POST['repassword']));
$email = email(htmlspecialchars($_POST['email']));
$city = "";
$province = "";
$status = 'on';
$level = 1;
$time = time();



$sql = "INSERT INTO tbl_user (username, password, email, city, province, status, level, time) VALUES ('$username','$password','$email','$city','$province','$status','$level','$time')";

if (mysqli_query($koneksi, $sql)) {
  header("Location: http://localhost/wahana/admin/access/login.php");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
}
