<?php

if (!empty($_GET['detail-category'])) {
  $detail_sub = $_GET['detail-category'];

  $s = '-sub';
  $q = 'sub_';
  $sub = query("SELECT * FROM tbl_sub_category WHERE category_target = '$detail_sub'")[0];

  if (isset($_POST['add-sub'])) {
    $category = htmlspecialchars($_POST['category-sub']);
    $time = explode(" ", microtime());
    $sql = pilih_query("INSERT INTO tbl_sub_category (sub_category_name, sub_category_time, sub_category_microtime, category_target) VALUES ('$category', '$time[1]', '$time[0]', '$detail_sub')", "count");

    if ($sql > 0) {
      echo "<script>
              window.location.href='index.php?p=category&detail-category=" . $detail_sub . "';
            </script>";
    } else {
      echo "<script>
              alert('Category filed to add');
              window.location.href='index.php?p=category&detail-category=" . $detail_sub . "';
            </script>";
    }
  }

  if (!empty($_GET['delete'])) {
    $del_id = $_GET['delete'];
    $sql = pilih_query("DELETE FROM tbl_sub_category WHERE sub_category_id = '$del_id'", "count");

    if ($sql > 0) {
      echo "<script>
              window.location.href='index.php?p=category&detail-category=" . $detail_sub . "';
            </script>";
    } else {
      echo "<script>
              alert('Category filed to add');
              window.location.href='index.php?p=category&detail-category=" . $detail_sub . "';
            </script>";
    }
  }
} else {

  $q = '';

  if (isset($_POST['add'])) {
    $category = htmlspecialchars($_POST['category']);
    $target = str_replace(' ', '', strtolower($category));
    $time = explode(" ", microtime());
    $sql = pilih_query("INSERT INTO tbl_category (category_name, category_time, category_microtime, category_target) VALUES ('$category', '$time[1]', '$time[0]', '$target')", "count");

    if ($sql > 0) {
    } else {
      echo "<script>
              alert('Category filed to add');
              window.location.href='index.php?p=category&detail-category=';
            </script>";
    }
  }

  if (!empty($_GET['delete'])) {
    $del_id = $_GET['delete'];
    $sql = pilih_query("DELETE FROM tbl_category WHERE category_id = '$del_id'", "count");

    if ($sql > 0) {
      echo "<script>
              window.location.href='index.php?p=category';
            </script>";
    } else {
      echo "<script>
              alert('Category filed to add');
              window.location.href='index.php?p=category';
            </script>";
    }
  }
}


if (!empty($_GET['detail-category'])) {
  $e = 'Sub Category';
  // echo $e;
} else {
  $e = 'Category';
  // echo $e;
}

?>


<!-- PROJECT PLAYGROUND -->
<div class="card m-3">
  <!-- Card header -->
  <div class="card-header border-0">
    <div class="row">
      <div class="col-6">
        <h3 class="mb-0"><?= $e ?> Table</h3>
      </div>
      <!-- Modal Button -->
      <div class="col-6 text-right">
        <button type="button" class="btn btn-primary btn-sm btn-round btn-icon" data-toggle="modal" data-target="#modal_category">
          <span class="btn-inner--icon"><i class="fas fa-user-edit"></i></span>
          <span class="btn-inner--text">Add <?= $e ?></span>
        </button>
      </div>
      <!-- END Modal Button -->
      <!-- Modal -->
      <form action="" method="post">
        <div class="modal fade" id="modal_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add <?= $e ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body border">
                <div class="form-goup row">
                  <div class="col-md-12">
                    <input type="text" class="form-control mb-2 mr-sm-2" name="category<?= $s ?>" placeholder="<?= $e ?>" required>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm btn-round" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm btn-round" name="add<?= $s ?>">Add <?= $e ?></button>
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
  if (!empty($_GET['detail-category'])) {
    $t = query("SELECT * FROM tbl_" . $q . "category WHERE category_target = '$detail_sub'")[0];
  } else {
    $t = query("SELECT * FROM tbl_category")[0];
  }
  ?>
  <div class="table-responsive py-4">
    <table class="table align-items-center table-flush" id="datatable-basic">
      <thead class="thead-light">
        <tr>
          <th>No.</th>
          <th class="pl-5"><?= $e ?></th>
          <th>Date</th>
          <th>Optional</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($t as $c) : ?>
          <tr>
            <td class="table-user"><?= $i++ ?></td>
            <td class="table-user">
              <?php if (!empty($_GET['detail-category'])) { ?>
                <a class="font-weight-bold" href="?p=product&detail-sub-category-id=<?= $c[$q . 'category_id'] ?>"><?= $c[$q . 'category_name']; ?></a>
              <?php } else { ?>
                <a class="font-weight-bold" href="?p=category&detail-category=<?= $c['category_target'] ?>"><?= $c[$q . 'category_name']; ?></a>
              <?php } ?>
            </td>
            <td>
              <label class="font-weight-bold"><?= date("j F Y ", $c[$q . 'category_time']) ?></label>
            </td>
            <td class="table-actions">
              <?php if (!empty($_GET['detail-category'])) { ?>
                <a href="?p=category&detail-category=<?= $c['category_target'] ?>&delete=<?= $c[$q . 'category_id'] ?>" class="table-action table-action-delete" data-toggle="tooltip" data-original-title="Delete Sub Category">
                  <i class="fas fa-trash"></i>
                </a>
              <?php } else { ?>
                <a href="?p=category&delete=<?= $c[$q . 'category_id'] ?>" class="table-action table-action-delete" data-toggle="tooltip" data-original-title="Delete Category">
                  <i class="fas fa-trash"></i>
                </a>
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