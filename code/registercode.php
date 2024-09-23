<?php
include '../config.php';
sleep(2);
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$encriptpassword=md5($password);
date_default_timezone_set('Asia/Kolkata');
$query1="SELECT * FROM tbl_user WHERE email='$email'";
$result1=mysqli_query($connect,$query1);
if($row1=mysqli_fetch_array($result1))
{
  echo "0";
}
else{
$query="INSERT INTO tbl_user(email,name,password,date,time) VALUES('$email','$name','$encriptpassword',curdate(),curtime())";
mysqli_query($connect,$query);
}
?>