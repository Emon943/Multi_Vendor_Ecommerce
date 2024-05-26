<?php require_once "header.php";  

$msg="";

if(isset($_POST['reg'])){
	$name=mysqli_real_escape_string($con, trim($_POST['name']));

	$mobile=$_POST['mobile'];
	$loc=$_POST['loc'];
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$cpass=$_POST['cpass'];
	
	$sign=mysqli_query($con,"select * from user where email='$email'");
	$amt=mysqli_affected_rows($con);
	
	if($name=="" || $mobile=="" || $email=="" || $pass=="" || $cpass=="" ){ $msg="Input missing, please fill up the form completely.";	}
	else if(strcmp($pass,$cpass)!=0) {
			$msg="Password mismatch! Please type same password.";
		}
	else if($amt>0){
		$msg="This user have already an account! Please try with different email id";
	}
	else{
		$pss=md5($cpass);
		mysqli_query($con,"insert into user(`name`,`email`,`pass`,`mobile`,`loc`,`type`,`status`) values('$name','$email','$pss','$mobile',$loc,0,1)");
		
		$subject="Registration Successful!";

		$code="Hello $name,\nYou have successfully registered on Awwazz.com! Now you can access all features of awwazz. Please keep your ID & Password secret for security. Thank you very much for being with Awwazz.com\n\nFor more details please contact us at: +8801979955603-4 ";	

			$mail = mail($email, $subject, $code,

			"From: Awwazz.com <awwazz.com@awwazz.com>\r\n"

			."Reply-To: info@awwazz.com\r\n"

			."X-Mailer: PHP/" . phpversion());
			
			
		header("Location: login?r=s");
					
	}
	
}
?>
    <!-- /.header -->
	
	<!--jquery for sign up form  -->
<script type="text/javascript" src="assets/js/jquery-2.2.2.min.js"></script>

    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-8 page-content">
                    <div class="inner-box category-content">
					
					
					
								
								
                        <h2 class="title-2"><i class="icon-user-add"></i> Create your account </h2>

                        <div class="row">
                            <div class="col-sm-12">
                                <form class="form-horizontal" method="post" action="">
                                    <fieldset>
                                        
										<?php if($msg!= NULL) { ?>
								<div class="alert alert-danger" role="alert">
								  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
								  <span class="sr-only">Error:</span>
								  <?php echo $msg; ?>
								</div>
								<?php } ?>

                                        <!-- Text input-->
                                        <div class="form-group required">
                                            <label class="col-md-4 control-label">User Name <sup>*</sup></label>

                                            <div class="col-md-6">
                                                <input name="name" placeholder="Enter your Name" class="form-control input-md"
                                                       required="" type="text" id="username">
													   <div id="info">
													   </div>
                                            </div>
                                        </div>

                                       
                                        

                                        <!-- Text input-->
                                        <div class="form-group required">
                                            <label class="col-md-4 control-label">Contact Number <sup>*</sup></label>

                                            <div class="col-md-6">
                                                <input name="mobile" placeholder="Phone Number"
                                                       class="form-control input-md" id="contact" type="text">

                                            </div>
                                        </div>
										

                                          <div class="form-group required">
                                            <label class="col-md-4 control-label">Location </label>

                                            <div class="col-md-6">
                                               <select type="text" class="form-control" name="loc" required>
																
																<?php 	$categ=mysqli_query($con,"select * from s_loc");
																		
																		for($j=0; $j<mysqli_num_rows($categ); $j++){ 
																		$row3=mysqli_fetch_array($categ,MYSQLI_ASSOC);?>
																<option value="<?php echo $row3["id"] ?>"><?php echo $row3["area"] ?></option>
																		<?php } ?>
														  </select>

                                            </div>
                                        </div>


                                       


                                        <div class="form-group required">
                                            <label for="inputEmail3" class="col-md-4 control-label">Email
                                                <sup>*</sup></label>

                                            <div class="col-md-6">
                                                <input type="email" id="email" class="form-control" name="email"
                                                       placeholder="Email" required>
													   <div id="email_info"></div>
                                            </div>
                                        </div>
                                        <div class="form-group required">
                                            <label for="inputPassword3" class="col-md-4 control-label">Password </label>

                                            <div class="col-md-6">
                                                <input type="password" name="pass" class="form-control" id="pass"
                                                       placeholder="Password" required>
													   <div id="pass_info"></div>

                                                <p class="help-block">At least 5 characters
                                                    <!--Example block-level help text here.--></p>
                                            </div>
                                        </div>
										
										<div class="form-group required">
                                            <label for="inputPassword3" class="col-md-4 control-label">Confirm Password </label>

                                            <div class="col-md-6">
                                                <input name="cpass" type="password" class="form-control" id="cpass"
                                                       placeholder="Re-enter Password" required>
													   
													  <div id="cpass_info"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label"></label>

                                            <div class="col-md-8">
                                                <div class="termbox mb10">
                                                    <label class="checkbox-inline" for="checkboxes-1">
                                                        <input name="checkboxes" id="checkboxes-1" value="1"
                                                               type="checkbox" required>
                                                        I have read and agree to the <a href="terms-conditions.html">Terms
                                                        & Conditions</a> </label>
                                                </div>
                                                <div style="clear:both"></div>
                                                <input type="submit" name="reg" id="reg"  class="btn btn-primary" value="Register Now">
                                            </div>
                                        </div>
										
										<hr>
										<center> <h3>Already Registered?</h3>
										<a href="login" class="btn btn-border btn-danger"><i class="fa fa-user"> </i> Login Now</a>
										</center>
										
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.page-content -->

                <div class="col-md-4 reg-sidebar">
                    <div class="reg-sidebar-inner text-center">
                        <div class="promo-text-box"><i class=" icon-briefcase fa fa-4x icon-color-1"></i>

                            <h3><strong>Search Products </strong></h3>

                            <p> You can search of find product as you need and buy it easily.</p>
                        </div>
                        <div class="promo-text-box"><i class=" icon-pencil-circled fa fa-4x icon-color-2"></i>

                            <h3><strong>Create User Account</strong></h3>

                            <p>Here you can create user account and get the facility of awwazz to freely shop.</p>
                        </div>
                        <div class="promo-text-box"><i class="  icon-heart-2 fa fa-4x icon-color-3"></i>

                            <h3><strong>Create your Favorite Jobs list.</strong></h3>

                            <p>You can create favoiurite list after login.</p>
                        </div>
                    </div>
                </div>
				
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.main-container -->
	<script>
	$(document).ready(function(){
		
var flag1=0;
var flag2=0;
var flag3=0;
var flag4=0;
var flag5=0;

$('#username').keyup(function(){
	 flag1=1;
	
})
$('#contact').keyup(function(){
	var contact=$('#contact').val();
	if(contact.length > 10)
	{
		flag2=1;
		
	}
		
})
			$('#email').keyup(function(){
					
			var email=$('#email').val();
	  flag3=1;
				$.ajax({
	type:'POST',
	url:'check.php?id=email',
	data:'email='+email,
	success: function (data) {
	
				
               $('#email_info').html(data);
            
        }
	
});
			});
			
			$('#pass').keyup(function(){
			
						var pass=$('#pass').val();
						

				if( pass.length < 5)
				{
					
					$('#pass_info').html("<span style='color:red;font-size:10px;font-weight:bold;'>* password must be 5 charecters</span>");
				}
				else
				{
					$('#pass_info').html("<span style='color:green;font-size:10px;font-weight:bold;'>* ok</span>");
					 flag4=1;
					
					
				}
			});
			
			$('#cpass').keyup(function(){
				var pass =$('#pass').val();
				var cpass=$('#cpass').val();

			if( cpass == pass)
			{
				
				$('#cpass_info').html("<span style='color:green;font-size:10px;font-weight:bold;'>* ok</span>");
				 flag5=1;
				
			}
			else
				{
					$('#cpass_info').html("<span style='color:red;font-size:10px;font-weight:bold;'>* Password mismatch</span>");
					
				}
				
			});
			
			
			$('#contact, #username , #email , #pass , #cpass').keyup(function(){
				
		var contact=$('#contact').val();
		var username=$('#username').val();
		var email=$('#email').val();
		var pass=$('#pass').val();
		var cpass=$('#cpass').val();
		
      if(contact.length > 10 &&  username.length > 2 && flag3 == 1  && pass == cpass )
      {
	   
        
        $("#reg").attr('disabled', true);
      }
	  else{
		  
		  $("#reg").attr('disabled', false);
	  }
   });
	
		
		
		
	});
	</script>

<?php //require_once "footer.php"; ?>