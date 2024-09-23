<?php
session_start();
if($_SESSION['admin']==""){
session_destroy();
header("location:404notfound.php");
}
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/png" href="../img/favicon.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Learnyfy || Dashboard</title>
	<link rel="icon" href="images/download.png" >
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css.map">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../css/parsley.css">
  <link rel="stylesheet" type="text/css" href="../css/argon-dashboard.min.css">
  <link rel="stylesheet" type="text/css" href="../css/404notfound.css">
  <link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="css/pace-theme-flash.css">
</head>
<body>
<!--------------------Menu Section----------------->
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white"id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="home.php">
       <h1 class="mt-2"><i class="fa fa-tv" style="font-size: 20px"></i> Dashboard</h1>
      </a>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="home.php">
              <h1>Dashboard</h1>  
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item display-4">
          <a class=" nav-link display-4" href="home.php"> <i class="fa fa-tachometer"></i> Dashboard
            </a>
          </li>
          <li class="nav-item display-4">
            <a class="nav-link " href="addcategory.php">
              <i class="fa fa-sliders"></i> Categories
            </a>
          </li>         
          <li class="nav-item">
            <a class="nav-link display-4" href="post.php">
              <i class="fa fa-newspaper-o"></i>Posts
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link display-4" href="comment.php">
              <i class="fa fa-comments-o"></i> Comments
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link display-4" href="reply.php">
              <i class="fa fa-reply"></i> Reply
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link display-4" href="posts.php">
              <i class="fa fa-line-chart"></i> Posts Analytics
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link display-4" href="contact.php">
              <i class="fa fa-phone"></i> Contact
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link display-4" href="newsletter.php">
              <i class="fa fa-envelope-o"></i> Newsletter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link display-4" href="viewalluser.php">
              <i class="fa fa-user"></i> Users
            </a>
          </li>
        </ul>
       <hr class="my-3">
        <!-- Heading -->
        <h6 class="navbar-heading text-muted">
          <ul class="navbar-nav">
          <a class="nav-link display-4" style="text-transform: capitalize;" href="code/signout.php">
              <i class="fa fa-sign-out" ></i> Sign out
            </a>
          </ul>
        </h6>
      </div>
    </div>
  </nav>
  <div class="main-content" style="overflow-x: hidden;" >
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-light" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h2 mb-0 text-dark text-uppercase d-none d-lg-inline-block " href="home.php">Dashboard</a>
      </div>
    </nav>
<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js.map"></script>
<script type="text/javascript" src="../js/argon-dashboard.min.js"></script>
<script type="text/javascript" src="../js/argon-dashboard.min.js.map"></script>
<script type="text/javascript" src="../js/parsley.min.js"></script>
<script type="text/javascript" src="../js/parsley.min.js.map"></script>
<script type="text/javascript" src="../js/sweetalert.min.js"></script>  
<script type="text/javascript" src="../js/pace.min.js"></script>
<script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#myTable').dataTable();
  });
</script>