<?php
include("header.php");
include("../config.php");
function load_category()
{  
  include("../config.php");
  $output='';
  $query="SELECT * FROM tbl_category ORDER BY cate_id DESC";
  $result=mysqli_query($connect,$query);
  while($row=mysqli_fetch_array($result))
  {
        $output .='<option value="'.$row['cate_id'].'">'.$row["catename"].'</option>';
  }
  return $output;
}
?>
 <div class="container-fluid bg-gradient-secondary" style="min-height: 100vh">
    <div class="row">
        <div class="col mb-5" style="margin-top: 100px;">
          <div class="card shadow">
            <div class="card-header border-0">
               <div class="row">
                  <div class="col"><h3 class="mb-0 text-dark">Add Posts</h3></div>
                  <div class="col">
                     <a href="post.php" class="float-right"><button type="button" class="btn text-white btn-dark btn-sm" >Back</button></a>
                  </div>
                </div> 
          </div>
<form class="pr-4 pl-4" action="code/postcode.php" method="POST" enctype="multipart/form-data">
  <div class="form-row">
    <div class="col-md-8 mb-3">
      <label for="Headline">Headline</label>
      <input id="editor1"type="text" name="headline"placeholder="Headline" maxlength="50" class="form-control" required>
    </div>
     <div class="col-md-4 mb-3">
      <label for="Category">Category</label>
      <select class="form-control" name="postcategory" required>
        <option selected disabled value="">Choose...</option>
        <?php echo load_category(); ?>
      </select>
    </div>
  </div>
  <div class="form-row">     
    <div class="col-md-12 mb-3">
      <label for="Description">Decription</label>
      <textarea id="editor2" class="form-control" rows="8" name="description" maxlength="5000" placeholder="Description Here.." required></textarea>
    </div>
  </div>
  <div class="form-row">     
    <div class="col-md-12 mb-3">
      <label for="Quotes">Quotes</label>
      <textarea id="editor3" class="form-control" maxlength="300" name="quotes" placeholder="Quotes Here.." required></textarea>
    </div>
  </div>
  <div class="form-row">     
    <div class="col-md-12 mb-3">
      <label for="Header Pic">Header Pic</label>
      <input type="file" name="headerpic" class="form-control" required="">
    </div>
  </div>
  <div class="form-row">     
    <div class="col-md-6 mb-3">
      <label for="Picture1">Picture (1)</label>
      <input type="file" name="picture1" class="form-control" required>
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
<script type="text/javascript" >
  CKEDITOR.replace('editor1');
  CKEDITOR.replace('editor2');
  CKEDITOR.replace('editor3');
</script>