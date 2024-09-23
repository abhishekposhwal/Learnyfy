<?php
include '../../config.php';
$post_id=$_POST['post_id'];
$headline=$_POST['headline'];
$postcategory=$_POST['postcategory'];
$description=$_POST['description'];
$quotes=$_POST['quotes'];
$headerpic=$_FILES['headerpic']['name'];
$tmp_name=$_FILES['headerpic']['tmp_name'];
$picture1=$_FILES['picture1']['name'];
$tmp_name2=$_FILES['picture1']['tmp_name'];
$picture2=$_FILES['picture2']['name'];
$tmp_name3=$_FILES['picture2']['tmp_name'];
$location="../adminuploads/";
$query="UPDATE tbl_post SET headline='$headline',category='$postcategory',description='$description',quotes='$quotes',headerpic='$headerpic',picture1='$picture1',picture2='$picture2',date=curdate(),time=curtime() WHERE post_id='$post_id'";

if($result=mysqli_query($connect, $query)){
move_uploaded_file($tmp_name, $location.$headerpic);
move_uploaded_file($tmp_name2, $location.$picture1);
move_uploaded_file($tmp_name3, $location.$picture2);
header('location:../post.php?msg=1');
}
else{
	echo "Error Please Try Again";
}
?>