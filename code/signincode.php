<?php
session_start();
include '../config.php';
$email=$_POST['email'];
$password=$_POST['password'];
$encriptpassword=md5($password);

$query="SELECT * FROM tbl_user WHERE email='$email' AND password='$encriptpassword'";
$res=mysqli_query($connect,$query);
 if($row=mysqli_fetch_array($res))
    {
    	$_SESSION['user']=$email;
    	header('location:../userindex.php');
    }
else
    {
    	header('location:../index.php?msg=1');
    	session_destroy();
    }
?>
