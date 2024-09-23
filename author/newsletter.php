<?php
include("header.php");
include("../config.php");
error_reporting(0);
$msg=$_REQUEST['msg'];
$query="SELECT * FROM tbl_newsletter ORDER BY news_id DESC";
$result=mysqli_query($connect,$query);
if(isset($msg)){
if($msg==1)
{
?>
<script type="text/javascript">
    swal("Good job!", "Email is Successfully Send.","success");
</script>
<?php
}
else{
?>
<script type="text/javascript"> 
   swal("Opps..!", "Email is Not Send.Please Try Again.","error");
</script>
<?php
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
                <h3>All Newsletter</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-centertable-flush" id="myTable">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">SN</th>
                    <th scope="col">email</th>
                    <th scope="col">Reply</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                 <?php
                  $a=0;
                     while($row=mysqli_fetch_array($result))
                     {
                      $a++;
                  ?>
                  <tr>
                    <td><?php echo $a,("."); ?></td>
                    <th scope="row"><?php echo $row['email'];?></th>
                    <td><a class="btn text-dark btn-sm" href="emailreply.php?ereply=<?php echo $row['news_id'];?>"><i class="fa fa-reply"></i></button></a></td>
                    <td><a href="code/newsletterdeletecode.php?news_id=<?php echo $row['news_id']?>"><i class="fa fa-trash text-dark"></i></a></td>
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