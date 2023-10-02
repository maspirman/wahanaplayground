<?php
$i = $_GET['n'];
$h = pilih_query("SELECT * FROM tbl_news WHERE slug_news='$i'", "array")[0][0];
// var_dump($h['header_news']);
// exit();
?>
<title><?= $h['title_news'] ?></title>
<meta description="<?= $h['meta_description_news'] ?>">

<!-- Content
		============================================= -->
<section id="content">
  <div class="content-wrap">
    <div class="container clearfix">

      <div class="row gutter-40 col-mb-80">
        <!-- Post Content
						============================================= -->
						
						
						
						<!--  =============================================== -->
        <div class="postcontent col-lg-12 order-lg-last">

          <div class="single-post mb-0">

            <!-- Single Post
								============================================= -->
            <div class="entry clearfix">

              <!-- Entry Title
									============================================= -->
              <div class="entry-title">
                <h2><?= $h['title_news'] ?></h2>
              </div><!-- .entry-title end -->

              <!-- Entry Meta
									============================================= -->
              <div class="entry-meta">
                <ul>
                  <li><i class="icon-calendar3"></i> <?php
                //   date('j F Y', $h['news_time']) 
                    $t = explode(" ", $h['time_news']);
                    echo date("d-m-y", $t[1]);
                  ?></li>
                  <li><a href="#"><i class="icon-user"></i> <?= $h['author_news'] ?></a></li>
                  <li><i class="icon-folder-open"></i> <a href="#"><?= $h['title_news_category'] ?></a></li>
                  <!-- <li><a href="#"><i class="icon-comments"></i> 43 Comments</a></li> -->
                  <!-- <li><a href="#"><i class="icon-camera-retro"></i></a></li> -->
                </ul>
              </div><!-- .entry-meta end -->

              <!-- Entry Image
									============================================= -->
              <div class="entry-image">
                <a href="#"><img src="../admin/assets/img/news/<?= $h['img_news'] ?>" alt="Blog Single"></a>
              </div><!-- .entry-image end -->

              <!-- Entry Content
									============================================= -->
              <div class="entry-content mt-0">

                <p><?= $h['desc_news'] ?> </p>
                <br>
                <!-- Post Single - Content End -->

                <!-- Tag Cloud
										============================================= -->
                <div class="tagcloud clearfix bottommargin">
                  <a href=""><?= $h['title_news_category'] ?></a>
                </div><!-- .tagcloud end -->

                <div class="clear"></div>

                <!-- Post Single - Share
										============================================= -->
                <div class="si-share border-0 d-flex justify-content-between align-items-center">
                  <span>Share this Post:</span>
                  <div>
                    <a href="http://www.facebook.com/sharer.php?u=<?= "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}" ?>" class="social-icon si-borderless si-facebook" target="_blank" rel="nofollow">
                      <i class="icon-facebook"></i>
                      <i class="icon-facebook"></i>
                    </a>
                    <a href="http://twitter.com/share?text=<?= $h['title_news'] ?>&url=<?= "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}" ?>" class="social-icon si-borderless si-twitter" target="_blank" rel="nofollow">
                      <i class="icon-twitter"></i>
                      <i class="icon-twitter"></i>
                    </a>
                                        <a href="mailto:?subject=<?= $h['news_title'] ?>&body=Check out this site <?= "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}" ?>" class="social-icon si-borderless si-email3">
                      <i class="icon-email3"></i>
                      <i class="icon-email3"></i>
                    </a>
                  </div>
                </div><!-- Post Single - Share End -->

              </div>
            </div><!-- .entry end -->

            

          </div>

        </div><!-- .postcontent end -->

        <!-- Sidebar
						============================================= -->
						

        </div>

</section><!-- #content end -->

<?= $h['footer_news'] ?>