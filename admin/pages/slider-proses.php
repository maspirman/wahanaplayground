<?php

#-----------------------------------------------#
#                   SLIDER                      #
#-----------------------------------------------# 
if (!empty($_POST['simpan'])) {
  $id_slider  = $_POST['slider_on'];
  $name_slider  = $_POST['slider'];

  if (isset($id_slider)) {
    if (slider($id_slider, $name_slider) > 0) {
      $conn= query("UPDATE tbl_home_content SET id_media='$id_slider' WHERE name = '$name_slider'");
      echo "
      <script>
      alert('data berhasil ditambahkan');
      document.location.href = 'index.php?p=slider';
      </script>
      ";
    } else {
      echo "
      <script>
      alert('data gagal dipindahkan');
      document.location.href = 'index.php?p=slider';
      </script>
      ";
    }
  } else {
    echo "
      <script>
      alert('tidak ada id yang dituju');
      document.location.href = 'index.php?p=slider';
      </script>
      ";
  }
}

// if (!empty($_GET['slider'])) {
//   $id = $_GET['slider'];

//   if (isset($id)) {
//     if (slider_off($id) > 0) {
//       echo "
//       <script>
//       alert('data berhasil di non-aktifkan');
//       document.location.href = 'index.php?p=slider';
//       </script>
//       ";
//     } else {
//       echo "
//       <script>
//       alert('data gagal di non-aktifkan 2');
//       document.location.href = 'index.php?p=slider';
//       </script>
//       ";
//       // var_dump($_POST);
//     }
//   } else {
//     echo "
//   <script>
//   alert('data gagal di non-aktifkan 1');
//   document.location.href = 'index.php?p=slider';
//   </script>
//   ";
//   }
// }

// if (isset($_POST['save'])) {
//   $id = $_POST['id'];
//   $name = $_POST['alt'];

//   if (isset($id)) {
//     if (slider_save($id, $name) > 0) {
//       echo "
//       <script>
//       alert('data berhasil di save');
//       document.location.href = 'index.php?p=homepage';
//       </script>
//       ";
//     } else {
//       echo "
//       <script>
//       alert('data gagal di save');
//       document.location.href = 'index.php?p=homepage';
//       </script>
//       ";
//     }
//   }
// }
