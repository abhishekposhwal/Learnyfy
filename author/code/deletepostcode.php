<?php
include '../../config.php';
$post_id=$_REQUEST["post_id"];
$query="DELETE FROM tbl_post WHERE post_id='$post_id'";
mysqli_query($connect, $query);
header('location:../post.php');
?>	