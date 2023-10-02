<?php

if (isset($_POST['submit'])) {
  $r = $_FILES['files']['name'];

  $a = [
    'name' => $r
  ];

  // $c = count($_FILES['files']['name']);

  $b = InsertMedia('tbl_ip', $a);
  // for ($x = 0; $x < $c; $x++) {
  // $r = array();
  // }
  // foreach ($r as $h) {
  //   var_dump(count($h));
  // }

  // echo ($r);

  var_dump($b);
  // var_dump(count($_FILES['files']['name']));
  // echo "<br>";
  // var_dump($_FILES['files']['name']);
  // echo "<br>";
  // var_dump($_FILES);
  // echo "<br>";

  // if ($b > 0) {
  //   header("Location: index.php?p=input");
  // }
}


?>

<div class="container-fluid">

  <div class="row">

    <div class="col-lg-12">

      <div class="card-wrapper">

        <!-- Input groups -->

        <div class="card">

          <!-- Card header -->

          <form action="" method="POST" enctype="multipart/form-data">

            <div class="card-header d-flex justify-content-between">

              <h3 class="mb-0">Contact Info</h3>

              <button type="submit" name="submit" class="btn btn-primary btn-sm mb-2">Simpan</button>

            </div>

            <!-- Card body -->

            <div class="card-body">

              <!-- Input groups with icon -->

              <div class="row">

                <div class="col-md-4">

                  <div class="form-group">

                    <label class="form-control-label" for="">IP PROXY</label>

                    <div class="input-group input-group-merge">

                      <div class="input-group-prepend">

                        <span class="input-group-text"><i class="fas fa-phone"></i></span>

                      </div>

                      <input class="form-control" type="text" name="ip_proxy" type="text">

                    </div>

                  </div>

                </div>

                <div class="col-md-4">

                  <div class="form-group">

                    <label class="form-control-label" for="">IP REMOTE</label>

                    <div class="input-group input-group-merge">

                      <div class="input-group-prepend">

                        <span class="input-group-text"><i class="fas fa-fax"></i></span>

                      </div>

                      <input class="form-control" type="text" name="ip_remote" type="text">

                    </div>

                  </div>

                </div>

                <div class="col-md-4">

                  <div class="form-group">

                    <label class="form-control-label" for="">IP SHARE</label>

                    <div class="input-group input-group-merge">

                      <div class="input-group-prepend">

                        <span class="input-group-text"><i class="fab fa-instagram"></i></i></span>

                      </div>

                      <input class="form-control" type="text" name="ip_share" type="text">

                    </div>

                  </div>

                </div>

              </div>

              <div class="row">

                <div class="col-md-12">

                  <div class="form-group">

                    <label class="form-control-label" for="">IP SHARE</label>

                    <div class="input-group input-group-merge">

                      <div class="input-group-prepend">

                        <span class="input-group-text"><i class="fab fa-instagram"></i></i></span>

                      </div>

                      <input class="form-control" type="file" name="files[]" multiple>

                    </div>

                  </div>

                </div>

              </div>

            </div>

          </form>

        </div>

      </div>

    </div>

  </div>

</div>