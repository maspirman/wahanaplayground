<!-- Font Awesome CDN--> 
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>



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

  #box-2 {
    /* margin-right: 400px;
    padding-top: 80px;
    display: flex;
    position: relative;
    z-index: 4; */

  }

</style>






    <script type="text/javascript">
//         let next = document.querySelector('.next')
// let prev = document.querySelector('.prev')
// let show = document.querySelector('.slide')
// next.addEventListener('swipe', function(){
//     let item_sliders = document.querySelectorAll('.item_slider')
//     document.querySelector('.slide').appendChild(item_sliders[0])
// })
// next.addEventListener('click', function(){
//     let item_sliders = document.querySelectorAll('.item_slider')
//     document.querySelector('.slide').appendChild(item_sliders[0])
// })

// prev.addEventListener('click', function(){
//     let item_sliders = document.querySelectorAll('.item_slider')
//     document.querySelector('.slide').prepend(item_sliders[item_sliders.length - 1]) // here the length of item_sliders = 6
// })


     // window.addEventListener('DOMContentLoaded', function() {
     //        const next = document.querySelector('.next');
     //        const prev = document.querySelector('.prev');
     //        const slide = document.querySelector('.slide');

     //        // Function to handle next slide
     //        function nextSlide() {
     //            const item_sliders = document.querySelectorAll('.item_slider');
     //            slide.appendChild(item_sliders[0]);
     //        }

     //        // Function to handle previous slide
     //        function prevSlide() {
     //            const item_sliders = document.querySelectorAll('.item_slider');
     //            slide.prepend(item_sliders[item_sliders.length - 1]);
     //        }

     //        // Event listeners for next and previous buttons
     //        next.addEventListener('click', nextSlide);
     //        prev.addEventListener('click', prevSlide);

     //        // Swipe gesture for next slide
     //        let touchstartX = 0;
     //        let touchendX = 0;

     //        slide.addEventListener('touchstart', function(event) {
     //            touchstartX = event.changedTouches[0].screenX;
     //        });

     //        slide.addEventListener('touchend', function(event) {
     //            touchendX = event.changedTouches[0].screenX;
     //            handleSwipeGesture();
     //        });

     //        function handleSwipeGesture() {
     //            if (touchendX < touchstartX) {
     //                nextSlide();
     //            }

     //            if (touchendX > touchstartX) {
     //                prevSlide();
     //            }
     //        }

     //        // Mouse drag for slide
     //        let isDragging = false;
     //        let startPos = 0;
     //        let endPos = 0;

     //        slide.addEventListener('mousedown', function(event) {
     //            isDragging = true;
     //            startPos = event.clientX;
     //        });

     //        slide.addEventListener('mousemove', function(event) {
     //            if (isDragging) {
     //                endPos = event.clientX;
     //            }
     //        });

     //        slide.addEventListener('mouseup', function(event) {
     //            if (isDragging) {
     //                if (endPos < startPos) {
     //                    nextSlide();
     //                } else if (endPos > startPos) {
     //                    prevSlide();
     //                }
     //                isDragging = false;
     //            }
     //        });

     //        // Auto slide timer
     //        setInterval(nextSlide, 10000); // Change slide every 5 seconds
     //    });
    </script>
<!--boxed-slider-->


<section class="section bg-light mt-0">
    <div class="container-slide">
        <div class="slide">
           <?php
               $data = query_media("SELECT DISTINCT * FROM tbl_media JOIN tbl_home_content ON tbl_media.id_media = tbl_home_content.id_media WHERE tbl_home_content.id_homepage = '1' AND tbl_media.slider != 'off'")[0];
       foreach($data as $r){
                $pic_url = urlencode($r['pict_name']);
          
                ?>
            <div class="item_slider">
              <img class="item_slider image" src="<?= $base_url ?>admin/assets/img/wahana/<?= $r['pict_name']; ?>">
                <div class="content">
                    <div class="name"><?= $r['title'] ?> | </div>
                    <div class="des"><?= $r['value'] ?></div>
                    <a class="btn btn-primary" href="<?= $base_url ?>admin/assets/img/wahana/<?= $pic_url; ?>">Hubungi Kami</a>
                </div>
            </div>
          <?php } ?>
           
        </div>
        <div class="petekan">
            <button class="prev"><i class="fa-solid fa-arrow-left"></i></button>
            <button class="next"><i class="fa-solid fa-arrow-right"></i></button>
        </div>
    </div>
</section>

<!-- section about -->
<?php $about= pilih_query("SELECT * FROM tbl_homepage WHERE name ='about'","array")[0][0]; ?>

<div class="bg-light mt-0">
  <div class="container clearfix bottommargin-lg topmargin-lg">
    <div class="tab-container">
      <div class="tab-content clearfix" id="kotak">
        <div class="story-box description-right">
          <div class="story-box-image">
            <img src="<?= $base_url; ?>admin/assets/img/wahana/uploads/<?=$about['images'] ?>" alt="story-image" style="background-size: cover;">
          </div>
          <div class="story-box-info bg-info">
            <h3 class="story-title text-white"><?= $about['title'] ?></h3>
            <div class="story-box-content">
              <p class="text-white" style="line-height: 1.8;"><?= $about['description'] ?></p>
              <!--<button class="font-weight-light button ml-0 button-rounded">Read Canvas's story</button>-->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--  -->

<div class="section bg-transparent mt-0 clearfix bottommargin-sm">
  <div class="container clearfix">
    <div class="row justify-content-center col-mb-50 pb-4">
        <?php $get_feature_content= query("SELECT * FROM tbl_home_content WHERE id_homepage ='3'")[0];
              foreach($get_feature_content as $data){              
          ?>

      <div class="col-sm-6 col-lg-4">
        <div class="feature-box fbox-plain p-3">
          <div class="fbox-icon">
            <i class="icon-paint-brush" style="border-radius: 10px; box-shadow: 5px 5px 10px rgba(163,177,198,0.2), -5px -5px 10px rgba(255, 255, 255, 0.6);"></i>
          </div>
          <div class="fbox-content p-4" style="border-radius: 10px; box-shadow: 5px 5px 7px rgba(163,177,198,0.3), -5px -5px 70px rgba(255, 255, 255, 0.3);">
            <h3 class="nott font-weight-semibold ls0"><?= $data['title']; ?></h3>
            <p><?= $data['value']; ?></p>
          </div>
        </div>
      </div>
    <?php } ?>


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
            <h3>Produk Kami</h3>
          </div>
          <!--<p class="mb-0">Lasting change, stakeholders development Angelina Jolie world problem solving progressive. Courageous; social entrepreneurship change; accelerate resolve pursue these aspirations asylum.</p>-->
        </div>
      </div>
      <!-- </div> -->
    </div>

    <div class="container clearfix">
      <div class="row real-estate-properties bottommargin-lg bg-light pb-4">
        <!-- demos/real-estate/images/cities/3.jpg-->
        <div class="col-lg-4 p-1" style="box-shadow: 5px 5px 10px rgba(163,177,198,0.2), -5px -5px 10px rgba(255, 255, 255, 0.6);">
          <a href="<?= $base_url ?>indoor-playground" style="background: url('assets/images/portofolio/indoor-playground-equipment.jpeg') no-repeat center center; background-size: cover;">
            <div class="vertical-middle dark center">
              <div class="heading-block m-0 border-0">
                <h4 class="text-capitalize font-weight-medium">INDOOR PLAYGROUND</h4>
                <!--<span style="margin-top: 5px; font-size: 17px;">8 Properties</span>-->
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 p-1" style="box-shadow: 5px 5px 10px rgba(163,177,198,0.2), -5px -5px 10px rgba(255, 255, 255, 0.6);">
          <a href="<?= $base_url ?>produk/integrated-set" style="background: url('assets/images/portofolio/outdoor-fitness-equipment.jpeg') no-repeat center center; background-size: cover;">
            <div class="vertical-middle dark center">
              <div class="heading-block m-0 border-0">
                <h4 class="text-capitalize font-weight-medium">OUTDOOR FITNESS</h4>
                <!--<span style="margin-top: 5px; font-size: 17px;">31 Properties</span>-->
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 p-1" style="box-shadow: 5px 5px 10px rgba(163,177,198,0.2), -5px -5px 10px rgba(255, 255, 255, 0.6);">
          <a href="<?= $base_url ?>produk/water-playground" style="background: url('<?= $base_url; ?>assets/images/portofolio/waterplay-equipment.jpeg') no-repeat center center; background-size: cover;">
            <div class="vertical-middle dark center">
              <div class="heading-block m-0 border-0">
                <h4 class="text-capitalize font-weight-medium">WATER PLAYGROUND</h4>
                <!--<span style="margin-top: 5px; font-size: 17px;">19 Properties</span>-->
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 p-1" style="box-shadow: 5px 5px 10px rgba(163,177,198,0.2), -5px -5px 10px rgba(255, 255, 255, 0.6);">
          <a href="<?= $base_url ?>outdoor-playground" style="background: url('<?= $base_url; ?>assets/images/portofolio/products-outdoor-playground-equipment.jpeg') no-repeat center center; background-size: cover;">
            <div class="vertical-middle dark center">
              <div class="heading-block m-0 border-0">
                <h4 class="text-capitalize font-weight-medium">OUTDOOR PLAYGROUND EQUIPMENT</h4>
                <!--<span style="margin-top: 5px; font-size: 17px;">8 Properties</span>-->
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 p-1" style="box-shadow: 5px 5px 10px rgba(163,177,198,0.2), -5px -5px 10px rgba(255, 255, 255, 0.6);">
          <a href="<?= $base_url ?>produk/shade-sail" style="background: url('<?= $base_url; ?>assets/images/portofolio/shade-sail.jpeg') no-repeat center center; background-size: cover;">
            <div class="vertical-middle dark center">
              <div class="heading-block m-0 border-0">
                <h4 class="text-capitalize font-weight-medium">SHADE SAIL</h4>
                <!--<span style="margin-top: 5px; font-size: 17px;">31 Properties</span>-->
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 p-1" style="box-shadow: 5px 5px 10px rgba(163,177,198,0.2), -5px -5px 10px rgba(255, 255, 255, 0.6);">
          <a href="<?= $base_url ?>produk/soft-play" style="background: url('<?= $base_url; ?>assets/images/portofolio/soft-play.jpg') no-repeat center center; background-size: cover;">
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

<!-- section instalasi -->
 <?php 
     $instal= pilih_query("SELECT * FROM tbl_homepage WHERE name ='instalasi'","array")[0][0];
   ?>
  <div class="header-stick">
    <div class="container clearfix">
      <div class="row">
        <div class="col-lg-12">
          <div class="heading-block text-center">
            <h3><?= $instal['title'] ?></h3>
            <span><?= $instal['description'] ?></span>
          </div>
          <!--<p class="mb-0">Lasting change, stakeholders development Angelina Jolie world problem solving progressive. Courageous; social entrepreneurship change; accelerate resolve pursue these aspirations asylum.</p>-->
        </div>
      </div>
    </div>
  </div>



<div class="container">
    <div class="row justify-content-center clearfix bottommargin-lg">
      <div class="mx-auto" style="max-width: 960px">
        <div class="tabs tabs-alt tabs-responsive tabs-justify clearfix ui-tabs ui-corner-all ui-widget ui-widget-content" id="tab">

          <ul class="tab-nav ui-tabs-nav ui-corner-all ui-helper-reset ui-helper-clearfix ui-widget-header" role="tablist">

            <li role="tab" tabindex="0" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab ui-tabs-active ui-state-active" aria-controls="tabs-1" aria-labelledby="ui-id-1" aria-selected="true" aria-expanded="true"><a href="#tabs-1" onmouseover="this.style.color='#1C85E8'" onmouseout="this.style.color='#333333'" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-1" style="color: rgb(51, 51, 51);"><i class="icon-realestate-plan"></i>Seni Pertamanan</a></li>

            <li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-2" aria-labelledby="ui-id-2" aria-selected="false" aria-expanded="false"><a href="#tabs-2" onmouseover="this.style.color='#1C85E8'" onmouseout="this.style.color='#333333'" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-2" style="color: rgb(51, 51, 51);"><i class="icon-realestate-skyscrapers2"></i>Taman Bermain Komersial</a></li>

            <li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"><a href="#tabs-3" onmouseover="this.style.color='#1C85E8'" onmouseout="this.style.color='#333333'" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3" style="color: rgb(51, 51, 51);"><i class="icon-realestate-my-house"></i>Fasilitas Perumahan</a></li>

            <li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-4" aria-labelledby="ui-id-4" aria-selected="false" aria-expanded="false"><a href="#tabs-4" onmouseover="this.style.color='#1C85E8'" onmouseout="this.style.color='#333333'" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-4" style="color: rgb(51, 51, 51);"><i class="icon-realestate-house8"></i>Taman Bermain Rumah</a></li>

            <li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-5" aria-labelledby="ui-id-5" aria-selected="false" aria-expanded="false"><a href="#tabs-5" onmouseover="this.style.color='#1C85E8'" onmouseout="this.style.color='#333333'" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-5" style="color: rgb(51, 51, 51);"><i class="icon-realestate-lawn-mower"></i>Taman kepemerintahan</a></li>
            
            <li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-6" aria-labelledby="ui-id-6" aria-selected="false" aria-expanded="false"><a href="#tabs-6" onmouseover="this.style.color='#1C85E8'" onmouseout="this.style.color='#333333'" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-6" style="color: rgb(51, 51, 51);"><i class="icon-realestate-love"></i>Fasilitas Sekolah</a></li>


          </ul>

          <div class="tab-container" data-active="">
            <!--demos/interior-design/images/story/4.jpg-->
              <?php 
              $instal_content_1= pilih_query("SELECT * FROM tbl_home_content WHERE id_homepage ='$instal[id]' AND id = '4'", "array")[0][0];
               $instal_content_2= pilih_query("SELECT * FROM tbl_home_content WHERE id_homepage ='$instal[id]' AND id = '5'", "array")[0][0];  
               $instal_content_3= pilih_query("SELECT * FROM tbl_home_content WHERE id_homepage ='$instal[id]' AND id = '6'", "array")[0][0]; 
               $instal_content_4= pilih_query("SELECT * FROM tbl_home_content WHERE id_homepage ='$instal[id]' AND id = '7'", "array")[0][0];
               $instal_content_5= pilih_query("SELECT * FROM tbl_home_content WHERE id_homepage ='$instal[id]' AND id = '8'", "array")[0][0];
               $instal_content_6= pilih_query("SELECT * FROM tbl_home_content WHERE id_homepage ='$instal[id]' AND id = '9'", "array")[0][0];
               ?>


            <div class="accordion-header d-none"><div class="accordion-icon"><i class="accordion-closed icon-ok-circle"></i><i class="accordion-open icon-remove-circle"></i></div><div class="accordion-title"><i class="icon-realestate-plan"></i><?= $instal_content_1['title'] ?></div></div><div class="tab-content clearfix ui-tabs-panel ui-corner-bottom ui-widget-content" id="tabs-1" aria-labelledby="ui-id-1" role="tabpanel" aria-hidden="false" style="display: block;">
              <div class="story-box description-left clearfix">
                <div class="story-box-image">
                  <img src="<?= $base_url?>admin/assets/img/wahana/uploads/<?= $instal_content_1['images'] ?>" alt="<?= $instal_content_1['title'] ?>">
                </div>
                <div class="story-box-info">
                  <h3 class="story-title"><?= $instal_content_1['title'] ?></h3>
                  <div class="story-box-content">
                    <p style="line-height: 1.8;"><?= $instal_content_1['value'] ?></p>
                    <!--<button class="font-weight-light button ml-0 button-rounded">Read Canvas's story</button>-->
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-header d-none"><div class="accordion-icon"><i class="accordion-closed icon-ok-circle"></i><i class="accordion-open icon-remove-circle"></i></div><div class="accordion-title"><i class="icon-realestate-skyscrapers2"></i><?= $instal_content_2['title'] ?></div></div><div class="tab-content clearfix ui-tabs-panel ui-corner-bottom ui-widget-content" id="tabs-2" aria-labelledby="ui-id-2" role="tabpanel" aria-hidden="true" style="display: none;">
              <div class="story-box clearfix">
                <div class="story-box-image">
                  <img src="<?= $base_url?>admin/assets/img/wahana/uploads/<?= $instal_content_2['images'] ?>" alt="<?= $instal_content_2['title'] ?>">
                </div>
                <div class="story-box-info">
                  <h3 class="story-title"><?= $instal_content_2['title'] ?></h3>
                  <div class="story-box-content">
                    <p style="line-height: 1.8;"><?= $instal_content_2['value'] ?></p>
                    <!--<button class="font-weight-light button ml-0 button-rounded">Read More</button>-->
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-header d-none"><div class="accordion-icon"><i class="accordion-closed icon-ok-circle"></i><i class="accordion-open icon-remove-circle"></i></div><div class="accordion-title"><i class="icon-realestate-my-house"></i><?= $instal_content_3['title'] ?></div></div><div class="tab-content clearfix ui-tabs-panel ui-corner-bottom ui-widget-content" id="tabs-3" aria-labelledby="ui-id-3" role="tabpanel" aria-hidden="true" style="display: none;">
              <div class="story-box description-left clearfix">
                <div class="story-box-image">
                  <img src="<?= $base_url?>admin/assets/img/wahana/uploads/<?= $instal_content_2['images'] ?>" alt="<?= $instal_content_3['title'] ?>" >
                </div>
                <div class="story-box-info">
                  <h3 class="story-title"><?= $instal_content_3['title'] ?></h3>
                  <div class="story-box-content">
                    <p style="line-height: 1.8;"><?= $instal_content_3['value'] ?></p>
                    <!--<button class="font-weight-light button ml-0 button-rounded">Read About Me</button>-->
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-header d-none"><div class="accordion-icon"><i class="accordion-closed icon-ok-circle"></i><i class="accordion-open icon-remove-circle"></i></div><div class="accordion-title"><i class="icon-realestate-house8"></i><?= $instal_content_4['title'] ?>" </div></div><div class="tab-content clearfix ui-tabs-panel ui-corner-bottom ui-widget-content" id="tabs-4" aria-labelledby="ui-id-4" role="tabpanel" aria-hidden="true" style="display: none;">
              <div class="story-box clearfix">
                <div class="story-box-image">
                  <img src="<?= $base_url?>admin/assets/img/wahana/uploads/<?= $instal_content_4['images'] ?>" alt="<?= $instal_content_4['title'] ?>" >
                </div>
                <div class="story-box-info">
                  <h3 class="story-title"><?= $instal_content_4['title'] ?></h3>
                  <div class="story-box-content">
                    <p style="line-height: 1.8;"><?= $instal_content_4['value'] ?></p>
                    <!--<a href="#">Read Deanne's story</a>-->
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-header d-none"><div class="accordion-icon"><i class="accordion-closed icon-ok-circle"></i><i class="accordion-open icon-remove-circle"></i></div><div class="accordion-title"><i class="icon-realestate-lawn-mower"></i><?= $instal_content_5['title'] ?></div></div><div class="tab-content clearfix ui-tabs-panel ui-corner-bottom ui-widget-content" id="tabs-5" aria-labelledby="ui-id-5" role="tabpanel" aria-hidden="true" style="display: none;">
              <div class="story-box clearfix">
                <div class="story-box-image">
                  <img src="<?= $base_url?>admin/assets/img/wahana/uploads/<?= $instal_content_5['images'] ?>" alt="<?= $instal_content_5['title'] ?>">
                </div>
                <div class="story-box-info">
                  <h3 class="story-title"><?= $instal_content_5['title'] ?></h3>
                  <div class="story-box-content">
                    <p style="line-height: 1.8;"><?= $instal_content_5['value'] ?></p>
                    <!--<a href="#">Read Deanne's story</a>-->
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-header d-none"><div class="accordion-icon"><i class="accordion-closed icon-ok-circle"></i><i class="accordion-open icon-remove-circle"></i></div><div class="accordion-title"><i class="icon-realestate-love"></i><?= $instal_content_6['title'] ?></div></div><div class="tab-content clearfix ui-tabs-panel ui-corner-bottom ui-widget-content" id="tabs-6" aria-labelledby="ui-id-6" role="tabpanel" aria-hidden="true" style="display: none;">
              <div class="story-box clearfix">
                <div class="story-box-image">
                  <img src="<?= $base_url?>admin/assets/img/wahana/uploads/<?= $instal_content_6['images'] ?>" alt="<?= $instal_content_5['title'] ?>">
                </div>
                <div class="story-box-info">
                  <h3 class="story-title"><?= $instal_content_6['title'] ?></h3>
                  <div class="story-box-content">
                    <p style="line-height: 1.8;"><?= $instal_content_6['value'] ?></p>
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
              <h3>Jenis Taman Bermain</h3>
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
            <a href="<?= $base_url ?>produk/custom-interior-design" style="background: url('<?= $base_url; ?>assets/images/types/custom-theme.jpeg') no-repeat center center; background-size: cover;">
              <div class="vertical-middle dark center">
                <div class="heading-block m-0 border-0">
                  <h3 class="text-capitalize font-weight-medium">CUSTOM / THEME</h3>
                  <!--<span style="margin-top: 5px; font-size: 17px;">8 Properties</span>-->
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4">
            <a href="<?= $base_url ?>produk/wooden" style="background: url('<?= $base_url; ?>assets/images/types/nature-inspired.jpeg') no-repeat center center; background-size: cover;">
              <div class="vertical-middle dark center">
                <div class="heading-block m-0 border-0">
                  <h3 class="text-capitalize font-weight-medium">NATURE INSPIRED</h3>
                  <!--<span style="margin-top: 5px; font-size: 17px;">31 Properties</span>-->
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4">
            <a href="<?= $base_url ?>produk/adventure" style="background: url('<?= $base_url; ?>assets/images/types/adventure.jpeg') no-repeat center center; background-size: cover;">
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
         <?php 
               $layanan= pilih_query("SELECT * FROM tbl_homepage WHERE name ='layanan'","array")[0][0];                       
          ?>
        <div class="col-lg-12 text-center">
          <div class="heading-block ">
            <h3><?= $layanan['title'] ?></h3>
          </div>
          <p class="mb-0"><?= $layanan['description'] ?></p>
        </div>
      </div>
    </div>
  </div>

  <div class="container clearfix">
    <div class="row justify-content-center col-mb-50">

        <?php 
            $get_layanan_content= query("SELECT * FROM tbl_home_content WHERE id_homepage ='$layanan[id]'")[0];
            foreach($get_layanan_content as $data){
                              
                           ?>
      <div class="col-sm-6 col-lg-3">
        <div class="feature-box media-box">
          <div class="fbox-media">
            <img src="<?= $base_url?>admin/assets/img/wahana/uploads/<?= $data['images'] ?>" alt="<?= $data['title'] ?>">
          </div>
          <div class="fbox-content px-0">
            <h3><?= $data['title'] ?>
            </h3>
            <p><?= $data['value'] ?></p>
          </div>
        </div>
      </div>
<?php } ?>
   
    </div>
  </div>
</div>


<!-- #content end 