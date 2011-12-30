<?php
include 'lib/bato.php';

// posts variables:
$post_files = glob(POSTS_DIR."/*.*");
$current_post = array();
$posts = grab_posts($post_files);

// caching variables:
$cachename = has_uri() ? strtr($_GET['uri'], '/', ':') : "index";
$cachefilename = "cache/{$cachename}.html";

// display cache if the file exists:
// TODO: automatically expire the cache after a certain time
if (file_exists($cachefilename)) { 
  include $cachefilename;
  exit;
}

ob_start(); // START output buffer (for caching) 

// Basic URL Routing:
if (!has_uri()) {
  // home
  $view = './views/home.php'; 
  include "./views/layout.php";
} else {
  // posts
  if (preg_match('/^\/(\d{4})\/(\d{2})\/(\d{2})\/([^\.\/]+)/i', $_GET['uri'], $matches)) {
    $post = get_post($matches[1],$matches[2],$matches[3],$matches[4]);
    if ($post) {
      $view = './views/post.php'; 
      include "./views/layout.php";
    }
    else {
      header("HTTP/1.0 404 Not Found");
    }
  } elseif ($_GET['uri'] == '/rss') {
    include "./views/rss.php";
  } else {
    header("HTTP/1.0 404 Not Found");
  }
}

// save output buffer to cache:
$fp = fopen($cachefilename, 'w'); 
fwrite($fp, ob_get_contents());
fclose($fp);
ob_end_flush(); 
// END output buffer

