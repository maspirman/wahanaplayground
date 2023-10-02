<?php
$_SESSION['msg'] = null;
$sub_ctgr_id = $_GET['detail-sub-category-id'];
$set = query("SELECT * FROM tbl_sub_category WHERE sub_category_id = '$sub_ctgr_id'")[0][0];

if (isset($_POST['submit'])) {


  // if (!empty($_POST['files'])) {
  //   // var_dump($_FILES['gambar']['name']);
  //   $id_user = $_SESSION['id'];
  //   $nama_gambar = time() . '-' . $_FILES['files']['name'];
  //   $lokasi_gambar = 'assets/img/wahana/' . $nama_gambar;
  //   $gbr = $_FILES['gambar']['name'];
  //   if (!empty($gbr)) {
  //     //-------------- 
  //     $extension = array();
  //     $req_ext = ['png', 'jpg', 'jpeg'];
  //     $countFile = count($_FILES['files']['name']);
  //     //Pengulangan upload dan input database 
  //     for ($i = 0; $i < $countFile; $i++) {
  //       $microtime = explode(" ", microtime());
  //       $name = $microtime[1] . "-" . $_FILES['files']['name'][$i];
  //       $altArray = explode("-", $name);
  //       $alt = explode(".", $altArray[1]);
  //       $path = 'assets/img/wahana/' . $name;
  //       $extension[] = pathinfo($path, PATHINFO_EXTENSION);
  //       $ext = $extension[$i];
  //       // jika format yang diizinkan benar maka upload file ke server
  //       if (in_array($ext, $req_ext)) {
  //         $upload_file = move_uploaded_file($_FILES['files']['tmp_name'][$i], $path);
  //         // jika gambar berhasil diupload ke server maka input data ke database
  //         if ($upload_file) {
  //           $input = pilih_query("INSERT INTO tbl_media (pict_name, alt, time, microtime) VALUES ('$name', '$alt[0]', '$microtime[1]', '$microtime[0]')", "count");




  //         } else {
  //           $_SESSION['msg'] = 'Gambar gagal di upload';
  //           $_SESSION['class'] = 'alert-danger';
  //         }
  //       } else {
  //         $_SESSION['msg'] = 'Hanya gambar yang boleh diupload';
  //         $_SESSION['class'] = 'alert-danger';
  //       }
  //     }
  //     //--------------
  //     if ($input > 0) {
  //       $_SESSION['msg'] = 'Gambar berhasil diupload';
  //       $_SESSION['class'] = 'alert-success';
  //     } else {
  //       $_SESSION['msg'] = 'Gambar ke : failed to upload';
  //       $_SESSION['class'] = 'alert-danger';
  //     }
  //   }
  // }




  $name_sub = $set['sub_category_name'];
  $throw_target = str_replace(" ", "", strtolower($name_sub));
  $micro = explode(" ", microtime());
  $microtime = $micro[0];
  $time = $micro[1];
  $loop_id = count($_POST['id_gambar']);


  for ($i = 0; $i < $loop_id; $i++) {
    $get_id = $_POST['id_gambar'][$i];
    $input = pilih_query("INSERT INTO tbl_product (id_user, sub_category_id, sub_category_name, id_media, target, time, microtime) VALUES ('$id_user', '$sub_ctgr_id', '$name_sub', '$get_id', '$throw_target', '$time', '$microtime')", "count");
  }
}

if (!empty($_GET['delete'])) {
  $x = $_GET['delete'];
  $p = pilih_query("DELETE FROM tbl_product WHERE id_product='$x'", 'count');
  if ($p > 0) {

    // echo "<script>
    //         window.location.href='index.php?p=product&detail-sub-category-id=" . $sub_ctgr_id . "';
    //       </script>";
  } else {
    echo "<script>
            alert('gambar gagal di Delete');
            window.location.href='index.php?p=product&detail-sub-category-id=" . $sub_ctgr_id . "';
          </script>";
  }
}

if (isset($_POST['save'])) {
  $des = htmlspecialchars($_POST['alt']);
  $nama = htmlspecialchars($_POST['nama']);
  $description = htmlspecialchars($_POST['description']);
  $id_med = $_POST['id'];
  $id_produk = $_POST['id_product'];
  // var_dump($id_med);
  // var_dump($des);
  $desc = pilih_query("UPDATE tbl_media SET alt='$des' WHERE id_media = '$id_med'", "count");
  $update_produk = pilih_query("UPDATE tbl_product SET product_name='$nama', description='$description' WHERE id_product = '$id_produk'", "count");
   echo "<script>
            alert('produk berhasil diubah');
            window.location.href='index.php?p=product&detail-sub-category-id=" . $sub_ctgr_id . "';
          </script>";
}

?>
<!-- PROJECT PLAYGROUND -->
<?php if (isset($_SESSION['msg'])) : ?>
  <div class="alert <?= $_SESSION['class']; ?>">
    <?= $_SESSION['msg']; ?>
  </div>
<?php endif; ?>
<div class="card m-3">
  <!-- Card header -->
  <div class="card-header border-0">
    <div class="row">
      <div class="col-6">
        <h3 class="mb-0"><?= $set['sub_category_name'] ?> Table</h3>
      </div>
      <!-- Modal Button -->
      <div class="col-6 text-right">
        <button type="button" class="btn btn-primary btn-sm btn-round btn-icon" data-toggle="modal" data-target="#modalpj_playground">
          <span class="btn-inner--icon"><i class="fas fa-user-edit"></i></span>
          <span class="btn-inner--text">Add Product</span>
        </button>
      </div>
      <!-- END Modal Button -->
      <!-- Modal -->
      <form action="" method="post">
        <div class="modal fade" id="modalpj_playground" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body border">

                <?php /*
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Media</a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Upload File</a>
                  </li>
                  <!-- <li class="nav-item" role="presentation">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                  </li> -->
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active pt-3" id="home" role="tabpanel" aria-labelledby="home-tab">
                    
                  </div>
                  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="file-loading">
                      <input id="input-id" class="file" type="file" name="files[]" multiple data-theme="fas">
                    </div>
                  </div>
                  <!-- <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div> -->
                </div> */ ?>


                <div class="form-goup row">
                  <?php $media = query("SELECT * FROM tbl_media ORDER BY time DESC")[0]; ?>
                  <?php foreach ($media as $row) : ?>
                    <div class="col-lg-2 mt-1 ">
                      <!-- Profile card -->
                      <div class="card card-profile">
                        <img src="assets/img/wahana/<?= $row['pict_name']; ?>" alt="Image placeholder" class="card-img-top" width="100px" height="70px">
                        <div class="card-header text-center border-top border-bottom pt-2 pt-md-2 pb-0 pb-md-2">
                          <div class="d-flex justify-content-center">
                            <input class="" type="checkbox" name="id_gambar[]" value="<?= $row['id_media']; ?>">
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm btn-round" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm btn-round" name="submit">Add Product</button>
              </div>
            </div>
          </div>
        </div>
      </form>
      <!-- END Modal -->
    </div>
  </div>

  <!-- Light Table -->
  <?php $clasic = query("SELECT tbl_media.id_media, tbl_media.pict_name, tbl_media.alt, tbl_product.id_product, tbl_product.product_name, tbl_product.description, tbl_product.time FROM tbl_media INNER JOIN tbl_product ON tbl_media.id_media=tbl_product.id_media WHERE tbl_product.sub_category_id='$sub_ctgr_id' ORDER BY alt ASC")[0]; ?>
  <div class="table-responsive py-4">
    <table class="table align-items-center table-flush" id="datatable-basic">
      <thead class="thead-light">
        <tr>
          <th>No.</th>
          <th class="pl-5">Product</th>
          <th>Nama</th>
          <th>Deskripsi</th>
          <th>Kode</th>
          <th>Tanggal</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($clasic as $r) : ?>
          <tr>
            <td class="table-user"><?= $i++; ?></td>
            <td class="table-user">
              <img src="assets/img/wahana/<?= $r['pict_name']; ?>" class="img-thumbhanil" width="80px" height="50px">
            </td>
            <td>
              <?= $r['product_name'] ?>
            </td>
            <td>
              <?= $r['description'] ?>
            </td>
            <td>
              <span class="font-weight-bold"><?= $r['alt']; ?></span>
            </td>
            <td>
              <label class="font-weight-bold"><?= date('j F Y', $r['time']); ?></label>
            </td>
            <td class="table-actions">
              <form action="" method="POST">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal<?= $r['id_product'] ?>">
                  <i class="fas fa-edit"></i>
                </button>
                <a href="?p=product&detail-sub-category-id=<?= $sub_ctgr_id ?>&delete=<?= $r['id_product'] ?>" class="table-action table-action-delete" data-toggle="tooltip" data-original-title="Delete Product">
                  <i class="fas fa-trash"></i>
                </a>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal<?= $r['id_product'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Description</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                        <input type="hidden" class="form-control" value="<?= $r['id_media']; ?>" name="id">
                        <input type="hidden" class="form-control" value="<?= $r['id_product']; ?>" name="id_product">
                        <label class="form-control-label">Nama Produk</label>
                        <input type="text" class="form-control" value="<?= $r['product_name']; ?>" name="nama">
                        <label class="form-control-label">Deskripsi Produk</label>
                        <input type="text" class="form-control" value="<?= $r['description']; ?>" name="description">
                        <label class="form-control-label">Image Alt</label>
                        <input type="text" class="form-control" value="<?= $r['alt']; ?>" name="alt">
                        </div>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="save">Save changes</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
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
  // only one checkbox
  function onlyOne(checkbox) {
    let check_playground = document.getElementsByName('id_gambar');
    check_playground.forEach((item) => {
      if (item !== checkbox) item.checked = false
    })
  }
</script>