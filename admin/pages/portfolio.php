<?php

$sub_ctgr_id = $_GET['detail-sub-category-id'];
$set = query("SELECT * FROM tbl_sub_category WHERE sub_category_id = '$sub_ctgr_id'")[0][0];

if (isset($_POST['submit'])) {
  // var_dump($_FILES);
  if (!empty($_FILES['file']['name'][0])) {
    $title  = htmlspecialchars($_POST['title']);
    $extension = array();
    $req_ext = ['png', 'jpg', 'jpeg', 'gif'];
    $microtime = explode(" ", microtime());
    $name = $microtime[1] . "-" . strtolower($_FILES['file']['name'][0]);
    $path = 'assets/book/img/' . $name;
    $extension[] = pathinfo($path, PATHINFO_EXTENSION);
    $ext = $extension[0];
    if (in_array($ext, $req_ext)) {
      $upload_file = move_uploaded_file($_FILES['file']['tmp_name'][0], $path);
      if ($upload_file) {
        $extension1 = array();
        $req_ext1 = ['pdf'];
        $microtime1 = explode(" ", microtime());
        $name1 = $microtime1[1] . "-" . strtolower($_FILES['file']['name'][1]);
        $path1 = 'assets/book/pdf/' . $name1;
        $extension1[] = pathinfo($path1, PATHINFO_EXTENSION);
        $ext1 = $extension1[0];
        if (in_array($ext1, $req_ext1)) {
          $upload_file1 = move_uploaded_file($_FILES['file']['tmp_name'][1], $path1);
          if ($upload_file1) {
            $sql = pilih_query("INSERT INTO tbl_portfolio (portfolio_title, portfolio_image, portfolio_file, portfolio_time, portfolio_microtime ) VALUES ('$title', '$name', '$name1', '$microtime[1]', '$microtime[0]')", "count");
            if ($sql > 0) {
              echo "<script>
                  window.location.href='index.php?p=portfolio';
                </script>";
            } else {
              echo "<script>
                alert('failed upload database');
                window.location.href='index.php?p=portfolio';
              </script>";
            }
          } else {
            echo "<script>
                alert('failed upload file');
                window.location.href='index.php?p=portfolio';
              </script>";
          }
          $sql = pilih_query("INSERT INTO tbl_portfolio", "count");
        } else {
          echo "<script>
                alert('extension file not valid');
                window.location.href='index.php?p=portfolio';
              </script>";
        }
      } else {
        echo "<script>
              alert('failed upload image');
              window.location.href='index.php?p=portfolio';
            </script>";
      }
    } else {
      echo "<script>
            alert('extension image not valid');
            window.location.href='index.php?p=portfolio';
          </script>";
    }
  }
}

if (!empty($_GET['delete'])) {
  $x = $_GET['delete'];
  $img = $_GET['img'];
  $pdf = $_GET['pdf'];
  $targetImg = "assets/book/img/" . $img;
  $targetFile = "assets/book/pdf/" . $pdf;
  unlink($targetImg);
  unlink($targetFile);
  $p = pilih_query("DELETE FROM tbl_portfolio WHERE portfolio_id='$x'", 'count');
  if ($p > 0) {
    echo "<script>
            window.location.href='index.php?p=portfolio';
          </script>";
  } else {
    echo "<script>
            alert('gambar gagal di Delete');
            window.location.href='index.php?p=portfolio';
          </script>";
  }
}


if (isset($_POST['save'])) {
  $des = htmlspecialchars($_POST['alt']);
  $id_med = $_POST['id'];

  $desc = pilih_query("UPDATE tbl_portfolio SET portfolio_title='$des' WHERE portfolio_id = '$id_med'", "count");
}

?>
<!-- PROJECT PLAYGROUND -->
<div class="card m-3">
  <!-- Card header -->
  <div class="card-header border-0">
    <div class="row">
      <div class="col-6">
        <h3 class="mb-0">Table Portfolio</h3>
      </div>
      <!-- Modal Button -->
      <div class="col-6 text-right">
        <button type="button" class="btn btn-primary btn-sm btn-round btn-icon" data-toggle="modal" data-target="#modalpj_playground">
          <span class="btn-inner--icon"><i class="fas fa-user-edit"></i></span>
          <span class="btn-inner--text">Add Brochure</span>
        </button>
      </div>
      <!-- END Modal Button -->
      <!-- Modal -->
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="modal fade" id="modalpj_playground" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add Brochure</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body border">

                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title pt-1">Brochure Image</h5>
                          <img src="assets/img/wahana/img.png" id="profileDisplay" class="card-img-top" alt="image" onclick="trigerClick()" style="cursor: pointer;">
                          <small class="card-title mt-2"><input type="file" id="uploadFile" name="file[]" onchange="displayImage(this)" style="cursor: pointer;" accept="image/*" required></small>

                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-8">
                    <div class="form-group">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Brochure Title</h5>
                          <input type="text" class="form-control" name="title" placeholder="Title Here..">
                          <h5 class="card-title pt-3">Brochure File</h5>
                          <input type="file" class="form-control" name="file[]" placeholder="File Here.." accept="application/pdf,application/vnd.ms-excel">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm btn-round" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm btn-round" name="submit">Add Brochure</button>
              </div>
            </div>
          </div>
        </div>
      </form>
      <!-- END Modal -->
    </div>
  </div>

  <!-- Light Table -->
  <?php $clasic = query("SELECT portfolio_id, portfolio_title, portfolio_image, portfolio_file, portfolio_time FROM tbl_portfolio ORDER BY portfolio_time DESC")[0]; ?>
  <div class="table-responsive py-4">
    <table class="table align-items-center table-flush" id="datatable-basic">
      <thead class="thead-light">
        <tr>
          <th>No.</th>
          <th class="pl-5">Brochure</th>
          <th>Description</th>
          <th>Date</th>
          <th>Optional</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($clasic as $r) : ?>
          <tr>
            <td class="table-user"><?= $i++; ?></td>
            <td class="table-user">
              <img src="assets/book/img/<?= $r['portfolio_image']; ?>" class="img-thumbhanil" width="80px" height="100px">
            </td>
            <td>
              <span class="font-weight-bold"><?= $r['portfolio_title']; ?></span>
            </td>
            <td>
              <label class="font-weight-bold"><?= date('j-n-Y', $r['portfolio_time']); ?></label>
            </td>
            <td class="table-actions">

              <form action="" method="POST">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal<?= $r['portfolio_id'] ?>">
                  <i class="fas fa-edit"></i>
                </button>
                <a href="?p=portfolio&delete=<?= $r['portfolio_id'] ?>&img=<?= $r['portfolio_image'] ?>&pdf=<?= $r['portfolio_file'] ?>" class="table-action table-action-delete" data-toggle="tooltip" data-original-title="Delete client">
                  <i class="fas fa-trash"></i>
                </a>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal<?= $r['portfolio_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Description</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body border">
                        <input type="hidden" class="form-control" value="<?= $r['portfolio_id']; ?>" name="id">
                        <input type="text" class="form-control" value="<?= $r['portfolio_title']; ?>" name="alt">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="save">Save changes</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>


              <!-- <input type="submit" name="delete_client" class="d-none" id="delete_client"> -->
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <!-- END Light Table -->
</div>
<!-- END PROJECT PLAYGROUND -->

<script>
  // ---------------------------------
  function trigerClick() {
    document.querySelector('#uploadFile').click();
  }

  function displayImage(e) {
    if (e.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
      }
      reader.readAsDataURL(e.files[0]);
    }
  }
</script>