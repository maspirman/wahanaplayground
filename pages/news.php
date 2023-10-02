<?php


$h = pilih_query("SELECT * FROM tbl_news ORDER BY id_news DESC", "array")[0];
?>

<script>
  function title() {
    document.title = "News";
  }

  title()
</script>

<!-- Page Title
		============================================= -->
<section id="page-title" class=" page-title-dark" style="background-image: url('images/img/azlawnews.jpg'); padding: 100px 0;" data-bottom-top="background-position:0px 300px;" data-top-bottom="background-position:0px -300px;">

  <div class="container clearfix">
    <h1>News</h1>
    <span>Our Latest News</span>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">News</li>
    </ol>
  </div>

</section><!-- #page-title end -->

<!-- Content
  ============================================= -->
<section id="content">
  <div class="content-wrap">
    <div class="container clearfix">

      <!-- Posts
					============================================= -->
      <div id="posts" class="post-grid row grid-container gutter-40 clearfix" data-layout="fitRows">

        <?php foreach ($h as $x) : ?>
          <div class="entry col-md-4 col-sm-6 col-12">
            <div class="grid-inner">
              <div class="entry-image">
                <div class="fslider" data-arrows="false" data-lightbox="gallery">
                  <div class="flexslider">
                    <div class="slider-wrap">
                      <div class="slide"><a href="./admin/assets/img/news/<?= $x['img_news'] ?>" data-lightbox="gallery-item"><img src="./admin/assets/img/news/<?= $x['img_news'] ?>" alt="Standard Post with Gallery" width="150" height="90px"></a></div>
                      <!-- <div class="slide"><a href="images/blog/full/20.jpg" data-lightbox="gallery-item"><img src="images/blog/grid/20.jpg" alt="Standard Post with Gallery"></a></div>
              <div class="slide"><a href="images/blog/full/21.jpg" data-lightbox="gallery-item"><img src="images/blog/grid/21.jpg" alt="Standard Post with Gallery"></a></div> -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="entry-title">
                <h2><a href="<?= $base_url . 'news/' . $x['slug_news'] ?>"><?= $x['title_news'] ?></a></h2>
              </div>
              <div class="entry-meta">
                <ul>
                  <li><i class="icon-calendar3"></i> <?php
                                                      // date('j F Y', $x['time_news']) 
                                                      $t = explode(" ", $x['time_news']);
                                                      echo date("d-m-y", $t[1]);
                                                      ?></li>
                  <!-- <li><a href="blog-single-small.html#comments"><i class="icon-comments"></i> 21</a></li> -->
                  <li><a href="#"><i class="icon-line-head"></i><?= $x['author_news'] ?></a></li>
                </ul>
              </div>
              <div class="entry-content">
                <?= substr($x['excerpt_news'], 0, 200) . '. . .' ?>
                <a href="<?= $base_url . 'news/' . $x['slug_news'] ?>" class="more-link">Read More</a>
              </div>
            </div>
          </div>

        <?php endforeach ?>



      </div><!-- #posts end -->

      <div class="clear mt-1"></div>

      <!-- Pagination
        ============================================= -->
      <!-- <div class="d-flex justify-content-between mt-5">
        <a href="#" class="btn btn-outline-secondary">&larr; Older</a>
        <a href="#" class="btn btn-outline-dark">Newer &rarr;</a>
      </div> -->
      <!-- .pager end -->

    </div>
  </div>
</section><!-- #content end -->