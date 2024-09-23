<?php
include '../../config.php';
$catename=$_POST['catename'];
$query="INSERT INTO tbl_category(catename,date,time)VALUES('$catename',curdate(),curtime())";
mysqli_query($connect, $query);
header('location:../addcategory.php');
?>