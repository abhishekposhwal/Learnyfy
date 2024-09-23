<?php
if(isset($_REQUEST['post_id']))
{
$post_id=$_REQUEST['post_id'];
include 'header.php';
$query="SELECT * FROM tbl_post WHERE post_id='$post_id'";
$result=mysqli_query($connect,$query);
if($row=mysqli_fetch_array($result)) {
$categoryid=$row["category"];
$headline=$row["headline"];
$description=$row["description"];
$quotes=$row["quotes"];
$date=$row["date"];
$headerpic=$row["headerpic"];
$picture1=$row["picture1"];
$picture2=$row["picture2"];

$query8="SELECT * FROM tbl_comment WHERE post_id='$post_id'";
$result8=mysqli_query($connect,$query8);
$count=mysqli_num_rows($result8);
}
$query1="SELECT * FROM tbl_category WHERE cate_id='$categoryid'";
$result1=mysqli_query($connect,$query1);
if($row1=mysqli_fetch_array($result1))
{
 $catename=$row1["catename"];
}
else{
  $catename="None";
  $categoryid="#";
}

$query3="SELECT * FROM tbl_category ORDER BY cate_id DESC LIMIT 8";
$result3 =mysqli_query($connect,$query3);

function post_time($timestamp)
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


// start post unique views code

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
<!-- start banner Area -->
			<section class="relative" style="background:linear-gradient(to right,rgba(0,0,0,0.4),rgba(0,0,0,0.8)), url(img/banner.png); background-size: cover;">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								<?php echo $catename; ?>	
							</h1>	
							<p class="text-white link-nav"><a href="index.php">Home </a>   / <?php echo $catename; ?></p>
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
							<div class="single-post row">
								<div class="col-lg-12">
									<div class="feature-img">
										<img class="img-fluid shadow" style="height: 435px;padding: 4px;background: #fff" src="author/adminuploads/<?php echo $headerpic; ?>" alt="Header Pic">
									</div>									
								</div>
								<div class="col-lg-3  col-md-3 meta-details">
									<ul class="tags"><li><a href="post-category.php?cateid=<?php echo $categoryid; ?>">#<?php echo $catename; ?></a></li></ul>
									<div class="user-details row">
                    <p class="user-name col-lg-12 col-md-12 col-6">By Admin <span class="lnr lnr-user ml-2"></span></p>
                    <p class="date col-lg-12 col-md-12 col-6"><?php echo $date;?> <span class="lnr lnr-calendar-full ml-2"></span></p>
                    <p class="view col-lg-12 col-md-12 col-6"><?php echo $total_visitor;?> Views <span class="lnr lnr-eye ml-2"></span></p>
                    <p class="comments col-lg-12 col-md-12 col-6">
                      <a href="blog-single.php?post_id=<?php echo $post_id; ?>">
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
								<div class="col-lg-9 col-md-9">
									<h3 class="mt-20 mb-20"><?php echo $headline; ?></h3>
									<p class="excert">
										<?php echo $description; ?>
									</p>
								</div>
								<div class="col-lg-12">
									<div class="quotes">
										<?php echo $quotes; ?>
									</div>
									<div class="row mt-30 mb-30 justify-content-center">
										<div class="col-md-6 col-10 mb-2">
											<img class="img-fluid shadow"style="height: 200px;padding: 4px;background: #fff" src="author/adminuploads/<?php echo $picture1; ?>" alt="Picture 1">
										</div>
										<div class="col-md-6 col-10">
											<img class="img-fluid shadow"style="height: 200px;padding: 4px;background: #fff" src="author/adminuploads/<?php echo $picture2; ?>" alt="Picture 2">
										</div>				
									</div>
								</div>
							</div>
							<div class="comments-area">								
								<?php 
								$query5="SELECT * FROM tbl_comment WHERE post_id='$post_id'";
                $result5=mysqli_query($connect,$query5);
                  $count=mysqli_num_rows($result5);
                  if($count>0)
                    {
                  ?>
                  <h3 class="text-center mb-5"><?php echo $count; ?> Comments</h3>
                  <?php
								 while ($row5=mysqli_fetch_array($result5)) {
								 	$comment_id=$row5['comment_id'];
								 	$date=$row5['date'];
                  $time=$row5['time'];
                  $date_time=$date." ".$time;
								?>

								<div class="comment-list">
                  <div class="single-comment justify-content-between d-flex">
                      <div class="user justify-content-between d-flex">
                          <div class="desc">
                              <h5><a href="#" style="text-transform: capitalize;"><?php echo $row5['name'];?></a></h5>
                              <p class="date"><?php date_default_timezone_set('Asia/Kolkata'); echo post_time($date_time);?></p>
                              <p class="comment text-muted">
                                <?php echo $row5['message']; ?>
                              </p>
                          </div>
                      </div>
                  </div>                                    
                    <div class="reply-btn reply">
                        <a href="javascript:void(0)" data-commentID="<?php echo $comment_id;?>" onclick="reply(this)"> <button type="button" class="btn-reply circle">Reply</button></a>
                    </div>
                </div>
                                
                <?php
                $query6="SELECT * FROM tbl_reply WHERE comment_id='$comment_id' ORDER BY reply_id DESC";
                $result6=mysqli_query($connect,$query6);
								 while ($row6=mysqli_fetch_array($result6)) {
								 	$date=$row6['date'];
                   $time=$row6['time'];
                   $date_time=$date." ".$time;
                 ?>
								<div class="comment-list left-padding " style="margin-left: 30px">
                    <div class="single-comment justify-content-between d-flex">
                      <div class="user justify-content-between d-flex">
                        <div class="desc">
                          <h5><a href="#"><?php echo $row6['name'];?></a></h5>
                            <p class="date"><?php echo post_time($date_time);?></p>
                            <p class="comment">
                            <?php echo $row6['replymessage'];?>
                            </p>
                        </div>
                      </div>
                    </div>
                </div>

								<?php 
							     }
							      }
							      }
							      else{
							      	?>
							      	<h4 class="text-center text-muted">No Comment</h4>
							    <?php
							     } 
								?>
							</div>
							<div class="comment-form">
								<h4>Leave a Comment</h4>
								<form id="validate_commentform">
									<input type="text" value="<?php echo $post_id?>" name="post_id" hidden="hidden">
									<div class="form-group form-inline">
									  <div class="form-group col-lg-6 col-md-12 name">
									    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'" required="required">
									  </div>
									  <div class="form-group col-lg-6 col-md-12 email">
									    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" required="">
									  </div>										
									</div>
									<div class="form-group text-left">
										<textarea class="form-control mb-10" rows="5"placeholder="Messege" name="message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
									</div>
									<input value="Post Comment" type="submit" id="comment" class="btn circle text-white" style="background: #8490ff">
								</form>
							</div>
						</div>
						<div class="col-lg-4 sidebar-widgets">
							<div class="widget-wrap">
								<div class="single-sidebar-widget search-widget">
									<form class="search-form" action="search.php" method="POST">
			               <input style="outline: none;" placeholder="Search Posts" name="q" type="text" onfocus="this.placeholder = ''"pattern="^[a-z A-Z]+$" onblur="this.placeholder = 'Search Posts'" >
			                  <button type="submit"><i class="fa fa-search"></i></button>
			           </form>
								</div>
								<div class="single-sidebar-widget user-info-widget">
                  <img style="padding: 4px;background: #fff;height: 120px" src="img/53.jpg" class="rounded-circle shadow" alt=""><h4 class="mt-3">Abhishek Poshwal</h4>
                  <p>
                    Junior Writer
                  </p>
                  <ul class="social-links">
                    <li><a target="_blank" href="https://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
                    <li><a target="_blank" href="https://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
                    <li><a target="_blank" href="https://www.instagram.com"><i class="fa fa-instagram"></i></a></li>
                  </ul>
                  <p>
                    Hey everyone, I’m Abhishek and  thanks to you visiting this Learnyfy. I live in LUCKNOW with my family. I started developing Learnyfy in the year 2021. I was frequently asked for my article  from friends and family members. one day I thought, why not to spread my knowledge to the world.So I started developing Learnyfy. My Learnyfy is constantly changing and growing as I learn more. It truly is an art. I hope you enjoying the Learnyfy.
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
                              <img class="img-fluid shadow"style="width: 90px;height: 55px; padding: 4px;background: #fff" src="author/adminuploads/<?php echo $row2["headerpic"]; ?>" alt="Header pic" >
                          </div>
                          <div class="details">
                              <a href="blog-single.php?post_id=<?php echo $row2['post_id']; ?>"><h6><?php echo $row2['headline']; ?></h6></a>
                              <p><?php date_default_timezone_set('Asia/Kolkata'); echo post_time($date_time);?></p>
                          </div>
                      </div>
                      <?php 
                        }
                        }
                            else{
                              echo "<h2 class='text-center mt-5 text-danger'><i class='fa fa-frown-o' style='font-size:25px;'></i> Opps..!</h2><br/> <h4 class='text-center mb-1'>No Popular Posts<p style='font-size: 15px;font-weight: 200'> upload Comming Soon...</p></h4>";;
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
                            $cate_id=$row3['cate_id'];
                            $query7="SELECT * FROM tbl_post WHERE category='$cate_id'";
                            $result7=mysqli_query($connect,$query7);
                            $countcate=mysqli_num_rows($result7);
                       ?>
                       <li>
                        <a href="post-category.php?cateid=<?php echo$row3['cate_id'];?>" class="d-flex justify-content-between">
                          <p><?php echo $row3['catename'];?></p>
                          <p>
                            <?php 
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
                              echo "<h2 class='text-center mt-5 text-danger'><i class='fa fa-frown-o' style='font-size:25px;'></i> Opps..!</h2><br/> <h4 class='text-center mb-1'>No Category<p style='font-size: 15px;font-weight: 200'> upload Comming Soon...</p></h4>";;
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
                          $count_tag=mysqli_num_rows($result4);
                          if($count_tag>0)
                          { 
                          while($row4=mysqli_fetch_array($result4))
                          {
                        ?>
                        <li><a href="post-category.php?cateid=<?php echo $row4['cate_id'];?>"><?php echo $row4['catename'];?></a></li>
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

<div class="replyRow mt-5" style="display: none;">
	<div class="row justify-content-center">
		<div class="col-xl-11">
			<h4 class="text-center">Reply Now </h4>
		</div>
		<div class="col-xl-1 text-right ">
			<i  onclick="$('.replyRow').hide();" class="fa fa-close" style="margin-right: 70px"></i>
		</div>
	</div>
      <form id="validate_replyform">
       <div class="comment-form border-0" style="margin-top: -80px">
	    <div class="form-group form-inline">
		 <div class="form-group col-lg-6 col-md-12 name">
		   <input type="text" value="" id="commentID" hidden name="commentID">
		  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'" required="required">
		  </div>
		  <div class="form-group col-lg-6 col-md-12 email">
		  <input type="email" id="email" name="email" class="form-control"placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" required="">
		  </div>										
		  </div>
		  <div class="form-group text-left">
		  <textarea class="form-control mb-10" rows="5"placeholder="Reply Here..." name="replymessage" id="replymessage" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
		   </div>
	     </div>
         <div class="" style="margin-top: -45px;margin-left: 25px">
           <input value="Reply" type="submit" id="reply" class="btn circle text-white" style="background: #8490ff">
         </div>
      </form>
</div>



<script type="text/javascript">
	function reply(caller) {
		var commentID=$(caller).attr('data-commentID');
		$(".replyRow").insertAfter($(caller));
		$('.replyRow').show();
		$('#validate_replyform').parsley();
     $('#validate_replyform').on('submit',function(event){
      event.preventDefault();
      if($('#validate_replyform').parsley().isValid())
      {
      	var name=$('#name').val();
      	var email=$('#email').val();
      	var replymessage=$('#replymessage').val();
        $.ajax({
            url:"code/replycode.php",
            method:"POST",
            data:{commentID:commentID,name:name,email:email,replymessage:replymessage },
            beforeSend:function(){
              $('#reply').attr('disabled','disabled');
              $('#reply').val('Processing...');
            },
            success:function(data)
            {
              $('#validate_replyform')[0].reset();
              $('#validate_replyform').parsley().reset();
              $('#reply').attr('disabled',false);
              $('#reply').val('Reply');
              if(data=="1")
              {
               swal("Good job!", "Thank You For Comment. Enjoy yourself","success");
               setTimeout(function(){
                  location.reload();
                },7000);
              }
              else{                
               swal("Opps..!", "Failed.","error");
                // alert(data);
              }
            }
        });
      }
        });
	}
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#validate_commentform').parsley();

     $('#validate_commentform').on('submit',function(event){
      event.preventDefault();
      if($('#validate_commentform').parsley().isValid())
      {
          // alert($(this).serialize());
        $.ajax({
            url:"code/commentcode.php",
            method:"POST",
            data:$(this).serialize(),
            beforeSend:function(){
              $('#comment').attr('disabled','disabled');
              $('#comment').val('Processing...');
            },
            success:function(data)
            {
              $('#validate_commentform')[0].reset();
              $('#validate_commentform').parsley().reset();
              $('#comment').attr('disabled',false);
              $('#comment').val('Post Comment');
              if(data=="1")
              {
               swal("Good job!", "Thank You For Comment. Enjoy yourself","success");
               setTimeout(function(){
                  location.reload();
                },7000);
              }
              else{                
               swal("Opps..!", "Failed.","error");
                // alert(data);
              }
            }
        });
      }
        });
     });
</script>

<?php
include 'footer.php';
}else{
 header('location:404notfound.php');
}
?>
