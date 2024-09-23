<?php
include("header.php");
include("../config.php");
$query="SELECT * FROM tbl_post ORDER BY post_id DESC";
$result=mysqli_query($connect,$query);
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
<section id="category">
 <div class="container-fluid bg-gradient-secondary" style="min-height: 100vh;">
      <!-- Table -->
      <div class="row">
        <div class="col mb-5" style="margin-top: 84px;">
          <div class="card shadow">
            <div class="card-header border-0">
             <h3 class="text-dark">Posts Analytics</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush" id="myTable">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">SN</th>                     
                    <th scope="col">Header Pic</th>
                    <th scope="col">Headline</th>
                    <th scope="col">Category</th>
                    <th scope="col">views</th>
                    <th scope="col">Comments</th>
                    <th scope="col">Reply</th>                    
                    <th scope="col">time ago</th>
                  </tr>
                </thead>
                <tbody>
                     <?php 
                      $a=0;
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
                  <tr>
                    <td><?php echo $a;; ?></td>
                    <td class="">
                      <img style="height: 40px;width: 70px" class="img-fluid"src="adminuploads/<?php echo $row["headerpic"]; ?>" >   
                    </td>
                    <th>
                     <span class="mb-0 text-sm"><?php echo $row["headline"]; ?></span>
                    </th>
                    <td class="">
                      <?php echo $category; ?>
                    </td>
                    <td class="text-center"><?php echo$total_visitor?></td>
                    <td>
                      <?php
                      $count="0";
                       $count_comment=mysqli_num_rows($result2);
                       if($count_comment>0)
                        {
                          if($row2=mysqli_fetch_array($result2))
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
 </div>
</section>

