<?php

#-----------------------------------------------#

#                   MEDIA                       #

#-----------------------------------------------# 

$id_media  = $_GET['delete'];

$name_media  = $_GET['name'];



if (isset($id_media)) {

  if (delete_media($id_media, $name_media) > 0) {

    echo "

        <script>

          document.location.href = 'index.php?p=media';

        </script>

    ";
  } else {

    echo "

        <script>

          alert('data gagal dihapus');

          document.location.href = 'index.php?p=media';

        </script>

    ";
  }
}
