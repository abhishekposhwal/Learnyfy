<?php
if(isset($_POST['limit'],$_POST['start']))
{
include 'config.php';
include 'get_time_ago.php';
$query="SELECT * FROM tbl_post ORDER BY post_id DESC LIMIT ".$_POST["start"].",".$_POST["limit"]."";
$result=mysqli_query($connect,$query);
while($row = mysqli_fetch_array($result)){

	$categoryid=$row["category"];
    $post_id=$row["post_id"];

    $query3="SELECT * FROM tbl_category WHERE cate_id='$categoryid'";
    $result3=mysqli_query($connect,$query3);
    if($row3=mysqli_fetch_array($result3))
    {
     $catename=$row3["catename"];
     $categoryid;
    }
    else{
        $catename="None";
        $categoryid="#";
    }
    $query6="SELECT * FROM tbl_comment WHERE post_id='$post_id'";
    $result6=mysqli_query($connect,$query6);
    $count=mysqli_num_rows($result6);
    if($count>0)
    {
    	$msg=$count." Comments";
    }
    else{
    	$msg="0 Comments";
    }


// post unique views code

// adding new visitors
$visitor_ip=$_SERVER['REMOTE_ADDR'];
// checking if visitors is unique
$query1="SELECT * FROM tbl_post_views WHERE ip_address='$visitor_ip' AND post_id='$post_id'";
$result1=mysqli_query($connect,$query1);
//checking query error
if(!$result1)
{
    die("Retriving Query Error<br/>".$query1);
}
$total_visitor=mysqli_num_rows($result1);

if($total_visitor<1)
{
    $query4="INSERT INTO tbl_post_views(post_id,ip_address,date,time)VALUES ('$post_id','$visitor_ip',curdate(),curtime())";
    $result4=mysqli_query($connect,$query4);
}
//retriving existing visitors
$query2="SELECT * FROM tbl_post_views WHERE post_id='$post_id'";
$result2=mysqli_query($connect,$query2);
//checking query error
if(!$result2)
{
    die("Retriving Query Error<br/>".$query2);
}
$total_visitor=mysqli_num_rows($result2);
if($total_visitor>=1000 AND $total_visitor<1000000)
{
    $total_visitor=$total_visitor/1000;
    $total_visitor=$total_visitor." K";
}
elseif ($total_visitor>=1000000 AND $total_visitor<=10000000) {
    $total_visitor=$total_visitor/1000000;
    $total_visitor=$total_visitor." M";
}
else{
    $total_visitor;
}

	echo '<div class="single-post row"><div class="col-lg-3  col-md-3 meta-details">
                                    <ul class="tags mb-3">
                                        <li><a href="post-category.php?cateid='.$categoryid.'">#'.$catename.'</a></li>
                                    </ul>
                                    <div class="user-details row">
                                        <p class="user-name col-lg-12 col-md-12 col-6">By Admin <span class="lnr lnr-user ml-2"></span></p>
                                        <p class="date col-lg-12 col-md-12 col-6">'.$date=$row['date'].' <span class="lnr lnr-calendar-full ml-2"></span></p>
                                        <p class="view col-lg-12 col-md-12 col-6">'.$total_visitor.' Views <span class="lnr lnr-eye ml-2"></span></p>
                                        <p class="comments col-lg-12 col-md-12 col-6">
                                          <a href="blog-single.php?post_id='.$row["post_id"].'">
                                           '.$msg.'
                                          </a> <span class="lnr lnr-bubble" style="margin-left: -2px"></span></p>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 ">
                                    <div class="feature-img content">
                                        <img class="img-fluid shadow" style="height:330px;padding: 4px;background: #fff" src="author/adminuploads/'.$row["headerpic"].'" alt="">
                                    </div>
                                   <h3 class="posts-title mt-3">'.$row['headline'].'</h3>
                                    <p class="excert mt-1">
                                        '.$row['quotes'].'
                                    </p>
                                    <a href="blog-single.php?post_id='. $row["post_id"].'" class="primary-btn">View More</a>
                                </div>
                            </div>';
}
}
?>