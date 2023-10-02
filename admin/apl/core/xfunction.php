<?php

// Bagian Register
function username($data)
{
  $u = filter_var($data, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
  $u_name = strval($data);
  $username = strlen($u_name);
  if (!empty($data)) {
    if ($u == $data) {
      if ($username >= 5 && $username <= 12) {
        return $u_name;
      } else {
        return false;
      }
    } else {
      return false;
    }
  } else {
    return false;
  }
}

function email($data)
{
  $email = $data;
  if (!empty($data)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      return $email;
    } else {
      return false;
    }
  } else {
    return false;
  }
}

function repass($data)
{
  $pass = $_POST['password'];
  $repass = $data;
  if (!empty($data)) {
    if ($repass == $pass) {
      return $repass;
    } else {
      return false;
    }
  } else {
    return false;
  }
}

function input($data)
{
  global $koneksi;
  $h1 = $data[0];
  $h2 = $data[1];
  $h3 = $data[2];
  $h4 = $data[3];
  $h5 = $data[4];
  $h6 = $data[5];
  $h7 = $data[6];
  $h8 = $data[7];
  $sql = "INSERT INTO tbl_user (username, password, email, city, province, status, level, time) VALUES (:username, :password, :email, :city, :province, :status, :level, :time)";
  $stmt = $koneksi->prepare($sql);
  $stmt->bindParam(':username', $h1);
  $stmt->bindParam(':password', $h2);
  $stmt->bindParam(':email', $h3);
  $stmt->bindParam(':city', $h4);
  $stmt->bindParam(':province', $h5);
  $stmt->bindParam(':status', $h6);
  $stmt->bindParam(':level', $h7);
  $stmt->bindParam(':time', $h8);
  $stmt->execute();
  return $stmt->rowCount();
}

//     syarat penggunaan :
//      1. jika yang mau dikirimkan banyak data maka penulisannya   query_media("query kita")[0];
//      2. jika yang mau dikirimkan hanya satu maka penulisannya    query_media("query kita")[0][0];
// 
//     keterangan :
//      function ini akan mengembalikan gambar default jika data yang di database 
//      bernilai kosong atau tidak ada
function query_media($data)
{
  global $koneksi;

  $stmt = $koneksi->prepare($data);
  $stmt->execute();
  $hasil = $stmt->rowCount();
  if ($hasil <= 0) {
    $rows = [];
    $rows[] = [['pict_name' => 'unnamed.jpg', 'alt' => 'Default Picture', 'time' => 1606339672]];
    return $rows;
  } else {
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $rows = [];
    while ($row = $stmt->fetchAll()) {
      $rows[] = $row;
    }
    return $rows;
  }
}


// Bagian Login
function query($data)
{
  global $koneksi;

  $stmt = $koneksi->prepare($data);
  $stmt->execute();
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $rows = [];
  while ($row = $stmt->fetchAll()) {
    $rows[] = $row;
  }
  return $rows;
}

function pilih_query($data, $pilih)
{
  global $koneksi;

  try {
    $koneksi->beginTransaction();
    $stmt = $koneksi->prepare($data);
    $stmt->execute();
    $koneksi->commit();
    if ($pilih == 'array') {
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $rows = [];
      while ($row = $stmt->fetchAll()) {
        $rows[] = $row;
      }
      return $rows;
    }
    if ($pilih = 'count') {
      return $stmt->rowCount();
    }
  } catch (Exception $e) {
    $koneksi->rollBack();
    echo "Failed: " . $e->getMessage();
  }
}

function session($data)
{
  global $koneksi;
  $h0 = $data[0];
  $h1 = $data[1];

  $sql = "INSERT INTO tbl_session (id_user,login) VALUES (:id,:login)";
  $stmt = $koneksi->prepare($sql);
  $stmt->bindParam(':id', $h0);
  $stmt->bindParam(':login', $h1);
  $stmt->execute();
  $hasil = $stmt->rowCount();
  if ($hasil > 0) {
    $sql = "SELECT id_user,login FROM tbl_session WHERE id_user = $h0";
  }
}

function query_json($query)
{
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Methods: GET");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

  global $koneksi;

  if ($query == 'media') {
    $q = 'tbl_media';
  } else if ($query == 'user') {
    $q = 'tbl_user';
  } else {
    $q = '';
  }

  $stmt = $koneksi->prepare("SELECT * FROM $q");
  $stmt->execute();
  $rows = array();
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
  while ($row = $stmt->fetchAll()) {
    $rows = $row;
  }
  $stmt = null;
  $json->author = "Nugraha";
  $json->description = "json files";
  $json->data = $rows;

  return json_encode($json);
}
