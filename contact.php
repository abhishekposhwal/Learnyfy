<?php include 'header.php';?>
<!-- start banner Area -->
		<section class="relative" style="background:linear-gradient(to right,rgba(0,0,0,0.4),rgba(0,0,0,0.8)), url(img/banner.png); background-size: cover;">	
			<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Contact Us				
							</h1>	
							<p class="text-white link-nav"><a href="index.php">Home </a>   / <a href="blog-single.php"> Contact</a></p>
						</div>	
					</div>
				</div>
		</section>
			<!-- End banner Area -->				  

			<!-- Start contact-page Area -->
			<section class="contact-page-area section-gap">
				<div class="container">
					<div class="row">
						<div class="map-wrap mr-2 ml-2" style="width:100%; height: 445px;">
							<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d906318.2557964388!2d80.7021075!3d27.4597411!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3999564739139993%3A0xef00599b440e8f94!2sAnna%20Market!5e0!3m2!1sen!2sin!4v1596008917070!5m2!1sen!2sin" width="100%" height="445px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
						</div>
						<div class="col-lg-4 d-flex flex-column address-wrap">
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-home"></span>
								</div>
								<div class="contact-details">
									<h5>Anna Market, Lucknow</h5>
									<p>
										226020 Anna Market Preeti Nagar  Road
									</p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-phone-handset"></span>
								</div>
								<div class="contact-details">
									<h5>+917458847451</h5>
									<p>Mon to Fri 9am to 6 pm</p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-envelope"></span>
								</div>
								<div class="contact-details">
									<h5>abhishek.poshwal987@gmail.com</h5>
									<p>Send us your query anytime!</p>
								</div>
							</div>														
						</div>
						<div class="col-lg-8">
							<form class="form-area contact-form text-right" id="MyForm" action="mail.php" method="post">
								<div class="row">	
									<div class="col-lg-6 form-group">
										<input name="name"data-parsley-pattern="^[a-z A-Z]+$" data-parsley-trigger="keyup"  placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class=" mb-30 form-control" required="" type="text" style="padding: 20px">									
										<input name="email" placeholder="Enter email address" data-parsley-type="email" data-parsley-trigger="keyup" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="common-input mb-30 form-control" required="" type="email" style="padding: 20px">
										<input name="subject" placeholder="Enter subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter subject'" class="common-input mb-20 form-control" required="" type="text" style="padding: 20px">
									</div>
									<div class="col-lg-6 form-group">
										<textarea class="common-textarea form-control" name="message" placeholder="Enter Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Messege'" required=""></textarea>
									</div>
									<div class="col-lg-12">
										<div class="alert-msg" style="text-align: left;"></div>
										<input type="submit" id="submit" class="genric-btn py-0 primary float-right"  value="Send Message" name="">
									</div>
								</div>
							</form>	
						</div>
					</div>
				</div>	
		</section>
			<!-- End contact-page Area -->
			
<script type="text/javascript">
  $(document).ready(function() {
    $('#MyForm').parsley();
     $('#MyForm').on('submit',function(event){
      event.preventDefault();
      if($('#MyForm').parsley().isValid())
      {
        $.ajax({
            url:"mail.php",
            method:"POST",
            data:$(this).serialize(),
            beforeSend:function(){
              $('#submit').attr('disabled','disabled');
              $('#submit').val('Processing...');
            },
            success:function(data)
            {
              $('#MyForm')[0].reset();
              $('#MyForm').parsley().reset();
              $('#submit').attr('disabled',false);
              $('#submit').val('Send Messege');
              if(data=="1")
              {                
                swal("Good job!", "Your message has been sent.","success");
              }
              else{                
                swal("Opps..!", "Failed","error");
                // alert(data);
              }

            }
         });
         }
        });
     });
</script>

<?php include 'footer.php';?>