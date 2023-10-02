<?php
if (!empty($_GET['detail-category'])) {
  $e = $_GET['detail-category'];
    $q = 'sub_';
  // echo $e;
} else {
      $q = '';
  $e = 'Category';
  // echo $e;
}
  $s = '-sub';

if (!empty($_GET['detail-category'])) {
  $detail_sub = $_GET['detail-category'];


  $sub = query("SELECT * FROM tbl_sub_category WHERE category_target = '$detail_sub'")[0];

  if (isset($_POST['edit_'.$e])) {
    $time = explode(" ", microtime());
    $meta_title = $_POST['meta_title_'.$e];
    $meta_description = $_POST['meta_description_'.$e];
    $meta_img = 'meta_img_'.$e;
    $meta_keywords = $_POST['meta_keywords_'.$e];

     $nama_gambar = time() . '-' . $_FILES[$meta_img]['name'];
                                $lokasi_gambar = 'assets/img/wahana/uploads/' . $nama_gambar;
                                $gambar = $_FILES[$meta_img]['tmp_name'];
    if (!empty($gambar)) {
                                $upload= move_uploaded_file($gambar,$lokasi_gambar);
    $sql =  $conn= query("UPDATE tbl_pages_setting SET meta_title ='$meta_title', meta_description='$meta_description', meta_keywords='$meta_keywords', image_thumb ='$nama_gambar' WHERE name ='$e'");
     echo "<script>
                 alert('data berhasil di update');
              window.location.href='index.php?p=product-page&detail-category=" . $detail_sub . "';
            </script>";

}else{
 $sql =  $conn= query("UPDATE tbl_pages_setting SET meta_title ='$meta_title', meta_description='$meta_description', meta_keywords='$meta_keywords' WHERE name ='$e'");
  echo "<script>
                 alert('data berhasil di ubah');
              window.location.href='index.php?p=product-page&detail-category=" . $detail_sub . "';
            </script>";
}

  }

}




?>


<!-- PROJECT PLAYGROUND -->
<div class="card m-3">
  <!-- Card header -->
  <div class="card-header border-0">
    <div class="row">
      <div class="col-6">
        <h3 class="mb-0"><?= $e ?></h3>
      </div>
      <?php 
      if (isset($_GET['detail-category']) && !isset($_GET['product'])) {
  $e = $_GET['detail-category']; ?>
     <!-- Modal Button -->
      <div class="col-6 text-right">
        <button type="button" class="btn btn-primary btn-sm btn-round btn-icon" data-toggle="modal" data-target="#modal_edit_meta">
          <span class="btn-inner--icon"><i class="fas fa-user-edit"></i></span>
          <span class="btn-inner--text">Edit Meta <?= $e ?></span>
        </button>
      </div>
      <!-- END Modal Button -->
  
<?php } else {
  
  $e= $_GET['product'];
}
       ?>
     <?php $data= pilih_query("SELECT * FROM tbl_pages_setting WHERE name ='$e'", "array")[0][0] ?>
      <!-- Modal -->
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="modal fade" id="modal_edit_meta" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Meta <?= $e ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body border">
                <div class="form-goup row">
                  <div class="col-md-6">
                    <label>Meta Title</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" name="meta_title_<?= $e ?>" value="<?= $data['meta_title'] ?>" >
                  </div>
                   <div class="col-md-6">
                    <label>Meta Description</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" name="meta_description_<?= $e ?>" value="<?= $data['meta_description'] ?>" >
                  </div>
                   <div class="col-md-6">
                    <label>Image Thumbnail</label>
                    <img width="300px" src="assets/img/wahana/uploads/<?= $data['image_thumb']?>">
                    <input type="file" class="form-control mb-2 mr-sm-2" name="meta_img_<?= $e ?>" value="<?= $data['image_thumb'] ?>" >
                  </div>
                   <div class="col-md-6">
                    <label>Meta Keywoards <small>pisahkan dengan koma (,)</small></label>
                    <input type="text" class="form-control mb-2 mr-sm-2" name="meta_keywords_<?= $e ?>" value="<?= $data['meta_keywords'] ?>" >
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm btn-round" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm btn-round" name="edit_<?= $e ?>">Simpan Meta <?= $e ?></button>
              </div>
            </div>
          </div>
        </div>
      </form>
      <!-- END Modal -->
    </div>
  </div>

  <!-- Light Table -->
  <?php
  if (isset($_GET['detail-category'])) {
    $t = query("SELECT * FROM tbl_" . $q . "category WHERE category_target = '$detail_sub'")[0];
  } else {
    $t = query("SELECT * FROM tbl_category")[0];
  }
  ?>
  <div class="table-responsive py-4">
    <table class="table align-items-center table-flush" id="">
      <thead class="thead-light">
        <tr>
          <th>No.</th>
          <th class="pl-5"><?= $e ?></th>
          <th>Date</th>
          <th>Edit</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($t as $c) : ?>
             <?php $n_p = strtolower(str_replace(' ', '', $c[$q . 'category_name'] )); ?>
          <tr>
            <td class="table-user"><?= $i++ ?></td>
            <td class="table-user">
              <?php if (!empty($_GET['detail-category'])) { ?>
                <a class="font-weight-bold" data-toggle="modal" data-target="#modal_edit_meta_<?=$n_p ?>"  href="#"><?= $c[$q . 'category_name']; ?></a>
              <?php } else { ?>
                <a class="font-weight-bold" href="?p=product-page&detail-category=<?= $c['category_target'] ?>"><?= $c[$q . 'category_name']; ?></a>
              <?php } ?>
            </td>
            <td>
              <label class="font-weight-bold"><?= date("j F Y ", $c[$q . 'category_time']) ?></label>
            </td>
            <td class="table-actions">
              <?php if (!empty($_GET['detail-category'])) { ?>
                
                <a href="?p=product-page&detail-category=<?= $c['category_target'] ?>&product=<?= $n_p ?>" class="table-action table-action-edit" data-toggle="modal" data-target="#modal_edit_meta_<?=$n_p ?>" data-original-title="Edit Meta">
                  <i class="fas fa-edit"></i>
                </a>
                <?php $data_p= pilih_query("SELECT * FROM tbl_pages_setting WHERE name ='$n_p'", "array")[0][0] ?>
                <?php echo '
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="modal fade" id="modal_edit_meta_'.$n_p.'" tabindex="1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Meta '.$c[$q . 'category_name'].'</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body border">
                <div class="form-goup row">
                  <div class="col-md-6">
                    <label>Meta Title</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" name="meta_title_'.$n_p.'" value="'.$data_p['meta_title'].'" >
                  </div>
                   <div class="col-md-6">
                    <label>Meta Description</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" name="meta_description_'.$n_p.'" value="'.$data_p['meta_description'].'" >
                  </div>
                   <div class="col-md-6">
                    <label>Image Thumbnail</label><br>
                    <img width="200px" src="assets/img/wahana/uploads/'.$data_p['image_thumb'].'">
                    <input type="file" class="form-control mb-2 mr-sm-2" name="meta_img_'.$n_p.'" value="'.$data_p['image_thumb'].'" >
                  </div>
                   <div class="col-md-6">
                    <label>Meta Keywoards <small>pisahkan dengan koma (,)</small></label>
                    <input type="text" class="form-control mb-2 mr-sm-2" name="meta_keywords_'.$n_p.'" value="'.$data_p['meta_keywords'].'" >
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm btn-round" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm btn-round" name="edit_'.$n_p.'">Simpan Meta '.$n_p.'</button>
              </div>
            </div>
          </div>
        </div>
      </form>
      '; 

      if (isset($_POST['edit_'.$n_p])) {
          $time = explode(" ", microtime());
    $meta_title = $_POST['meta_title_'.$n_p];
    $meta_description = $_POST['meta_description_'.$n_p];
    $meta_img = 'meta_img_'.$n_p;
    $meta_keywords = $_POST['meta_keywords_'.$n_p];

     $nama_gambar = time() . '-' . $_FILES[$meta_img]['name'];
                                $lokasi_gambar = 'assets/img/wahana/uploads/' . $nama_gambar;
                                $gambar = $_FILES[$meta_img]['tmp_name'];
    if (!empty($gambar)) {
                                $upload= move_uploaded_file($gambar,$lokasi_gambar);
    $sql =  $conn= query("UPDATE tbl_pages_setting SET meta_title ='$meta_title', meta_description='$meta_description', meta_keywords='$meta_keywords', image_thumb ='$nama_gambar' WHERE name ='$n_p'");
     echo "<script>
                 alert('data berhasil di update');
              window.location.href='index.php?p=product-page&detail-category=" . $detail_sub . "';
            </script>";

}else{
 $sql =  $conn= query("UPDATE tbl_pages_setting SET meta_title ='$meta_title', meta_description='$meta_description', meta_keywords='$meta_keywords' WHERE name ='$n_p'");
  echo "<script>
                 alert('data berhasil di ubah');
              window.location.href='index.php?p=product-page&detail-category=" . $detail_sub . "';
            </script>";
}
      }?>

              <?php } else { ?>
               
              <?php } ?>
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
  // only one checkbox
  function onlyOne(checkbox) {
    let check_playground = document.getElementsByName('id_gambar');
    check_playground.forEach((item) => {
      if (item !== checkbox) item.checked = false
    })
  }
</script>