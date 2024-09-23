<?php
include '../../config.php';
$reply_id=$_REQUEST["reply_id"];
$query="DELETE FROM tbl_reply WHERE reply_id='$reply_id'";
mysqli_query($connect, $query);
header('location:../reply.php');
?>	