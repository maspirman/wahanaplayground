<?php
error_reporting(0);
require_once "admin/apl/redirect/load.php";
require_once "admin/apl/config/xconfig.php";
include "connection.php";


$pg = $_GET['p'];

$is = $_GET['n'] ? $_GET['n'] : '' ;
$hs = pilih_query("SELECT * FROM tbl_news WHERE slug_news='$is'", "array")[0][0] ? pilih_query("SELECT * FROM tbl_news WHERE slug_news='$is'", "array")[0][0] : '';
$pg = isset($_GET['p']) ? $_GET['p'] : false;

?>
<?php 
$meta= pilih_query("SELECT * FROM tbl_pages_setting WHERE name ='homepage'", "array")[0][0];
?>


<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
   
    if (!empty($_GET['p'])) {
      if ($_GET['p']=='tentang-kami') {
        $get_meta='about';
         
      }elseif ($_GET['p']=='portofolio') {
          $get_meta='portfolio';
      }elseif ($_GET['p']=='kontak-kami'){
          $get_meta='contact';
      }else{
        $get_meta='homepage';
      }
      $meta= pilih_query("SELECT * FROM tbl_pages_setting WHERE name ='$get_meta'", "array")[0][0];
      ?>

    <meta name="description" content="<?= $meta['meta_description'] ?>">
    <meta name="keywords" content="<?= $meta['meta_keywords'] ?>">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="<?= $base_url ?>">
    <meta name="author" content="<?= $base_url ?>">
    <title><?= $meta['meta_title'] ?></title>
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="<?= $meta['meta_title'] ?>">
    <meta property="og:description" content="<?= $meta['meta_description'] ?>">
    <meta property="og:url" content="<?= $base_url ?>">
    <meta property="og:image" content="admin/uploads/<?= $meta['image_thumb'] ?>">
    <meta property="og:type" content="website">
    
    <!-- Twitter Meta Tags -->
    <meta name="twitter:title" content="<?= $meta['meta_title'] ?>">
    <meta name="twitter:description" content="<?= $meta['meta_description'] ?>">
    <meta name="twitter:image" content="admin/uploads/<?= $meta['image_thumb'] ?>">
    <meta name="twitter:card" content="admin/uploads/<?= $meta['image_thumb'] ?>">
     
    <?php }  ?>
   

    <!-- Favicon -->
    <link rel="icon" href="path/to/favicon.ico">

  <!-- Stylesheets
  ============================================= -->
  <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Playfair+Display:400,700,700i,900" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>style.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>css/dark.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/custom.css" type="text/css" />

  <!-- Real Estate Demo Specific Stylesheet -->
  <link rel="stylesheet" href="<?php echo $base_url; ?>css/theme/real_estate/real-estate.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>css/theme/real_estate/font-icons.css" type="text/css" />


  <!-- Home Demo Specific Stylesheet -->
  <link rel="stylesheet" href="<?php echo $base_url; ?>css/theme/interior-design.css" type="text/css" />

  <link rel="stylesheet" href="<?php echo $base_url; ?>css/font-icons.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>css/animate.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>css/magnific-popup.css" type="text/css" />

  <!-- Reader's Blog Demo Specific Fonts -->
  <link rel="stylesheet" href="<?php echo $base_url; ?>css/theme/fonts.css" type="text/css" />

  <link rel="stylesheet" href="<?php echo $base_url; ?>css/custom.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>css/colors.php?color=1c85e8" type="text/css" />

  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.1.0/css/flag-icon.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/chat/floating-wpp.css">

<!--   <?php !empty($hs['header_news']) ? $hs['header_news'] : '';  ?> -->



</head>