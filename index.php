<?php
error_reporting(0);
require_once "admin/apl/redirect/load.php";
require_once "admin/apl/config/xconfig.php";
include "connection.php";


$pg = $_GET['p'];

$is = $_GET['n'] ? $_GET['n'] : '' ;
$hs = pilih_query("SELECT * FROM tbl_news WHERE slug_news='$is'", "array")[0][0] ? pilih_query("SELECT * FROM tbl_news WHERE slug_news='$is'", "array")[0][0] : '';
$pg = isset($_GET['p']) ? $_GET['p'] : false;

?>
<?php 
$meta= pilih_query("SELECT * FROM tbl_pages_setting WHERE name ='homepage'", "array")[0][0];
?>


<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
   
    if (!empty($_GET['p'])) {
      if ($_GET['p']=='tentang-kami') {
        $get_meta='about';
         
      }elseif ($_GET['p']=='portofolio') {
          $get_meta='portfolio';
      }elseif ($_GET['p']=='kontak-kami'){
          $get_meta='contact';
      }else{
        $get_meta='homepage';
      }
      $meta= pilih_query("SELECT * FROM tbl_pages_setting WHERE name ='$get_meta'", "array")[0][0];
      ?>

    <meta name="description" content="<?= $meta['meta_description'] ?>">
    <meta name="keywords" content="<?= $meta['meta_keywords'] ?>">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="<?= $base_url ?>">
    <meta name="author" content="<?= $base_url ?>">
    <title><?= $meta['meta_title'] ?></title>
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="<?= $meta['meta_title'] ?>">
    <meta property="og:description" content="<?= $meta['meta_description'] ?>">
    <meta property="og:url" content="<?= $base_url ?>">
    <meta property="og:image" content="admin/uploads/<?= $meta['image_thumb'] ?>">
    <meta property="og:type" content="website">
    
    <!-- Twitter Meta Tags -->
    <meta name="twitter:title" content="<?= $meta['meta_title'] ?>">
    <meta name="twitter:description" content="<?= $meta['meta_description'] ?>">
    <meta name="twitter:image" content="admin/uploads/<?= $meta['image_thumb'] ?>">
    <meta name="twitter:card" content="admin/uploads/<?= $meta['image_thumb'] ?>">
     
    <?php }  ?>
   

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
  <link rel="stylesheet" href="<?php echo $base_url; ?>css/colors.php?color=1c85e8" type="text/css" />

  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.1.0/css/flag-icon.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/chat/floating-wpp.css">

<!--   <?php !empty($hs['header_news']) ? $hs['header_news'] : '';  ?> -->



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
                      <a class="menu-link" href="<?php echo $base_url; ?>indoor-playground">
                        <div>Indoor Playground</div>
                      </a>
                      <ul class="sub-menu-container">
                        <li class="menu-item <?php if ($pg == "thematic-modular-soft-play") {
                                                echo 'current';
                                              } ?>">
                          <a class="menu-link" href="<?php echo $base_url; ?>produk/thematic-modular-soft-play">
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
      include($pages_dir . "/home.php");
    }

    ?>


<section id="contact-cta-section" class="contact-cta-section mb-3 mt-2 d-flex">
  <div class="col-md-12 row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
              <div class="feature-box p-5 media-box bg-info text-center" style="line-height: 2.0;border-radius: 6px; box-shadow: 0 2px 4px rgba(3,27,78,.1); border: 1px solid #e5e8ed; height: auto; font-size: 14px;">
              <!--<div class="fbox-media"> 
                          <img src="demos/hosting/images/svg/balancing.svg" style="width: 42px;" alt="Image">
                        </div>-->
                        <div class="fbox-content px-0">
                          <div class="row">
                            <div class="col-md-2">
                              <img style="min-width: 120px;" src="assets/images/illustration/cta.png">
                            </div>
                            <div class="col-md-10">
                              <h3 class="ls0 text-white mb-3">ADA PERTANYAAN?</h3>
                              <p class="mt-2 text-white mb-3">Silakan Hubungi Kami sekarang juga bila ada pertanyaan mengenai Produk Playground Kami.</p>
                                <a href="" class="btn btn-warning">Hubungi Kami</a>
                            </div>
                            
                            
                            
                          </div>
                          
                          <!-- <h3 class="ls0 text-white" style="margin-bottom:30px ">PT Wahana Tirta Estetika</h3> -->
                          
                   
                         

                        </div>
                      </div>
                    </div>
  </div>
  
</section>




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

    <?php /* 
    <!-- Footer
    ============================================= -->
    <footer id="footer" class="border-0" style="background-color: #F5F5F5;">
      <div class="container clearfix">

        <!-- Footer Widgets
        ============================================= -->
        <div class="footer-widgets-wrap">

          <div class="row col-mb-50">
            <div class="col-sm-6 col-lg-4">
              <div class="widget clearfix">
                <!--<div class="font-weight-normal text-lowercase mb-0" style="font-size: 36px; letter-spacing: -1px">Wahana Playground</div>
                <p class="text-muted font-weight-light">2020</p>-->
                <div id="logo" class="mr-lg-0">
                  <a href="<?php echo $base_url; ?>" class="standard-logo"><img
        src="<?php echo $base_url; ?>assets/images/logo/wahanaplayground-logo.png" alt="wahanaplayground-logo"></a>
      <a href="<?php echo $base_url; ?>" class="retina-logo"><img
          src="<?php echo $base_url; ?>assets/images/logo/wahanaplayground-logo.png" alt="wahanaplayground-logo"></a>
      <br>
    </div>

    <div class="app-links">
      <p>Our Social Media</p>
      <a href="https://www.instagram.com/playgroundjakarta/?hl=id" class="link"><i class="icon-instagram"></i>
        <span>Playgroundjakarta</span></a><br>
      <a href="" class="link"><i class="icon-facebook"></i> <span>Playgroundjakarta</span></a><br>
      <a href="" class="link"><i class="icon-twitter"></i> <span>Playgroundjakarta</span></a><br>
    </div>
    </div>
    </div>


    <div class="col-sm-6 col-lg-4">
      <div class="widget widget_links widget-li-noicon">
        <h4>Links</h4>
        <ul>
          <li><a href="#">About Us</a></li>
          <li><a href="#">Products</a></li>
          <li><a href="#">Portofolio</a></li>
          <li><a href="#">Contact Us</a></li>
        </ul>
      </div>
    </div>

    <div class="col-sm-6 col-lg-4">
      <div class="widget clearfix">
        <h4>Instagram Photos</h4>
        <div id="instagram-photos" class="instagram-photos masonry-thumbs grid-3" data-user="playgroundjakarta"
          data-count="9"></div>
        <!--<div id="instagram-feed3" class="instagram-feed">

                      </div>-->
      </div>
    </div>
    </div>

    </div><!-- .footer-widgets-wrap end -->

    </div>

    <div class="line m-0"></div>

    <!-- Copyrights
      ============================================= -->
    <div id="copyrights" style="background-color: #FFF">
      <div class="container clearfix">

        <div class="w-100 center m-0">
          <span>Copyrights &copy; 2020 All Rights Reserved by Wahana Playground.</span>
        </div>

      </div>
    </div><!-- #copyrights end -->
    </footer><!-- #footer end -->
    */ ?>

  </div><!-- #wrapper end -->

<div id="myButton" style="z-index: 99 !important; margin-bottom: 9em;"></div>

  <!-- Go To Top
  ============================================= -->
  <div id="gotoTop" class="icon-angle-up"></div>

  <!-- JavaScripts
  ============================================= -->
  <script src="<?php echo $base_url; ?>js/jquery.js"></script>
  <script src="<?php echo $base_url; ?>js/plugins.min.js"></script>

  <!-- Footer Scripts
  ============================================= -->
  <script src="<?php echo $base_url; ?>js/functions.js"></script>

  <!-- Instagram Feed JS
  ============================================= -->
  <script src="<?php echo $base_url; ?>assets/js/instagramfeed/jquery.instagramFeed.min.js"></script>

  <script>
    var owl = $('.owl-carousel');
    owl.owlCarousel({
      items: 1,
      loop: true,
      margin: 0,
      autoplay: true,
      autoplayTimeout: 4000,
      autoplayHoverPause: false,
      mouseDrag: true,
      touchDrag: true,
      animateOut: 'fadeOut',
      dots: true
    });

    AutoHeight.Defaults = {
      autoHeight: true,
      autoHeightClass: 'owl-height'
    };
  </script>

  <script src="https://cdn2.woxo.tech/a.js#60ecedd4b5891f0015dea603" async data-usrc>
  </script>


  <script>
    //    (function($) {
    //      $(window).on('load', function() {
    //        $.instagramFeed({
    //          'username': 'playgroundjakarta',
    //          'container': "#instagram-feed3",
    //          'display_profile': false,
    //          'display_biography': false,
    //          'display_gallery': true,
    //          'callback': null,
    //          'styling': true,
    //          'items': 9,
    //          'items_per_row': 3,
    //          'margin': 1
    //        });
    //      });
    //    })(jQuery);
    //  
  </script>
  <!-- chat css and js -->
  <link rel="stylesheet" href="assets/chat/floating-wpp.css">
  <script type="text/javascript" src="assets/chat/floating-wpp.js"></script>

  <script type="text/javascript">

    $(function () {
      $('#myButton').floatingWhatsApp({
        phone: '6283130095457',
        popupMessage: 'Hello, Apakah Ada Yang Bisa Kami Bantu?',
        message: "Halo Kak, Saya mau bertanya tentang playground di wahanaplayground.com?",
        showPopup: true,
        showOnIE: false,
        headerTitle: 'Whatsapp Message!',
        position:'right',
        headerColor: 'green',
        backgroundColor: 'green',
        buttonImage: '<img src="assets/chat/whatsapp.svg" />'
      });
    });
  </script>

</body>

</html>