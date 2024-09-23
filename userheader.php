<?php
session_start();
if($_SESSION['user']==""){
$email=$_SESSION['user'];
session_destroy();
header("location:404notfound.php?msg=3");
}
$session_email=$_SESSION['user'];
include 'config.php';
$query="SELECT * FROM tbl_category ORDER BY cate_id DESC";
$result=mysqli_query($connect,$query);
?>
	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="icon" type="image/png" href="img/favicon.png">
		<!-- Author Meta -->
		<meta name="author" content="Learnyfy">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Learnyfy</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.min.css">
			<link rel="stylesheet" href="css/bootstrap.min.css.map">
			<link rel="stylesheet" href="css/parsley.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/main.css">
			<link rel="stylesheet" type="text/css" href="css/pace-theme-flash.css">
			<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
		</head>
		<body>	
		  <header id="header">
		    <div class="container main-menu">
		    	<div class="row align-items-center justify-content-between d-flex">
			      <div id="logo">
			        <a href="userindex.php"><i class="fa fa-renren text-dark ml-1" style="font-size: 35px"></i><sup><sup><sub><sub><sup><sub><span style="font-size: 17px;" class="text-dark ml-1">Learnyfy</span></sub></sup></sub></sub></sup></sup></a>

			      </div>
			      <nav id="nav-menu-container">
			        <ul class="nav-menu">
			          <li><a href="userindex.php">Home</a></li>
			          <li><a href="user_about.php">About</a></li>
			          <li class="menu-has-children"><a href="javascript:void(0)"> Cateory</a>
			            <ul style="overflow-y: auto; overflow-x: hidden; max-height: 200px;" class="mb-4">
			             <?php
			             $count_category=mysqli_num_rows($result);
                          if($count_category>0)
                           {
                            while($row=mysqli_fetch_array($result))
                            {
                            ?>
			              <li><a href="user_post_category.php?cateid=<?php echo$row['cate_id'];?>"><?php echo $row['catename'];?></a></li>
			             <?php 
			             }
			              }
			              else{
			              	echo "No Cateory";
			              }
			             ?>
			            </ul>
			          </li>			          					          		          
			          <li><a href="user_contact.php">Contact</a></li>
			          <li><a href="code/signoutcode.php">Logout</a></li>
			        </ul>
			      </nav><!-- #nav-menu-container -->		    		
		    	</div>
		    </div>
		  </header>
  <!-- #header -->
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>			
  <script src="js/bootstrap.min.js.map"></script>			
  <script src="js/sweetalert.min.js"></script>			
  <script src="js/parsley.js" type="text/javascript"></script>			
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script> -->
  <script src="js/superfish.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/simple-skillbar.js"></script>							
  <script src="js/owl.carousel.min.js"></script>							
  <script src="js/main.js"></script>	
  <script src="js/pace.min.js"type="text/javascript" ></script>