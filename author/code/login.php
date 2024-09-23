<?php
session_start();
include '../../config.php';
$email=$_POST['email'];
$password=$_POST['password'];
echo $encriptpassword=md5($password);

$query="SELECT * FROM tbl_admin WHERE email='$email' AND password='$encriptpassword'";
$res=mysqli_query($connect,$query);
 if($row=mysqli_fetch_array($res))
    {
    	$_SESSION['admin']=$email;
    	header('location:../home.php');
    }
else
    {
    	header('location:../index.php?msg=1');
    	session_destroy();
    }
?>
