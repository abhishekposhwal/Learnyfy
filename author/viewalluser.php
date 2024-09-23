<?php
include("header.php");
include("../config.php");
$query="SELECT * FROM tbl_user ORDER BY id DESC";
$result=mysqli_query($connect,$query);
?>
<section id="category">
 <div class="container-fluid bg-gradient-secondary"style="min-height: 100vh;">
      <!-- Table -->
      <div class="row">
        <div class="col mb-5" style="margin-top: 84px;">
          <div class="card shadow border-0">
            <div class="card-header border-0">
                <h3 class="text-dark">All Users</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush"id="myTable">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">SN</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Email</th>
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
                    <th scope="row"><?php echo $row['name'];?></th>
                    <td><?php echo $row['email'];?></td>
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