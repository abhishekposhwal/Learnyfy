<?php
if(isset($_REQUEST['cateid']))
{
include 'userheader.php';
$cateid=$_REQUEST['cateid'];
$query="SELECT * FROM tbl_post WHERE category='$cateid'";
$result=mysqli_query($connect,$query);

$query3="SELECT * FROM tbl_category ORDER BY cate_id DESC LIMIT 8";
$result3 =mysqli_query($connect,$query3);

function lawyer_time($timestamp)
{
  $time_ago = strtotime($timestamp);
  $current_time=time();
  $time_difference= $current_time - $time_ago;
  $seconds= $time_difference;
  $minuts= round($seconds/60);
  $hours= round($seconds/ 3600);
  $days= round($seconds/  86400);
  $weeks= round($seconds/ 604800);
  $months= round($seconds/2629440);
  $years= round($seconds/ 31553280);
  if($seconds <= 60)
  {
    return "just Now";
  }
  else if($minuts <=60)
  {
     if($minuts==1)
     {
      return "One Minute ago";
     }
     else
     {
      return "$minuts Minutes ago";
     }
  }
  else if($hours <=24)
  {
     if($hours==1)
     {
      return "An Hours ago";
     }
     else
     {
      return "$hours Hours ago";
     }
  }
  else if($days <=7)
  {
     if($days==1)
     {
      return "Yesterday";
     }
     else
     {
      return "$days Days ago";
     }
  }
  else if($weeks <= 4.3)
  {
     if($weeks==1)
     {
      return "A Week ago";
     }
     else
     {
      return "$weeks Weeks ago";
     }
  }
  else if($months <= 12)
  {
     if($months==1)
     {
      return "A Month ago";
     }
     else
     {
      return "$months Months ago";
     }
  }
  else
  {
     if($years==1)
     {
      return "One Year ago";
     }
     else
     {
      return "$years Years ago";
     }
  }

}

?>
<!-- start banner Area -->
			<section class="relative" style="background:linear-gradient(to right,rgba(0,0,0,0.4),rgba(0,0,0,0.8)), url(img/banner.png); background-size: cover;">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Popular Posts			
							</h1>	
							<!-- <p class="text-white link-nav"><a href="userindex.php">Home </a> / Post Category</p> -->
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->					  
			
			<!-- Start post-content Area -->
			<section class="post-content-area single-post-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 posts-list">
							<?php
              $count=mysqli_num_rows($result);
              if($count>0)
                { 
                  while ($row=mysqli_fetch_array($result)) {
                      $categoryid=$row["category"];
                      $post_id=$row["post_id"];
                      $query1="SELECT * FROM tbl_category WHERE cate_id='$categoryid'";
                      $result1=mysqli_query($connect,$query1);
                      if($row1=mysqli_fetch_array($result1))
                      {
                      $catename=$row1["catename"];

                      }
                     $query6="SELECT * FROM tbl_comment WHERE post_id='$post_id'";
                     $result6=mysqli_query($connect,$query6);
                     $count=mysqli_num_rows($result6);
                     // adding new visitors
                      $visitor_ip=$_SERVER['REMOTE_ADDR'];
                      // checking if visitors is unique
                      $query10="SELECT * FROM tbl_post_views WHERE ip_address='$visitor_ip' AND post_id='$post_id'";
                      $result10=mysqli_query($connect,$query10);
                      //checking query error
                      if(!$result10)
                      {
                          die("Retriving Query Error<br/>".$query10);
                      }
                      $total_visitor=mysqli_num_rows($result10);

                      if($total_visitor<1)
                      {
                          $query11="INSERT INTO tbl_post_views(post_id,ip_address,date,time)VALUES ('$post_id','$visitor_ip',curdate(),curtime())";
                          $result11=mysqli_query($connect,$query11);
                      }
                      //retriving existing visitors
                      $query12="SELECT * FROM tbl_post_views WHERE post_id='$post_id'";
                      $result12=mysqli_query($connect,$query12);
                      //checking query error
                      if(!$result12)
                      {
                          die("Retriving Query Error<br/>".$query12);
                      }
                      $total_visitor=mysqli_num_rows($result12);
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
                      // end post unique views code
                  ?>
                            <div class="single-post row">
                                <div class="col-lg-3  col-md-3 meta-details">
                                    <ul class="tags mb-3">
                                        <li><a href="user_post_category.php?cateid=<?php echo $categoryid; ?>">#<?php echo $catename; ?></a></li>
                                    </ul>
                                    <div class="user-details row">
                                        <p class="user-name col-lg-12 col-md-12 col-6">By Admin <span class="lnr lnr-user ml-2"></span></p>
                                        <p class="date col-lg-12 col-md-12 col-6"><?php echo $date=$row['date']; ?> <span class="lnr lnr-calendar-full ml-2"></span></p>
                                        <p class="view col-lg-12 col-md-12 col-6"><?php echo $total_visitor ?> Views <span class="lnr lnr-eye ml-2"></span></p>
                                        <p class="comments col-lg-12 col-md-12 col-6"><a href="user_blog_single.php?post_id=<?php echo $row["post_id"]; ?>">
                                        <?php
                                           if($count>0)
                                           {
                                            ?> 
                                            <?php echo $count; ?> Comments
                                            <?php
                                          }
                                          else
                                            echo "0 Comments";
                                            ?>
                                       </a> 
                                       <span class="lnr lnr-bubble" style="margin-left: -2px"></span></p>
                                                            
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 ">
                                    <div class="feature-img">
                                        <img  style="height: 330px;padding:4px;background: #fff;" class="img-fluid shadow" src="author/adminuploads/<?php echo $row["headerpic"]; ?>" alt="">
                                    </div>
                                   <h3 class="posts-title mt-3"><?php echo $row['headline']; ?></h3>
                                    <p class="excert mt-1">
                                        <?php echo $row['quotes']; ?>
                                    </p>
                                    <a href="user_blog_single.php?post_id=<?php echo $row["post_id"]; ?>" class="primary-btn">View More</a>
                                </div>
                            </div>
                            <?php
                             }
                             }
                             else{
                              echo "<h1 class='text-center mt-5 text-danger'><i class='fa fa-frown-o' style='font-size:33px;'></i> Opps..!</h1><br/> <h3 class='text-center'>No Post Are Available.<p style='font-size: 20px;font-weight: 200'> upload Comming Soon...</p></h3>";
                             }
                            ?> 							
						   </div>
						<div class="col-lg-4 sidebar-widgets">
							<div class="widget-wrap">
								<div class="single-sidebar-widget search-widget">
									<form class="search-form" action="user_search.php" method="POST">
			               <input style="outline:none;" required="required" placeholder="Search Posts" name="q" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Posts'"  >
			                 <button type="submit" style="outline: none;"><i class="fa fa-search"></i></button>
			            </form>
								</div>
								<div class="single-sidebar-widget user-info-widget">
                  <img style="padding: 6px;background: #fff;height: 120px" src="img/53.jpg" class="rounded-circle shadow" alt=""><h4 class="mt-3">Abhishek Poshwal</h4>
                  <p>
                    Junior Writer
                  </p>
                  <ul class="social-links">
                    <li><a target="_blank" href="https://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
                    <li><a target="_blank" href="https://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
                    <li><a target="_blank" href="https://www.instagram.com"><i class="fa fa-instagram"></i></a></li>
                  </ul>
                  <p>
                    Hey everyone, I’m Abhishek and  thanks to you visiting this Learnyfy. I live in Amroha with my family. I started developing Learnyfy in the year 2021. I was frequently asked for my article  from friends and family members. one day I thought, why not to spread my knowledge to the world.So I started developing Learnyfy. My Learnyfy is constantly changing and growing as I learn more. It truly is an art. I hope you enjoying the Learnyfy.
                  </p>
                </div>
								<div class="single-sidebar-widget popular-post-widget">
                    <h4 class="popular-title">Popular Posts</h4>
                    <div class="popular-post-list">
                        <?php 
                          $query2="SELECT * FROM tbl_post ORDER BY post_id DESC LIMIT 6";
                          $result2=mysqli_query($connect,$query2);
                          $count=mysqli_num_rows($result2);
                          if($count>0)
                          {
                          while($row2=mysqli_fetch_array($result2))
                          {
                            $date=$row2['date'];
                            $time=$row2['time'];
                            $date_time=$date." ".$time;
                        ?>
                        <div class="single-post-list d-flex flex-row align-items-center">
                            <div class="thumb">
                                <img class="img-fluid shadow" style="width: 90px;height: 55px; padding: 4px;background: #fff;" src="author/adminuploads/<?php echo $row2["headerpic"]; ?>" alt="Header pic" >
                            </div>
                            <div class="details">
                                <a href="user_blog_single.php?post_id=<?php echo $row2['post_id']; ?>"><h6><?php echo $row2['headline']; ?></h6></a>
                                <p><?php date_default_timezone_set('Asia/Kolkata'); echo lawyer_time($date_time);?></p>
                            </div>
                        </div>
                        <?php 
                         }
                         }
                           else{
                             echo "<h2 class='text-center mt-5 text-danger'><i class='fa fa-frown-o' style='font-size:25px;'></i> Opps..!</h2><br/> <h4 class='text-center mb-1'>No Popular Posts<p style='font-size: 15px;font-weight: 200'> upload Comming Soon...</p></h4>";
                           }
                        ?>                                                         
                  </div>
                </div> <!-- 
								<div class="single-sidebar-widget ads-widget">
									<a href="#"><img class="img-fluid" src="img/blog/ads-banner.jpg" alt=""></a>
								</div> -->
								<div class="single-sidebar-widget post-category-widget">
                   <h4 class="category-title">Post Catgories</h4>
                   <ul class="cat-list">
                     <?php
                      $count=mysqli_num_rows($result3);
                      if($count>0)
                      { 
                           while($row3=mysqli_fetch_array($result3))
                           {
                            $cateid=$row3['cate_id'];
                            $query5="SELECT * FROM tbl_post WHERE category='$cateid'";
                            $result5=mysqli_query($connect,$query5);
                            $countcate=mysqli_num_rows($result5);
                         ?>
                       <li>
                           <a href="user_post_category.php?cateid=<?php echo$cateid;?>" class="d-flex justify-content-between">
                               <p><?php echo $row3['catename'];?></p>
                               <p><?php 
                                    if($countcate>0)                                 
                                      echo $countcate;
                                    else
                                      echo "0";
                                    ?>                                      
                                </p>
                           </a>
                      </li> 
                       <?php
                          }
                          }
                           else{
                             echo "<h2 class='text-center mt-5 text-danger'><i class='fa fa-frown-o' style='font-size:25px;'></i> Opps..!</h2><br/> <h4 class='text-center mb-1'>No Category<p style='font-size: 15px;font-weight: 200'> upload Comming Soon...</p></h4>";
                           }
                       ?>                                                         
                   </ul>
                 </div>
								<div class="single-sidebar-widget tag-cloud-widget">
                    <h4 class="tagcloud-title">Tag Clouds</h4>
                    <ul>
                        <?php 
                          $query4="SELECT * FROM tbl_category ORDER BY cate_id DESC LIMIT 14";
                          $result4=mysqli_query($connect,$query4);
                           $count=mysqli_num_rows($result4);
                           if($count>0)
                           {
                          while($row4=mysqli_fetch_array($result4))
                          {
                        ?>
                        <li><a href="user_post_category.php?cateid=<?php echo $row4['cate_id'];?>"><?php echo $row4['catename'];?></a></li>
                        <?php
                        } 
                      }
                        else{
                             echo "<h2 class='text-center mt-5 text-danger'><i class='fa fa-frown-o' style='font-size:25px;'></i> Opps..!</h2><br/> <h4 class='text-center mb-1'>No Tags<p style='font-size: 15px;font-weight: 200'> upload Comming Soon...</p></h4>";
                           }
                        ?>
                    </ul>
                </div> 							
							</div>
						</div>
					</div>
				</div>	
			</section>
			<!-- End post-content Area -->
<?php
include 'userfooter.php';
}else{
 header('location:404notfound.php');
}
?>