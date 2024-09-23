<?php
include("header.php");
include("../config.php");
$query="SELECT * FROM tbl_category ORDER BY cate_id DESC";
$result=mysqli_query($connect,$query);
?>
<section id="category">
 <div class="container-fluid bg-gradient-secondary"style="min-height: 100vh;">
      <!-- Table -->
      <div class="row">
        <div class="col mb-5" style="margin-top: 84px;">
          <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0 text-dark">Manage Category</h3>
                </div>
                <div class="col text-right">
                  <button type="button" class="btn btn-sm btn-dark"data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><img src="../img/baseline_add_circle_outline_white_18dp.png" class="img-fluid"> Add</button>
                </div>
              </div>
            </div>
            <div class="table-responsive">              
              <table class="table align-items-center table-flush" id="myTable">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">SN</th>
                    <th scope="col">Category Name</th>
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
                  <tr style="padding: 0px">
                    <td>
                    <?php echo $a,("."); ?>
                    </td>
                    <td>
                          <span class="mb-0 text-sm text-wrap"><?php echo $row['catename'];?></span>
                    </td>
                    <td >              
                     <a class="btn text-dark btn-sm" href="code/delete.php?cateid=<?php echo$row['cate_id'];?>"><i class="fa fa-trash"></i></button></a>
                    </td>
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
<!-----------Modal Here---------->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel">Add Category</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="needs-validation" novalidate action="code/addcatecode.php" method="post">
  <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationCustom04">Category Name</label>
      <input type="text" class="form-control" placeholder="Category Name" name="catename" id="validationCustom04" required>
      <div class="invalid-feedback">
        Please fill Category name.
      </div>
    </div>
  </div>
  

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
      <div class="modal-footer">
        <button type="button" class="btn bg-secondary" data-dismiss="modal">Close</button>
        <button class="btn text-white bg-dark" type="submit">Save</button>
      </div>
    </form>
      </div>
    </div>
  </div>
</div>
