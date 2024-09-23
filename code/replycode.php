<?php
include '../config.php';
sleep(2);
$comment_id=$_POST['commentID'];
$name=$_POST['name'];
$email=$_POST['email'];
$replymessage=mysqli_escape_string($connect,$_POST['replymessage']);

date_default_timezone_set('Asia/Kolkata');
$query="INSERT INTO tbl_reply(comment_id,name,email,replymessage,date,time) VALUES('$comment_id','$name','$email','$replymessage',curdate(),curtime())";
mysqli_query($connect,$query);
echo "1";
?>