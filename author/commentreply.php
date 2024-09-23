<?php
include("header.php");
include("../config.php");
$comment_id=$_REQUEST['comment_id'];
?>
 <div class="container-fluid bg-gradient-secondary" style="min-height: 100vh">
    <div class="row">
        <div class="col mb-5" style="margin-top: 100px;">
          <div class="card shadow">
            <div class="card-header border-0">
               <div class="row">
                  <div class="col"> <h3 class="text-dark">Comments Reply</h3></div>
                  <div class="col">
                     <a href="comment.php" class="float-right"><button type="button" class="btn text-white btn-dark btn-sm">Back</button></a>
                  </div>
                </div> 
          </div>
          <form class="pr-4 pl-4" action="code/replycode.php" method="POST" id="validate_form"  enctype="multipart/form-data">
           <input type="text" value="<?php echo $comment_id?>" hidden name="comment_id">
           <div class="form-row">
             <div class="col-md-6 mb-3">
               <label for="Name">Name</label>
               <input type="text" name="name"placeholder="Name" value="@Admin" class="form-control" required>
             </div>
              <div class="col-md-6 mb-3">
               <label for="Email">Email</label>
               <input type="email" name="email"placeholder="Email" pattern="^[a-z A-Z0-9.@]+$" class="form-control" required>
             </div>
           </div>
           <div class="form-row">     
           <div class="col-md-12 mb-3">
             <label for="Reply">Reply Message</label>
             <textarea class="form-control" name="replymessage" placeholder="Reply Message Here.." required></textarea>
           </div>
           </div>
            <input type="submit" name="submit" value="Save" id="submit"class="btn text-white btn-sm btn-dark mb-3 mt-3 mr-3 float-right">
         </form>
         </div>
      </div>
    </div>
</div>