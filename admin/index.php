<?php
error_reporting(0);
ob_start();
session_start();
require_once "apl/config/koneksi.php";
require_once "apl/config/xhelper.php";
require_once "apl/core/xfunction.php";
require_once "apl/core/afunction.php";

if (!login_validation()) {
  header("Location: " . BASE_URL . "access/login.php");
  exit;
}

ini_set('max_execution_time', 300);
ini_set('post_max_size', '30M');
ini_set('upload_max_filesize', '30M');


date_default_timezone_set("Asia/Jakarta");
$id_user = $_SESSION['id'];

// //whether ip is from share internet
// if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
//   $ip_address = $_SERVER['HTTP_CLIENT_IP'];
//   $ip1 = ip_share($ip_address, $id_user);
// }
// //whether ip is from proxy
// elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
//   $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
//   $ip2 = ip_proxy($ip_address, $id_user);
// }
// //whether ip is from remote address
// else {
//   $ip_address = $_SERVER['REMOTE_ADDR'];
//   $ip3 = ip_remote($ip_address, $id_user);
// }

// ip_share($ip_address);

$u = query("SELECT username, email, city, province, time FROM  tbl_user WHERE id_user = $id_user")[0][0];
$pg = isset($_GET['p']) ? $_GET['p'] : false;
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Admin Dashboard - Wahana Play Ground</title>
  <!-- krajee plugin-->
  <link href="assets/plugins/krajee/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
  <link href="assets/plugins/krajee/themes/explorer-fas/theme.css" media="all" rel="stylesheet" type="text/css" />
  <!-- Favicon -->
  <link rel="icon" href="assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <link rel="stylesheet" href="assets/vendor/animate.css/animate.min.css">
  <link rel="stylesheet" href="assets/vendor/sweetalert2/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
  <!-- Argon CSS -->
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.3/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="assets/css/argon.css?v=1.1.0" type="text/css">

  <link href="./vendor/quil/quill.snow.css" rel="stylesheet">
  <!-- Include the Quill library -->
  <script src="./vendor/quil/quill.min.js"></script>
  <!-- CKEDITOR -->
  <!-- <script src="assets/vendor/ckeditor/ckeditor.js"></script> -->
  <!-- <script src="./vendor/tinymce/tinymce.min.js" referrerpolicy="origin"></script> -->

  <link href="https://cdn.quilljs.com/1.3.4/quill.snow.css" rel="stylesheet">
  <script src="https://cdn.quilljs.com/1.3.4/quill.js"></script>





  <!-- <script script >
      tinymce.init({
        selector: '#edit',
        plugins: 'image',
        toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | image',

        images_upload_url: 'upload.php',
        automatic_uploads: true,

        images_upload_handler: function(blobInfo, success, failure) {
          var xhr, formData;

          xhr = new XMLHttpRequest();
          xhr.withCredentials = false;
          xhr.open('POST', 'upload.php');

          xhr.onload = function() {
            var json;

            if (xhr.status != 200) {
              failure('HTTP Error: ' + xhr.status);
              return;
            }

            json = JSON.parse(xhr.responseText);

            if (!json || typeof json.file_path != 'string') {
              failure('Invalid JSON: ' + xhr.responseText);
              return;
            }

            success(json.file_path);
          };

          formData = new FormData();
          formData.append('file', blobInfo.blob(), blobInfo.filename());

          xhr.send(formData);
        },
      });
  </script> -->



</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header d-flex align-items-center">
        <a class="navbar-brand" href="index.php">
          <img src="assets/wahana/icon/wahanaplayground-logo.png" class="navbar-brand-img" alt="...">
        </a>
        <div class="ml-auto">
          <!-- Sidenav toggler -->
          <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link <?php if ($pg == "dashboard" or $pg == "") {
                                    echo 'active';
                                  } ?>" href="?p=dashboard">
                <i class="ni ni-shop text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if ($pg == "media") {
                                    echo 'active';
                                  } ?>" href="?p=media">
                <i class="ni ni-chart-pie-35 text-info"></i>
                <span class="nav-link-text">Media</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if ($pg == "post") {
                                    echo 'active';
                                  } ?>" href="?p=post">
                <i class="ni ni-folder-17 text-info"></i>
                <span class="nav-link-text">Post</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link <?php if ($pg == "category" || $pg == "product") {
                                    echo 'active';
                                  } ?>" href="#navbar-p" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                <i class="ni ni-app text-orange"></i>
                <span class="nav-link-text">Product</span>
              </a>
              <div class="collapse" id="navbar-p">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="?p=category" class="nav-link">All Category</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if ($pg == "portfolio") {
                                    echo 'active';
                                  } ?>" href="?p=portfolio">
                <i class="ni ni-single-copy-04 text-info"></i>
                <span class="nav-link-text">Portfolio</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if ($pg == "blog") {
                                    echo 'active';
                                  } ?>" href="#navbar-b" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                <i class="ni ni-books text-info"></i>
                <span class="nav-link-text">Blogs</span>
              </a>
              <div class="collapse" id="navbar-b">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="?p=blog" class="nav-link">Blogs</a>
                  </li>
                </ul>
              </div>
              <div class="collapse" id="navbar-b">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="?p=blog-category" class="nav-link">Blog Categories</a>
                  </li>
                </ul>
              </div>
            </li>
             <li class="nav-item">
              <a class="nav-link <?php if ($pg == "custom-settings") {
                                    echo 'active';
                                  } ?>" href="?p=custom-settings">
                <i class="ni ni-settings text-info"></i>
                <span class="nav-link-text">Custom Setting</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center ml-md-auto">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <!-- <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li> -->
          </ul>
          <ul class="navbar-nav align-items-center ml-auto ml-md-0">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="assets/img/wahana.png">
                  </span>
                  <div class="media-body ml-2 d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"><?= $u['username'] ?></span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <a href="index.php?p=profile" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>My profile</span>
                </a>
                <!-- <a href="#!" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Settings</span>
                </a>
              <a href="#!" class="dropdown-item">
              <i class="ni ni-calendar-grid-58"></i>
              <span>Activity</span>
              </a>
              <a href="#!" class="dropdown-item">
              <i class="ni ni-support-16"></i>
              <span>Support</span>
              </a> -->
                <div class="dropdown-divider"></div>
                <a href="access/proses_logout.php" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <?php
    $pages_dir = "pages/";
    if (!empty($_GET["p"])) {
      $pages = scandir($pages_dir, 0);
      unset($pages[0], $pages[1]);

      $p = $_GET["p"];
      if (in_array($p . ".php", $pages)) {
        include($pages_dir . "/" . $p . ".php");
      } else {
        include($pages_dir . "/404.php");
      }
    } else {
      include($pages_dir . "/dashboard.php");
    }
    ?>
    <footer class="row bg-white container-fluid">
      <p><small>&copy;2020 Rubber Floor Indonesia</small></p>
    </footer>

    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <!-- Optional JS -->
    <script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="assets/vendor/chart.js/dist/Chart.extension.js"></script>
    <!-- Date Picker -->
    <script src="assets/vendor/select2/dist/js/select2.min.js"></script>
    <script src="assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="assets/vendor/nouislider/distribute/nouislider.min.js"></script>
    <script src="assets/vendor/quill/dist/quill.min.js"></script>
    <script src="assets/vendor/dropzone/dist/min/dropzone.min.js"></script>
    <script src="assets/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <!-- Optional JS -->
    <script src="assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
    <!-- Argon JS -->
    <script src="assets/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="assets/vendor/bootstrap-notify/bootstrap-notify.min.js"></script>
    <script src="assets/js/argon.js?v=1.1.0"></script>
    <!-- CK EDITOR 4 fullnight -->
    <!-- <script src="assets/vendor/ckeditor/ckeditor.js"></script> -->
    <!-- Demo JS - remove this in your project -->
    <script src="assets/js/demo.min.js"></script>
    <!-- krajee plugin -->
    <script src="assets/plugins/krajee/js/plugins/piexif.js" type="text/javascript"></script>
    <script src="assets/plugins/krajee/js/plugins/sortable.js" type="text/javascript"></script>
    <script src="assets/plugins/krajee/js/fileinput.js" type="text/javascript"></script>
    <script src="assets/plugins/krajee/js/locales/fr.js" type="text/javascript"></script>
    <script src="assets/plugins/krajee/js/locales/es.js" type="text/javascript"></script>
    <script src="assets/plugins/krajee/themes/fas/theme.js" type="text/javascript"></script>
    <script src="assets/plugins/krajee/themes/explorer-fas/theme.js" type="text/javascript"></script>
</body>

</html>