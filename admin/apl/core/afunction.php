<?php
#-----------------------------------------------#
#              VALIDATION LOGIN                 #
#-----------------------------------------------# 
function login_validation()
{
  // global $koneksi;
  if (!empty($_SESSION['login'])) {
    if (!empty($_SESSION['id'])) {
      $login = base64_decode($_SESSION['login']);
      $id = $_SESSION['id'];
      $r = query("SELECT email FROM tbl_user WHERE id_user=$id")[0][0];
      if ($login == $r['email']) {
        return true;
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

#-----------------------------------------------#
#              NEW ADD MEDIA                    #
#-----------------------------------------------# 
function InsertMedia($tableName, $rows)
{
  global $koneksi;

  // Get column list
  // $columnList = array_keys($rows);
  $columnValues = array_values($rows);
  $values = $columnValues[0];
  $numColumnValues = count($columnValues[0]);

  for ($i = 0; $i < $numColumnValues; $i++) {
    $altTemp = explode(".", $values[$i]);
    $alt = $altTemp[1];
    $microtime = explode(" ", microtime());
    $micro = $microtime[0];
    $time = $microtime[1];
    $stmt = $koneksi->exec("INSERT INTO $tableName (pict_name, alt, time, microtime) VALUES ('" . $values[$i] . "','" . $alt . "','" . $time . "','" . $micro . "')");
  }

  return Count($stmt);
  // return $columnValues;
}

#-----------------------------------------------#
#              DELETE MEDIA                     #
#-----------------------------------------------# 
function delete_media($id, $name)
{
  global $koneksi;

  $target = "assets/img/wahana/" . $name;
  if (file_exists($target)) {
    unlink($target);
    $stmt = $koneksi->prepare("DELETE FROM tbl_media WHERE id_media='$id'");
    $stmt->execute();
    return $stmt->rowCount();
  }
}

#-----------------------------------------------#
#                   ADD SLIDER                  #
#-----------------------------------------------# 
function slider($id, $data)
{
  $r = pilih_query("UPDATE tbl_media SET slider = 'off' WHERE slider = '$data'", 'count');
  if ($r > 0) {
    $hasil = pilih_query("UPDATE tbl_media SET slider = '$data' WHERE id_media = $id", 'count');
    return $hasil;
  } else {
    $hasil = pilih_query("UPDATE tbl_media SET slider = '$data' WHERE id_media = $id", 'count');
    return $hasil;
  }
}

#-----------------------------------------------#
#                   SLIDER OFF                  #
#-----------------------------------------------# 
function slider_off($id)
{
  $hasil = pilih_query("UPDATE tbl_media SET slider = 'off' WHERE id_media = $id", 'count');
  return $hasil;
}

#-----------------------------------------------#
#                   SLIDER SAVE                  #
#-----------------------------------------------# 
function slider_save($id, $data)
{
  $hasil = pilih_query("UPDATE tbl_media SET alt = '$data' WHERE id_media = $id", 'count');
  return $hasil;
}

#-----------------------------------------------#
#                   UNDEFINED                   #
#-----------------------------------------------# 
function rubah($data)
{
  global $koneksi;

  $id = htmlspecialchars($data['id']);
  $name = htmlspecialchars($data['name']);
  $email = htmlspecialchars($data['email']);
  $city = htmlspecialchars($data['city']);
  $province = htmlspecialchars($data['province']);

  $sql = "UPDATE tbl_user SET 
                username = '$name',
                email = '$email',
                city = '$city',
                province = '$province'
            WHERE id_user = $id ";
  $stmt = $koneksi->prepare($sql);
  $stmt->execute();
  return $stmt->rowCount();
}


#-----------------------------------------------#
#                   ADD INFO                    #
#-----------------------------------------------# 
function info($data, $id)
{
  global $koneksi;

  $address = $data['address'];
  $phone = $data['phone'];
  $fax = $data['fax'];
  $ig = $data['ig'];

  $s = pilih_query("SELECT * FROM tbl_info WHERE id_user='$id'", "count");

  if ($s == 0) {

    $sql = "INSERT INTO tbl_info (id_user, address, phone, fax, ig) VALUES (:id_user, :address, :phone, :fax, :ig)";
    $stmt = $koneksi->prepare($sql);
    $stmt->bindParam(':id_user', $id);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':fax', $fax);
    $stmt->bindParam(':ig', $ig);
    $stmt->execute();

    return $stmt->rowCount();
  } else {
    $c = pilih_query("UPDATE tbl_info SET address='$address', phone='$phone', fax='$fax', ig='$ig' WHERE id_user='$id'", "count");
    return $c;
  }
}


#-----------------------------------------------#
#                   NEW PASSWORD                #
#-----------------------------------------------# 
function pwd($data, $id)
{

  $old = $data['old'];
  $new = $data['new'];
  $confirm = $data['confirm'];

  if (!empty($old)) {
    if (!empty($new)) {
      if ($confirm == $new) {
        $p = query("SELECT password FROM tbl_user WHERE id_user='$id'")[0][0];
        if (password_verify($old, $p['password'])) {
          $pwd = password_hash($new, PASSWORD_DEFAULT);
          $set = pilih_query("UPDATE tbl_user SET password='$pwd' WHERE id_user='$id'", "count");
          return $set;
        } else {
          return null;
        }
      } else {
        return null;
      }
    } else {
      return null;
    }
  } else {
    return null;
  }
}

#-----------------------------------------------#
#                   ADD PRODUCT                 #
#-----------------------------------------------# 
function product($data, $id)
{
  global $koneksi;
  $id_media = $data['gambar'];
  $target = $data['target'];
  $time = $data['time'];

  $sql = "INSERT INTO tbl_product (id_user, id_media, target, time) VALUES (:id_user, :id_media, :target, :time)";

  $stmt = $koneksi->prepare($sql);
  $stmt->bindParam(':id_user', $id);
  $stmt->bindParam(':id_media', $id_media);
  $stmt->bindParam(':target', $target);
  $stmt->bindParam(':time', $time);

  $stmt->execute();
  return $stmt->rowCount();
}


function ip_share($data, $id)
{
  global $koneksi;

  $time = time();
  $sql = "INSERT INTO tbl_ip (id_user, ip_share, time) VALUES (:id_user, :ip_share, :time)";
  $stmt = $koneksi->prepare($sql);
  $stmt->bindParam(':id_user', $id);
  $stmt->bindParam(':ip_share', $data);
  $stmt->bindParam(':time', $time);
  $stmt->execute();
  return $stmt->rowCount();
}

function ip_proxy($data, $id)
{
  global $koneksi;

  $time = time();
  $sql = "INSERT INTO tbl_ip (id_user, ip_proxy, time) VALUES (:id_user, :ip_proxy, :time)";
  $stmt = $koneksi->prepare($sql);
  $stmt->bindParam(':id_user', $id);
  $stmt->bindParam(':ip_proxy', $data);
  $stmt->bindParam(':time', $time);
  $stmt->execute();
  return $stmt->rowCount();
}

function ip_remote($data, $id)
{
  global $koneksi;

  $time = time();
  $sql = "INSERT INTO tbl_ip (id_user, ip_remote, time) VALUES (:id_user, :ip_remote, :time)";
  $stmt = $koneksi->prepare($sql);
  $stmt->bindParam(':id_user', $id);
  $stmt->bindParam(':ip_remote', $data);
  $stmt->bindParam(':time', $time);
  $stmt->execute();
  return $stmt->rowCount();
}
