<?php
include '../../config.php';
sleep(2);
$comment_id=$_POST['comment_id'];
$name=$_POST['name'];
$email=$_POST['email'];
$replymessage=$_POST['replymessage'];
$query="INSERT INTO tbl_reply(comment_id,name,email,replymessage,date,time) VALUES('$comment_id','$name','$email','$replymessage',curdate(),curtime())";
mysqli_query($connect,$query);
header("location:../comment.php");
?>