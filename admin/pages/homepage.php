<!-- Meta settings -->
<div class="container-fluid mt-3">
  <div class="row">
    

        <div class="col-lg-12">

            <div class="card-wrapper">

                <!-- Input groups -->

                <div class="card">



                    <!-- Card header -->

                    <div class="card-header d-flex justify-content-between">

                        <h3 class="mb-0">Setting Meta Homepage</h3>

                    </div>

          
                       

                        <!-- Card body -->

                        <div class="card-body">
                          <form method="POST" enctype="multipart/form-data">
                            

                            <div class="row">
                                <!-- get data meta -->
                                <?php 
                              $meta= pilih_query("SELECT * FROM tbl_pages_setting WHERE name ='homepage'","array")[0][0];
                             
                              
                           ?>

                                <div class="col-md-12">

                                    <div class="form-group">

                                        <label class="form-control-label">Meta Title</label>

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
                                    document.location.href = 'index.php?p=homepage';
                                </script>";
                                            } else {
                                             echo "<script>
                                    alert('Data gagal dirubah');
                                    document.location.href = 'index.php?p=homepage';
                                </script>";
                                            }
                                    }
                                }else{
                                        $conn= query("UPDATE tbl_pages_setting SET meta_title='$_POST[meta_title]', meta_description = '$_POST[meta_description]', meta_keywords = '$_POST[meta_keywords]' WHERE uid = '$meta[uid]'");
                                        if ($conn > 0) {
                                             echo "<script>
                                    alert('Data berhasil dirubah');
                                    document.location.href = 'index.php?p=homepage';
                                </script>";
                                            } else {
                                             echo "<script>
                                    alert('Data gagal dirubah');
                                    document.location.href = 'index.php?p=homepage';
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

                        <h3 class="mb-0">Setting About Section</h3>

                    </div>

          
                       

                        <!-- Card body -->

                        <div class="card-body">
                          <form method="POST" enctype="multipart/form-data">
                            

                            <div class="row">
                                <!-- get data meta -->
                                <?php 
                              $about= pilih_query("SELECT * FROM tbl_homepage WHERE name ='about'","array")[0][0];
                             
                              
                           ?>

                                <div class="col-md-12 row">
                                    <div class="col-md-4">
                                        <div class="form-group">

                                        <label class="form-control-label" for="">Meta Image <small>tumbnail image</small></label><br>
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

                                        <textarea class="form-control" name="about_description"><?= $about['description'] ?></textarea>

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
                                $nama_gambar = time() . '-' . $_FILES['images']['name'];
                                $lokasi_gambar = 'assets/img/wahana/uploads/' . $nama_gambar;
                                $gambar = $_FILES['images']['tmp_name'];
                                if (!empty($gambar)) {
                                   $upload= move_uploaded_file($gambar,$lokasi_gambar);
                                   if (isset($upload)) {
                                     $conn= query("UPDATE tbl_homepage SET title='$_POST[about_title]', description = '$_POST[about_description]', images = '$nama_gambar' WHERE id = '$about[id]'");
                                      if ($conn > 0) {
                                             echo "<script>
                                    alert('Data berhasil dirubah');
                                    document.location.href = 'index.php?p=homepage';
                                </script>";
                                            } else {
                                             echo "<script>
                                    alert('Data gagal dirubah');
                                    document.location.href = 'index.php?p=homepage';
                                </script>";
                                            }
                                    }
                                }else{
                                         $conn= query("UPDATE tbl_homepage SET title='$_POST[about_title]', description = '$_POST[about_description]' WHERE id = '$about[id]'");
                                        if ($conn > 0) {
                                             echo "<script>
                                    alert('Data berhasil dirubah');
                                    document.location.href = 'index.php?p=homepage';
                                </script>";
                                            } else {
                                             echo "<script>
                                    alert('Data gagal dirubah');
                                    document.location.href = 'index.php?p=homepage';
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

<!-- About us Section -->



<!-- feature section settings -->
<div class="container-fluid mt-3">
    <div class="row">

        <div class="col-lg-12">
            <div class="card-wrapper">
                <div class="card">
                    <div class="card-header">
                        <h3>Section Feature</h3>
                    </div>

                    <div class="card-body">
                    



                        <!-- Card header -->

                        <div class="card-header d-flex justify-content-between">

                            <h3 class="mb-0">Feature Header</h3>
                        </div>

                        <!-- Card body -->

                        <div class="card-body">
                          <form method="POST">
                            

                            <div class="row">
                                <!-- get data feature -->
                                <?php 
                              $feature= pilih_query("SELECT * FROM tbl_homepage WHERE name ='feature'", "array")[0][0];
                             
                              
                           ?>

                                <div class="col-md-12">

                                    <div class="form-group">

                                        <label class="form-control-label" for="">Title</label>

                                        <div class="input-group input-group-merge">

                                            <input class="form-control" type="text" name="title"
                                                value="<?= $feature['title'] ?>">

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-12">

                                    <div class="form-group">

                                        <label class="form-control-label" for="">Description</label>

                                        <textarea class="form-control" name="content"
                                            ><?= $feature['description'] ?></textarea>

                                    </div>

                                </div>

                            </div>
                            <button class="btn btn-primary"
                                            name="btn_feature">Save</button>

                        
                          </form>
                                    <?php 
                                  
                              if (isset($_POST['btn_feature'])) {
                                 $conn= query("UPDATE tbl_homepage SET title='$_POST[title]', description = '$_POST[content]' WHERE id = '$feature[id]'");
                                   echo "<script>
                                    alert('Data berhasil dirubah');
                                    document.location.href = 'index.php?p=homepage';
                                </script>";
                              }
                              ?>
                           
                        </div>
                      
                    </div>
                    <hr>
                    <div class="card-body">
                      <div class="card-header">

                            <h3 class="mb-0">Feature Content</h3>
                        </div>

                        <div class="col-md-12">

                            <div class="row">
                                                          <!-- get data feature home content -->

                            <?php 
                              $get_feature_content= query("SELECT * FROM tbl_home_content WHERE id_homepage ='$feature[id]'")[0];
                             foreach($get_feature_content as $data){
                              
                           ?>
                            <!-- feature option -->
                            <div class="col-md-4">
                                <form method="POST">
                                    <div class="form-group">

                                        <label class="form-control-label" for="">Title</label>

                                        <div class="input-group">

                                            <input class="form-control" type="text" name="title<?=$data['id']; ?>"
                                                value="<?= $data['title']; ?>">

                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <label class="form-control-label" for="">Description</label>

                                        <textarea class="form-control" name="value<?=$data['id']; ?>" id="editor1"
                                            rows="5"><?= $data['value'] ?></textarea>

                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary"
                                            name="btn_option<?=$data['id']; ?>">Save</button>
                                    </div>
                            </div>
                            </form>
                            <?php 
                             $id_option= $data['id'];
                             $title= $_POST['title'.$id_option];
                             $value= $_POST['value'.$id_option];
                             $simpan_option = $_POST['btn_option'.$id_option];
                              if (isset($simpan_option)) {
                                 $conn= query("UPDATE tbl_home_content SET title='$title', value = '$value' WHERE id = '$id_option'");
                                   echo "<script>
                                    alert('Data berhasil dirubah');
                                    document.location.href = 'index.php?p=homepage';
                                </script>";
                              }
                              ?>
                            <?php } ?>


                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

<!-- section product -->
    <div class="row">

        <div class="col-lg-12">

            <div class="card-wrapper">

                <!-- Input groups -->

                <div class="card">



                    <!-- Card header -->

                    <div class="card-header d-flex justify-content-between">

                        <h3 class="mb-0">Section Product</h3>

                    </div>

                    <div class="card-body">
                       <!-- Card header -->

                        <div class="card-header d-flex justify-content-between">

                            <h3 class="mb-0">Product Header</h3>
                        </div>

                        <!-- Card body -->

                        <div class="card-body">
                          <form method="POST">
                            

                            <div class="row">
                                <!-- get data feature -->
                                <?php 
                              $get_feature= $conn->query("SELECT * FROM tbl_homepage WHERE name ='product'");
                              $feature= $get_feature->fetch_assoc();
                              
                           ?>

                                <div class="col-md-12">

                                    <div class="form-group">

                                        <label class="form-control-label" for="">Title</label>

                                        <div class="input-group input-group-merge">

                                            <input class="form-control" type="text" name="title"
                                                value="<?= $feature['title'] ?>">

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-12">

                                    <div class="form-group">

                                        <label class="form-control-label" for="">Description</label>

                                        <textarea class="form-control" name="content"
                                            id="editor1"><?= $feature['description'] ?></textarea>

                                    </div>

                                </div>

                            </div>
                            <button class="btn btn-primary"
                                            name="btn_feature">Save</button>

                        
                          </form>
                                    <?php 
                                  
                              if (isset($_POST['btn_feature'])) {
                                 $conn->query("UPDATE tbl_homepage SET title='$_POST[title]', description = '$_POST[content]' WHERE id = '$feature[id]'");
                                   echo "<script>
                                    alert('Data berhasil dirubah');
                                    document.location.href = 'index.php?p=homepage';
                                </script>";
                              }
                              ?>
                           
                        </div>
                      
                    </div>
                    </div>

                </div>


            </div>

    </div>

 

<!-- section instalasi -->

  <div class="row">
    

        <div class="col-lg-12">

            <div class="card-wrapper">

                <!-- Input groups -->

                <div class="card">



                    <!-- Card header -->

                    <div class="card-header d-flex justify-content-between">

                        <h3 class="mb-0">Section Instalasi</h3>

                    </div>

          
                       

                        <!-- Card body -->

                        <div class="card-body">
                          <form method="POST" enctype="multipart/form-data">
                            

                            <div class="row">
                                <!-- get data meta -->
                                        <?php 
                                      $instal= pilih_query("SELECT * FROM tbl_homepage WHERE name ='instalasi'","array")[0][0];
                                     ?>

                                <div class="col-md-12 mb-2">

                                    <div class="form-group">

                                        <label class="form-control-label">Title</label>

                                        <div class="input-group input-group-merge">

                                            <input class="form-control" type="text" name="instal_title"
                                                value="<?= $instal['title'] ?>">

                                        </div>

                                    </div>
                                      <div class="form-group">

                                        <label class="form-control-label" for="">Description</label>

                                        <textarea class="form-control" name="instal_description"><?= $instal['description'] ?></textarea>

                                    </div>
                                    

                                    <button class="btn btn-primary"
                                            name="btn_instalasi">Save</button>
                                </div>
                            </div>
                            </form>
                                <!-- query header section -->
                                <?php 
                                  
                              if (isset($_POST['btn_instalasi'])) {
                                 $conn= query("UPDATE tbl_homepage SET title='$_POST[instal_title]', description = '$_POST[instal_description]' WHERE id = '$instal[id]'");
                                   echo "<script>
                                    alert('Data berhasil dirubah');
                                    document.location.href = 'index.php?p=homepage';
                                </script>";
                              }
                              ?>

                            <div class="row">

                                    <div class="card-header">

                                        <h3 class="mb-0">Instalasi Content</h3>

                                    </div>

                                  
                                        <div class="card-body">
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    
                                        

                                     <?php 
                              $get_instal_content= query("SELECT * FROM tbl_home_content WHERE id_homepage ='$instal[id]'")[0];
                             foreach($get_instal_content as $data){
                              
                           ?>

                                                <div class="col-lg-4 p-3 mb-1" style="border-radius:10px; box-shadow: 5px 5px 10px rgba(163,177,198,0.5), -5px -5px 10px rgba(255, 255, 255, 0.6);">
                                                    
                                                         <form method="POST" enctype="multipart/form-data">

                                                        <div class="form-group">

                                                        <label class="form-control-label">Title</label>

                                                        <div class="input-group input-group-merge">

                                                            <input class="form-control" type="text" name="content_title<?= $data['id'] ?>"
                                                                value="<?= $data['title'] ?>">

                                                        </div>

                                                    
                                                 

                                                        <label class="form-control-label" for="">Description</label>

                                                        <textarea class="form-control" name="content<?= $data['id'] ?>" rows="10"><?= $data['value'] ?></textarea>

                                                  
                                                 

                                                        <label class="form-control-label" for="">Image <small>Cover image</small></label><br>
                                                        <img src="assets/img/wahana/uploads/<?=$data['images'] ?>" width="200px">

                                                        <input class="form-control" type="file" name="images<?= $data['id'] ?>" value="<?= $data['images'] ?>">
                                                    </div>
                                                    <button class="btn btn-primary"
                                                            name="btn_instal_content<?= $data['id'] ?>">Save</button>
                                                    </form>
                                                        <?php 
                                     $id_op= $data['id'];
                                     $title= $_POST['content_title'.$id_op];
                                     $value= $_POST['content'.$id_op];
                                     $path= 'images'.$id_op;
                                     $simpan= $_POST['btn_instal_content'.$id_op];
                                 
                              if (isset($simpan)) {
                                $nama_gambar = time() . '-' .$_FILES['images'.$id_op]['name'];
                                $lokasi_gambar = 'assets/img/wahana/uploads/' . $nama_gambar;
                                $gambar = $_FILES[$path]['tmp_name'];
                                if (!empty($gambar)) {
                                   $upload= move_uploaded_file($gambar,$lokasi_gambar);
                                   if (isset($upload)) {
                                     $conn= query("UPDATE tbl_home_content SET title='$title', value = '$value', images = '$nama_gambar' WHERE id = '$id_op'");
                                      if ($conn > 0) {
                                             echo "<script>
                                    alert('Data berhasil dirubah');
                                    document.location.href = 'index.php?p=homepage';
                                </script>";
                                            } else {
                                             echo "<script>
                                    alert('Data gagal dirubah');
                                    document.location.href = 'index.php?p=homepage';
                                </script>";
                                            }
                                    }
                                }else{
                                        $conn= query("UPDATE tbl_home_content SET title='$title', value = '$value' WHERE id = '$id_op'");
                                        if ($conn > 0) {
                                             echo "<script>
                                    alert('Data berhasil edit');
                                    document.location.href = 'index.php?p=homepage';
                                </script>";
                                            } else {
                                             echo "<script>
                                    alert('Data gagal dirubah');
                                    document.location.href = 'index.php?p=homepage';
                                </script>";
                                            }

                                    }

                                   
                              }
                              ?>
                                            
                                                </div>

                                    
                                    
                                      
                                        <?php }; ?>
                                    

                                
                                                </div>
                                            </div>
                                        </div>

                            

                            </div>

                           
                        
                        
                                   
                           
                        </div>
                      
                    
                    </div>

                    

                </div>


            </div>
        
  </div>

  <!-- section jenis taman -->

  <div class="row">
    

        <div class="col-lg-12">

            <div class="card-wrapper">

                <!-- Input groups -->

                <div class="card">



                    <!-- Card header -->

                    <div class="card-header d-flex justify-content-between">

                        <h3 class="mb-0">Setting Jenis Taman Bermain</h3>

                    </div>

          
                       

                        <!-- Card body -->

                        <div class="card-body">
                          <form method="POST" enctype="multipart/form-data">
                            

                            <div class="row">
                                <!-- get data meta -->
                                <?php 
                              $jenis= pilih_query("SELECT * FROM tbl_homepage WHERE name ='jenis'","array")[0][0];
                             
                              
                           ?>

                                <div class="col-md-12">

                                    <div class="form-group">

                                        <label class="form-control-label">Title</label>

                                        <div class="input-group input-group-merge">

                                            <input class="form-control" type="text" name="jenis_title"
                                                value="<?= $jenis['title'] ?>">

                                        </div>

                                    </div>
                                      <div class="form-group">

                                        <label class="form-control-label" for="">Description</label>

                                        <textarea class="form-control" name="jenis_description"><?= $jenis['description'] ?></textarea>

                                    </div>
                                   


                                </div>

                                <div class="col-md-12">

                                  

                                </div>

                            

                            </div>

                            <button class="btn btn-primary"
                                            name="btn_jenis">Save</button>

                        
                          </form>

                                    <?php 
                                 
                              if (isset($_POST['btn_jenis'])) {
                              
                                     $conn= query("UPDATE tbl_homepage SET title='$_POST[jenis_title]', description = '$_POST[jenis_description]' WHERE id = '$jenis[id]'");
                                     
                                             echo "<script>
                                    alert('Data berhasil dirubah');
                                    document.location.href = 'index.php?p=homepage';
                                </script>";
                            }
                              ?>
                           
                        </div>
                      
                    
                    </div>

                    

                </div>


            </div>

        
  </div>

<!-- section pelalayanan kami -->

  <div class="row">
    

        <div class="col-lg-12">

            <div class="card-wrapper">

                <!-- Input groups -->

                <div class="card">



                    <!-- Card header -->

                    <div class="card-header d-flex justify-content-between">

                        <h3 class="mb-0">Section Pelayanan Kami</h3>

                    </div>

          
                       

                        <!-- Card body -->

                        <div class="card-body">
                          <form method="POST" enctype="multipart/form-data">
                            

                            <div class="row">
                                <!-- get data meta -->
                                        <?php 
                                      $layanan= pilih_query("SELECT * FROM tbl_homepage WHERE name ='layanan'","array")[0][0];
                                     
                                      
                                   ?>

                                <div class="col-md-12 mb-2">

                                    <div class="form-group">

                                        <label class="form-control-label">Title</label>

                                        <div class="input-group input-group-merge">

                                            <input class="form-control" type="text" name="layanan_title"
                                                value="<?= $layanan['title'] ?>">

                                        </div>

                                    </div>
                                      <div class="form-group">

                                        <label class="form-control-label" for="">Description</label>

                                        <textarea class="form-control" name="layanan_description"><?= $layanan['description'] ?></textarea>

                                    </div>
                                    

                                    <button class="btn btn-primary"
                                            name="btn_layanan">Save</button>
                                </div>
                            </div>
                            </form>
                                <!-- query header section -->
                                <?php 
                                  
                              if (isset($_POST['btn_layanan'])) {
                                 $conn= query("UPDATE tbl_homepage SET title='$_POST[layanan_title]', description = '$_POST[layanan_description]' WHERE id = '$layanan[id]'");
                                   echo "<script>
                                    alert('Data berhasil dirubah');
                                    document.location.href = 'index.php?p=homepage';
                                </script>";
                              }
                              ?>

                            <div class="row">

                                    <div class="card-header">

                                        <h3 class="mb-0">Pelayanan Content</h3>

                                    </div>

                                  
                                        <div class="card-body">
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    
                                        

                                     <?php 
                              $get_layanan_content= query("SELECT * FROM tbl_home_content WHERE id_homepage ='$layanan[id]'")[0];
                             foreach($get_layanan_content as $data){
                              
                           ?>

                                                <div class="col-lg-4 p-3 mb-1" style="border-radius:10px; box-shadow: 5px 5px 10px rgba(163,177,198,0.5), -5px -5px 10px rgba(255, 255, 255, 0.6);">
                                                    
                                                         <form method="POST" enctype="multipart/form-data">

                                                        <div class="form-group">

                                                        <label class="form-control-label">Title</label>

                                                        <div class="input-group input-group-merge">

                                                            <input class="form-control" type="text" name="content_title<?= $data['id'] ?>"
                                                                value="<?= $data['title'] ?>">

                                                        </div>

                                                    
                                                 

                                                        <label class="form-control-label" for="">Description</label>

                                                        <textarea class="form-control" name="content<?= $data['id'] ?>" rows="10"><?= $data['value'] ?></textarea>

                                                  
                                                 

                                                        <label class="form-control-label" for="">Image <small>Cover image</small></label><br>
                                                        <img src="assets/img/wahana/uploads/<?=$data['images'] ?>" width="200px">

                                                        <input class="form-control" type="file" name="images<?= $data['id'] ?>" value="<?= $data['images'] ?>">
                                                    </div>
                                                    <button class="btn btn-primary"
                                                            name="btn_layanan_content<?= $data['id'] ?>">Save</button>
                                                    </form>
                                                        <?php 
                                     $id_op= $data['id'];
                                     $title= $_POST['content_title'.$id_op];
                                     $value= $_POST['content'.$id_op];
                                     $path= 'images'.$id_op;
                                     $simpan= $_POST['btn_layanan_content'.$id_op];
                                 
                              if (isset($simpan)) {
                                $nama_gambar = time() . '-' .$_FILES['images'.$id_op]['name'];
                                $lokasi_gambar = 'assets/img/wahana/uploads/' . $nama_gambar;
                                $gambar = $_FILES[$path]['tmp_name'];
                                if (!empty($gambar)) {
                                   $upload= move_uploaded_file($gambar,$lokasi_gambar);
                                   if (isset($upload)) {
                                     $conn= query("UPDATE tbl_home_content SET title='$title', value = '$value', images = '$nama_gambar' WHERE id = '$id_op'");
                                      if ($conn > 0) {
                                             echo "<script>
                                    alert('Data berhasil dirubah');
                                    document.location.href = 'index.php?p=homepage';
                                </script>";
                                            } else {
                                             echo "<script>
                                    alert('Data gagal dirubah');
                                    document.location.href = 'index.php?p=homepage';
                                </script>";
                                            }
                                    }
                                }else{
                                        $conn= query("UPDATE tbl_home_content SET title='$title', value = '$value' WHERE id = '$id_op'");
                                        if ($conn > 0) {
                                             echo "<script>
                                    alert('Data berhasil edit');
                                    document.location.href = 'index.php?p=homepage';
                                </script>";
                                            } else {
                                             echo "<script>
                                    alert('Data gagal dirubah');
                                    document.location.href = 'index.php?p=homepage';
                                </script>";
                                            }

                                    }

                                   
                              }
                              ?>
                                            
                                                </div>

                                    
                                    
                                      
                                        <?php }; ?>
                                    

                                
                                                </div>
                                            </div>
                                        </div>

                            

                            </div>

                           
                        
                        
                                   
                           
                        </div>
                      
                    
                    </div>

                    

                </div>


            </div>
        
  </div>

    <div class="row">
    

        <div class="col-lg-12">

            <div class="card-wrapper">

                <!-- Input groups -->

                <div class="card">



                    <!-- Card header -->

                    <div class="card-header d-flex justify-content-between">

                        <h3 class="mb-0">Setting cta Section</h3>

                    </div>

          
                       

                        <!-- Card body -->

                        <div class="card-body">
                          <form method="POST" enctype="multipart/form-data">
                            

                            <div class="row">
                                <!-- get data meta -->
                                <?php 
                              $cta= pilih_query("SELECT * FROM tbl_homepage WHERE name ='cta'","array")[0][0];
                             
                              
                           ?>

                                <div class="col-md-12 row">
                                    <div class="col-md-4">
                                        <div class="form-group">

                                        <label class="form-control-label" for="">Image <small>cover image</small></label><br>
                                        <img src="assets/img/wahana/uploads/<?=$cta['images'] ?>" width="200px">

                                        <input class="form-control" type="file" name="cta_images" value="<?= $cta['images'] ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                       
                                        <div class="form-group">

                                        <label class="form-control-label" for="">Title</small></label>

                                        <input class="form-control" type="text" name="cta_title" value="<?= $cta['title'] ?>">
                                        </div>
                                         <div class="form-group">

                                        <label class="form-control-label" for="">Description</label>

                                        <textarea class="form-control" name="cta_description"><?= $cta['description'] ?></textarea>

                                        </div>
                                    </div>
                                     


                                </div>

                                <div class="col-md-12">

                                  

                                </div>

                            

                            </div>

                            <button class="btn btn-primary"
                                            name="btn_cta">Save</button>

                        
                          </form>

                                    
                             <?php 
                                 
                              if (isset($_POST['btn_cta'])) {
                                $nama_gambar = time() . '-' . $_FILES['cta_images']['name'];
                                $lokasi_gambar = 'assets/img/wahana/uploads/' . $nama_gambar;
                                $gambar = $_FILES['cta_images']['tmp_name'];
                                if (!empty($gambar)) {
                                   $upload= move_uploaded_file($gambar,$lokasi_gambar);
                                   if (isset($upload)) {
                                     $conn= query("UPDATE tbl_homepage SET title='$_POST[cta_title]', description = '$_POST[cta_description]', images = '$nama_gambar' WHERE id = '$cta[id]'");
                                      if ($conn > 0) {
                                             echo "<script>
                                    alert('Data berhasil dirubah');
                                    document.location.href = 'index.php?p=homepage';
                                </script>";
                                            } else {
                                             echo "<script>
                                    alert('Data gagal dirubah');
                                    document.location.href = 'index.php?p=homepage';
                                </script>";
                                            }
                                    }
                                }else{
                                         $conn= query("UPDATE tbl_homepage SET title='$_POST[cta_title]', description = '$_POST[cta_description]' WHERE id = '$cta[id]'");
                                        if ($conn > 0) {
                                             echo "<script>
                                    alert('Data berhasil dirubah');
                                    document.location.href = 'index.php?p=homepage';
                                </script>";
                                            } else {
                                             echo "<script>
                                    alert('Data gagal dirubah');
                                    document.location.href = 'index.php?p=homepage';
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





<script>
    CKEDITOR.replace('content');
    CKEDITOR.replace('content1');
</script>