<?php
include '../config.php';
sleep(2);
$post_id=$_POST['post_id'];
$name=$_POST['name'];
$email=$_POST['email'];
$message=mysqli_escape_string($connect,$_POST['message']);
date_default_timezone_set('Asia/Kolkata');
$query="INSERT INTO tbl_comment(post_id,name,email,message,date,time) VALUES('$post_id','$name','$email','$message',curdate(),curtime())";
mysqli_query($connect,$query);
echo "1";
?>