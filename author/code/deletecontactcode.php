<?php
include '../../config.php';
$contact_id=$_REQUEST["contact_id"];
$query="DELETE FROM tbl_contact WHERE contact_id='$contact_id'";
mysqli_query($connect, $query);
header('location:../contact.php');
?>	