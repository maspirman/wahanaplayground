<?php
require_once "apl/config/xconfig.php";
require_once "apl/core/xblog.php";

new Blog();
new Db();

$_SESSION['msg'] = null;

// ========================ADD================ //
if (isset($_POST['addcategory'])) {
  $tbl = 'tbl_news_category';
  Blog::addCategory($_POST['category'], $tbl);
}
// ========================Update================ //
if (isset($_POST['updatecategory'])) {
  $tbl = 'tbl_news_category';
  $data = [
    'id' => $_POST['idcategory'],
    'title' => $_POST['titlecategory'],
  ];
  Blog::updateCategory($data, $tbl);
}
// ========================Delete================ //
if (isset($_POST['del'])) {
  // var_dump($_POST);
  $data = $_POST['delete'];
  $tbl = 'tbl_news_category';
  Blog::deletecategory($data, $tbl);
}

$result = json_decode(Db::jsonPut('id_news_category', 'tbl_news_category'));

?>
<!-- notif -->
<?php if (isset($_SESSION['msg'])) : ?>
  <div class="row mt-3 mx-1">
    <div class="col-md-12">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
        <span class="alert-text"><?= $_SESSION['msg'] ?></span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  </div>
<?php endif; ?>

<div class="row mt-3 mx-1">

  <div class="col-md-12">
    <div class="card">

      <div class="card-header border-0">
        <div class="row d-flex">
          <div class="col-3">
            <h3 class="mb-0"> Table</h3>
          </div>

          <div class="col-9 text-right ">
            <button type="button" class="btn btn-primary btn-sm btn-round btn-icon" data-toggle="modal" data-target=".category">
              <span class="btn-inner--icon"><i class="fas fa-user-edit"></i></span>
              <span class="btn-inner--text">Add Category News</span>
            </button>
          </div>

          <form action="" method="POST">
            <div class="modal fade category" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-md">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add Category Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body border">
                    <div class="row">
                      <div class="col-md-12">
                        <input class="form-control form-control-sm" type="text" placeholder="Category" name="category">
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm btn-round" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm btn-round" name="addcategory">Add Category</button>
                  </div>
                </div>
              </div>
            </div>
          </form>


        </div>
      </div>

      <div class="table-responsive py-4">
        <table class="table align-items-center table-flush" id="datatable-basic">
          <thead class="thead-light">
            <tr>
              <th>No</th>
              <th class="pl-5">Category</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 ?>
            <?php foreach ($result as $x) : ?>
              <tr>
                <td class="table-user"><?= $i++ ?></td>
                <td class="table-user" style="overflow: hidden;"><?= $x->title_news_category ?></td>

                <td class="table-actions">
                  <div class="row">


                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#categoryedit<?= $x->id_news_category ?>">
                      <i class="fas fa-edit"></i>
                    </button>
                    <form action="" method="POST">
                      <input type="hidden" name="delete" value="<?= $x->id_news_category ?>">

                      <button type="submit" class="btn btn-sm btn-primary" name="del"><i class="fas fa-trash"></i></button>
                    </form>
                  </div>

                  <form action="" method="POST">

                    <div class="modal fade" id="categoryedit<?= $x->id_news_category ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Description</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body border">
                            <input type="hidden" class="form-control form-control-sm" value="<?= $x->id_news_category ?>" name="idcategory">
                            <input type="text" class="form-control form-control-sm" value="<?= $x->title_news_category ?>" name="titlecategory">
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="updatecategory">Save changes</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>

                </td>
              </tr>

            <?php endforeach ?>
          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>