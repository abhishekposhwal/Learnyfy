<?php
include("header.php");
include("../config.php");
$query7="SELECT * FROM tbl_post_views ORDER BY view_id ";
$result7=mysqli_query($connect,$query7);
$countpostview=mysqli_num_rows($result7);
if($countpostview>0)
{
  $countpostview;
}
else{
  $countpostview=0;
}
$query8="SELECT * FROM tbl_user";
$result8=mysqli_query($connect,$query8);
$countuser=mysqli_num_rows($result8);
if($countuser>0)
{
  $countuser;
}
else{
  $countuser=0;
}
$query9="SELECT * FROM tbl_post";
$result9=mysqli_query($connect,$query9);
$countpost=mysqli_num_rows($result9);
if($countpost>0)
{
  $countpost;
}
else{
  $countpost=0;
}
$query10="SELECT * FROM tbl_counter";
$result10=mysqli_query($connect,$query10);
$countcomment=mysqli_num_rows($result10);
if($countcomment>0)
{
  $countcomment;
}
else{
  $countcomment=0;
}
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
?>
 <!-- Header -->
    <div class="header bg-gradient-white pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">            
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats  bg-secondary border-0 mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Post views</h5>
                      <span class="h3 font-weight-bold mb-0"><?php echo$countpostview?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-white text-dark rounded-circle shadow">
                        <i class="fa fa-eye"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats  bg-secondary border-0 mb-4 mb-xl-0">
                <a href="viewalluser.php">
                  <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Users</h5>
                      <span class="h3 font-weight-bold mb-0"><?php echo$countuser ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-dark text-white rounded-circle shadow">
                        <i class="fa fa-user-circle-o"></i>
                      </div>
                    </div>
                  </div>
                </div>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats  bg-secondary border-0 mb-4 mb-xl-0">
                <a href="post.php">
                  <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Posts</h5>
                      <span class="h3 font-weight-bold mb-0"><?php echo$countpost?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-white text-dark rounded-circle shadow">
                        <i class="fa fa-newspaper-o"></i>
                      </div>
                    </div>
                  </div>
                </div>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats  bg-secondary border-0 mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Visitors</h5>
                      <span class="h3 font-weight-bold mb-0"><?php echo$countcomment ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-dark text-white rounded-circle shadow">
                        <i class="fa fa-eye"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      <div class="container-fluid mt--7 mb-5">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow border-0">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Latest Posts</h3>
                </div>
                <div class="col text-right">
                  <a href="posts.php" class="btn btn-sm btn-dark">See all</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                     <th scope="col">SN</th>                     
                    <th scope="col">Header Pic</th>
                    <th scope="col">Headline</th>
                    <th scope="col">Category</th>
                    <th scope="col">Views</th>
                    <th scope="col">Comments</th>
                    <th scope="col">Reply</th>
                    <th scope="col">Time ago</th>
                  </tr>
                </thead>
                <tbody>
                     <?php 
                      $a=0;
                      $query="SELECT * FROM tbl_post ORDER BY post_id DESC LIMIT 7";
                      $result=mysqli_query($connect,$query);
                      while ($row=mysqli_fetch_array($result)) {
                       $a++;
                       $date=$row['date'];
                       $time=$row['time'];
                       $date_time=$date." ".$time;
                       $categoryid=$row["category"];
                       $post_id=$row["post_id"];
                       $query3="SELECT * FROM tbl_category WHERE cate_id='$categoryid'";
                       $result3=mysqli_query($connect,$query3);
                       if($row3=mysqli_fetch_array($result3))
                       {
                        $category=$row3["catename"];
                       }
                       else{
                        $category="None";
                       }
                       $query2="SELECT * FROM tbl_comment WHERE post_id='$post_id'";
                       $result2=mysqli_query($connect,$query2);
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
                  <tr >
                    <td><?php echo $a;; ?></td>
                    <td class="">
                      <img class="img-fluid" style="height: 40px;width: 70px" src="adminuploads/<?php echo $row["headerpic"]; ?>" >   
                    </td>
                    <td>
                     <span class="mb-0 text-sm"><?php echo $row["headline"]; ?></span>
                    </td>
                    <td class="">
                      <?php echo $category; ?>
                    </td>
                    <td class="text-center"><?php echo $total_visitor?></td>
                    <td>
                      <?php
                       $count="0";
                       $count_comment=mysqli_num_rows($result2);
                       if($count_comment>0)
                        {
                          while($row2=mysqli_fetch_array($result2))
                            $comment_id=$row2['comment_id'];
                            $query1="SELECT * FROM tbl_reply WHERE comment_id='$comment_id'";
                            $result1=mysqli_query($connect,$query1);                            
                            $count=mysqli_num_rows($result1);
                      ?>
                        <a href="viewcomment.php?post_id=<?php echo $post_id?>"><?php echo $count_comment?> Comments</a>
                       <?php
                        }
                        else
                          echo "0 Comments";
                      ?>
                    </td>
                    <td>
                    <?php
                     if($count>0)
                     {
                    ?>
                    <a href="viewreply.php?comment_id=<?php echo $comment_id?>"><?php echo $count?> Reply</a>
                      <?php
                        }
                        else
                          echo "0 Reply";
                      ?>                    
                    </td>
                    <td><?php date_default_timezone_set('Asia/Kolkata'); echo post_time($date_time);?></td>
                  </tr>
               <?php } ?>
                </tbody>
              </table>
            </div> 
          </div>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-xl-8 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0 ">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0 text-dark">Latest Comments</h3>
                </div>
                <div class="col text-right">
                  <a href="comment.php" class="btn btn-sm btn-dark">See all</a>
                </div>
              </div>
            </div>
            <div class="table-responsive" style="max-height: 320px">
              <!-- Projects table -->
              <table class="table align-items-center table-bordered">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">SN</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Comment</th>
                    <th scope="col">reply</th>
                    <th scope="col">time ago</th>
                  </tr>
                </thead>
                <tbody>
                 <?php
                     $a=0;
                     $query12="SELECT * FROM tbl_post ORDER BY post_id DESC";
                     $result12=mysqli_query($connect,$query12);
                     while($row12=mysqli_fetch_array($result12)){                                  
                     $post_id=$row12['post_id'];
                     $query4="SELECT * FROM tbl_comment WHERE post_id='$post_id' ";
                     $result4=mysqli_query($connect,$query4);
                     while($row4=mysqli_fetch_array($result4))
                     {
                      $a++;
                      $date=$row4['date'];
                      $time=$row4['time'];
                      $date_time=$date." ".$time;
                      $comment_id=$row4['comment_id'];
                      $query5="SELECT * FROM tbl_reply WHERE comment_id='$comment_id' ";
                      $result5=mysqli_query($connect,$query5);
                  ?>
                  <tr>
                    <td>
                    <?php echo $a,("."); ?>
                    </td>
                    <td><?php echo $row4['name']; ?></td>
                    <td><?php echo $row4['email'];?></td>
                    <td><?php echo $row4['message'];?></td>
                    <td>
                    <?php
                     $count=mysqli_num_rows($result5);
                     if($count>0)
                     {
                    ?>
                    <a href="viewreply.php?comment_id=<?php echo $comment_id?>"><?php echo $count?> Reply</a>
                      <?php
                        }
                        else
                          echo "0 Reply";
                      ?>                    
                    </td>
                    <td><?php date_default_timezone_set('Asia/Kolkata'); echo post_time($date_time);?></td>
                  </tr>
                    <?php
                      }
                    }
                    ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-xl-4">
          <div class="card shadow border-0">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0 text-dark">Latest Replys</h3>
                </div>
                <div class="col text-right">
                  <a href="reply.php" class="btn btn-sm btn-dark">See all</a>
                </div>
              </div>
            </div>
            <div class="table-responsive" style="max-height: 320px">
              <table class="table align-items-center table-bordered" >
                <thead class="thead-light">
                  <tr>
                    <th scope="col">SN</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Reply</th>
                    <th scope="col">time ago</th>
                  </tr>
                </thead>
                <tbody>
                 <?php
                     $query13="SELECT * FROM tbl_post ";
                     $result13=mysqli_query($connect,$query13);
                     $a=0;
                     while($row13=mysqli_fetch_array($result13))
                     {
                     $post_id=$row13['post_id'];
                     $query14="SELECT * FROM tbl_comment WHERE post_id='$post_id'";
                     $result14=mysqli_query($connect,$query14);
                      while($row14=mysqli_fetch_array($result14))
                      {                       
                      $comment_id=$row14['comment_id'];
                      $query6="SELECT * FROM tbl_reply WHERE comment_id='$comment_id' ORDER BY reply_id DESC";
                      $result6=mysqli_query($connect,$query6);
                      while($row6=mysqli_fetch_array($result6)){
                      $a++;                                         
                      $date=$row6['date'];
                      $time=$row6['time'];
                      $date_time=$date." ".$time;
                  ?>
                  <tr>
                    <td>
                    <?php echo $a,("."); ?>
                    </td>
                    <td><?php echo $row6['name']; ?></td>
                    <td><?php echo $row6['email'];?></td>
                    <td><?php echo $row6['replymessage'];?></td>
                    <td><?php date_default_timezone_set('Asia/Kolkata'); echo post_time($date_time);?></td>
                  </tr>
                    <?php
                      }
                    }
                  }
                    ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
   </div>