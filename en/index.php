<?php
require_once "../connection.php";
require_once "../admin/apl/config/koneksi.php";
require_once "../admin/apl/core/xfunction.php";


$pg = $_GET['p'];

?>

<script>
  function title() {
    document.title = "Wahana Playground Indonesia";
  }

  title()
</script>

<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="WahanaPlayground" />
  <meta name="description" content="">

  <!-- Stylesheets
	============================================= -->
  <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Playfair+Display:400,700,700i,900" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="../css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="../style.css" type="text/css" />
  <link rel="stylesheet" href="../css/dark.css" type="text/css" />
  <link rel="stylesheet" href="../assets/css/custom.css" type="text/css" />

  <!-- Real Estate Demo Specific Stylesheet -->
  <link rel="stylesheet" href="../demos/real-estate/real-estate.css" type="text/css" />
  <link rel="stylesheet" href="../demos/real-estate/css/font-icons.css" type="text/css" />
  <!-- / -->

  <!-- Home Demo Specific Stylesheet -->
  <link rel="stylesheet" href="../demos/interior-design/interior-design.css" type="text/css" />

  <link rel="stylesheet" href="../css/font-icons.css" type="text/css" />
  <link rel="stylesheet" href="../css/animate.css" type="text/css" />
  <link rel="stylesheet" href="../css/magnific-popup.css" type="text/css" />

  <!-- Reader's Blog Demo Specific Fonts -->
  <link rel="stylesheet" href="../demos/interior-design/css/fonts.css" type="text/css" />

  <link rel="stylesheet" href="../css/custom.css" type="text/css" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="../css/colors.php?color=1c85e8" type="text/css" />

  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.1.0/css/flag-icon.min.css" rel="stylesheet">


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
              <a href="<?= $BASE_URL; ?>" class="standard-logo"><img src="<?= $base_url; ?>assets/images/logo/wahanaplayground-logo.png" alt="wahanaplayground-logo"></a>
              <a href="<?= $BASE_URL; ?>" class="retina-logo"><img src="<?= $base_url; ?>assets/images/logo/wahanaplayground-logo.png" alt="wahanaplayground-logo"></a>
            </div><!-- #logo end -->

            <div class="header-misc">

              <!-- Top Cart
							============================================= -->
              <ul class="navbar-nav">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="flag-icon flag-icon-us"> </span> English</a>
                  <div class="dropdown-menu" aria-labelledby="dropdown09">
                    <a class="dropdown-item" href="https://www.wahanaplayground.com/"><span class="flag-icon flag-icon-id"> </span> Indonesia</a>
                  </div>
                </li>
              </ul>

            </div>

            <div id="primary-menu-trigger">
              <svg class="svg-trigger" viewBox="0 0 100 100">
                <path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path>
                <path d="m 30,50 h 40"></path>
                <path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path>
              </svg>
            </div>

            <!-- Primary Navigation
						============================================= -->
            <nav class="primary-menu with-arrows">
              <!--  OR $pg== ""-->

              <ul class="menu-container">
                <li class="menu-item <?php if ($pg == "home" or $pg == "") {
                                        echo 'current';
                                      } ?>"><a class="menu-link" href="<?= $BASE_URL ?>">
                    <div>Home</div>
                  </a></li>
                <li class="menu-item <?php if ($pg == "about") {
                                        echo 'current';
                                      } ?>"><a class="menu-link " href="<?php echo $BASE_URL ?>about-us">
                    <div>About Us</div>
                  </a></li>
                <li class="menu-item <?php if ($pg == "products") {
                                        echo 'current';
                                      } ?>"><a class="menu-link" href="javascript:void(0)" style="cursor: default;">
                    <div>Products</div>
                  </a>
                  <ul class="sub-menu-container">
                    <li class="menu-item">
                      <a class="menu-link" href="javascript:void(0)" style="cursor: default;">
                        <div>Indoor Playground</div>
                      </a>
                      <ul class="sub-menu-container">
                        <li class="menu-item <?php if ($pg == "thematic-modular-soft-play") {
                                                echo 'current';
                                              } ?>">
                          <a class="menu-link" href="<?= $BASE_URL ?>produk/thematic-modular-soft-play">
                            <div>Thematic Modular Soft Play</div>
                          </a>
                        </li>
                        <li class="menu-item <?php if ($pg == "custom-interior-design") {
                                                echo 'current';
                                              } ?>">
                          <a class="menu-link" href="<?= $BASE_URL ?>produk/custom-interior-design">
                            <div>Custom Interior Design</div>
                          </a>
                        </li>
                        <li class="menu-item <?php if ($pg == "rainbow-nets") {
                                                echo 'current';
                                              } ?>">
                          <a class="menu-link" href="<?= $BASE_URL ?>produk/rainbow-nets">
                            <div>Rainbow Nets</div>
                          </a>
                        </li>
                        <li class="menu-item <?php if ($pg == "soft-play") {
                                                echo 'current';
                                              } ?>">
                          <a class="menu-link" href="<?= $BASE_URL ?>produk/soft-play">
                            <div>Soft Play</div>
                          </a>
                        </li>
                      </ul>
                    </li>

                    <li class="menu-item">
                      <a class="menu-link" href="javascript:void(0)" style="cursor: default;">
                        <div>Outdoor Playground</div>
                      </a>
                      <ul class="sub-menu-container">
                        <li class="menu-item <?php if ($pg == "pe-series") {
                                                echo 'current';
                                              } ?>"><a class="menu-link" href="<?= $BASE_URL ?>produk/pe-series">
                            <div>PE Series</div>
                          </a></li>
                        <li class="menu-item <?php if ($pg == "classic") {
                                                echo 'current';
                                              } ?>"><a class="menu-link" href="<?= $BASE_URL ?>produk/classic">
                            <div>Classic</div>
                          </a></li>
                        <li class="menu-item <?php if ($pg == "wooden") {
                                                echo 'current';
                                              } ?>"><a class="menu-link" href="<?= $BASE_URL ?>produk/wooden">
                            <div>Wooden</div>
                          </a></li>
                        <li class="menu-item <?php if ($pg == "rope") {
                                                echo 'current';
                                              } ?>"><a class="menu-link" href="<?= $BASE_URL ?>produk/rope">
                            <div>Rope</div>
                          </a></li>
                        <li class="menu-item <?php if ($pg == "adventure") {
                                                echo 'current';
                                              } ?>"><a class="menu-link" href="<?= $BASE_URL ?>produk/adventure">
                            <div>Adventure</div>
                          </a></li>
                        <li class="menu-item <?php if ($pg == "swings") {
                                                echo 'current';
                                              } ?>"><a class="menu-link" href="<?= $BASE_URL ?>produk/swings">
                            <div>Swings</div>
                          </a></li>
                        <li class="menu-item <?php if ($pg == "seesaws") {
                                                echo 'current';
                                              } ?>"><a class="menu-link" href="<?= $BASE_URL ?>produk/seesaws">
                            <div>Seesaws</div>
                          </a></li>
                        <li class="menu-item <?php if ($pg == "riders") {
                                                echo 'current';
                                              } ?>"><a class="menu-link" href="<?= $BASE_URL ?>produk/riders">
                            <div>Riders</div>
                          </a></li>
                      </ul>
                    </li>

                    <li class="menu-item <?php if ($pg == "water-playground") {
                                            echo 'current';
                                          } ?>">
                      <a class="menu-link" href="<?= $BASE_URL ?>water-playground">
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
                          <a class="menu-link" href="<?= $BASE_URL ?>produk/stand-alone">
                            <div>Stand Alone</div>
                          </a>
                        </li>
                        <li class="menu-item <?php if ($pg == "integrated-set") {
                                                echo 'current';
                                              } ?>">
                          <a class="menu-link" href="<?= $BASE_URL ?>produk/integrated-set">
                            <div>Integrated Set</div>
                          </a>
                        </li>
                      </ul>
                    </li>

                    <li class="menu-item <?php if ($pg == "shade-sail") {
                                            echo 'current';
                                          } ?>">
                      <a class="menu-link" href="<?= $BASE_URL ?>produk/shade-sail">
                        <div>Shade Sail</div>
                      </a>
                    </li>
                    <li class="menu-item <?php if ($pg == "musical") {
                                            echo 'current';
                                          } ?>">
                      <a class="menu-link" href="<?= $BASE_URL ?>produk/musical">
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
                                      } ?>"><a class="menu-link" href="<?= $BASE_URL ?>portfolio">
                    <div>Portfolio</div>
                  </a></li>
                <li class="menu-item <?php if ($pg == "contact") {
                                        echo 'current';
                                      } ?>"><a class="menu-link" href="<?= $BASE_URL ?>contact-us">
                    <div>Contact Us</div>
                  </a></li>
              </ul>

            </nav><!-- #primary-menu end -->

          </div>
        </div>
      </div>
      <div class="header-wrap-clone"></div>
    </header>
    <!-- #header end -->


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
                    <h2 style="font-family: 'Lucida Console', 'Courier New', monospace;">PT. Wahana Tirta</h2>

                    <!-- <img src="images/footer-widget-logo.png" alt="Image" class="footer-logo"> -->

                    <!-- <p>We believe in <strong>Simple</strong>, <strong>Creative</strong> &amp; <strong>Flexible</strong> Design Standards.</p> -->
                    <p style="text-align: justify;"><strong>PT Wahana Tirta Estetika produces and custom design playground equipments that is designed with high quality materials for durability and safety. From indoor to outdoor to fitness equipments, kids gym to commercial projetcs, we will be happy to work based on various budget and usage.</strong></p>

                    <div style="background: url('images/world-map.png') no-repeat center center; background-size: 70%; ">
                      <?php $addres = query("SELECT address, phone, fax, ig FROM tbl_info")[0][0]; ?>
                      <address>
                        <strong>Headquarters:</strong><br>
                        <?= $addres['address'] ?><br>

                      </address>
                      <strong>Phone:</strong> <?= $addres['phone'] ?><br>
                      <strong>Fax:</strong> <?= $addres['fax'] ?><br>
                    </div>

                  </div>

                </div>

                <div class="col-md-2">

                  <div class="widget widget_links clearfix">

                    <h3><strong>Quick link</strong></h3>

                    <ul>
                      <li><a href="<?= $BASE_URL ?>">Home</a></li>
                      <li><a href="<?= $BASE_URL ?>about-us">About Us</a></li>
                      <li><a href="<?= $BASE_URL ?>produk/thematic-modular-soft-play">Product</a></li>
                      <li><a href="<?= $BASE_URL ?>portfolio">Portfolio</a></li>
                      <li><a href="<?= $BASE_URL ?>contact-us">Contact Us</a></li>
                      <li><a href="http://www.playgroundjakarta.blogspot.com">Blog</a></li>
                      <li><a href="https://rubberfloorindonesia.com/">Rubber Floor</a></li>
                    </ul>

                  </div>

                </div>

                <div class="col-md-5">

                  <div class="col-sm-6 col-lg-10">
                    <div class="widget clearfix">
                      <h3><strong>Instagram Photos</strong></h3>
                      <div id="instagram-photos" class="instagram-photos masonry-thumbs grid-3" data-user="playgroundjakarta" data-count="9"></div>
                      <!--<div id="instagram-feed3" class="instagram-feed">

          						</div>-->
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
              Copyrights &copy; 2020 <a href="<?= $base_url ?>/en">Wahana Playground</a>. Powered By <a href="https://www.resolusiweb.com">Resolusiweb Digital Media</a><br>
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

  <!-- JavaScripts
	============================================= -->
  <script src="<?= $base_url; ?>js/jquery.js"></script>
  <script src="<?= $base_url; ?>js/plugins.min.js"></script>

  <!-- Footer Scripts
	============================================= -->
  <script src="<?= $base_url; ?>js/functions.js"></script>

  <!-- Instagram Feed JS
	============================================= -->
  <!--<script src="assets/js/instagramfeed/jquery.instagramFeed.min.js"></script>-->

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


  <!--<script>
		(function($) {
		$(window).on('load', function() {
			$.instagramFeed({
			'username': 'playgroundjakarta',
			'container': "#instagram-feed3",
			'display_profile': false,
			'display_biography': false,
			'display_gallery': true,
			'callback': null,
			'styling': true,
			'items': 9,
			'items_per_row': 3,
			'margin': 1
			});
		});
		})(jQuery);
	</script>-->

</body>

</html>