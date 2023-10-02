<?php

include "multiple-media.php";

?>



<div class="card card-profile">

  <!-- HEADER -->

  <div class="border-bottom">

    <div class="d-flex justify-content-end m-3">

      <button class="btn btn-sm bg-default text-light" data-toggle="modal" data-target="#modalgambar">

        <i class="fas fa-plus"></i>

        Add Media

      </button>

      <!-- Modal Tambah Gambar -->

      <div class="modal fade" id="modalgambar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">

          <div class="modal-content">

            <div class="modal-header">

              <h5 class="modal-title w-100" id="myModalLabel">Tambah Gambar Baru</h5>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                <span aria-hidden="true">&times;</span>

              </button>

            </div>

            <div class="modal-body">

              <!-- modal Body -->

              <form method="post" action="" enctype="multipart/form-data">

                <div class="row">

                  <div class="container form-group">
                    <div class="col-md-12">

                      <div class="file-loading"> -->
                        <input id="input-id" class="file" type="file" name="gambar[]" multiple data-theme="fas">
                      </div>
                      <small class="text-danger">max upload : 20 images</small>
                      <br>
                      <small class="text-danger">max size : 20 MB</small>
                      <!-- <div>
                        <input type="file" name="gambar[]" multiple>
                      </div> -->

                    </div>

                    <!-- <div class="col-md-12 form-group" style="border-style: dashed; border-width: 0.5px;">

                      <img src="assets/wahana/default/unnamed.jpg" class="img-fluid py-2" alt="" id="profileDisplay" onclick="trigerClick()" style="display: block; width: 1080px; height: 400px; margin:5px auto; border-radius:1%; cursor: pointer;">

                      <input type="file" class="col-md-12 border-0" id="uploadFile" name="gambar[]" onchange="displayImage(this)" style="display:none;" multiple>

                    </div> -->

                    <div class="form-group row">

                      <!-- <label for="nama" class="col-md-2 col-form-label">Keterangan</label> -->

                      <!-- <div class="col-md-10">

                        <input type="text" class="form-control" placeholder="Keterangan Gambar" name="alt">

                      </div> -->

                    </div>

                  </div>

                </div>

                <div>

                  <!-- <label class="ml-2 mb-3 pr-1"><input class="" type="checkbox" name="enable">enable</label> -->

                </div>

                <!-- end modal Body -->

                <div class="modal-footer">

                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>

                  <button type="submit" class="btn btn-primary" name="simpan" value="ada">Upload</button>

                </div>

              </form>

            </div>

          </div>

        </div>

      </div>

    </div>

  </div>



  <!-- BODY -->

  <div class="card-body bg-transparent">

    <?php if (isset($_SESSION['msg'])) : ?>

      <div class="alert <?= $_SESSION['class']; ?>">

        <?= $_SESSION['msg']; ?>

      </div>

    <?php endif; ?>

    <div class="row">

      <?php

      $r = query_media("SELECT * FROM tbl_media ORDER BY id_media DESC")[0];

      // $h = pilih_query("SELECT * FROM tbl_media ORDER BY time DESC", 'count');



      foreach ($r as $b) {

      ?>

        <div class="col-lg-2 mt-3 ">

          <!-- Profile card -->

          <div class="card card-profile">

            <img src="<?= BASE_URL; ?>assets/img/wahana/<?= $b['pict_name']; ?>" alt="Image placeholder" class="card-img-top" width="100%" height="200px">

            <div class="card-header text-center border-top border-bottom pt-2 pt-md-2 pb-0 pb-md-2">

              <div class="d-flex justify-content-center">

                <!-- <a href="#" class="table-action table-action-delete" data-toggle="tooltip" data-original-title="Add Image"><i class="fas fa-user-edit"></i></a> -->

                <a href="index.php?p=crud&delete=<?= $b['id_media']; ?>&name=<?= $b['pict_name']; ?>" class="table-action table-action-delete" data-toggle="tooltip" data-original-title="Delete Image"><i class="fas fa-trash"></i></a>

              </div>

            </div>

          </div>

        </div>

      <?php

      }

      ?>





    </div>

  </div>



</div>



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

<!-- <script>
  $("#input-id").fileinput();
</script> -->