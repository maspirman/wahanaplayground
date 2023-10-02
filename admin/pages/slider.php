<?php
// require_once "slider-proses.php";

if (!empty($_GET['slider'])) {
  $id = $_GET['slider'];

  if (isset($id)) {
    if (slider_off($id) > 0) {
      echo "
      <script>
      alert('data berhasil di non-aktifkan');
      document.location.href = 'index.php?p=homepage';
      </script>
      ";
    } else {
      echo "
      <script>
      alert('data gagal di non-aktifkan 2');
      document.location.href = 'index.php?p=homepage';
      </script>
      ";
      // var_dump($_POST);
    }
  } else {
    echo "
  <script>
  alert('data gagal di non-aktifkan 1');
  document.location.href = 'index.php?p=homepage';
  </script>
  ";
  }
}

?>

<!-- BUTTON MODAL -->
<div class="card card-profile">
  <!-- HEADER -->
  <div class="border-bottom">
    <div class="d-flex justify-content-end m-3">
      <button class="btn btn-sm bg-default text-light" data-toggle="modal" data-target="#modalgambar">
        <i class="fas fa-plus"></i>
        Add Media
      </button>
    </div>
    <!-- Modal Tambah Gambar -->
    <form method="POST" action="index.php?p=slider-proses">
      <div class="modal fade" id="modalgambar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
          <div class="modal-content">
            <div class="modal-header border-bottom">
              <h5 class="modal-title w-100" id="myModalLabel">Tambah Gambar Baru</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- modal Body -->
              <div class="row">
                <?php
                $r = query_media("SELECT * FROM tbl_media ORDER BY time DESC")[0];
                // $h = pilih_query("SELECT * FROM tbl_media ORDER BY time DESC", 'count');

                foreach ($r as $b) {
                ?>
                  <div class="col-lg-4 mt-1 ">
                    <!-- Profile card -->
                    <div class="card card-profile">
                      <img src="<?= BASE_URL; ?>assets/img/wahana/<?= $b['pict_name']; ?>" alt="Image placeholder" class="card-img-top" width="100%" height="200px">
                      <div class="card-header text-center border-top border-bottom pt-2 pt-md-2 pb-0 pb-md-2">
                        <div class="d-flex justify-content-center">
                          <input class="" type="checkbox" name="slider_on" value="<?= $b['id_media']; ?>" onclick="onlyOne(this)">
                        </div>
                      </div>
                    </div>
                  </div>
                <?php
                }
                ?>
              </div>
              <div>
                <!-- <label class="ml-2 mb-3 pr-1"><input class="" type="checkbox" name="enable">enable</label> -->
              </div>
              <!-- end modal Body -->
            </div>
            <div class="modal-footer border-top">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <div class="form-group">
                <label for="exampleInputSelect"></label>
                <select name="slider" class="form-control">
                  <option value='slider_1' selected>Slider 1</option>
                  <option value='slider_2'>Slider 2</option>
                  <option value='slider_3'>Slider 3</option>
                  <option value='slider_4'>Slider 4</option>
                  <option value='slider_5'>Slider 5</option>
                  <?php
                  /*
                  if ($r['agenStatus'] === 'Aktif') {
                    echo "<option value='Aktif' selected>Aktif</option>";
                    echo "<option value='Tidak Aktif'>Tidak Aktif</option>";
                  } else {
                    echo "<option value='Aktif'>Aktif</option>";
                    echo "<option value='Tidak Aktif' selected>Tidak Aktif</option>";
                  }
                  */
                  ?>
                </select>
              </div>
              <button type="submit" class="btn btn-primary" name="simpan" value="ada">Simpan</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>

  <div class="card-body">
    <div class="row">
      <?php
      $data = query_media("SELECT DISTINCT * FROM tbl_media JOIN tbl_home_content ON tbl_media.id_media = tbl_home_content.id_media WHERE tbl_home_content.id_homepage = '1' AND tbl_media.slider != 'off'")[0];
      // $data= $get->fetch_assoc();
       foreach($data as $r){
      ?>
         
      <div class="col-lg-4 mt-3 ">
        <!-- Profile card -->
        <div class="card card-profile">
          <img src="<?= BASE_URL; ?>assets/img/wahana/<?= $r['pict_name']; ?>" alt="Image placeholder" class="card-img-top" width="100%" height="200px">
          <div class="card-header text-center border-top border-bottom pt-2 pt-md-2 pb-0 pb-md-2">
            <div class="d-flex justify-content-center">
              <a href="index.php?p=slider&slider=<?= $r['id_media']; ?>" class="table-action table-action-delete" data-toggle="tooltip" data-original-title="Delete Image"><i class="fas fa-trash"></i></a>
              <!-- modal button slider 1 -->
              <!-- <button class="btn btn-sm btn-info" data-original-title="Add Image" data-toggle="modal" data-target="#slider1"><i class="fas fa-user-edit"></i></button> -->
              <!-- <button class="btn btn-sm btn-danger" data-toggle="tooltip" data-original-title="Delete Image"><i class="fas fa-trash"></i></button> -->
            </div>
          </div>
          <form method="POST" enctype="multipart/form-data">

            <div class="card-body mt-0 pt-0 mt-1 mb-0 pb-2">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="form-control-label" for="">Information</label>
                    <input type="hidden" class="form-control" name="id" value="<?= $r['id_media'] ?>">
                     <input type="hidden" class="form-control" name="id_homepage" value="<?= $r['id_homepage'] ?>">
                  </div>
                   <div class="form-group">
                    <label class="form-control-label" for="">Title</label>
                    <input type="text" class="form-control" name="title" value="<?= $r['title'] ?>">
                  </div>
                   <div class="form-group">
                    <label class="form-control-label" for="">Description</label>
                    <textarea name="description" class="form-control"><?= $r['value'] ?></textarea>
                  </div>
                   <div class="form-group">
                    <label class="form-control-label" for="">Link Button</label>
                    <input type="text" class="form-control" name="link" value="<?= $r['link'] ?>">
                  </div>
                </div>
              </div>
              <!-- <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="form-control-label" for="">Author</label>
                  <input type="text" class="form-control" name="city" value="<?= $u['username'] ?>" disabled>
                </div>
              </div>
            </div> -->
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="form-control-label" for="">Date</label>
                    <input type="text" class="form-control" name="date" value="<?= date('d F Y', $r['time']) ?>" disabled>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-top border-bottom pt-2 pt-md-2 pb-0 pb-md-2">
              <div class="d-flex justify-content-center">
                <button class="btn btn-sm btn-primary mr-4" name="save<?=$r['id'] ?>" value="save">Save</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <?php

#-----------------------------------------------#
#                   SLIDER                      #
#-----------------------------------------------# 
$id_home = $r['id'];
$save =$_POST['save'.$id_home];
if (isset($save)) {
  $id = $_POST['id'];
  $alt = $_POST['alt'];

  if (isset($id)) {
    if (slider_save($id, $alt) > 0) {
      $conn= query("UPDATE tbl_home_content SET title='$_POST[title]', value = '$_POST[description]',link ='$_POST[link]' WHERE id = '$r[id]'");
                                   echo "<script>
                                    alert('Data berhasil dirubah');
                                    document.location.href = 'index.php?p=slider';
                                </script>";
      
    } else {
      echo "
      <script>
      alert('data gagal di save');
      document.location.href = 'index.php?p=slider';
      </script>
      ";
    }

    
  }
}?>

       <?php } ?>

    </div>

  </div>
</div>

<script>
  // only one checkbox
  function onlyOne(checkbox) {
    let check_product = document.getElementsByName('slider_on');
    check_product.forEach((item) => {
      if (item !== checkbox) item.checked = false
    })
  }
</script>