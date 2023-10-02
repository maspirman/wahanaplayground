<?php

include "apl/redirect/load_media.php";

$_SESSION['msg'] = null;

// var_dump($_POST);

if (isset($_POST['simpan'])) {
  $id_user = $_SESSION['id'];
  $nama_gambar = time() . '-' . $_FILES['gambar']['name'];
  $lokasi_gambar = 'assets/img/wahana/' . $nama_gambar;
  $alt = htmlspecialchars($_POST['alt']);
  $waktu = time();
  $gbr = $_FILES['gambar']['name'];

  // var_dump($gbr);
  if (!empty($gbr)) {
    if (!empty($alt)) {
      $upload = move_uploaded_file($_FILES['gambar']['tmp_name'], $lokasi_gambar);
      if (isset($upload)) {
        $sql = pilih_query("INSERT INTO tbl_media (id_user,pict_name,alt, time) VALUES ($id_user,'$nama_gambar','$alt',$waktu)", 'count');
        if ($sql > 0) {
          $_SESSION['msg'] = 'Gambar berhasil diupload';
          $_SESSION['class'] = 'alert-success';
        } else {
          $_SESSION['msg'] = 'Database : failed to upload';
          $_SESSION['class'] = 'alert-danger';
        }
      } else {
        $_SESSION['msg'] = 'gambar gagal diupload';
        $_SESSION['class'] = 'alert-danger';
      }
    } else {
      $_SESSION['msg'] = 'Masukan nama gambar terlebih dahulu';
      $_SESSION['class'] = 'alert-danger';
    }
  } else {
    $_SESSION['msg'] = 'Tidak ada gambar yang dipilih';
    $_SESSION['class'] = 'alert-danger';
  }
}

// Delete Gambar
// if (!empty($_GET['delete'])) {
//   $target = "assets/img/wahana/" . $_GET['name'];
//   if (file_exists($target)) {
//     unlink($target);
//     $id = $_GET['delete'];
//     $query = pilih_query("DELETE FROM media WHERE id=$id", 'count');
//     if ($query > 0) {
//       echo "<script>
//               alert('Berhasil Delete Gambar');
//               window.location.href='index.php?p=media';
//             </script>";
//     }
//   }
// }

// function check()
// {
//   if ($_POST['enable'] == 'on') {
//     $aktif = 'on';
//     return $aktif;
//   } else {
//     $tidakAktif = 'off';
//     return $tidakAktif;
//   }
// }
