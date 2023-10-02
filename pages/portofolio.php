<?php

$c = query("SELECT portfolio_id, portfolio_title, portfolio_image, portfolio_file FROM tbl_portfolio ORDER BY portfolio_title ASC")[0];

?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US">
]


<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Portfolio Wahana Playground</title>
	<meta name="description" content="Portfolio Wahana Playground. Tersedia berbagai macam ukuran, bentuk dan custom playground."/>

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Playfair+Display:400,700,700i,900" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?= $base_url; ?>css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="<?= $base_url; ?>style.css" type="text/css" />
	<link rel="stylesheet" href="<?= $base_url; ?>css/dark.css" type="text/css" />
	<link rel="stylesheet" href="<?= $base_url; ?>assets/css/custom.css" type="text/css" />

	<!-- Real Estate Demo Specific Stylesheet -->
	<link rel="stylesheet" href="<?= $base_url; ?>demos/real-estate/real-estate.css" type="text/css" />
	<link rel="stylesheet" href="<?= $base_url; ?>demos/real-estate/css/font-icons.css" type="text/css" />
	<!-- / -->

	<!-- Home Demo Specific Stylesheet -->
	<link rel="stylesheet" href="<?= $base_url; ?>demos/interior-design/interior-design.css" type="text/css" />

	<link rel="stylesheet" href="<?= $base_url; ?>css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="<?= $base_url; ?>css/animate.css" type="text/css" />
	<link rel="stylesheet" href="<?= $base_url; ?>css/magnific-popup.css" type="text/css" />

	<!-- Reader's Blog Demo Specific Fonts -->
	<link rel="stylesheet" href="<?= $base_url; ?>demos/interior-design/css/fonts.css" type="text/css" />

	<link rel="stylesheet" href="<?= $base_url; ?>css/custom.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="<?= $base_url; ?>css/colors.php?color=1c85e8" type="text/css" />

	<!-- Document Title
	============================================= -->


</head>




<body class="stretched side-push-panel">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>Brosur dan Katalog</h1>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?= $base_url; ?>">Home</a></li>
					<!-- <li class="breadcrumb-item"><a href="#">Portfolio</a></li> -->
					<li class="breadcrumb-item active" aria-current="page">Portofolio</li>
				</ol>
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
						<!-- <h3>Classic Playground Portofolio</h3> -->
						<?php foreach ($c as $u) : ?>
							<div class="portfolio-item col-md-3 col-sm-4 col-12">
								<div class="grid-inner">
									<div class="portfolio-image">
										<a href="<?php echo $base_url; ?>book.php?id=<?= $u['portfolio_id']?>&<?= $u['portfolio_file'] ?>">
											<img src="admin/assets/book/img/<?= $u['portfolio_image'] ?>" alt="<?= $u['portfolio_title'] ?>" style="height: 350px;">
										</a>

									</div>
									<div class="portfolio-desc text-center">
										<h3><?= $u['portfolio_title'] ?></h3>
										<!-- <span><a href="#">Media</a>, <a href="#">Icons</a></span> -->
									</div>
								</div>
							</div>
						<?php endforeach ?>

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

</html>