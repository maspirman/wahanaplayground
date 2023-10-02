<?php

if (isset($_POST['simpan'])) {

  if (rubah($_POST) > 0) {

    echo "<script>

              alert('Data berhasil dirubah');

              document.location.href = 'index.php?p=profile';

            </script>";
  } else {

    echo "<script>

            alert('Data gagal dirubah');

            document.location.href = 'index.php?p=profile';

          </script>";
  }
}

if (isset($_POST['pwd'])) {

  $data = [

    'old' => $_POST['oldpass'],

    'new' => $_POST['newpass'],

    'confirm' => $_POST['confirmnewpass']

  ];

  if (pwd($data, $id_user) > 0) {

    echo "<script>

              alert('Data berhasil dirubah');

              document.location.href = 'index.php?p=profile';

            </script>";
  } else {

    echo "<script>

            alert('Data gagal dirubah');

            document.location.href = 'index.php?p=profile';

          </script>";
  }
}

?>



<div class="col-lg-12 mt-3 ">

  <!-- Profile card -->

  <div class="card card-profile">

    <img src="<?= BASE_URL; ?>assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top" width="100%" height="200px">

    <div class="row justify-content-center">

      <div class="col-lg-3 order-lg-2">

        <div class="card-profile-image">

          <a href="#">

            <img src="<?= BASE_URL; ?>assets/img/wahana.png" class="rounded-circle">

          </a>

        </div>

      </div>

    </div>

    <!-- <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">

      <div class="d-flex justify-content-right">

        <a href="#" class="btn btn-sm btn-info mr-4">Connect</a>

        <a href="#" class="btn btn-sm btn-default float-right">Message</a>

      </div>

    </div> -->

    <div class="card-body pt-0 mt-6 mb-0 pb-2">

      <div class="row">

        <div class="col">

          <div class="card-profile-stats d-flex justify-content-center">

            <div>

              <span class="heading"><?= date('d', $u['time']); ?></span>

              <span class="description">Tanggal</span>

            </div>

            <div>

              <span class="heading"><?= date('F', $u['time']); ?></span>

              <span class="description">Bulan</span>

            </div>

            <div>

              <span class="heading"><?= date('Y', $u['time']); ?></span>

              <span class="description">Tahun</span>

            </div>

          </div>

        </div>

      </div>

      <div class="text-center">

        <h5 class="h3">

          <?= ucwords($u['username']); ?>

        </h5>

        <div class="h5 font-weight-300">

          <i class="ni location_pin mr-2"></i><?= $u['city'] . ", " . $u['province'] ?>

        </div>

      </div>

    </div>

    <!-- <div class="card-header text-center border-0 mt-0">

      <div class="d-flex justify-content-center">

        <a href="#" class="btn btn-sm btn-info mr-4">Connect</a>

        <a href="#" class="btn btn-sm btn-default float-right">Edit</a>

      </div>

    </div> -->

  </div>

</div>



<div class="rounded m-3">

  <!-- Card header -->

  <form action="" method="POST">

    <div class="card-header d-flex justify-content-between">

      <h3 class="mb-0">Profile Saya</h3>

      <button type="submit" name="simpan" class="btn btn-primary btn-sm">Simpan</button>

    </div>

    <!-- Card body -->

    <div class="card-body bg-white">

      <div class="row">

        <div class="col-sm-6 col-md-6">

          <div class="form-group">

            <label class="form-control-label" for="">Nama</label>

            <input type="hidden" class="form-control" name="id" value="<?= $id_user ?>">

            <input type="text" class="form-control" name="name" value="<?= ucwords($u['username']) ?>">

          </div>

        </div>

        <div class="col-sm-6 col-md-6">

          <div class="form-group">

            <label class="form-control-label" for="">Email</label>

            <input type="email" class="form-control" name="email" value="<?= $u['email'] ?>">

          </div>

        </div>

        <!-- <div class="col-sm-4 col-md-4">

          <div class="form-group">

            <label class="form-control-label" for="">Tanggal Registrasi</label>

            <input type="text" class="form-control" name="date" value="<?= date('d F Y', $u['time']) ?>">

          </div>

        </div> -->

      </div>

      <div class="row">

        <div class="col-md-6">

          <div class="form-group">

            <label class="form-control-label" for="">Kota</label>

            <input type="text" class="form-control" name="city" value="<?= $u['city'] ?>">

          </div>

        </div>

        <div class="col-md-6">

          <div class="form-group">

            <label class="form-control-label" for="">Provinsi</label>

            <input type="text" class="form-control" name="province" value="<?= $u['province'] ?>">

          </div>

        </div>

      </div>

    </div>

  </form>

</div>



<div class="rounded m-3">

  <!-- Card header -->

  <form action="" method="POST">

    <div class="card-header d-flex justify-content-between">

      <h3 class="mb-0">Ganti Password</h3>

      <button type="submit" name="pwd" class="btn btn-primary btn-sm">Simpan</button>

    </div>

    <!-- Card body -->

    <div class="card-body bg-white">

      <div class="row">

        <div class="col-sm-4 col-md-4">

          <div class="form-group">

            <label class="form-control-label" for="">Password Lama</label>

            <input type="hidden" class="form-control" name="id" value="<?= $id_user ?>">

            <input type="password" class="form-control" name="oldpass" value="">

          </div>

        </div>

        <div class="col-sm-4 col-md-4">

          <div class="form-group">

            <label class="form-control-label" for="">Password Baru</label>

            <input type="password" class="form-control" name="newpass" value="">

          </div>

        </div>

        <div class="col-sm-4 col-md-4">

          <div class="form-group">

            <label class="form-control-label" for="">Konfirmasi Password Baru</label>

            <input type="password" class="form-control" name="confirmnewpass" value="">

          </div>

        </div>

      </div>

    </div>

  </form>

</div>