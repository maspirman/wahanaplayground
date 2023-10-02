<?php
session_start();

require_once '../../apl/function/helper.php';
require_once '../../apl/database/koneksi.php';

$email = $_POST['emaillog'];
$password = $_POST['passwordlog'];

$query = mysqli_query($koneksi, "SELECT * FROM user WHERE email = '$email'");

if (mysqli_num_rows($query) > 0) {
  $row = mysqli_fetch_assoc($query);
  // echo $row;

  if (password_verify($password, $row['password'])) {

    $_SESSION['login'] = true;
    $_SESSION['id'] = $row['user_id'];
    // $_SESSION['name'] = $row['nama'];
    // $_SESSION['email'] = $row['email'];
    // $_SESSION['city'] = $row['city'];
    // $_SESSION['province'] = $row['province'];
    // $_SESSION['time'] = $row['waktu'];
    header('Location: ' . BASE_URL);
  } else {
    //   //   // echo '<script language="javascript">
    //   //   //         window.alert("PASSWORD SALAH! Silakan coba lagi");
    //   //   //         window.location.href= "' . BASE_URL . 'pages/examples/login.php";
    //   //   //       </script>';
    header('Location: ' . BASE_URL . 'pages/examples/login.php');
    // echo 'salah password';
  }
} else {
  // echo '<script language="javascript">
  //         window.alert("LOGIN GAGAL! Silakan coba lagi");
  //         window.location.href= "' . BASE_URL . 'pages/examples/login.php";
  //       </script>';
  header('Location: ' . BASE_URL . 'pages/examples/login.php');
  // echo 'tidak terdaftar';
}
