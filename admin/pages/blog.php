<?php

require_once "apl/config/xconfig.php";
require_once "apl/core/xblog.php";


new Blog();
new Db();

$_SESSION['msg'] = null;

if (isset($_POST['addnews'])) {

  $data = [
    'author' => $_POST['author'],
    'title' => $_POST['title'],
    'excerpt' => $_POST['excerpt'],
    'desc' => $_POST['content'],
    'category' => $_POST['category'],
    'meta_title' => $_POST['meta_title'],
    'meta_description' => $_POST['meta_description'],
    'header' => $_POST['header'],
    'footer' => $_POST['footer'],
    'time' => microtime()
  ];
  

  $tbl = 'tbl_news';

  $file = $_FILES;

  Blog::addblog($data, $file, $tbl);
}

if (isset($_POST['del'])) {
  $data = $_POST['delete'];
  $tbl = 'tbl_news';

  Blog::deleteblog($data, $tbl);
}

$category = json_decode(Db::jsonPut('id_news_category', 'tbl_news_category'));
$result = json_decode(Db::jsonPut('id_news', 'tbl_news'));

?>
<!-- notif-->
<?php if (isset($_SESSION['msg'])) : ?>
  <div class="row mt-3 mx-1">
    <div class="col-md-12">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
        <span class="alert-text"><?= $_SESSION['msg'] ?></span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" id="delsession">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  </div>
<?php endif; ?>

<div class="card m-3">
  <!-- Card header -->
  <div class="card-header border-0">
    <div class="row">
      <div class="col-6">
        <h3 class="mb-0">Table News</h3>
      </div>
      <!-- Modal Button -->
      <div class="col-6 text-right">
        <button type="button" class="btn btn-primary btn-sm btn-round btn-icon" data-toggle="modal" data-target="#modalnews">
          <span class="btn-inner--icon"><i class="fas fa-user-edit"></i></span>
          <span class="btn-inner--text">Add News</span>
        </button>
      </div>
      <!-- END Modal Button -->
      <!-- Modal -->
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="modal fade" id="modalnews" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add News</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body border">

                <div class="row">

                  <div class="col-md-4">
                    <div class="form-group">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Meta Title</h5>
                          <input type="text" class="form-control form-control-sm" name="meta_title" placeholder="meta title" required>
                          <h5 class="card-title mt-3">Meta Description</h5>
                          <textarea type="text" class="form-control form-control-sm" name="meta_description" placeholder="meta description here.." required></textarea>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-8">
                    <div class="form-group">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Header</h5>
                          <textarea type="text" class="form-control form-control-sm" name="header" placeholder="Header here.." required></textarea>
                          <h5 class="card-title mt-3">Footer</h5>
                          <textarea type="text" class="form-control form-control-sm" name="footer" placeholder="Footer here.." required></textarea>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col-md-4">
                    <div class="form-group">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title pt-1">Image</h5>
                          <img src="assets/img/file.png" id="profileDisplay" class="card-img-top" alt="image" onclick="trigerClick()" style="cursor: pointer;">
                          <small class="card-title mt-2"><input type="file" id="uploadFile" name="img" onchange="displayImage(this)" style="cursor: pointer;" accept="image/*" required></small>
                        </div>
                      </div>


                    </div>
                  </div>

                  <div class="col-md-8">
                    <div class="form-group">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Author</h5>
                          <input type="hidden" class="form-control form-control-sm" name="author" value="<?= $u['username'] ?>" required>
                          <input type="text" class="form-control form-control-sm" name="author" value="<?= $u['username'] ?>" disabled>
                          <h5 class="card-title pt-3">Title</h5>
                          <input type="text" class="form-control form-control-sm" name="title" placeholder="Title Here.." required>
                          <h5 class="card-title pt-3">excerpt</h5>
                          <textarea type="text" class="form-control form-control-sm" name="excerpt" placeholder="excerpt Here.." required></textarea>
                          <h5 class="card-title pt-3">Descriptions</h5>
                          <input type="hidden" name="content" id="content">
                          <div id="editor"></div>
                          <h5 class="card-title pt-3">Category</h5>
                          <select class="form-control form-control-sm" name="category">
                            <?php foreach ($category as $c) : ?>
                              <option><?= $c->title_news_category ?></option>
                            <?php endforeach ?>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm btn-round" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm btn-round" onclick="tinyMCE.triggerSave(true,true);" name="addnews">Add News</button>
              </div>
            </div>
          </div>
        </div>
      </form>
      <!-- END Modal -->
    </div>
  </div>

  <!-- Light Table -->

  <div class="table-responsive py-4">
    <table class="table align-items-center table-flush" id="datatable-basic">
      <thead class="thead-light">

        <tr>
          <th>Optional</th>
          <th>No.</th>
          <th>Author</th>
          <th class="pl-5">image</th>
          <th>Title</th>
          <th>excrept</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1 ?>
        <?php foreach ($result as $p) : ?>
          <tr>
            <td class="table-actions">
              <form action="" method="POST">
                <input type="hidden" name="delete" value="<?= $p->id_news ?>">

                <button type="submit" class="btn btn-sm btn-danger" name="del"><i class="fas fa-trash"></i></button>
              </form>
            </td>
            <td class="table-user"><?= $i++ ?></td>
            <td>
              <span class="font-weight-bold"><?= $p->author_news ?></span>
            </td>
            <td class="table-user">
              <img src="assets/img/news/<?= $p->img_news ?>" class="img-thumbhanil" width="100px" height="50px">
            </td>
            <td>
              <span class="font-weight-bold"><?= $p->title_news ?></span>
            </td>
            <td>
              <span class="font-weight-bold"><?= Blog::excerpt_words($p->excerpt_news) ?></span>
            </td>
            <td>
              <label class="font-weight-bold"><?php
                                              $t = explode(" ", $p->time_news);
                                              echo date("d-m-y H:i:s", $t[1]);
                                              ?></label>
            </td>

          </tr>
        <?php endforeach ?>
        <script>
          // Replace the <textarea id="editor1"> with a CKEditor 4
          // instance, using default configuration.
          CKEDITOR.replace('editorr');
        </script>

      </tbody>
    </table>
  </div>
</div>



<script>
  let del = document.querySelector('#delsession');
  del.addEventListener('click', () => {
    <?php
    // $_SESSION['msg'] == null;
    // header('Location: ' . BASE_URL . 'index.php?p=blog');
    ?>
  })
</script>

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

<script>
  let content = document.querySelector('#content')
  let quill = new Quill('#editor', {
    modules: {
      toolbar: [
        [{
          header: [1, 2, false]
        }],
        ['bold', 'italic', 'underline'],
        [{
          'align': []
        }],
        ['image', 'code-block']
      ],
    },
    placeholder: 'Compose an epic...',
    theme: 'snow' // or 'bubble'
  });
  quill.on('text-change', function(delta, oldDelta, source) {
    content.value = quill.root.innerHTML
    // console.log(quill)
  });
</script>