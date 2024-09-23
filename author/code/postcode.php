<?php
include '../../config.php';
$headline=mysqli_escape_string($connect,$_POST['headline']);
$postcategory=mysqli_escape_string($connect,$_POST['postcategory']);
$description=mysqli_escape_string($connect,$_POST['description']);
$quotes=mysqli_escape_string($connect,$_POST['quotes']);
$headerpic=$_FILES['headerpic']['name'];
$tmp_name=$_FILES['headerpic']['tmp_name'];
$picture1=$_FILES['picture1']['name'];
$tmp_name2=$_FILES['picture1']['tmp_name'];
$picture2=$_FILES['picture2']['name'];
$tmp_name3=$_FILES['picture2']['tmp_name'];
$location="../adminuploads/";
$query="INSERT INTO tbl_post(headline,category,description,quotes,headerpic,picture1,picture2,date,time)VALUES('$headline','$postcategory','$description','$quotes','$headerpic','$picture1','$picture2',curdate(),curtime())";
if($result=mysqli_query($connect, $query)){
move_uploaded_file($tmp_name, $location.$headerpic);
move_uploaded_file($tmp_name2, $location.$picture1);
move_uploaded_file($tmp_name3, $location.$picture2);
header('location:../post.php');
}
else{
	echo "Error Please Try Again";
}
?>