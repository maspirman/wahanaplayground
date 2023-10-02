<?php
$r = query("SELECT pict_name FROM tbl_media WHERE slider = 'slider_1'")[0][0];
$s = query("SELECT pict_name FROM tbl_media WHERE slider = 'slider_2'")[0][0];
$t = query("SELECT pict_name FROM tbl_media WHERE slider = 'slider_3'")[0][0];
$u = query("SELECT pict_name FROM tbl_media WHERE slider = 'slider_4'")[0][0];
$v = query("SELECT pict_name FROM tbl_media WHERE slider = 'slider_5'")[0][0];
$z = query("SELECT title, about FROM tbl_info WHERE id_info='2'")[0][0];

?>

<head>
	<style>
		#kotak {
			margin: 0 150px;
			padding: 30px 0
		}

		@media screen and (max-width: 992px) {
			#kotak {
				margin: 0 50px;
				padding: 30px 0
			}
		}

		@media screen and (max-width: 600px) {
			#kotak {
				margin: 0 10px;
				padding: 5px 0
			}
		}
	</style>

</head>


<body>

	<!--boxed-slider-->
	<div class="container slider-element mb-0 pb-0" id="slider" style="margin-bottom: -60px !important;">
		<div id="oc-slider" class="owl-carousel carousel-widget" data-items="1" data-loop="true" data-nav="true" data-autoplay="5000" data-animate-in="fadeIn" data-animate-out="fadeOut" data-speed="800">
			<a href="#"><img src="<?= $base_url; ?>admin/assets/img/wahana/<?= $r['pict_name']; ?>" alt="Slider"></a>
			<a href="#"><img src="<?= $base_url; ?>admin/assets/img/wahana/<?= $s['pict_name']; ?>" alt="Slider"></a>
			<a href="#"><img src="<?= $base_url; ?>admin/assets/img/wahana/<?= $t['pict_name']; ?>" alt="Slider"></a>
			<a href="#"><img src="<?= $base_url; ?>admin/assets/img/wahana/<?= $u['pict_name']; ?>" alt="Slider"></a>
			<a href="#"><img src="<?= $base_url; ?>admin/assets/img/wahana/<?= $v['pict_name']; ?>" alt="Slider"></a>
		</div>
	</div>
	<?php /*
	<div class="bg-light mt-0">
		<div class="container clearfix bottommargin-lg topmargin-lg">
			<div class="row clearfix col-mb-30 ">
				<div class="heading-block col-md-12 text-center pt-4 pb-0 mb-5">
					<h3>Who We Are</h3>
				</div>

				<div class="col-md-6">
					<div class="feature-box p-5 media-box" style="line-height: 2.0;border-radius: 6px; box-shadow: 0 2px 4px rgba(3,27,78,.1); border: 1px solid #e5e8ed; background-color: #1C85E8; height: auto;">
						<!--<div class="fbox-media"> 
											<img src="demos/hosting/images/svg/balancing.svg" style="width: 42px;" alt="Image">
										</div>-->
						<div class="fbox-content px-0">
							<h3 class="ls0 text-white" style="margin-bottom:30px "><?= $z['title'] ?></h3>
							<p class="mt-2 text-white"><?= $z['about'] ?> </p>
						</div>
					</div>
				</div>

				<div class="col-md-6">
					<div class="feature-box media-box" style="border-radius: 6px; box-shadow: 0 2px 4px rgba(3,27,78,.1); border: 1px solid #e5e8ed;">
						<img src="<?= $base_url; ?>assets/images/portofolio/indoor-playground-equipment.jpeg" class="story-box">
						<!--<a href="#" class="btn btn-link mt-3 font-weight-normal color p-0" style="font-size: 16px;">$5/month for Location <i class="icon-line-arrow-right position-relative" style="top: 2px"></i></a>-->
					</div>
				</div>

			</div>
		</div>
	</div>
	*/ ?>
	<div class="bg-light mt-0">
		<div class="container clearfix bottommargin-lg topmargin-lg">
			<div class="tab-container">
				<div class="tab-content clearfix" id="kotak">
					<div class="story-box description-right">
						<div class="story-box-image">
							<img src="<?= $base_url; ?>assets/images/portofolio/indoor-playground-equipment.jpeg" alt="story-image" style="background-size: cover;">
						</div>
						<div class="story-box-info bg-info">
							<h3 class="story-title text-white"><?= $z['title'] ?></h3>
							<div class="story-box-content">
								<p class="text-white" style="line-height: 1.8;">PT Wahana Tirta Estetika produces and custom design playground equipments that is designed with high quality materials for durability and safety. From indoor to outdoor to fitness equipments, kids gym to commercial projetcs, we will be happy to work based on various budget and usage.</p>
								<!--<button class="font-weight-light button ml-0 button-rounded">Read Canvas's story</button>-->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- <div class="clear"></div> -->

	<div class="section bg-transparent mt-0 clearfix bottommargin-sm">
		<div class="container clearfix">
			<div class="row justify-content-center col-mb-50 pb-4">
				<div class="col-sm-6 col-lg-4">
					<div class="feature-box fbox-plain">
						<div class="fbox-icon">
							<i class="icon-paint-brush"></i>
						</div>
						<div class="fbox-content">
							<h3 class="nott font-weight-semibold ls0">Design</h3>
							<p>We believe every project is unique, that is why we will work with you to cater a playground design that will fit your budget and taste while Keeping fun and safety in mind. Whether its modern to natural to thematic design, we can work to fulfill your vision.</p>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-lg-4">
					<div class="feature-box fbox-plain">
						<div class="fbox-icon">
							<i class="icon-medal"></i>
						</div>
						<div class="fbox-content">
							<h3 class="nott font-weight-semibold ls0">Quality</h3>
							<p>A safe playground often begins with quality equipment. That is why quality is critical when we design and produce our playground. Our strict selection of materials will make sure we deliver quality products that will last the weather to be enjoyed for many years to come. </p>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-lg-4">
					<div class="feature-box fbox-plain">
						<div class="fbox-icon">
							<i class="icon-shield-alt"></i>
						</div>
						<div class="fbox-content">
							<h3 class="nott font-weight-semibold ls0">Safety</h3>
							<p>Safety is at the heart of every playground project, we are here to make sure every structure will comply with every international standards of safety requirements and that parents will feel secure playing in your playground. Our products are TUV certified conform to EN1176 to insure safety play, and CE certification conform to EN71. </p>
						</div>
					</div>
				</div>
				<!-- <div class="line"></div> -->
			</div>
		</div>
		<!-- class="bottommargin-sm"-->
		<div class="bg-light">
			<div class="header-stick bg-light">
				<!-- <div class="container clearfix"> -->
				<div class="row pt-3">
					<div class="col-lg-12">
						<div class="heading-block text-center">
							<h3>Our Products</h3>
						</div>
						<!--<p class="mb-0">Lasting change, stakeholders development Angelina Jolie world problem solving progressive. Courageous; social entrepreneurship change; accelerate resolve pursue these aspirations asylum.</p>-->
					</div>
				</div>
				<!-- </div> -->
			</div>

			<div class="container clearfix">
				<div class="row real-estate-properties bottommargin-lg bg-light pb-4">
					<!-- demos/real-estate/images/cities/3.jpg-->
					<div class="col-lg-4">
						<a href="<?= $base_url ?>en/thematic-modular-soft-play" style="background: url('<?= $base_url; ?>assets/images/portofolio/indoor-playground-equipment.jpeg') no-repeat center center; background-size: cover;">
							<div class="vertical-middle dark center">
								<div class="heading-block m-0 border-0">
									<h4 class="text-capitalize font-weight-medium">INDOOR PLAYGROUND</h4>
									<!--<span style="margin-top: 5px; font-size: 17px;">8 Properties</span>-->
								</div>
							</div>
						</a>
					</div>
					<div class="col-lg-4">
						<a href="<?= $base_url ?>en/integrated-set" style="background: url('<?= $base_url; ?>assets/images/portofolio/outdoor-fitness-equipment.jpeg') no-repeat center center; background-size: cover;">
							<div class="vertical-middle dark center">
								<div class="heading-block m-0 border-0">
									<h4 class="text-capitalize font-weight-medium">OUTDOOR FITNESS</h4>
									<!--<span style="margin-top: 5px; font-size: 17px;">31 Properties</span>-->
								</div>
							</div>
						</a>
					</div>
					<div class="col-lg-4">
						<a href="<?= $base_url ?>en/water-playground" style="background: url('<?= $base_url; ?>assets/images/portofolio/waterplay-equipment.jpeg') no-repeat center center; background-size: cover;">
							<div class="vertical-middle dark center">
								<div class="heading-block m-0 border-0">
									<h4 class="text-capitalize font-weight-medium">WATER PLAYGROUND</h4>
									<!--<span style="margin-top: 5px; font-size: 17px;">19 Properties</span>-->
								</div>
							</div>
						</a>
					</div>
					<div class="col-lg-4">
						<a href="<?= $base_url ?>en/classic" style="background: url('<?= $base_url; ?>assets/images/portofolio/products-outdoor-playground-equipment.jpeg') no-repeat center center; background-size: cover;">
							<div class="vertical-middle dark center">
								<div class="heading-block m-0 border-0">
									<h4 class="text-capitalize font-weight-medium">OUTDOOR PLAYGROUND EQUIPMENT</h4>
									<!--<span style="margin-top: 5px; font-size: 17px;">8 Properties</span>-->
								</div>
							</div>
						</a>
					</div>
					<div class="col-lg-4">
						<a href="<?= $base_url ?>en/shade-sail" style="background: url('<?= $base_url; ?>assets/images/portofolio/shade-sail.jpeg') no-repeat center center; background-size: cover;">
							<div class="vertical-middle dark center">
								<div class="heading-block m-0 border-0">
									<h4 class="text-capitalize font-weight-medium">SHADE SAIL</h4>
									<!--<span style="margin-top: 5px; font-size: 17px;">31 Properties</span>-->
								</div>
							</div>
						</a>
					</div>
					<div class="col-lg-4">
						<a href="<?= $base_url ?>en/soft-play" style="background: url('<?= $base_url; ?>assets/images/portofolio/soft-play.jpg') no-repeat center center; background-size: cover;">
							<div class="vertical-middle dark center">
								<div class="heading-block m-0 border-0">
									<h4 class="text-capitalize font-weight-medium">SOFT PLAY</h4>
									<!--<span style="margin-top: 5px; font-size: 17px;">19 Properties</span>-->
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>


		<div class="header-stick">
			<div class="container clearfix">
				<div class="row">
					<div class="col-lg-12">
						<div class="heading-block text-center">
							<h3>Installation</h3>
						</div>
						<!--<p class="mb-0">Lasting change, stakeholders development Angelina Jolie world problem solving progressive. Courageous; social entrepreneurship change; accelerate resolve pursue these aspirations asylum.</p>-->
					</div>
				</div>
			</div>
		</div>

		<!--style="background-color: #E4E4E4"
			style="background-color: #E5E3CE;
			style="background-color: #C9D6CF"-->


		<div class="container">
			<div class="row justify-content-center clearfix bottommargin-lg">
				<div class="mx-auto" style="max-width: 960px">
					<!--<div class="heading-block center border-bottom-0">
						<h2 class="ls2 font-weight-bold">Your Priority is our Priority</h2>
						<span>Competently benchmark backward-compatible technologies vis-a-vis<br>parallel convergence. Rapidiously innovate stand-alone.</span>
					</div>-->
					<div class="tabs tabs-alt tabs-responsive tabs-justify clearfix" id="tab">

						<ul class="tab-nav">
							<li><a href="#tabs-1" onMouseOver="this.style.color='#1C85E8'" onMouseOut="this.style.color='#333333'"><i class="icon-realestate-plan"></i>Landscaping</a></li>
							<li><a href="#tabs-2" onMouseOver="this.style.color='#1C85E8'" onMouseOut="this.style.color='#333333'"><i class="icon-realestate-skyscrapers2"></i>Commercial Playground</a></li>
							<li><a href="#tabs-3" onMouseOver="this.style.color='#1C85E8'" onMouseOut="this.style.color='#333333'"><i class="icon-realestate-my-house"></i>Real Estate Facility</a></li>
							<li><a href="#tabs-4" onMouseOver="this.style.color='#1C85E8'" onMouseOut="this.style.color='#333333'"><i class="icon-realestate-house8"></i>Home Playground</a></li>
							<li><a href="#tabs-5" onMouseOver="this.style.color='#1C85E8'" onMouseOut="this.style.color='#333333'"><i class="icon-realestate-lawn-mower"></i>Goverment Parks</a></li>
							<li><a href="#tabs-6" onMouseOver="this.style.color='#1C85E8'" onMouseOut="this.style.color='#333333'"><i class="icon-realestate-love"></i>School Facility</a></li>


						</ul>

						<div class="tab-container">
							<!--demos/interior-design/images/story/4.jpg-->

							<div class="tab-content clearfix" id="tabs-1">
								<div class="story-box description-left clearfix">
									<div class="story-box-image">
										<img src="<?= $base_url; ?>assets/images/installation/landscaping2.png" alt="story-image">
									</div>
									<div class="story-box-info">
										<h3 class="story-title">Landscaping</h3>
										<div class="story-box-content">
											<p style="line-height: 1.8;">We work closely with landscape designers to create a structure for the children playground to match the surrounding landscape and your desires. We also prepared a playground drawing to be applied to the site plan.</p>
											<!--<button class="font-weight-light button ml-0 button-rounded">Read Canvas's story</button>-->
										</div>
									</div>
								</div>
							</div>
							<div class="tab-content clearfix" id="tabs-2">
								<div class="story-box clearfix">
									<div class="story-box-image">
										<img src="<?= $base_url; ?>assets/images/installation/commercial-playground.jpeg" alt="story-image">
									</div>
									<div class="story-box-info">
										<h3 class="story-title">Commercial Playground</h3>
										<div class="story-box-content">
											<p style="line-height: 1.8;">In a commercial playground, we offer consultations and custom designs that will apply to space, interior and usage. We will work with owners to build something that is built for maximum return on investment yet inviting for kids to come.</p>
											<!--<button class="font-weight-light button ml-0 button-rounded">Read More</button>-->
										</div>
									</div>
								</div>
							</div>
							<div class="tab-content clearfix" id="tabs-3">
								<div class="story-box description-left clearfix">
									<div class="story-box-image">
										<img src="<?= $base_url; ?>assets/images/installation/real-estate-facility.jpeg" alt="story-image">
									</div>
									<div class="story-box-info">
										<h3 class="story-title">Real Estate Facility</h3>
										<div class="story-box-content">
											<p style="line-height: 1.8;">The variety of children playgrounds that we have will make the playgrounds in housing, more attractive . From big to small area, cluster park to clubhouses we design according to your desired theme.</p>
											<!--<button class="font-weight-light button ml-0 button-rounded">Read About Me</button>-->
										</div>
									</div>
								</div>
							</div>
							<div class="tab-content clearfix" id="tabs-4">
								<div class="story-box clearfix">
									<div class="story-box-image">
										<img src="<?= $base_url; ?>assets/images/installation/home-playground.jpeg" alt="story-image">
									</div>
									<div class="story-box-info">
										<h3 class="story-title">Home Playground</h3>
										<div class="story-box-content">
											<p style="line-height: 1.8;">For home playgrounds, we have selections of play tower that is space efficient, lower budget, still with variety of play. We help find solutions that should answer the needs of children at home.</p>
											<!--<a href="#">Read Deanne's story</a>-->
										</div>
									</div>
								</div>
							</div>
							<div class="tab-content clearfix" id="tabs-5">
								<div class="story-box clearfix">
									<div class="story-box-image">
										<img src="<?= $base_url; ?>assets/images/installation/government-parks2.png" alt="story-image">
									</div>
									<div class="story-box-info">
										<h3 class="story-title">Government Park</h3>
										<div class="story-box-content">
											<p style="line-height: 1.8;">Public facilities provided by the government such as playgrounds must be sturdy, safe, and maintenance free. From lower to higher budget equipments, we can work closely to conceptualize something to appeal to various age of children. </p>
											<!--<a href="#">Read Deanne's story</a>-->
										</div>
									</div>
								</div>
							</div>
							<div class="tab-content clearfix" id="tabs-6">
								<div class="story-box clearfix">
									<div class="story-box-image">
										<img src="<?= $base_url; ?>assets/images/installation/school-facility.jpeg" alt="story-image">
									</div>
									<div class="story-box-info">
										<h3 class="story-title">We help people to create new Website.</h3>
										<div class="story-box-content">
											<p style="line-height: 1.8;">Dynamically exploit cross-platform sources vis-a-vis scalable paradigms. Efficiently plagiarize multifunctional internal or "organic" sources before intuitive innovation. Synergistically facilitate goal-oriented ROI vis-a-vis client-focused.</p>
											<!--<a href="#">Read Deanne's story</a>-->
										</div>
									</div>
								</div>
							</div>

						</div>

					</div>
				</div>
			</div>
		</div>


		<div class="clear"></div>
		<div class="bg-light">
			<div class="header-stick pt-4">
				<div class="container clearfix">
					<div class="row">
						<div class="col-lg-12">
							<div class="heading-block text-center">
								<h3>Types of Playground</h3>
							</div>
							<!--<p class="mb-0">Lasting change, stakeholders development Angelina Jolie world problem solving progressive. Courageous; social entrepreneurship change; accelerate resolve pursue these aspirations asylum.</p>-->
						</div>
					</div>
				</div>
			</div>

			<div class="section mt-0 bg-light">
				<div class="container pb-4">
					<div class="row real-estate-properties align-items-center justify-content-between">

						<!--<div class="col-lg-4" data-bottom-top="margin-top:-50px" data-top-bottom="margin-top:50px">
							<small class="text-muted text-uppercase font-weight-light ls4 mb-1 d-block">Experience</small>
							<h2 class="font-weight-bold ls0 mb-4" style="font-size: 38px;">we are happy to help our customers to build playgrounds that suited to their imagination and budget.</h2>
							<p class="text-muted" style="font-size: 16px;">Was established since 2007 as a division to PT Wahana Tirta, a prominent contractor of swimming pool and water fountain in the industry. We started our journey when a customer trusted us to build children playground area in their real estate project. The company introduces rubber flooring technology from Australia to Indonesian market and was known as a leader in the rubber floor industry.</p>
						</div>-->

						<div class="col-lg-4">
							<a href="<?= $base_url ?>custom-interior-design" style="background: url('<?= $base_url; ?>assets/images/types/custom-theme.jpeg') no-repeat center center; background-size: cover;">
								<div class="vertical-middle dark center">
									<div class="heading-block m-0 border-0">
										<h3 class="text-capitalize font-weight-medium">CUSTOM / THEME</h3>
										<!--<span style="margin-top: 5px; font-size: 17px;">8 Properties</span>-->
									</div>
								</div>
							</a>
						</div>
						<div class="col-lg-4">
							<a href="<?= $base_url ?>wooden" style="background: url('<?= $base_url; ?>assets/images/types/nature-inspired.jpeg') no-repeat center center; background-size: cover;">
								<div class="vertical-middle dark center">
									<div class="heading-block m-0 border-0">
										<h3 class="text-capitalize font-weight-medium">NATURE INSPIRED</h3>
										<!--<span style="margin-top: 5px; font-size: 17px;">31 Properties</span>-->
									</div>
								</div>
							</a>
						</div>
						<div class="col-lg-4">
							<a href="<?= $base_url ?>adventure" style="background: url('<?= $base_url; ?>assets/images/types/adventure.jpeg') no-repeat center center; background-size: cover;">
								<div class="vertical-middle dark center">
									<div class="heading-block m-0 border-0">
										<h3 class="text-capitalize font-weight-medium">ADVENTURE</h3>
										<!--<span style="margin-top: 5px; font-size: 17px;">19 Properties</span>-->
									</div>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="clear"></div>

		<div class="header-stick">
			<div class="container clearfix">
				<div class="row">
					<div class="col-lg-12 text-center">
						<div class="heading-block ">
							<h3>Our Services</h3>
						</div>
						<!--<p class="mb-0">Lasting change, stakeholders development Angelina Jolie world problem solving progressive. Courageous; social entrepreneurship change; accelerate resolve pursue these aspirations asylum.</p>-->
					</div>
				</div>
			</div>
		</div>

		<div class="container clearfix">
			<div class="row justify-content-center col-mb-50">
				<div class="col-sm-6 col-lg-3">
					<div class="feature-box media-box">
						<div class="fbox-media">
							<img src="<?= $base_url; ?>images/services/design.png" alt="Why choose Us?">
						</div>
						<div class="fbox-content px-0">
							<h3>Consult/Design
								<!--<span class="subtitle">Because we are Reliable.</span>-->
							</h3>
							<p>We work closely with our clients to design play equipments that are personal, functional, and exciting for children. Through creative use of form, texture, and color we each of our project is tailored made to clients budget and vision.</p>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-lg-3">
					<div class="feature-box media-box">
						<div class="fbox-media">
							<img src="<?= $base_url; ?>images/services/build.png" alt="Why choose Us?">
						</div>
						<div class="fbox-content px-0">
							<h3>Build
								<!--<span class="subtitle">To Redefine your Brand.</span>-->
							</h3>
							<p>Using only high quality materials and strict quality control, we build your playground equipment that is tailored to your needs. </p>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-lg-3">
					<div class="feature-box media-box">
						<div class="fbox-media">
							<img src="<?= $base_url; ?>images/services/install.png" alt="Why choose Us?">
						</div>
						<div class="fbox-content px-0">
							<h3>Install
								<!--<span class="subtitle">Make our Customers Happy.</span>-->
							</h3>
							<p>Our experienced installers will install our product all over Indonesia. From Soroako, Balikpapan, Riau to Batam, we are dedicated to helping you get the projects done with safety requirements and on time.</p>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-lg-3">
					<div class="feature-box media-box">
						<div class="fbox-media">
							<img src="<?= $base_url; ?>images/services/maintenance.png" alt="Why choose Us?">
						</div>
						<div class="fbox-content px-0">
							<h3>Maintenance
								<!--<span class="subtitle">Make our Customers Happy.</span>-->
							</h3>
							<p>We believe safety our playground is important, that is why for each playground we sell, we provide maintenance service to make sure continuous safety of your playground equipment. Our maintenance team will drop by and inspect playground regularly to make sure there will be no accidents because of structural damaged or loose parts.</p>
						</div>
					</div>
				</div>
			</div>
		</div>


		<!-- #content end -->
</body>