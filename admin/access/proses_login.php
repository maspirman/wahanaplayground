<?php
session_start();
$base_url = '';
require_once "../apl/redirect/load_login.php";

if (!empty($_SESSION['login'])) {
  if (base64_decode($_SESSION['verify']) == 99) {
    header('Location: ' . BASE_URL . "../index.php");
  }
}


$data = [
  $_POST['emaillog'],
  $_POST['passwordlog']
];

$query = pilih_query("SELECT id_user,email,password FROM tbl_user WHERE email='$data[0]'", 'count');

if ($query > 0) {
  $query = pilih_query("SELECT id_user,email,password FROM tbl_user WHERE email='$data[0]'", 'array')[0][0];
  if ($data[0] == $query['email']) {
    if (password_verify($data[1], $query['password'])) {
      $_SESSION['login'] = base64_encode($query['email']);
      $_SESSION['id'] = $query['id_user'];
      $_SESSION['verify'] = base64_encode(99);
      header("Location: ../index.php");
    } else {
      echo "password salah";
      // header("Location: " . BASE_URL . "login.php");
    }
  } else {
    echo "email tidak terdaftar";
    // header("Location: " . BASE_URL . "login.php");
  }
} else {
  echo "akun tidak terdaftar";
  // header("Location: " . BASE_URL . "login.php");
}
