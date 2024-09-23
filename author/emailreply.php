<link rel="stylesheet" type="text/css" href="../css/404notfound.css">
<?php
if(isset($_REQUEST['ereply']))
{
include("header.php");
include("../config.php");
$ereply=$_REQUEST['ereply'];
$query="SELECT * FROM tbl_newsletter WHERE news_id='$ereply'";
$result=mysqli_query($connect,$query);
if($row=mysqli_fetch_array($result))
{
  $email=$row['email'];
}
?>
 <div class="container-fluid bg-gradient-secondary" style="min-height: 100vh">
    <div class="row">
        <div class="col mb-5" style="margin-top: 100px;">
          <div class="card shadow">
            <div class="card-header border-0">
               <div class="row">
                  <div class="col"> <h3 class="text-dark">Newsletter Reply</h3></div>
                  <div class="col">
                     <a href="newsletter.php" class="float-right"><button type="button" class="btn text-white btn-dark btn-sm">Back</button></a>
                  </div>
                </div> 
          </div>
<form class="pr-4 pl-4" action="newslettermail.php" method="POST" id="validate_form"  enctype="multipart/form-data">
  <input type="text" value="<?php echo $ereply?>" hidden name="ereply">
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="Name">Name</label>
      <input type="text" name="name"placeholder="Name" class="form-control" required>
    </div>
     <div class="col-md-4 mb-3">
      <label for="Email">Email</label>
      <input type="email" name="email"placeholder="Email" value="<?php echo $email ?>" readonly pattern="^[a-z A-Z0-9.@]+$" class="form-control" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="Subject">Subject</label>
      <input type="text" name="subject"placeholder="Subject" pattern="^[a-z A-Z0-9]+$" class="form-control" required>
    </div>
  </div>
  <div class="form-row">     
    <div class="col-md-12 mb-3">
      <label for="Reply">Reply Message</label>
      <textarea class="form-control" name="replymessage" placeholder="Reply Message Here.." required></textarea>
    </div>
  </div>
<input type="submit" name="submit" value="Send" id="submit"class="btn text-white btn-sm btn-dark mb-3 mt-3 mr-3 float-right">
</form>
</div>
</div>
</div>
</div>
<?php
}
else{
 ?>
<section  style="margin-top: 100px;" id="opps">
<center>
<p class="opps">404</p>
<p class="display-2">Ooops!!</p>
<span>THAT PAGE DOESN'T EXIST OR IS UNAVAILABLE.</span><br/>
<a href="home.php"><button>Go Back To Home</button></a>
</center>
</section>
<?php
}
?>