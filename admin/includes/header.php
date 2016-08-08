<?php
include "../config/config.php";
include "../libraries/Database.php";	
include "../helpers/format_helper.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
 

    <title>ADMIN Area</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/blog.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
   <!-- <script src="../../assets/js/ie-emulation-modes-warning.js"></script>-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="index.php">Dashboard</a>
          <a class="blog-nav-item" href="add_post.php">Add Post</a>
					<a class="blog-nav-item" href="add_category.php">Add Category</a>
					<a class="blog-nav-item pull-right" href="http://localhost/phploverblog/">Visit Blog</a>
        </nav>
      </div>
    </div>

    <div class="container">

      <div class="blog-header">
        <h2>ADMIN Area</h2>
      </div>

      <div class="row">

        <div class="col-sm-12 blog-main">
					
