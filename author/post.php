<?php
include("header.php");
include("../config.php");
$query="SELECT * FROM tbl_post ORDER BY post_id DESC";
$result=mysqli_query($connect,$query);
error_reporting(0);
$msg=$_REQUEST['msg'];

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
if($msg==1){
?>
<script type="text/javascript">
 $(document).ready(function(){
  swal("Good job!", "Post Successfully Update","success");
 })
</script>
<?php } ?>

<section id="category">
 <div class="container-fluid bg-gradient-secondary" style="min-height: 100vh;">
      <!-- Table -->
      <div class="row">
        <div class="col mb-5" style="margin-top: 84px;">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row">
                  <div class="col"><h3 class="mb-0 text-dark">Manage Posts</h3></div>
                  <div class="col">
                    <a href="addpost.php" class=" float-right"><button type="button" class="btn text-white btn-dark btn-sm"><img src="../img/baseline_add_circle_outline_white_18dp.png" class="img-fluid"> Post</button></a>
                  </div>
              </div>         
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush"id="myTable">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">SN</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete </th>
                    <th scope="col">Time Ago</th>
                    <th scope="col">Header Pic</th>
                    <th scope="col">Picture 1</th>
                    <th scope="col">Picture 2</th>
                    <th scope="col">Headline</th>
                    <th scope="col">Category</th>
                    <th scope="col">Description</th>
                    <th scope="col">Quotes</th>                  
                  </tr>
                </thead>
                <tbody>
                     <?php 
                      $a=0;
                     while ($row=mysqli_fetch_array($result)) {
                       $a++;
                       $categoryid=$row["category"];
                       $date=$row['date'];
                       $time=$row['time'];
                       $date_time=$date." ".$time;
                       $query3="SELECT * FROM tbl_category WHERE cate_id='$categoryid'";
                       $result3=mysqli_query($connect,$query3);
                       if($row3=mysqli_fetch_array($result3))
                       {
                        $category=$row3["catename"];
                       }
                       else{
                        $category="None";
                       }
                     ?>
                  <tr data-aos="fade-right">
                    <td><?php echo $a;; ?></td>
                    <td>
                     <a class="btn btn-sm text-dark" href="editpost.php?post_id=<?php echo $row['post_id'];?>"><i class="fa fa-edit"></i></a>
                    </td>
                    <td><a class="btn btn-sm text-dark"href="code/deletepostcode.php?post_id=<?php echo $row['post_id'];?>"><i class="fa fa-trash"></a></td>
                      <td><?php date_default_timezone_set('Asia/Kolkata'); echo post_time($date_time);?></td>
                    <td class="">
                      <img class="img-fluid"src="adminuploads/<?php echo $row["headerpic"]; ?>" >   
                    </td>
                     <td>
                      <img class="img-fluid"src="adminuploads/<?php echo $picture1=$row["picture1"]; ?>" >
                    </td>
                     <td class="">                      
                      <img class="img-fluid"src="adminuploads/<?php echo $picture1=$row["picture2"]; ?>" >
                    </td>
                    <td><span class="mb-0 text-sm"><?php echo $row["headline"]; ?></span></td>
                    <td class="text-wrap">
                      <?php echo $category; ?>
                    </td>
                    <td class="">
                      <?php echo $row['description'];?>
                    </td>
                    <td class="">
                      <?php echo $row["quotes"]; ?>
                    </td>
                    
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

