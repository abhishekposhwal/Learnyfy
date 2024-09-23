<?php 
include 'counter.php';
?>
<!-- start footer Area -->
            <footer class="footer-area section-gap">
                <div class="container text-white">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-5 col-md-5 col-sm-5">
                            <div class="single-footer-widget">
                                <a href="userindex.php"><i class="fa fa-renren text-white ml-1" style="font-size: 35px"></i><sup><sup><sub><sub><sup><sub><span style="font-size: 17px;" class="text-white ml-1"> Learnyfy</span></sub></sup></sub></sub></sup></sup></a>
                                <p class="mt-2">
                                   The purpose of creating this website is that people can get help from our articles. Different articles come on Learnyfy every day. So you guys were reading these articles and getting the knowledge. <span>Thank You for <i class="fa fa-heart  text-danger" style="font-size: 10px"></i> </span>
                                </p>
                                <p class="footer-text">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This Website is made  by <a href="user_about.php" target="_blank">Abhishek Poshwal</a></p>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-4">
                            <div class="single-footer-widget justify-content-center">
                                <p class="h4 text-white mb-2">Newsletter</p>
                                <p>Stay updated with our latest trends</p>
                               <div id="mc_embed_signup" >
                                  <form id="validate_newsform">
                                   <input type="email" class="col-8" style="padding:8px"placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" required="" name="email">
                                   <input type="submit" name="subscribe" id="subscribe" value="Send" class="primary-btn col-8 mt-2"> 
                                 </form> 
                               </div>
                             </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-3 social-widget">        
                            <div class="single-footer-widget">
                                <p class="h4 text-white mb-2">Visitors</p>
                                <span class="text-white h5"><i class="fa fa-eye mr-1 mb-3"></i> <?php echo$total_visitor?></span>
                            </div>
                            <div class="single-footer-widget">
                                <p class="h4 text-white mb-2">Follow Me</p>
                                <p>Let us be social</p>
                                <div class="footer-social justify-content-center" style="margin-left: -10px">
                                    <a target="_blank" href="https://www.facebook.com"><i class="fa fa-facebook"></i></a>
                                    <a target="_blank" href="https://www.twitter.com"><i class="fa fa-twitter"></i></a>
                                    <a target="_blank" href="https://www.instagram.com"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- End footer Area -->    
<script type="text/javascript">
  $(document).ready(function() {
    $('#validate_newsform').parsley();

     $('#validate_newsform').on('submit',function(event){
      event.preventDefault();
      if($('#validate_newsform').parsley().isValid())
      {
          // alert($(this).serialize());
        $.ajax({
            url:"code/newslettercode.php",
            method:"POST",
            data:$(this).serialize(),
            beforeSend:function(){
              $('#subscribe').attr('disabled','disabled');
              $('#subscribe').val('Please Wait...');
            },
            success:function(data)
            {
              $('#validate_newsform')[0].reset();
              $('#validate_newsform').parsley().reset();
              $('#subscribe').attr('disabled',false);
              $('#subscribe').val('Send');
              // alert(data);
              if(data=="0")
              {
                swal("Opps..!", "Already Subscribing Our Newsletter.Please Check Your Email.","error");
              }
              else{                
                swal("Good job!", "Thank You For Subscribing Our Newsletter.Please Check Your Email.","success");
                // alert(data);
              }

            }
        });
      }
        });
     });
</script>