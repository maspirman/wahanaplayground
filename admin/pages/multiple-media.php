<?php

// include "apl/redirect/load_media.php";

$_SESSION['msg'] = null;
$_SESSION['class'] = null;

if (isset($_POST['simpan'])) {
  set_time_limit(3000);

  // var_dump($_FILES['gambar']['name']);

  $id_user = $_SESSION['id'];

  $nama_gambar = time() . '-' . $_FILES['gambar']['name'];

  $lokasi_gambar = 'assets/img/wahana/' . $nama_gambar;

  $gbr = $_FILES['gambar']['name'];

  if (!empty($gbr)) {

    //-------------- 

    $extension = array();

    $countFile = count($_FILES['gambar']['name']);

    //Pengulangan upload dan input database 
    for ($i = 0; $i < $countFile; $i++) {

      $req_ext = ['png', 'jpg', 'jpeg'];

      $_SESSION['msg'] = null;
      $_SESSION['class'] = null;

      $microtime = explode(" ", microtime());

      $name = $microtime[1] . "-" . strtolower($_FILES['gambar']['name'][$i]);

      $altArray = explode("-", $name);

      $alt = explode(".", $altArray[1]);

      $path = 'assets/img/wahana/' . $name;

      $extension[] = pathinfo($path, PATHINFO_EXTENSION);

      $ext = $extension[$i];

      // jika format yang diizinkan benar maka upload file ke server
      if (in_array($ext, $req_ext)) {

        $upload_file = move_uploaded_file($_FILES['gambar']['tmp_name'][$i], $path);

        // jika gambar berhasil diupload ke server maka input data ke database
        if (file_exists($path)) {

          $input = pilih_query("INSERT INTO tbl_media (pict_name, alt, time, microtime) VALUES ('$name', '$alt[0]', '$microtime[1]', '$microtime[0]')", "count");

          $hit += $input;

          if ($input > 0) {

            $_SESSION['msg'] = $hit . ' Gambar berhasil diupload';

            $_SESSION['class'] = 'alert-success';
          } else {

            $_SESSION['msg'] = 'Gambar gagal di upload ke database';

            $_SESSION['class'] = 'alert-danger';

            break;
          }
        } else {

          $_SESSION['msg'] = 'Gambar gagal di upload';

          $_SESSION['class'] = 'alert-danger';

          break;
        }
      } else {

        $_SESSION['msg'] = 'Hanya gambar yang boleh diupload';

        $_SESSION['class'] = 'alert-danger';
      }
    }

    //--------------

    // if ($input > 0) {

    //   $_SESSION['msg'] = 'Gambar berhasil diupload';

    //   $_SESSION['class'] = 'alert-success';
    // } else {

    //   $_SESSION['msg'] = 'Gambar ke : failed to upload';

    //   $_SESSION['class'] = 'alert-danger';
    // }
  } else {

    $_SESSION['msg'] = 'Tidak ada gambar yang dipilih';

    $_SESSION['class'] = 'alert-danger';
  }
}
