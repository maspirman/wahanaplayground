<?php
error_reporting(0);
require_once "admin/apl/redirect/load.php";
require_once "admin/apl/config/xconfig.php";
include "connection.php";


$pg = $_GET['p'];

$is = $_GET['n'] ? $_GET['n'] : '' ;
$hs = pilih_query("SELECT * FROM tbl_news WHERE slug_news='$is'", "array")[0][0] ? pilih_query("SELECT * FROM tbl_news WHERE slug_news='$is'", "array")[0][0] : '';
$pg = isset($_GET['p']) ? $_GET['p'] : false;

$seo_settings = query("SELECT * FROM tbl_pages_setting WHERE name='Homepage'");
?>

<?php

$c = query("SELECT * FROM tbl_portfolio WHERE portfolio_id='$_GET[id]'","array")[0][0];

?>


<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Deskripsi halaman yang menggambarkan konten secara singkat dan menarik.">
    <meta name="keywords" content="kata kunci terkait halaman">
    <meta name="author" content="Nama Penulis">
    <title>Judul Halaman</title>
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Judul Halaman">
    <meta property="og:description" content="Deskripsi halaman yang menggambarkan konten secara singkat dan menarik.">
    <meta property="og:url" content="URL Halaman">
    <meta property="og:image" content="URL Gambar Representatif">
    <meta property="og:type" content="website">
    
    <!-- Twitter Meta Tags -->
    <meta name="twitter:title" content="Judul Halaman">
    <meta name="twitter:description" content="Deskripsi halaman yang menggambarkan konten secara singkat dan menarik.">
    <meta name="twitter:image" content="URL Gambar Representatif">
    <meta name="twitter:card" content="summary_large_image">


    <!-- Favicon -->
    <link rel="icon" href="path/to/favicon.ico">

  <!-- Stylesheets
  ============================================= -->
  <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Playfair+Display:400,700,700i,900" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>style.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>css/dark.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/custom.css" type="text/css" />

  <!-- Real Estate Demo Specific Stylesheet -->
  <link rel="stylesheet" href="<?php echo $base_url; ?>css/theme/real_estate/real-estate.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>css/theme/real_estate/font-icons.css" type="text/css" />


  <!-- Home Demo Specific Stylesheet -->
  <link rel="stylesheet" href="<?php echo $base_url; ?>css/theme/interior-design.css" type="text/css" />

  <link rel="stylesheet" href="<?php echo $base_url; ?>css/font-icons.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>css/animate.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>css/magnific-popup.css" type="text/css" />

  <!-- Reader's Blog Demo Specific Fonts -->
  <link rel="stylesheet" href="<?php echo $base_url; ?>css/theme/fonts.css" type="text/css" />

  <link rel="stylesheet" href="<?php echo $base_url; ?>css/custom.css" type="text/css" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>css/colors.php?color=1c85e8" type="text/css" />

  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.1.0/css/flag-icon.min.css" rel="stylesheet">

  <?php !empty($hs['header_news']) ? $hs['header_news'] : '';  ?>



</head>

<style>
  .menu-link {
    padding-left: 15px;
    padding-right: 15px;
  }
</style>

<body class="stretched side-push-panel">

  <!-- Document Wrapper
  ============================================= -->
  <div id="wrapper" class="clearfix">

    <!-- Header
    ============================================= -->
    <header id="header" class="header-size-md bg-light" data-sticky-shrink="false" data-mobile-sticky="true">
      <div id="header-wrap" class="">
        <div class="container">
          <div class="header-row justify-content-between">

            <!-- Logo
            ============================================= -->
            <div id="logo" class="">
              <a href="<?php echo $base_url; ?>" class="standard-logo"><img src="<?php echo $base_url; ?>assets/images/logo/wahanaplayground-logo.png" alt="wahanaplayground-logo"></a>
              <a href="<?php echo $base_url; ?>" class="retina-logo"><img src="<?php echo $base_url; ?>assets/images/logo/wahanaplayground-logo.png" alt="wahanaplayground-logo"></a>
            </div><!-- #logo end -->

            <div class="header-misc">

              <!-- Language
              ============================================= -->
              <ul class="navbar-nav">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="flag-icon flag-icon-id"> </span>
                    Indonesia</a>
                  <div class="dropdown-menu" aria-labelledby="dropdown09">
                    <a class="dropdown-item" href="https://www.wahanaplayground.com/en/"><span class="flag-icon flag-icon-us"> </span> English</a>
                  </div>
                </li>
              </ul>

            </div>

            <div id="primary-menu-trigger">
              <svg class="svg-trigger" viewBox="0 0 100 100">
                <path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20">
                </path>
                <path d="m 30,50 h 40"></path>
                <path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20">
                </path>
              </svg>
            </div>

            <!-- Primary Navigation
            ============================================= -->
            <nav class="primary-menu with-arrows">
              <!--  OR $pg== ""-->

              <ul class="menu-container">
                <li class="menu-item <?php if ($pg == "home" or $pg == "") {
                                        echo 'current';
                                      } ?>"><a class="menu-link" href="<?php echo $base_url ?>">
                    <div>Home</div>
                  </a></li>
                <li class="menu-item <?php if ($pg == "about") {
                                        echo 'current';
                                      } ?>"><a class="menu-link " href="<?php echo $base_url ?>tentang-kami">
                    <div>Tentang Kami</div>
                  </a></li>
                <li class="menu-item <?php if ($pg == "products") {
                                        echo 'current';
                                      } ?>"><a class="menu-link" href="javascript:void(0)" style="cursor: default;">
                    <div>Produk</div>
                  </a>
                  <ul class="sub-menu-container">
                    <li class="menu-item">
                      <a class="menu-link" href="<?php echo $base_url ?>indoor-playground">
                        <div>Indoor Playground</div>
                      </a>
                      <ul class="sub-menu-container">
                        <li class="menu-item <?php if ($pg == "thematic-modular-soft-play") {
                                                echo 'current';
                                              } ?>">
                          <a class="menu-link" href="<?php echo $base_url ?>produk/thematic-modular-soft-play">
                            <div>Thematic Modular Soft Play</div>
                          </a>
                        </li>
                        <li class="menu-item <?php if ($pg == "custom-interior-design") {
                                                echo 'current';
                                              } ?>">
                          <a class="menu-link" href="<?php echo $base_url ?>produk/custom-interior-design">
                            <div>Custom Interior Design</div>
                          </a>
                        </li>
                        <li class="menu-item <?php if ($pg == "rainbow-nets") {
                                                echo 'current';
                                              } ?>">
                          <a class="menu-link" href="<?php echo $base_url ?>produk/rainbow-nets">
                            <div>Rainbow Nets</div>
                          </a>
                        </li>
                        <li class="menu-item <?php if ($pg == "soft-play") {
                                                echo 'current';
                                              } ?>">
                          <a class="menu-link" href="<?php echo $base_url ?>produk/soft-play">
                            <div>Soft Play</div>
                          </a>
                        </li>
                      </ul>
                    </li>

                    <li class="menu-item">
                      <a class="menu-link" href="<?php echo $base_url ?>outdoor-playground">
                        <div>Outdoor Playground</div>
                      </a>
                      <ul class="sub-menu-container">
                        <li class="menu-item <?php if ($pg == "pe-series") {
                                                echo 'current';
                                              } ?>"><a class="menu-link" href="<?php echo $base_url ?>produk/pe-series">
                            <div>PE Series</div>
                          </a></li>
                        <li class="menu-item <?php if ($pg == "classic") {
                                                echo 'current';
                                              } ?>"><a class="menu-link" href="<?php echo $base_url ?>produk/classic">
                            <div>Classic</div>
                          </a></li>
                        <li class="menu-item <?php if ($pg == "wooden") {
                                                echo 'current';
                                              } ?>"><a class="menu-link" href="<?php echo $base_url ?>produk/wooden">
                            <div>Wooden</div>
                          </a></li>
                        <li class="menu-item <?php if ($pg == "rope") {
                                                echo 'current';
                                              } ?>"><a class="menu-link" href="<?php echo $base_url ?>produk/rope">
                            <div>Rope</div>
                          </a></li>
                        <li class="menu-item <?php if ($pg == "adventure") {
                                                echo 'current';
                                              } ?>"><a class="menu-link" href="<?php echo $base_url ?>produk/adventure">
                            <div>Adventure</div>
                          </a></li>
                        <li class="menu-item <?php if ($pg == "swings") {
                                                echo 'current';
                                              } ?>"><a class="menu-link" href="<?php echo $base_url ?>produk/swings">
                            <div>Swings</div>
                          </a></li>
                        <li class="menu-item <?php if ($pg == "seesaws") {
                                                echo 'current';
                                              } ?>"><a class="menu-link" href="<?php echo $base_url ?>produk/seesaws">
                            <div>Seesaws</div>
                          </a></li>
                        <li class="menu-item <?php if ($pg == "riders") {
                                                echo 'current';
                                              } ?>"><a class="menu-link" href="<?php echo $base_url ?>produk/riders">
                            <div>Riders</div>
                          </a></li>
                      </ul>
                    </li>

                    <li class="menu-item <?php if ($pg == "water-playground") {
                                            echo 'current';
                                          } ?>">
                      <a class="menu-link" href="<?php echo $base_url ?>produk/water-playground">
                        <div>Water Playground</div>
                      </a>
                    </li>

                    <li class="menu-item ">
                      <a class="menu-link" href="javascript:void(0)" style="cursor: default;">
                        <div>Outdoor Fitness</div>
                      </a>
                      <ul class="sub-menu-container">
                        <li class="menu-item <?php if ($pg == "stand-alone") {
                                                echo 'current';
                                              } ?>">
                          <a class="menu-link" href="<?php echo $base_url ?>produk/stand-alone">
                            <div>Stand Alone</div>
                          </a>
                        </li>
                        <li class="menu-item <?php if ($pg == "integrated-set") {
                                                echo 'current';
                                              } ?>">
                          <a class="menu-link" href="<?php echo $base_url ?>produk/integrated-set">
                            <div>Integrated Set</div>
                          </a>
                        </li>
                      </ul>
                    </li>

                    <li class="menu-item <?php if ($pg == "shade-sail") {
                                            echo 'current';
                                          } ?>">
                      <a class="menu-link" href="<?php echo $base_url ?>produk/shade-sail">
                        <div>Shade Sail</div>
                      </a>
                    </li>
                    <li class="menu-item <?php if ($pg == "musical") {
                                            echo 'current';
                                          } ?>">
                      <a class="menu-link" href="<?php echo $base_url ?>produk/musical">
                        <div>Musical</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a class="menu-link" href="https://www.rubberfloorindonesia.com/">
                        <div>Rubber Floor</div>
                      </a>
                    </li>



                  </ul>

                </li>
                <li class="menu-item <?php if ($pg == "portofolio") {
                                        echo 'current';
                                      } ?>"><a class="menu-link" href="<?php echo $base_url ?>portofolio">
                    <div>Portofolio</div>
                  </a></li>
                <li class="menu-item <?php if ($pg == "contact") {
                                        echo 'current';
                                      } ?>"><a class="menu-link" href="<?php echo $base_url ?>kontak-kami">
                    <div>Kontak Kami</div>
                  </a></li>
              </ul>

            </nav><!-- #primary-menu end -->

          </div>
        </div>
      </div>
      <div class="header-wrap-clone"></div>
    </header>
    <!-- #header end -->

    <!--<style>
      #right-slider {
        padding: 200px 30px 200px 30px;
      }
    </style>-->

    <body class="stretched side-push-panel">

  <!-- Document Wrapper
  ============================================= -->
  <div id="wrapper" class="clearfix">

    <!-- Page Title
    ============================================= -->
    <section id="page-title">

      <div class="container clearfix">
        <div class="row">
          <div class="col-12">
            <div class="col-md-8">
              <h1>Portfolio - <?= $c['portfolio_title'] ?> </h1>
            </div>
           
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= $base_url; ?>">Home</a></li>
                <!-- <li class="breadcrumb-item"><a href="#">Portfolio</a></li> -->
                <li class="breadcrumb-item active" aria-current="page">Portofolio/</li>
                <li class="breadcrumb-item active" aria-current="page"><?= $c['portfolio_title']?></li>
              </ol>
            
          </div>
        </div>
        
      </div>

    </section><!-- #page-title end -->

    <?php /* <!-- Page Title
    ============================================= -->
    <section id="page-title" class="bg-light border-top page-title-center">

      <div class="container clearfix">
        <h1 class="font-secondary nott mb-3" style="font-size: 54px;">Portfolio</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= $base_url; ?>">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Portfolio</li>
        </ol>
        <!--<span>All about portofolio projects Wahana Playground</span>-->
      </div>

    </section><!-- #page-title end --> */ ?>

    <!-- Content
    ============================================= -->
    <section id="content">
      <div class="content-wrap clearfix">
        <div class="container">

          <div class="row col-mb-50">
             <iframe src="admin/assets/book/pdf/<?= $c['portfolio_file'] ?>" width="100%" height="600px"></iframe>
   
          </div>
        </div>
        <!-- <div class="line"></div> -->
    </section>




  </div><!-- #wrapper end -->

  <!-- Go To Top
  ============================================= -->
  <div id="gotoTop" class="icon-angle-up"></div>

  <!-- JavaScripts
  ============================================= -->
  <!--<script src="<?= $base_url; ?>js/jquery.js"></script>
  <script src="<?= $base_url; ?>js/plugins.min.js"></script>-->

  <!-- Footer Scripts
  ============================================= -->
  <!--<script src="<?= $base_url; ?>js/functions.js"></script>-->

</body>

    <!-- Footer
    ============================================= -->
    <footer id="footer" class="dark">
      <div class="container">

        <!-- Footer Widgets
        ============================================= -->
        <div class="footer-widgets-wrap">

          <div class="row col-mb-50">
            <div class="col-lg-12">

              <div class="row col-mb-50">
                <div class="col-md-5">

                  <div class="widget clearfix">
                    <h2 style="font-family: 'Lucida Console', 'Courier New', monospace;">PT. Wahana Tirta Estetika
                    </h2>

                    <!-- <img src="images/footer-widget-logo.png" alt="Image" class="footer-logo"> -->

                    <!-- <p>We believe in <strong>Simple</strong>, <strong>Creative</strong> &amp; <strong>Flexible</strong> Design Standards.</p> -->
                    <p style="text-align: justify;"><strong>PT Wahana Tirta Estetika memproduksi dan merancang
                        peralatan bermain yang dirancang dengan bahan berkualitas tinggi untuk ketahanan dan keamanan.
                        Dari peralatan indoor hingga outdoor hingga fitness, gym anak hingga projetc komersial, kami
                        akan dengan senang hati bekerja berdasarkan berbagai budget dan penggunaan.</strong></p>

                    <div style="background: url('images/world-map.png') no-repeat center center; background-size: 70%; ">
                      <?php $addres = query("SELECT address, phone, fax, ig FROM tbl_info")[0][0]; ?>
                      <address>
                        <strong>Kantor Pusat:</strong><br>
                        <?php echo $addres['address'] ?><br>

                      </address>
                      <strong>Telepone:</strong> <?php echo $addres['phone'] ?><br>
                      <strong>Fax:</strong> <?php echo $addres['fax'] ?><br>
                    </div>

                  </div>

                </div>

                <div class="col-md-2">

                  <div class="widget widget_links clearfix">

                    <h3><strong>Link Cepat</strong></h3>

                    <ul>
                      <li><a href="<?php echo $base_url ?>">Home</a></li>
                      <li><a href="<?php echo $base_url ?>tentang-kami">Tentang Kami</a></li>
                      <li><a href="<?php echo $base_url ?>produk/thematic-modular-soft-play">Produk</a></li>
                      <li><a href="<?php echo $base_url ?>portofolio">Portofolio</a></li>
                      <li><a href="<?php echo $base_url ?>kontak-kami">Kontak Kami</a></li>
                      <li><a href="http://www.playgroundjakarta.blogspot.com">Blog</a></li>
                      <li><a href="<?php echo $base_url ?>news">News</a></li>
                      <li><a href="https://rubberfloorindonesia.com/">Rubber Floor</a></li>
                    </ul>

                  </div>

                </div>

                <div class="col-md-5">

                  <div class="col-sm-6 col-lg-10">
                    <div class="widget clearfix">
                      <h3><strong>Instagram Photos</strong></h3>
                      <div loading="lazy" data-mc-src="e2ce80af-95b8-48e0-ae9b-9afa793cb908#instagram"></div>



                      <!--<div class="col-sm-6 col-lg-10">
                    <div class="widget clearfix">
                      <h3><strong>Instagram Photos</strong></h3>
                     <div id="instagram-photos" class="instagram-photos masonry-thumbs grid-3" data-user="playgroundjakarta" data-count="9"></div>
                      <div id="instagram-feed3" class="instagram-feed">-->
                      <!--</div>-->

                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

      </div><!-- .footer-widgets-wrap end -->

      <!-- Copyrights
      ============================================= -->
      <div id="copyrights">
        <div class="container">

          <div class="row col-mb-30">

            <div class="col-md-6 text-center text-md-left">
              Copyrights &copy; 2020 <a href="<?php echo $base_url ?>">Wahana Playground</a>. Powered By <a href="https://www.resolusiweb.com">Resolusiweb Digital Media</a><br>
              <!-- <div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div> -->
            </div>

            <div class="col-md-6 text-center text-md-right">
              <div class="d-flex justify-content-center justify-content-md-end">
                <a href="#" class="social-icon si-small si-borderless si-facebook">
                  <i class="icon-facebook"></i>
                  <i class="icon-facebook"></i>
                </a>

                <a href="#" class="social-icon si-small si-borderless si-twitter">
                  <i class="icon-twitter"></i>
                  <i class="icon-twitter"></i>
                </a>

                <a href="https://www.instagram.com/playgroundjakarta/?hl=id" class="social-icon si-small si-borderless si-instagram">
                  <i class="icon-instagram"></i>
                  <i class="icon-instagram"></i>
                </a>

              </div>

              <div class="clear"></div>

              <!-- <i class="icon-envelope2"></i> info@canvas.com <span class="middot">&middot;</span> <i class="icon-headphones"></i> +1-11-6541-6369 <span class="middot">&middot;</span> <i class="icon-skype2"></i> CanvasOnSkype -->
            </div>

          </div>

        </div>
      </div><!-- #copyrights end -->
    </footer><!-- #footer end -->


  </div><!-- #wrapper end -->


  <!-- Go To Top
  ============================================= -->
  <div id="gotoTop" class="icon-angle-up"></div>





</body>

</html>