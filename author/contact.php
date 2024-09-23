<?php
include("header.php");
include("../config.php");
$query="SELECT * FROM tbl_contact ORDER BY contact_id DESC";
$result=mysqli_query($connect,$query);
function contact_time($timestamp)
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
               <h3>All Contacts</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush"id="myTable">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">SN</th>
                    <th scope="col">action</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Message</th>
                    <th scope="col">time ago</th>                    
                  </tr>
                </thead>
                <tbody>
                 <?php
                  $a=0;
                     while($row=mysqli_fetch_array($result))
                     {
                      $a++;
                       $date=$row['date'];
                       $time=$row['time'];
                       $date_time=$date." ".$time;
                  ?>
                  <tr>
                    <td><?php echo $a,("."); ?></td>
                    <th scope="row">
                     <a class="btn text-dark btn-sm" href="code/deletecontactcode.php?contact_id=<?php echo $row['contact_id'];?>"><i class="fa fa-trash"></i></button></a>
                    </th>
                    <th scope="row"><?php echo $row['name'];?></th>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['subject'];?></td>
                    <td><?php echo $row['message'];?></td>
                    <td><?php date_default_timezone_set('Asia/Kolkata'); echo contact_time($date_time);?></td>                    
                  </tr>
                    <?php
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