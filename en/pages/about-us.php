<?php

include "connection.php";

$q = query("SELECT title, about FROM tbl_info")[0][0];

?>

<script>
	function title() {
		document.title = "About Us - Wahana Playground";
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
				<h1>About Us</h1>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?= $BASE_URL; ?>">Home</a></li>
					<!-- <li class="breadcrumb-item"><a href="#">Portfolio</a></li> -->
					<li class="breadcrumb-item active" aria-current="page">About us</li>
				</ol>
			</div>

		</section><!-- #page-title end -->

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
						<div class="feature-box p-5 media-box bg-info" style="line-height: 2.0;border-radius: 6px; box-shadow: 0 2px 4px rgba(3,27,78,.1); border: 1px solid #e5e8ed; background-color: #1C85E8; height: auto; font-size: 14px;">
							<!--<div class="fbox-media"> 
													<img src="demos/hosting/images/svg/balancing.svg" style="width: 42px;" alt="Image">
												</div>-->
							<div class="fbox-content px-0">
								<h3 class="ls0 text-white" style="margin-bottom:30px "><?= $q['title'] ?></h3>
								<p class="mt-2 text-white"><?= $q['about'] ?></p>
								<!-- <h3 class="ls0 text-white" style="margin-bottom:30px ">PT Wahana Tirta Estetika</h3>
									<p class="mt-2 text-white">Supplies & install children playground equipment & rubber floor products that is designed with safety & high durability. With over ten years of experience in the playground industry, we make sure we design for fun, innovative,safety-compliant and high-quality playground equipment. We have a wide range of products, outdoor playground, indoor playground, fitness equipment, plastic toys, swing, seesaw, for you to source for all of your playground needs. </p> -->
								<!--<a href="#" class="btn btn-link mt-3 font-weight-normal color p-0" style="font-size: 16px;">$15/month for Load Balancing <i class="icon-line-arrow-right position-relative" style="top: 2px"></i></a>-->
							</div>
						</div>
					</div>

				</div>
			</div>

		</section><!-- #content end -->

	</div><!-- #wrapper end -->


</body>

</html>