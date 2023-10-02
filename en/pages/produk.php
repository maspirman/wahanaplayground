<?php

$ctgr = $_GET['d'];
$trgt = str_replace("-", "", $ctgr);

$c = query("SELECT tbl_media.pict_name, tbl_media.alt, tbl_product.sub_category_name FROM tbl_media INNER JOIN tbl_product ON tbl_media.id_media = tbl_product.id_media WHERE tbl_product.target='$trgt' ORDER BY alt ASC")[0];

?>

<script>
  function title() {
    document.title = "<?= $c[0]['sub_category_name'] ?> - Wahana Playground";
  }

  title()
</script>

<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>

  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="author" content="SemiColonWeb" />

  <!-- Stylesheets
	============================================= -->
  <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Playfair+Display:700,700i,900&display=swap" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="../css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="../style.css" type="text/css" />
  <link rel="stylesheet" href="../css/dark.css" type="text/css" />

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

  <!-- Document Title
	============================================= -->


</head>

<style>
  #content p {
    line-height: 2.0;
  }
</style>

<body class="stretched side-push-panel">

  <!-- Document Wrapper
	============================================= -->
  <div id="wrapper" class="clearfix">

    <!-- Page Title
    ============================================= -->

    <section id="page-title">

      <div class="container clearfix">
        <h1><?= $c[0]['sub_category_name'] ?></h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= $base_url; ?>">Home</a></li>
          <!-- <li class="breadcrumb-item"><a href="#">Portfolio</a></li> -->
          <li class="breadcrumb-item active" aria-current="page"><?= $c[0]['sub_category_name'] ?></li>
        </ol>
      </div>

    </section><!-- #page-title end -->

    <!-- <section id="page-title" class="bg-transparent border-top page-title-center">
      <div class="container clearfix">
        <h1 class="font-secondary nott mb-4" style="font-size: 40px;"></h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page"></li>
        </ol>
      </div>

    </section> -->
    <!-- #page-title end -->

    <!-- Content
		============================================= -->
    <section id="content">
      <div class="content-wrap clearfix">
        <div class="container">

          <div class="row col-mb-50">
            <!-- <h3>Classic Playground Portofolio</h3> -->
            <?php foreach ($c as $u) : ?>
              <div class="portfolio-item col-md-3 col-sm-4 col-12">
                <div class="grid-inner">
                  <div class="portfolio-image">
                    <a href="portfolio-single.html">
                      <img src="<?= $base_url; ?>admin/assets/img/wahana/<?= $u['pict_name'] ?>" alt="<?= $u['alt'] ?>" style="height: 230px;">
                    </a>
                    <div class="bg-overlay">
                      <div class="bg-overlay-content dark" data-hover-animate="fadeIn">
                        <a href="<?= $base_url; ?>admin/assets/img/wahana/<?= $u['pict_name'] ?>" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350" data-lightbox="image" title="Image"><i class="icon-search-plus"></i></a>

                      </div>
                      <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
                    </div>
                  </div>
                  <div class="portfolio-desc text-center">
                    <h3><?= strtoupper($u['alt']) ?></h3>
                    <!-- <span><a href="#">Media</a>, <a href="#">Icons</a></span> -->
                  </div>
                </div>
              </div>
            <?php endforeach ?>

          </div>
        </div>
        <!-- <div class="line"></div> -->
    </section>

  </div>
  <!-- #wrapper end -->

</body>

</html>