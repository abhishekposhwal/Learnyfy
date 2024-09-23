<?php include 'config.php';

// adding new visitors
$visitor_ip=$_SERVER['REMOTE_ADDR'];
// checking if visitors is unique
$query="SELECT * FROM tbl_counter WHERE ip_address='$visitor_ip' ";
$result=mysqli_query($connect,$query);
//checking query error
if(!$result)
{
	die("Retriving Query Error<br/>".$query);
}
$total_visitor=mysqli_num_rows($result);

if($total_visitor<1)
{
	$query="INSERT INTO tbl_counter(ip_address,date,time)VALUES ('$visitor_ip',curdate(),curtime())";
    $result=mysqli_query($connect,$query);
}
//retriving existing visitors
$query="SELECT * FROM tbl_counter";
$result=mysqli_query($connect,$query);
//checking query error
if(!$result)
{
	die("Retriving Query Error<br/>".$query);
}
$total_visitor=mysqli_num_rows($result);
if($total_visitor>=0 AND $total_visitor <9)
{
	$total_visitor="0000".$total_visitor;
}
elseif($total_visitor>9 AND $total_visitor <99)
{
	$total_visitor="000".$total_visitor;
}
elseif($total_visitor>99 AND $total_visitor <999)
{
	$total_visitor="00".$total_visitor;
}
elseif($total_visitor>999 AND $total_visitor <9999)
{
	$total_visitor="0".$total_visitor;
}
else{
	$total_visitor;
}
?>