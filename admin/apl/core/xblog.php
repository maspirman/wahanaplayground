<?php

class Blog extends Db
{
  public static function addCategory($data, $tbl)
  {
    $_SESSION['msg'] = null;
    $time = microtime();
    $name = htmlspecialchars(strtolower(trim($data)));
    $link = str_replace(" ", "", $name);

    DB::query("INSERT INTO `{$tbl}` (title_news_category, link_news_category, time_news_category) VALUES (:data, :link, :time)");
    Db::bind(":data", $name);
    Db::bind(":link", $link);
    Db::bind(":time", $time);
    $insert = Db::rowCount();


    if ($insert >= 1) {
      $_SESSION['msg'] = 'category added';
      header('Location: ' . BASE_URL . 'index.php?p=blog-category');
    }
  }

  public static function updateCategory($data, $tbl)
  {
    $_SESSION['msg'] = null;
    $id = $data['id'];
    $title = htmlspecialchars(strtolower(trim($data['title'])));
    $link = str_replace(" ", "", $title);

    DB::query("UPDATE `{$tbl}` SET title_news_category = :title, link_news_category = :link WHERE id_news_category = :id");
    Db::bind(":id", $id);
    Db::bind(":title", $title);
    Db::bind(":link", $link);
    $insert = Db::rowCount();


    if ($insert >= 1) {
      $_SESSION['msg'] = 'category updated';
      header('Location: ' . BASE_URL . 'index.php?p=blog-category');
    }
  }

  public static function deletecategory($data, $tbl)
  {
    $_SESSION['msg'] = null;
    $id = $data;
    // var_dump($data);
    Db::query("DELETE FROM `{$tbl}` WHERE id_news_category = '$id'");
    $insert = Db::rowCount();


    if ($insert >= 1) {
      $_SESSION['msg'] = 'category has been removed';
      header('Location: ' . BASE_URL . 'index.php?p=blog-category');
    }
  }

  /*
  * ============================================= 
  *                     BLOG
  * =============================================
  */

  public static function viewblog($id, $tbl)
  {
    DB::query("SELECT * FROM $tbl WHERE id_news = $id");
    $result = DB::single();
    return $result;
  }

  public static function addblog($data, $file, $tbl)
  {
    $_SESSION['msg'] = null;
    //=============== img ====================== 
    $time = microtime();
    $img = $time . '-' . strtolower($file['img']['name']);
    $ext_img = ['jpg', 'jpeg', 'png', 'gif'];
    $path_img = 'assets/img/news/' . $img;
    $extension_img = pathinfo($path_img, PATHINFO_EXTENSION);
    

    if (in_array($extension_img, $ext_img)) {
      if (move_uploaded_file($file['img']['tmp_name'], $path_img)) {


        $author = htmlspecialchars(trim($data['author']));
        $title = htmlspecialchars(trim($data['title']));
        $slug = str_replace(' ', '-', trim(strtolower($title)));
        $excerpt = htmlspecialchars(trim($data['excerpt']));
        $desc = trim($data['desc']);
        $category = trim($data['category']);
        $meta_title = htmlspecialchars(trim(strtolower($data['meta_title'])));
        $meta_description = htmlspecialchars(trim(strtolower($data['meta_description'])));
        $header = trim(strtolower($data['header']));
        $footer = trim(strtolower($data['footer']));
        $time = $data['time'];
        DB::query("INSERT INTO `{$tbl}` (author_news, title_news, slug_news, excerpt_news, desc_news, title_news_category, img_news, meta_title_news, meta_description_news, header_news, footer_news, time_news) VALUES (:author, :title, :slug, :excerpt, :desc, :category, :img, :meta_title, :meta_description, :header, :footer, :time)");
        Db::bind(":author", $author);
        Db::bind(":title", $title);
        Db::bind(":slug", $slug);
        Db::bind(":excerpt", $excerpt);
        Db::bind(":desc", $desc);
        Db::bind(":category", $category);
        Db::bind(":img", $img);
        Db::bind(":meta_title", $meta_title);
        Db::bind(":meta_description", $meta_description);
        Db::bind(":header", $header);
        Db::bind(":footer", $footer);
        Db::bind(":time", $time);

        $insert = Db::rowCount();

        if ($insert >= 1) {
          $_SESSION['msg'] = 'product has been added';
          header('Location: ' . BASE_URL . 'index.php?p=blog');
        } else {
          header('Location: ' . BASE_URL . 'index.php');
        }
      }
    }
  }

  public static function deleteblog($data, $tbl)
  {
    $_SESSION['msg'] = null;
    $id = $data;
    Db::query("SELECT * FROM `{$tbl}` WHERE id_news = $id");
    $db = Db::resultset();
    foreach ($db as $x) {
      $unlink = unlink('assets/img/news/' . $x->img_news);
    }

    if ($unlink) {
      Db::query("DELETE FROM `{$tbl}` WHERE id_news = $id");
      $insert = Db::rowCount();


      if ($insert >= 1) {
        $_SESSION['msg'] = 'News has been removed';
        header('Location: ' . BASE_URL . 'index.php?p=blog');
      }
    }
  }

  public static function excerpt_words($data)
  {
    $arr = explode(' ', $data);
    $length_array = count($arr);
    if ($length_array >= 10) {
      $slice = array_slice($arr, 0, 10);
      $words = implode(" ", $slice);
      return $words . '...';
    } else {
      $words = implode(" ", $arr);
      return $words;
    }
  }
}
