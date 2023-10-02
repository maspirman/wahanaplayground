<?php
session_start();
if (!empty($_SESSION['login'])) {
  header('Location: ' . BASE_URL . "../index.php");
}
require_once "../apl/redirect/load_register.php";

$username = username(trim($_POST['username']));
$password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
$re_password = repass(trim($_POST['repassword']));
$email = email(htmlspecialchars($_POST['email']));
$city = "";
$province = "";
$status = 'on';
$level = 1;
$time = time();

if ($username) {
  if ($email) {
    if ($re_password) {
      $data = [
        $username,
        $password,
        $email,
        $city,
        $province,
        $status,
        $level,
        $time
      ];
      // var_dump(input($data));
      if (input($data) > 0) {
        header("Location: login.php");
      } else {
        echo "data tidak bisa di input";
      }
      unset($data);
    } else {
      header("Location: register.php");
    }
  } else {
    header("Location: register.php");
  }
} else {
  header("Location: register.php");
}
