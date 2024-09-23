<link rel="stylesheet" type="text/css" href="../css/404notfound.css">
<?php
if(isset($_REQUEST['post_id']))
{
include("header.php");
include("../config.php");
$post_id=$_REQUEST['post_id'];
$query="SELECT * FROM tbl_post WHERE post_id='$post_id'";
$result=mysqli_query($connect,$query);
if($row=mysqli_fetch_array($result))
{
$categoryid=$row["category"];
$headline=$row["headline"];
$description=$row["description"];
$quotes=$row["quotes"];
$headerpic=$row["headerpic"];
$picture1=$row["picture1"];
$picture2=$row["picture2"];

}
?>
 <div class="container-fluid bg-gradient-secondary" style="min-height: 100vh">
    <div class="row">
        <div class="col mb-5" style="margin-top: 100px;">
          <div class="card shadow">
            <div class="card-header border-0">
               <div class="row">
                  <div class="col"><h3 class="mb-0 text-dark">Edit Post</h3></div>
                  <div class="col">
                     <a href="post.php" class="float-right"><button type="button" class="btn text-white btn-dark btn-sm" >Back</button></a>
                  </div>
                </div> 
          </div>
<form class="pr-4 pl-4" action="code/editpostcode.php" method="POST" id="validate_form"  enctype="multipart/form-data">
  <input type="text" value="<?php echo $post_id?>" name="post_id" hidden>
  <div class="form-row">
    <div class="col-md-8 mb-3">
      <label for="Headline">Headline</label>
      <input type="text" value="<?php echo$headline?>" name="headline"placeholder="Headline" maxlength="50" data-parsley-pattern="^[a-z A-Z]+$" data-parsley-trigger="keyup" class="form-control" required>
    </div>
     <div class="col-md-4 mb-3">
      <label for="Category">Category</label>
      <select class="form-control" name="postcategory" required>
        <option disabled value="">Choose...</option>
        <?php 
        $query1="SELECT * FROM tbl_category ORDER BY cate_id DESC";
        $result1=mysqli_query($connect,$query1);
        while($row1=mysqli_fetch_array($result1))
        {
        $cate_id=$row1['cate_id'];
        if($cate_id==$categoryid){
        echo $output .='<option  selected value="'.$row1['cate_id'].'">'.$row1["catename"].'</option>';
        }
        else{
       echo $output .='<option value="'.$row1['cate_id'].'">'.$row1["catename"].'</option>';
       }
     }
        ?>
      </select>
    </div>
  </div>
  <div class="form-row">     
    <div class="col-md-12 mb-3">
      <label for="Description">Decription</label>
      <textarea class="form-control" name="description" maxlength="5000" rows="6" placeholder="Description Here.." required><?php echo $description ?></textarea>
    </div>
  </div>
  <div class="form-row">     
    <div class="col-md-12 mb-3">
      <label for="Quotes">Quotes</label>
      <textarea class="form-control" maxlength="300" rows="3" name="quotes" placeholder="Quotes Here.." required><?php echo $quotes ?></textarea>
    </div>
  </div>
  <div class="form-row">     
    <div class="col-md-12 mb-3">
      <label for="Header Pic">Header Pic</label>
      <input type="file" name="headerpic" value="<?php echo $headerpic ?>" class="form-control" required="">
    </div>
  </div>
  <div class="form-row">     
    <div class="col-md-6 mb-3">
      <label for="Picture1">Picture (1)</label>
      <input type="file" name="picture1"  value="<?php echo $picture1 ?>"class="form-control" required>
    </div>
    <div class="col-md-6 mb-3">
      <label for="Picture 2">Picture (2)</label>
      <input type="file" name="picture2" class="form-control" required="required">
    </div>
  </div>
<button type="submit" name="submit" value="Save" id="submit"class="btn text-white btn-sm btn-dark mb-3 mt-3 mr-3 float-right">Post</button>
</form>
</div>
</div>
</div>
</div>
<script>
<script type="text/javascript">
  $(document).ready(function() {
     $('#validate_form').parsley();
     $('#validate_form').on('submit',function(event){
      event.preventDefault();
       
     });
  });
</script>
<?php
}
else{
 echo '<section  style="margin-top: 100px;" id="opps">
<center>
<p class="opps">404</p>
<p class="display-2">Ooops!!</p>
<span>THAT PAGE DOESNT EXIST OR IS UNAVAILABLE.</span><br/>
<a href="home.php"><button>Go Back To Home</button></a>
</center>
</section>';
}
?>