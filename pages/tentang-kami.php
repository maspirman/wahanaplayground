<?php

include "connection.php";

$q = query("SELECT title, about, title_id, about_id FROM tbl_info")[0][0];

?>




<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Tentang Wahana Playground Indonesia</title>
  	<meta name="description" content="Tentang Wahana Playground. Kami menjual kebutuhan custom playground, playground indoor, playground outdoor, mainan playground hingga jasa desain playgorund."/>
	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Playfair+Display:700,700i,900&display=swap" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="style.css" type="text/css" />
	<link rel="stylesheet" href="css/dark.css" type="text/css" />

	<!-- Home Demo Specific Stylesheet -->
	<link rel="stylesheet" href="demos/interior-design/interior-design.css" type="text/css" />

	<link rel="stylesheet" href="css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="css/animate.css" type="text/css" />
	<link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />

	<!-- Reader's Blog Demo Specific Fonts -->
	<link rel="stylesheet" href="demos/interior-design/css/fonts.css" type="text/css" />

	<link rel="stylesheet" href="css/custom.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="css/colors.php?color=1c85e8" type="text/css" />

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
				<h1>Tentang Kami</h1>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?= $base_url; ?>">Home</a></li>
					<!-- <li class="breadcrumb-item"><a href="#">Portfolio</a></li> -->
					<li class="breadcrumb-item active" aria-current="page">Tentang Kami</li>
				</ol>
			</div>

		</section><!-- #page-title end -->

		<?php /*
		<section id="page-title" class="bg-transparent border-top page-title-center">

			<div class="container clearfix">
				<h1 class="font-secondary nott mb-4" style="font-size: 54px;">About </h1>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?= $base_url ?>">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">About</li>
				</ol>
			</div>

		</section><!-- #page-title end -->
		*/ ?>

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="container clearfix bottommargin-lg topmargin-lg">
				<div class="row clearfix col-mb-30">

					<div class="col-md-6">
						<div class="feature-box media-box" style="border-radius: 6px; box-shadow: 0 2px 4px rgba(3,27,78,.1); border: 1px solid #e5e8ed;">
							<img src="<?= $base_url; ?>assets/images/aboutus.jpeg" class="story-box">
							<!--<a href="#" class="btn btn-link mt-3 font-weight-normal color p-0" style="font-size: 16px;">$5/month for Location <i class="icon-line-arrow-right position-relative" style="top: 2px"></i></a>-->
						</div>

					</div>

					<div class="col-md-6">
						<div class="feature-box p-5 media-box bg-info" style="line-height: 2.0;border-radius: 6px; box-shadow: 0 2px 4px rgba(3,27,78,.1); border: 1px solid #e5e8ed; height: auto; font-size: 14px;">
							<!--<div class="fbox-media"> 
													<img src="demos/hosting/images/svg/balancing.svg" style="width: 42px;" alt="Image">
												</div>-->
							<div class="fbox-content px-0">
								<h3 class="ls0 text-white" style="margin-bottom:30px "><?= $q['title_id'] ?></h3>
								<!-- <p class="mt-2 text-white"><?= $q['about'] ?></p> -->
								<!-- <h3 class="ls0 text-white" style="margin-bottom:30px ">PT Wahana Tirta Estetika</h3> -->
								<p class="mt-2 text-white">Didirikan sejak 2007 sebagai divisi dari PT Wahana Tirta, kontraktor kolam renang dan air mancur terkemuka di industri. Kami memulai perjalanan kami ketika seorang pelanggan mempercayai kami untuk membangun area bermain anak-anak di proyek real estat mereka. Perusahaan memperkenalkan teknologi lantai karet dari Australia ke pasar Indonesia dan dikenal sebagai pemimpin dalam industri lantai karet.</p>

								<p class="mt-2 text-white">Perusahaan merancang dan membangun peralatan bermain dalam ruangan, luar ruangan dan air dengan bahan impor berkualitas tinggi yang memenuhi standar internasional dan segera dipercaya untuk memasang peralatan untuk sekolah dan apartemen Internasional, hotel dan rantai makanan cepat saji. Dengan fokus pada kualitas, keamanan dan desain, PT Wahana Tirta terus membangun proyek yang lebih menantang dan tematik di seluruh Indonesia. Perbaikan berkelanjutan adalah inti dari filosofi layanan pelanggan kami. Itu ada di balik akurasi pesanan terbaik industri kami, catatan pengiriman tepat waktu, dan fleksibilitas.</p>

								<p class="mt-2 text-white">Dengan pengalaman bertahun-tahun di industri dan dengan tim yang solid dari orang-orang yang memenuhi syarat, kami dengan senang hati membantu pelanggan kami untuk membangun taman bermain yang sesuai dengan imajinasi dan anggaran mereka.</p>
								<!-- <a href="#" class="btn btn-link mt-3 font-weight-normal color p-0" style="font-size: 16px;">$15/month for Load Balancing <i class="icon-line-arrow-right position-relative" style="top: 2px"></i></a> -->
							</div>
						</div>
					</div>
				</div>
			</div>

		</section><!-- #content end -->

	</div><!-- #wrapper end -->


</body>

</html>