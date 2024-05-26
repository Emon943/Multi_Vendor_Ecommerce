<?php require_once "header.php"; 
$msg="";
if(isset($_POST['log'])){
	
	$o_pass=$_POST['o_pass'];
	$n_pass=$_POST['n_pass'];
	$c_pass=$_POST['c_pass'];

	$t_pass=md5($o_pass);
	
$log=mysqli_query($con,"select * from user where pass='$t_pass'");
$amt=mysqli_affected_rows($con);
	
	if($o_pass=="" || $c_pass=="" || $n_pass==""){
		$msg="Input Missing! Please retry";
	}
	
	else if($amt==0){
		$msg="Wrong password! Please retry";
	}
	
	else if(strcmp($n_pass,$c_pass)!=0){
			$msg="Password Missmatch! Please type same password";
	}
else{
	$c_pass=md5($c_pass);
	mysqli_query($con,"update user set pass='$c_pass' where id=$u_id");
	$msg="Password change successful!";
	
	
	}
}


?>
   <div class="inner-box">
                <div class="col-sm-12 page-content">
                 
                        <h2 class="title-2"><i class="fa fa-lock"></i> Change Password </h2>

							<div class="row">
							
							<?php if($msg!= NULL) { ?>
								<center><div class="alert alert-info" role="alert" style="width:90%;"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
								  <?php echo $msg; ?>
								</div></center>
								<?php } ?> 
							
							
                            <div class="col-sm-12">
                                <form class="form-horizontal" method="POST" action="">
                                    <fieldset>
                                       

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="Adtitle">Current Password</label>

                                            <div class="col-md-8">
                                                <input id="Adtitle" name="o_pass" placeholder="Enter current password"
                                                       class="form-control input-md" required="" type="password">
                                            </div>
                                        </div>

                                       <div class="form-group">
                                            <label class="col-md-3 control-label" for="Adtitle">New Password</label>

                                            <div class="col-md-8">
                                                <input id="Adtitle" name="n_pass" placeholder="Enter new password"
                                                       class="form-control input-md" required="" type="password">
                                            </div>
                                        </div>

                                       <div class="form-group">
                                            <label class="col-md-3 control-label" for="Adtitle">Confirm Password</label>

                                            <div class="col-md-8">
                                                <input id="Adtitle" name="c_pass" placeholder="Re-type new password"
                                                       class="form-control input-md" required="" type="password">
                                            </div>
                                        </div>

                                     





                                        <!-- Button  -->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label"></label>

                                            <div class="col-md-8"><input type="submit" id="button1id" class="btn btn-success btn-lg" value="Save change" name="log"></div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
                <!--/.page-content-->
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </div>
    </div>
    <!-- /.main-container -->

	<?php require_once "footer.php"; ?>
