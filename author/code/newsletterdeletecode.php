<?php
include '../../config.php';
$news_id=$_REQUEST["news_id"];
$query="DELETE FROM tbl_newsletter WHERE news_id='$news_id'";
mysqli_query($connect, $query);
header('location:../newsletter.php');
?>	