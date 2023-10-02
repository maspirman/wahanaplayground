<?php

// cek apakah tombol sudah ditekan

if (isset($_POST['id_info'])) {

  $data = [

    'id_info' => $_POST['id_info'],

    'address' => htmlspecialchars($_POST['address']),

    'phone' => htmlspecialchars($_POST['phone']),

    'fax' => htmlspecialchars($_POST['fax']),

    'ig' => htmlspecialchars($_POST['ig'])

  ];

  $q = pilih_query("SELECT * FROM tbl_info WHERE id_info='$id_info'", "count");

  if ($q > 0) {

    if (info($data, $id_user) > 0) {

      echo "<script>

                alert('Data berhasil dirubah');

                document.location.href = 'index.php?p=company-profile';

            </script>";
    } else {

      echo "<script>

                alert('Data Gagal dirubah');

                document.location.href = 'index.php?p=company-profile';

            </script>";
    }
  } else {

    if (info($data, $id_user) > 0) {

      echo "<script>

                alert('Data berhasil dirubah');

                document.location.href = 'index.php?p=company-profile';

            </script>";
    } else {

      echo "<script>

                alert('Data Gagal dirubah');

                document.location.href = 'index.php?p=company-profile';

            </script>";
    }
  }
}

if (isset($_POST['submit'])) {

  $title = htmlspecialchars($_POST['title']);

  $about = $_POST['content'];

  $title1 = htmlspecialchars($_POST['title1']);

  $about1 = $_POST['content1'];

  $r = pilih_query("UPDATE tbl_info SET title='$title', about='$about', title_id='$title1', about_id='$about1' WHERE id_user='$id_user'", "count");

  if ($r > 0) {

    echo "<script>

              alert('Data berhasil dirubah');

              document.location.href = 'index.php?p=company-profile';

            </script>";
  } else {

    echo "<script>

              alert('Data gagal dirubah');

              document.location.href = 'index.php?p=company-profile';

            </script>";
  }
}

$h = pilih_query("SELECT * FROM tbl_info", "array")[0][0];

?>



<div class="container-fluid">

  <div class="row">

    <div class="col-lg-12">

      <div class="card-wrapper">

        <!-- Input groups -->

        <div class="card">

          <!-- Card header -->

          <form action="" method="POST">

            <div class="card-header d-flex justify-content-between">

              <h3 class="mb-0">Contact Info</h3>

              <button type="submit" name="id_info" class="btn btn-primary btn-sm mb-2" value="<?= $h['id_info'] ?>">Simpan</button>

            </div>

            <!-- Card body -->

            <div class="card-body">

              <!-- Input groups with icon -->

              <div class="row">

                <div class="col-md-12">

                  <div class="form-group">

                    <label class="form-control-label" for="">Headquarters</label>

                    <div class="input-group input-group-merge">

                      <div class="input-group-prepend">

                        <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>

                      </div>

                      <input class="form-control" type="text" name="address" value="<?= $h['address'] ?>" type="text">

                    </div>

                  </div>

                </div>

              </div>

              <div class="row">

                <div class="col-md-4">

                  <div class="form-group">

                    <label class="form-control-label" for="">Call Us</label>

                    <div class="input-group input-group-merge">

                      <div class="input-group-prepend">

                        <span class="input-group-text"><i class="fas fa-phone"></i></span>

                      </div>

                      <input class="form-control" type="text" name="phone" value="<?= $h['phone'] ?>" type="text">

                    </div>

                  </div>

                </div>

                <div class="col-md-4">

                  <div class="form-group">

                    <label class="form-control-label" for="">fax</label>

                    <div class="input-group input-group-merge">

                      <div class="input-group-prepend">

                        <span class="input-group-text"><i class="fas fa-fax"></i></span>

                      </div>

                      <input class="form-control" type="text" name="fax" value="<?= $h['fax'] ?>" type="text">

                    </div>

                  </div>

                </div>

                <div class="col-md-4">

                  <div class="form-group">

                    <label class="form-control-label" for="">Instagram</label>

                    <div class="input-group input-group-merge">

                      <div class="input-group-prepend">

                        <span class="input-group-text"><i class="fab fa-instagram"></i></i></span>

                      </div>

                      <input class="form-control" type="text" name="ig" value="<?= $h['ig'] ?>" type="text">

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


<div class="container-fluid mt-3">

  <div class="row">

    <div class="col-lg-12">

      <div class="card-wrapper">

        <!-- Input groups -->

        <div class="card">

          <form action="" method="POST">

            <!-- Card header -->

            <div class="card-header d-flex justify-content-between">

              <h3 class="mb-0">Company Profile</h3>

              <button type="submit" name="submit" class="btn btn-sm btn-primary mb-2">Simpan</button>

            </div>

            <!-- Card body -->

            <div class="card-body">

              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">English</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Indonesia</a>
                </li>
              </ul>

              <div class="tab-content" id="myTabContent">

                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                  <div class="row mt-4">

                    <div class="col-md-12">

                      <div class="form-group">

                        <label class="form-control-label" for="">Judul</label>

                        <div class="input-group input-group-merge">

                          <div class="input-group-prepend">

                            <span class="input-group-text"><i class="fas fa-heading"></i></span>

                          </div>

                          <input class="form-control" type="text" name="title" value="<?= $h['title'] ?>">

                        </div>

                      </div>

                    </div>

                  </div>

                  <div class="row">

                    <div class="col-md-12">

                      <div class="form-group">

                        <label class="form-control-label" for="">About Us</label>

                        <textarea class="form-control" name="content" id="editor1" rows="10"><?= $h['about'] ?></textarea>

                      </div>

                    </div>

                  </div>

                </div>

                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                  <div class="row mt-4">

                    <div class="col-md-12">

                      <div class="form-group">

                        <label class="form-control-label" for="">Judul</label>

                        <div class="input-group input-group-merge">

                          <div class="input-group-prepend">

                            <span class="input-group-text"><i class="fas fa-heading"></i></span>

                          </div>

                          <input class="form-control" type="text" name="title1" value="<?= $h['title_id'] ?>">

                        </div>

                      </div>

                    </div>

                  </div>

                  <div class="row">

                    <div class="col-md-12">

                      <div class="form-group">

                        <label class="form-control-label" for="">About Us</label>

                        <textarea class="form-control" name="content1" id="editor2" rows="10"><?= $h['about_id'] ?></textarea>

                      </div>

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

<script>
  CKEDITOR.replace('content');
  CKEDITOR.replace('content1');
</script>