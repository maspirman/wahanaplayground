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

              <span class="heading"><?= date('d', $u['time']) ?></span>

              <span class="description">Tanggal</span>

            </div>

            <div>

              <span class="heading"><?= date('F', $u['time']) ?></span>

              <span class="description">Bulan</span>

            </div>

            <div>

              <span class="heading"><?= date('Y', $u['time']) ?></span>

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