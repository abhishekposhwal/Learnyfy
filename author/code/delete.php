<?php
include '../../config.php';
$lid=$_REQUEST["cateid"];
$query="DELETE FROM tbl_category WHERE cate_id='$lid'";
mysqli_query($connect, $query);
header('location:../addcategory.php');
?>	