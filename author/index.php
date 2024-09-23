<?php 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="../img/favicon.png">
  <title>Learnyfy || Dashboard</title>
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../css/parsley.css">
  <link rel="stylesheet" type="text/css" href="../css/argon-dashboard.min.css">
  <script src="../js/sweetalert.min.js"></script>
</head>

<body class="bg-secondary">
    <?php
    if(isset($_REQUEST['msg']))
    {
    $msg=$_REQUEST['msg'];
    if($msg!=0)
    {
    ?>
<script type="text/javascript">
  swal("Opps..!", "Invalid Email Or Password.Please Try Again.","error");               
</script>
    <?php  
    }
    else{
      echo '<script type="text/javascript">
     swal("Good job!", "You Successfully Logout || Sign in Now","success");               
     </script>';
    }
    }
    ?>
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top ">
      <div class="container justify-content-center">
        <a href="index.php" class=""><i class="fa fa-renren text-muted" style="font-size: 55px"></i><sup><sup><sub><sub><sup><sub><span style="font-size: 37px;" class="text-muted ml-1 ">Learnyfy</span></sub></sup></sub></sub></sup></sup></a>
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-white py-7 py-lg-8">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              <h1 class="text-muted ml-2">WELCOME !</h1>
              <p class="text-lead text-muted">This is Admin Dashboard. Please Login Here</p>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-secondary" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7 col-sm-9 col-11">
          <div class="card bg-secondary shadow border-0">
            <div class="card-header bg-transparent pb-5">
              <div class="text-muted text-center mt-2 mb-3 h2"><small>Sign in Here</small></div>
              <div class="btn-wrapper text-center">
                <i class="fa fa-warning" style="font-size: 80px"></i>
              </div>
            </div>
            <div class="card-body">
              <form role="form" action="code/login.php" method="POST">
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" name="email" placeholder="Email" type="email">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" name="password" placeholder="Password" type="password">
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4">Sign in</button>
                </div>
              </form>
            </div>
          </div><!-- 
          <div class="row mt-3">
            <div class="col-6">
              <a href="#" class="text-light"><small>Forgot password?</small></a>
            </div>
            <div class="col-6 text-right">
              <a href="#" class="text-light"><small>Create new account</small></a>
            </div>
          </div> -->
        </div>
      </div>
    </div>
    <footer class="py-5">
      <div class="container">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              © 2020 This Website Made By <a href="../about.php" class="font-weight-bold ml-1" target="_blank">Abhishek Poshwal</a>
            </div>
          </div>
          <div class="col-xl-6">
            <ul class="nav nav-footer justify-content-center justify-content-xl-end">
              <li class="nav-item">
                <a href="https://www.facebook.com" class="nav-link" target="_blank"><i class="fa fa-facebook"></i></a>
              </li>
              <li class="nav-item">
               <a href="https://www.twitter.com" class="nav-link" target="_blank"><i class="fa fa-twitter"></i></a>
              </li>
              <li class="nav-item">
                <a href="https://www.instagram.com" class="nav-link" target="_blank"><i class="fa fa-instagram"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </div>
<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/argon-dashboard.js"></script>
<script type="text/javascript" src="../js/parsley.js"></script>
