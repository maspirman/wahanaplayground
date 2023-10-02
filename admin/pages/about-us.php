<!-- Meta settings -->
<div class="container-fluid mt-3">
  <div class="row">
    

        <div class="col-lg-12">

            <div class="card-wrapper">

                <!-- Input groups -->

                <div class="card">



                    <!-- Card header -->

                    <div class="card-header d-flex justify-content-between">

                        <h3 class="mb-0">Setting Meta About</h3>

                    </div>

          
                       

                        <!-- Card body -->

                        <div class="card-body">
                          <form method="POST" enctype="multipart/form-data">
                            

                            <div class="row">
                                <!-- get data meta -->
                                <?php 
                              $meta= pilih_query("SELECT * FROM tbl_pages_setting WHERE name ='about'","array")[0][0];
                             
                              
                           ?>

                                <div class="col-md-12">

                                    <div class="form-group">

                                        <label class="form-control-label">Meta Title <small>Tampil setelah meta utama</small></label>

                                        <div class="input-group input-group-merge">

                                            <input class="form-control" type="text" name="meta_title"
                                                value="<?= $meta['meta_title'] ?>">

                                        </div>

                                    </div>
                                      <div class="form-group">

                                        <label class="form-control-label" for="">Meta Description</label>

                                        <textarea class="form-control" name="meta_description"><?= $meta['meta_description'] ?></textarea>

                                    </div>
                                    <div class="form-group">

                                        <label class="form-control-label" for="">Meta Keywords <small>pisahkan dengan koma (,)</small></label>

                                        <input class="form-control" type="text" name="meta_keywords" value="<?= $meta['meta_keywords'] ?>">
                                    </div>
                                     <div class="form-group">

                                        <label class="form-control-label" for="">Meta Image <small>tumbnail image</small></label><br>
                                        <img src="assets/img/wahana/uploads/<?=$meta['image_thumb'] ?>" width="200px">

                                        <input class="form-control" type="file" name="meta_image" value="<?= $meta['image_thumb'] ?>">
                                    </div>


                                </div>

                                <div class="col-md-12">

                                  

                                </div>

                            

                            </div>

                            <button class="btn btn-primary"
                                            name="btn_homepage">Save</button>

                        
                          </form>

                                    <?php 
                                 
                              if (isset($_POST['btn_homepage'])) {
                                $nama_gambar = time() . '-' . $_FILES['meta_image']['name'];
                                $lokasi_gambar = 'assets/img/wahana/uploads/' . $nama_gambar;
                                $gambar = $_FILES['meta_image']['tmp_name'];
                                if (!empty($gambar)) {
                                   $upload= move_uploaded_file($gambar,$lokasi_gambar);
                                   if (isset($upload)) {
                                     $conn= query("UPDATE tbl_pages_setting SET meta_title='$_POST[meta_title]', meta_description = '$_POST[meta_description]', meta_keywords = '$_POST[meta_keywords]', image_thumb = '$nama_gambar' WHERE uid = '$meta[uid]'");
                                      if ($conn > 0) {
                                             echo "<script>
                                    alert('Data berhasil dirubah');
                                    document.location.href = 'index.php?p=about-us';
                                </script>";
                                            } else {
                                             echo "<script>
                                    alert('Data gagal dirubah');
                                    document.location.href = 'index.php?p=about-us';
                                </script>";
                                            }
                                    }
                                }else{
                                        $conn= query("UPDATE tbl_pages_setting SET meta_title='$_POST[meta_title]', meta_description = '$_POST[meta_description]', meta_keywords = '$_POST[meta_keywords]' WHERE uid = '$meta[uid]'");
                                        if ($conn > 0) {
                                             echo "<script>
                                    alert('Data berhasil dirubah');
                                    document.location.href = 'index.php?p=about-us';
                                </script>";
                                            } else {
                                             echo "<script>
                                    alert('Data gagal dirubah');
                                    document.location.href = 'index.php?p=about-us';
                                </script>";
                                            }

                                    }

                                   
                              }
                              ?>
                           
                        </div>
                      
                    
                    </div>

                    

                </div>


            </div>

        
  </div>
</div>
<!-- slider settings -->

<!-- about section setting -->
<div class="container-fluid mt-3">
  <div class="row">
    

        <div class="col-lg-12">

            <div class="card-wrapper">

                <!-- Input groups -->

                <div class="card">



                    <!-- Card header -->

                    <div class="card-header d-flex justify-content-between">

                        <h3 class="mb-0">Content About Page</h3>

                    </div>

          
                       

                        <!-- Card body -->

                        <div class="card-body">
                          <form method="POST" enctype="multipart/form-data">
                            

                            <div class="row">
                                <!-- get data meta -->
                                <?php 
                              $about= pilih_query("SELECT * FROM tbl_home_content WHERE id_homepage ='2'","array")[0][0];
                             
                              
                           ?>

                                <div class="col-md-12 row">
                                    <div class="col-md-4">
                                        <div class="form-group">

                                        <label class="form-control-label" for="">Image <small>Cover image</small></label><br>
                                        <img src="assets/img/wahana/uploads/<?=$about['images'] ?>" width="200px">

                                        <input class="form-control" type="file" name="images" value="<?= $about['images'] ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                       
                                        <div class="form-group">

                                        <label class="form-control-label" for="">Title</small></label>

                                        <input class="form-control" type="text" name="about_title" value="<?= $about['title'] ?>">
                                        </div>
                                         <div class="form-group">

                                        <label class="form-control-label" for="">Description</label>

                                        <textarea class="form-control" name="about_description"><?= $about['value'] ?></textarea>

                                        </div>
                                    </div>
                                     


                                </div>

                                <div class="col-md-12">

                                  

                                </div>

                            

                            </div>

                            <button class="btn btn-primary"
                                            name="btn_about">Save</button>

                        
                          </form>

                                    
                             <?php 
                                 
                              if (isset($_POST['btn_about'])) {
                                $nama_gambar = time() . '-about-' . $_FILES['images']['name'];
                                $lokasi_gambar = 'assets/img/wahana/uploads/' . $nama_gambar;
                                $gambar = $_FILES['images']['tmp_name'];
                                if (!empty($gambar)) {
                                   $upload= move_uploaded_file($gambar,$lokasi_gambar);
                                   if (isset($upload)) {
                                     $conn= query("UPDATE tbl_home_content SET title='$_POST[about_title]', value = '$_POST[about_description]', images = '$nama_gambar' WHERE id = '$about[id]'");
                                      if ($conn > 0) {
                                             echo "<script>
                                    alert('Data berhasil dirubah');
                                    document.location.href = 'index.php?p=about-us';
                                </script>";
                                            } else {
                                             echo "<script>
                                    alert('Data gagal dirubah');
                                    document.location.href = 'index.php?p=about-us';
                                </script>";
                                            }
                                    }
                                }else{
                                         $conn= query("UPDATE tbl_home_content SET title='$_POST[about_title]', value = '$_POST[about_description]' WHERE id = '$about[id]'");
                                        if ($conn > 0) {
                                             echo "<script>
                                    alert('Data berhasil dirubah');
                                    document.location.href = 'index.php?p=about-us';
                                </script>";
                                            } else {
                                             echo "<script>
                                    alert('Data gagal dirubah');
                                    document.location.href = 'index.php?p=about-us';
                                </script>";
                                            }

                                    }

                                   
                              }
                              ?>
                           
                           
                        </div>
                      
                    
                    </div>

                    

                </div>


            </div>

        
  </div>
</div>


<!-- slider end -->





</div>





<script>
    CKEDITOR.replace('content');
    CKEDITOR.replace('content1');
</script>