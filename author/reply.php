<?php
include("header.php");
include("../config.php");
$query="SELECT * FROM tbl_post ORDER BY post_id DESC";
$result=mysqli_query($connect,$query);
function comment_time($timestamp)
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
 <div class="container-fluid bg-gradient-secondary"style="min-height: 100vh;">
      <!-- Table -->
      <div class="row">
        <div class="col mb-5" style="margin-top: 84px;">
          <div class="card shadow border-0">
            <div class="card-header border-0">
                <h3 class="text-dark">All Replys</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush" id="myTable">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">SN</th>
                    <th scope="col">action</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Reply</th>
                    <th scope="col">time ago</th>
                    
                  </tr>
                </thead>
                <tbody>
                 <?php
                     $a=0;
                     while($row=mysqli_fetch_array($result))
                     {
                      $post_id=$row['post_id'];
                      $query1="SELECT * FROM tbl_comment WHERE post_id='$post_id'";
                      $result1=mysqli_query($connect,$query1);
                      while($row1=mysqli_fetch_array($result1))
                      {                       
                      $comment_id=$row1['comment_id'];
                      $query2="SELECT * FROM tbl_reply WHERE comment_id='$comment_id'";
                      $result2=mysqli_query($connect,$query2);
                      while($row2=mysqli_fetch_array($result2)){
                      $a++;                                         
                      $date=$row2['date'];
                      $time=$row2['time'];
                      $date_time=$date." ".$time;
                      ?>
                  <tr>
                    <td>
                    <?php echo $a,("."); ?>
                    </td>
                     <th scope="row">
                     <a class="btn text-dark btn-sm" href="code/deletereply.php?reply_id=<?php echo $row2['reply_id']; ?>"><i class="fa fa-trash"></i></a>
                    </th>
                    <td><?php echo $row2['name']; ?></td>
                    <td><?php echo $row2['email'];?></td>
                    <td><?php echo $row2['replymessage'];?></td>
                    <td><?php date_default_timezone_set('Asia/Kolkata'); echo comment_time($date_time);?></td>
                   
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
</section>












                  