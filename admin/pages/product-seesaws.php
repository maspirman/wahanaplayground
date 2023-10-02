<?php
if (isset($_POST['gambar'])) {
  $data = [
    'gambar' => $_POST['id_gambar'],
    'target' => 'seesaws',
    'time' => time()
  ];

  $set = product($data, $id_user);
  if ($set > 0) {
  } else {
    echo "<script>
            alert('gambar gagal di input');
            window.location.href='index.php?p=product-clasic-playground';
          </script>";
  }
}

if (!empty($_GET['delete'])) {
  $x = $_GET['delete'];
  $p = pilih_query("DELETE FROM tbl_product WHERE time='$x'", 'count');
  if ($p > 0) {
    echo "<script>
            window.location.href='index.php?p=product-seesaws';
          </script>";
  } else {
    echo "<script>
            alert('gambar gagal di Delete');
            window.location.href='index.php?p=product-seesaws';
          </script>";
  }
}
?>
<!-- PROJECT PLAYGROUND -->
<div class="card m-3">
  <!-- Card header -->
  <div class="card-header border-0">
    <div class="row">
      <div class="col-6">
        <h3 class="mb-0">Table Seesaws</h3>
      </div>
      <!-- Modal Button -->
      <div class="col-6 text-right">
        <button type="button" class="btn btn-primary btn-sm btn-round btn-icon" data-toggle="modal" data-target="#modalpj_playground">
          <span class="btn-inner--icon"><i class="fas fa-user-edit"></i></span>
          <span class="btn-inner--text">Tambah Product</span>
        </button>
      </div>
      <!-- END Modal Button -->
      <!-- Modal -->
      <form action="" method="post">
        <div class="modal fade" id="modalpj_playground" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Ganti Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body border">
                <div class="form-goup row">
                  <?php $media = query("SELECT * FROM tbl_media ORDER BY time DESC")[0]; ?>
                  <?php foreach ($media as $row) : ?>
                    <div class="col-lg-4 mt-1 ">
                      <!-- Profile card -->
                      <div class="card card-profile">
                        <img src="assets/img/wahana/<?= $row['pict_name']; ?>" alt="Image placeholder" class="card-img-top" width="200px" height="150px">
                        <div class="card-header text-center border-top border-bottom pt-2 pt-md-2 pb-0 pb-md-2">
                          <div class="d-flex justify-content-center">
                            <input class="" type="checkbox" name="id_gambar" value="<?= $row['id_media']; ?>" onclick="onlyOne(this)">
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm btn-round" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary btn-sm btn-round" name="gambar">Simpan Perubahan</button>
              </div>
            </div>
          </div>
        </div>
      </form>
      <!-- END Modal -->
    </div>
  </div>

  <!-- Light Table -->
  <?php $clasic = query("SELECT tbl_media.pict_name, tbl_media.alt, tbl_product.time FROM tbl_media INNER JOIN tbl_product ON tbl_media.id_media=tbl_product.id_media WHERE tbl_product.target='seesaws' ORDER BY time DESC")[0]; ?>
  <div class="table-responsive py-4">
    <table class="table align-items-center table-flush" id="datatable-basic">
      <thead class="thead-light">
        <tr>
          <th>No.</th>
          <th class="pl-5">Product</th>
          <th>Keterangan</th>
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
              <img src="assets/img/wahana/<?= $r['pict_name']; ?>" class="img-thumbhanil" width="100px" height="50px">
            </td>
            <td>
              <span class="font-weight-bold"><?= $r['alt']; ?></span>
            </td>
            <td>
              <label class="font-weight-bold"><?= date('j-n-Y', $r['time']); ?></label>
            </td>
            <td class="table-actions">
              <a href="index.php?p=product-seesaws&delete=<?= $r['time'] ?>" class="table-action table-action-delete" data-toggle="tooltip" data-original-title="Delete client">
                <i class="fas fa-trash"></i>
              </a>
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