<?php
include '../../config.php';
$comment_id=$_REQUEST["comment_id"];
$query="DELETE FROM tbl_comment WHERE comment_id='$comment_id'";
mysqli_query($connect, $query);
header('location:../comment.php');
?>	