<?php

include "apl/redirect/load_media.php";

function delete_media($id, $name)
{
  $target = "assets/img/wahana/" . $name;
  if (file_exists($target)) {
    unlink($target);
    $query = pilih_query("DELETE FROM media WHERE id=$id", 'count');
    if ($query > 0) {
      echo "<script>
              alert('Berhasil Delete Gambar');
              window.location.href='index.php?p=media';
            </script>";
    }
  }
}
