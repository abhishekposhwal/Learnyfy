<?php 
error_reporting(0);
$msg=$_REQUEST['msg'];
include 'header.php';

$query="SELECT * FROM tbl_category ORDER BY cate_id DESC LIMIT 8";
$result=mysqli_query($connect,$query);
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
if($msg==2){
?>
<script type="text/javascript">
 $(document).ready(function(){
  swal("Good job!", "You Successfully Logout","success");
 })
</script>
<?php } ?>

 <!-- start banner Area -->
            <section class="banner-area relative blog-home-banner" id="home">   
                <div class="overlay overlay-bg"></div>
                <div class="container">             
                    <div class="row d-flex align-items-center justify-content-center">
                        <div class="about-content blog-header-content col-lg-12">
                            <h1 class="text-white">
                                 Learn at The <span style="color: #8490FF">Comfort</span> of Your Own Home         
                            </h1>   
                            <p class="text-white">
                                Think out of the box and create a learning experience where the learner can interact with the content and their brains.
                            </p>
                             <a class="primary-btn" data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();">Login</a>
                        </div>  
                    </div>
                </div>
            </section>
  <!-- End banner Area -->                  

<!-- Start Sign in And Sing Up Area -->
<div class="container">
    <center>
        <div class="modal fade login" id="loginModal">
              <div class="modal-dialog login animated">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h3 class="modal-title">Login Here</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>                        
                    </div>
                    <div class="modal-body">
                        <div class="box">
                             <div class="content">
                                <div class="social-links">
                                   <i class="lnr lnr-user" style="font-size: 75px"></i>
                                </div>
                                <div class="division mt-1">
                                    <div class="line l"></div>
                                      <p></p>
                                    <div class="line r"></div>
                                </div>
                                <?php if ($msg==1) {  ?>                                
                                <div class="alert alert-danger">
                                    Invalid email/password combination
                                </div>
                                <?php
                                }?>  
                                <div class="form loginBox">
                                    <form method="POST" action="code/signincode.php" accept-charset="UTF-8">
                                    <input id="email" class="form-control" type="text" placeholder="Email" name="email">
                                    <input class="form-control" type="password" placeholder="Password" name="password">
                                    <input class="btn btn-dark btn-login" type="submit" value="Sign in">
                                    </form>
                                </div>
                             </div>
                        </div>
                        <div class="box">
                            <div class="content registerBox" style="display:none;">
                             <div class="form">
                                <form accept-charset="UTF-8" id="validate_form" class="text-left">
                                  <input class="form-control mt-1" placeholder="Name"data-parsley-pattern="^[a-z A-Z]+$" data-parsley-trigger="keyup"  name="name" type="text" required>

                                  <input class="form-control" data-parsley-type="email" data-parsley-trigger="keyup" placeholder="E-Mail"  name="email" type="email" required>

                                  <input class="form-control" placeholder="Password" data-parsley-length="[6,8]" data-parsley-trigger="keyup" id="password" name="password" type="password" required>

                                 <input class="form-control" placeholder="Confirm Password" data-parsley-equalto="#password" id="confirm_password" data-parsley-trigger="keyup" type="password" required>

                                <input class="btn btn-default btn-register" type="submit" value="Create account"id="submit">
                                </form>
                            </div>
                           </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="forgot login-footer">
                            <span>Looking to
                                 <a href="javascript: showRegisterForm();">Create an account</a>
                            ?</span>
                        </div>
                        <div class="forgot register-footer" style="display:none">
                             <span>Already have an account?</span>
                             <a href="javascript: showLoginForm();">Login</a>
                        </div>
                    </div>
                  </div>
              </div>
          </div>
    </center>
</div>
<!-- End Sign in And Sing Up Area -->
<?php 
$query7="SELECT * FROM tbl_category";
$result7=mysqli_query($connect,$query7);
?>

    <!-- Start top-category-widget Area -->
            <section class="top-category-widget-area pt-90 pb-90 ">
                <div class="container">
                    <div class="row justify-content-center">
                    <?php
                      while($row7=mysqli_fetch_array($result7))
                      {
                        $catename=$row7['catename'];
                        if($catename=="Gym")
                        {
                          $cate_id=$row7['cate_id'];

                    ?>       
                        <div class="col-lg-4 col-md-4 col-9">
                            <div class="single-cat-widget">
                                <div class="content relative">
                                    <div class="overlay overlay-bg"></div>
                                    <a href="post-category.php?cateid=<?php echo $cate_id;?>" target="_blank">
                                      <div class="thumb">
                                         <img  style="height: 220px" class="content-image img-fluid d-block mx-auto" src="img/classes-1.jpg" alt="">
                                      </div>
                                      <div class="content-details">
                                        <h4 class="content-title mx-auto text-uppercase"><?php echo $catename?></h4>
                                        <span></span>                                       
                                        <p>We care about your health</p>
                                      </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php 
                         }
                        elseif($catename=="Food")
                        {
                          $cate_id=$row7['cate_id'];
                        ?>
                        <div class="col-lg-4 col-md-4 col-9">
                            <div class="single-cat-widget">
                                <div class="content relative">
                                    <div class="overlay overlay-bg"></div>
                                    <a href="post-category.php?cateid=<?php echo $cate_id;?>" target="_blank">
                                      <div class="thumb">
                                         <img style="height: 220px" class="content-image img-fluid d-block mx-auto" src="img/6.jpg" alt="">
                                      </div>
                                      <div class="content-details">
                                        <h4 class="content-title mx-auto text-uppercase"><?php echo $catename?> </h4>
                                        <span></span>                                       
                                        <p>Let the food be finished</p>
                                      </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        elseif($catename=="Sport")
                        {
                          $cate_id=$row7['cate_id'];
                        ?>
                        <div class="col-lg-4 col-md-4 col-9">
                            <div class="single-cat-widget">
                                <div class="content relative">
                                    <div class="overlay overlay-bg"></div>
                                    <a href="post-category.php?cateid=<?php echo $cate_id;?>" target="_blank">
                                      <div class="thumb">
                                         <img style="height: 220px"class="content-image img-fluid d-block mx-auto" src="img/gallery-7.jpg" alt="">
                                      </div>
                                      <div class="content-details">
                                        <h4 class="content-title mx-auto text-uppercase"><?php echo $catename?></h4>
                                        <span></span>
                                        <p>Be a part of Sport</p>
                                      </div>
                                    </a>
                                </div>
                            </div>
                        </div> 
                        <?php 
                        }
                        }
                        ?>                                             
                    </div>
                  </div>
                </div>  
            </section>
        <!-- End top-category-widget Area -->
            
        <!-- Start post-content Area -->
            <section class="post-content-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 posts-list col-md-8">
                          <!-- Load Post fetch.php -->
                           <div  id="load_data"></div>
                           <center><div class="mb-5" id="load_data_message"></div></center>

                        </div>
                        <div class="col-lg-4 sidebar-widgets col-md-4">
                            <div class="widget-wrap">
                                <div class="single-sidebar-widget search-widget">
                                    <form class="search-form" action="search.php" method="POST">
                                        <input style="outline: none;" placeholder="Search Posts" name="q" type="text" pattern="^[a-z A-Z]+$" required="required" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Posts'" >
                                        <button type="submit" style="outline: none;"><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                                <div class="single-sidebar-widget user-info-widget">
                                <img style="padding: 4px;background: #fff;height: 120px" src="img/53.jpg" class="rounded-circle shadow" alt=""><h4 class="mt-3">Abhishek Poshwal</h4>
                                <p>
                                  Junior Writer
                                </p>
                                <ul class="social-links">
                                  <li><a target="_blank" href="https://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
                                  <li><a target="_blank" href="https://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
                                  <li><a target="_blank" href="https://www.instagram.com"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                                <p>
                                  Hey everyone, I’m Abhishek and  thanks to you visiting this Learnyfy. I live in Amroha with my family. I started developing Learnyfy in the year 2021. I was frequently asked for my article  from friends and family members. one day I thought, why not to spread my knowledge to the world.So I started developing Learnyfy. My Learnyfy is constantly changing and growing as I learn more. It truly is an art. I hope you enjoying the Learnyfy.
                                </p>
                              </div>
                                <div class="single-sidebar-widget popular-post-widget">
                                    <h4 class="popular-title">Popular Posts</h4>
                                    <div class="popular-post-list">
                                        <?php 
                                         $query2="SELECT * FROM tbl_post ORDER BY post_id DESC LIMIT 6";
                                         $result2=mysqli_query($connect,$query2);
                                         $countpost=mysqli_num_rows($result2);
                                         if($countpost>0)
                                          {
                                         while($row2=mysqli_fetch_array($result2))
                                         {
                                          $date=$row2['date'];
                                          $time=$row2['time'];
                                          $date_time=$date." ".$time;
                                        ?>
                                        <div class="single-post-list d-flex align-items-center">
                                            <div class="thumb">
                                                <img class="img-fluid shadow" style="width: 90px;height: 55px; padding: 4px;background: #fff" src="author/adminuploads/<?php echo $row2["headerpic"]; ?>" alt="Header pic" >
                                            </div>
                                            <div class="details">
                                                <a href="blog-single.php?post_id=<?php echo $row2['post_id']; ?>"><h6><?php echo $row2['headline']; ?></h6></a>
                                                <p><?php date_default_timezone_set('Asia/Kolkata'); echo post_time($date_time);?></p>
                                            </div>
                                        </div>
                                        <?php
                                         }
                                        }
                                        else{
                                          echo "<h2 class='text-center mt-5 text-danger'><i class='fa fa-frown-o' style='font-size:25px;'></i> Opps..!</h2><br/> <h4 class='text-center mb-1'>No Popular Post<p style='font-size: 15px;font-weight: 200'> upload Comming Soon...</p></h4>";
                                        }
                                        ?>                                                         
                                    </div>
                                </div>                                
                                <div class="single-sidebar-widget post-category-widget">
                                    <h4 class="category-title">Post Catgories</h4>
                                    <ul class="cat-list">
                                        <?php
                                           $count=mysqli_num_rows($result);
                                           if($count>0)
                                            { 
                                          while($row=mysqli_fetch_array($result))
                                            {
                                             $cate_id=$row['cate_id'];
                                             $query5="SELECT * FROM tbl_post WHERE category='$cate_id'";
                                             $result5=mysqli_query($connect,$query5);
                                             $countcate=mysqli_num_rows($result5);
                                          ?>
                                        <li>
                                            <a href="post-category.php?cateid=<?php echo $cate_id;?>" class="d-flex justify-content-between">
                                                <p><?php echo $row['catename'];?></p>
                                                <p><?php 
                                                if($countcate>0)                                 
                                                  echo $countcate;
                                                else
                                                  echo "0";
                                                ?></p>
                                            </a>
                                        </li> 
                                        <?php
                                             }
                                           }
                                           else{
                                            echo "<h2 class='text-center mt-5 text-danger'><i class='fa fa-frown-o' style='font-size:25px;'></i> Opps..!</h2><br/> <h4 class='text-center mb-1'>No Category<p style='font-size: 15px;font-weight: 200'> upload Comming Soon...</p></h4>";
                                           }
                                         ?>                                                         
                                    </ul>
                                </div>
                                <div class="single-sidebar-widget tag-cloud-widget">
                                    <h4 class="tagcloud-title">Tag Clouds</h4>
                                    <ul>
                                        <?php                                         
                                         $query4="SELECT * FROM tbl_category ORDER BY cate_id DESC LIMIT 14";
                                         $result4=mysqli_query($connect,$query4);
                                         $count=mysqli_num_rows($result4);
                                           if($count>0)
                                            { 
                                         while($row4=mysqli_fetch_array($result4))
                                         {
                                        ?>
                                        <li><a href="post-category.php?cateid=<?php echo $row4['cate_id'];?>"><?php echo $row4['catename'];?></a></li>
                                        <?php
                                        }
                                        }
                                        else
                                        {
                                          echo "<h2 class='text-center mt-5 text-danger'><i class='fa fa-frown-o' style='font-size:25px;'></i> Opps..!</h2><br/> <h4 class='text-center mb-1'>No Tags<p style='font-size: 15px;font-weight: 200'> upload Comming Soon...</p></h4>";
                                        } 
                                        ?>
                                    </ul>
                                </div>                              
                            </div>
                        </div>
                    </div>
                </div>  
            </section>
            <!-- End post-content Area -->
<script type="text/javascript">
    $(document).ready(function(){
        openLoginModal();
    });
</script>

<script type="text/javascript">
  $(document).ready(function() {
     $('#validate_form').parsley();

     $('#validate_form').on('submit',function(event){
      event.preventDefault();
      if($('#validate_form').parsley().isValid())
      {
        // alert($(this).serialize());
        $.ajax({
            url:"code/registercode.php",
            method:"POST",
            data:$(this).serialize(),
            beforeSend:function(){
              $('#submit').attr('disabled','disabled');
              $('#submit').val('Processing...');
            },
            success:function(data)
            {
              $('#validate_form')[0].reset();
              $('#validate_form').parsley().reset();
              $('#submit').attr('disabled',false);
              $('#submit').val('Create account');
              if(data=="0")
              {
                swal("Opps..!", "E-mail already inserted.Please Try Again.","error");
              }
              else{                
                swal("Good job!", "You Successfully Registred || Sign in Now","success");
                // alert(data);
              }

            }
        });
      }
     });
  });
</script>

<!-- Start load Post from fetch.php  -->

<script type="text/javascript">
  $(document).ready(function() {
      var limit=1;
      var start=0;
      var action='inactive';
      function load_post(limit,start)
      {
        $.ajax({
         url:"fetch_post.php",
         method:"POST",
         data:{limit:limit, start:start},
         cache:false,
         success:function(data)
         {
          $('#load_data').append(data);
          if(data=='')
          {
            $('#load_data_message').html("<button type='button' class='btn btn-danger ml-5 '>No Posts Found</button>");
          }
          else{
             $('#load_data_message').html("<button type='button' class='primary-btn'><i class='fa fa-spin fa-refresh mr-2' style='font-size:13px;'></i> Loading Data </button>");
              action="inactive";
          }
         }
        });
      }
      if(action=='inactive')
      {
        action='active';
        load_post(limit,start);
      }
      $(window).scroll(function(){
        if($(window).scrollTop() + $(window).height()> $("#load_data").height() && action=='inactive')
        {
          action="active";
          start=start+limit;
          setTimeout(function(){
            load_post(limit,start);
          },1000);
        }
      });
    });
</script>
<!-- End load Post from fetch.php  -->
<?php 
include 'footer.php';
?>