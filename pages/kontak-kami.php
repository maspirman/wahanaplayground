<?php

include "connection.php";

$q = query("SELECT address, phone, fax, ig FROM tbl_info")[0][0];

?>

<body class="stretched side-push-panel">

	<!--<div id="side-panel">
		<div id="side-panel-trigger-close" class="side-panel-trigger"><a href="#"><i class="icon-line-cross"></i></a></div>

		<div class="side-panel-wrap">

			<div class="widget clearfix">
				<h4 class="font-weight-normal">Login with Social</h4>

				<a href="#" class="button button-rounded font-weight-normal btn-block center si-colored ml-0 si-facebook">Facebook</a>
				<a href="#" class="button button-rounded font-weight-normal btn-block center si-colored ml-0 si-gplus">Google</a>

				<div class="line line-sm"></div>

				<form id="login-form" name="login-form" class="row mb-0" action="#" method="post">

					<div class="col-12 form-group">
						<label for="login-form-username" class="font-weight-normal">Username:</label>
						<input type="text" id="login-form-username" name="login-form-username" value="" class="form-control" />
					</div>

					<div class="col-12 form-group">
						<label for="login-form-password" class="font-weight-normal">Password:</label>
						<input type="password" id="login-form-password" name="login-form-password" value="" class="form-control" />
					</div>

					<div class="col-12 form-group">
						<button class="button button-rounded font-weight-normal mx-0 mb-2" id="login-form-submit" name="login-form-submit" value="login">Login</button>
						<div class="w-100"></div>
						<a href="#" class="text-muted">Forgot Password?</a>
					</div>

				</form>

			</div>
		</div>
	</div>-->

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Slider
		============================================= 
		<section class="slider-element min-vh-75" style="background: url('demos/interior-design/images/about/hero.jpg') center 70% no-repeat; background-size: cover;">
			<div class="container">
				<div class="center mx-auto" style="max-width: 700px;">
					<div class="emphasis-title mt-5">
						<h2 class="font-secondary" style="color: #222; font-size: 70px; font-weight: 900; text-shadow: 0 7px 5px rgba(0,0,0,0.01), 0 4px 4px rgba(0,0,0,0.1);">Contact Us</h2>
						<p style="font-weight: 300; opacity: .7; color: #444; text-shadow: 0 -4px 20px rgba(0, 0, 0, .25);">Sell your home to us and skip the hassle of<br>repairs, showings and months of uncertainty</p>
					</div>
				</div>
			</div>
		</section>-->

		<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>Kontak Kami</h1>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?= $base_url; ?>">Home</a></li>
					<!-- <li class="breadcrumb-item"><a href="#">Portfolio</a></li> -->
					<li class="breadcrumb-item active" aria-current="page">Kontak Kami</li>
				</ol>
			</div>

		</section><!-- #page-title end -->

		<?php /*
		<section id="page-title" class="bg-transparent border-top page-title-center">

			<div class="container clearfix">
				<h1 class="font-secondary nott mb-3" style="font-size: 54px;">Contact Us</h1>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?= $base_url ?>">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">Contact Us</li>
				</ol>
				<!--<span>All about portofolio projects Wahana Playground</span>-->
			</div>

		</section><!-- #page-title end -->
		*/ ?>

		<!-- Content
		============================================= -->
		<section id="content">
			<div class="content-wrap">
				<div class="container clearfix">

					<div class="row align-items-stretch col-mb-50 mb-0">

						<!-- Contact Info
					============================================= -->
						<div class="row col-mb-50">
							<div class="col-sm-6 col-lg-3">
								<div class="feature-box fbox-center fbox-bg fbox-plain">
									<div class="fbox-icon">
										<a href="#"><i class="icon-map-marker2"></i></a>
									</div>
									<div class="fbox-content">
										<h3>Kantor Pusat<span class="subtitle"><?= $q['address'] ?></span></h3>
										<!-- <h3>Our Headquarters<span class="subtitle">Jl. Sultan Iskandar Muda 17N (Arteri Pondok Indah) Jakarta Selatan - Indonesia</span></h3> -->
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-lg-3">
								<div class="feature-box fbox-center fbox-bg fbox-plain">
									<div class="fbox-icon">
										<a href="#"><i class="icon-phone3"></i></a>
									</div>
									<div class="fbox-content">
										<h3>Telepon<span class="subtitle"><?= $q['phone'] ?></span></h3>
										<!-- <h3>Call Us<span class="subtitle">(6221) 270 81607</span></h3> -->
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-lg-3">
								<div class="feature-box fbox-center fbox-bg fbox-plain">
									<div class="fbox-icon">
										<a href="#"><i class="icon-fax"></i></a>
									</div>
									<div class="fbox-content">
										<h3>Fax<span class="subtitle"><?= $q['fax'] ?></span></h3>
										<!-- <h3>Fax<span class="subtitle">(6221) 725 2119</span></h3> -->
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-lg-3">
								<div class="feature-box fbox-center fbox-bg fbox-plain">
									<div class="fbox-icon">
										<a href="#"><i class="icon-instagram2"></i></a>
									</div>
									<div class="fbox-content">
										<h3>Instagram<span class="subtitle"><?= $q['ig'] ?></span></h3>
										<!-- <h3>Follow on Instagram<span class="subtitle">Playgroundjakarta</span></h3> -->
									</div>
								</div>
							</div>
						</div><!-- Contact Info End -->


						<!-- Contact Form
						============================================= -->
						<div class="col-lg-12">

							<div class="fancy-title title-border">
								<h3>Kirim Melalui Email</h3>
							</div>

							<div class="form-widget">

								<div class="form-result"></div>

								<form class="mb-0" id="template-contactform" name="template-contactform" action="include/form.php" method="post">

									<div class="form-process">
										<div class="css3-spinner">
											<div class="css3-spinner-scaler"></div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-4 form-group">
											<label for="template-contactform-name">Nama <small>*</small></label>
											<input type="text" id="template-contactform-name" name="template-contactform-name" value="" class="sm-form-control required" />
										</div>

										<div class="col-md-4 form-group">
											<label for="template-contactform-email">Email <small>*</small></label>
											<input type="email" id="template-contactform-email" name="template-contactform-email" value="" class="required email sm-form-control" />
										</div>

										<div class="col-md-4 form-group">
											<label for="template-contactform-phone">Telepon</label>
											<input type="text" id="template-contactform-phone" name="template-contactform-phone" value="" class="sm-form-control" />
										</div>

										<div class="w-100"></div>

										<div class="col-md-12 form-group">
											<label for="template-contactform-subject">Judul <small>*</small></label>
											<input type="text" id="template-contactform-subject" name="subject" value="" class="required sm-form-control" />
										</div>

										<div class="w-100"></div>

										<div class="col-12 form-group">
											<label for="template-contactform-message">Pesan <small>*</small></label>
											<textarea class="required sm-form-control" id="template-contactform-message" name="template-contactform-message" rows="6" cols="30"></textarea>
										</div>

										<div class="col-12 form-group d-none">
											<input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control" />
										</div>

										<div class="col-12 form-group">
											<button name="submit" type="submit" id="submit-button" tabindex="5" value="Submit" class="button button-3d m-0">Kirim Pesan</button>
										</div>
									</div>

									<input type="hidden" name="prefix" value="template-contactform-">

								</form>
							</div>

						</div>
						<!-- Contact Form End -->


						<!-- Google Map
                        ============================================= -->
						<!-- <div class="col-lg-6 min-vh-50">
							<div class="gmap h-100" data-address="Melbourne, Australia" data-markers='[{address: "Melbourne, Australia", html: "<div class=\"p-2\" style=\"width: 300px;\"><h4 class=\"mb-2\">Hi! We are <span>Envato!</span></h4><p class=\"mb-0\" style=\"font-size:1rem;\">Our mission is to help people to <strong>earn</strong> and to <strong>learn</strong> online. We operate <strong>marketplaces</strong> where hundreds of thousands of people buy and sell digital goods every day.</p></div>", icon:{ image: "images/icons/map-icon-red.png", iconsize: [32, 39], iconanchor: [32,39] } }]'></div>
						</div> -->
						<!-- Google Map End -->
					</div>



				</div>
			</div>
		</section><!-- #content end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- JavaScripts
	============================================= -->
	<script src="js/jquery.js"></script>
	<script src="js/plugins.min.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="js/functions.js"></script>

</body>

</html>