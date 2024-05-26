<?php require_once "header.php"; 



$msg="";
if(isset($_POST['save'])){
	$name=mysqli_real_escape_string($con, trim($_POST["name"]));
	$loc=$_POST["loc"];
	$mob=mysqli_real_escape_string($con,trim($_POST["mob"]));
	
	if($name=="" || $loc=="" || $mobile=""){
		$msg="Input Missing! Please retry";
	}
	
	
else{

		mysqli_query($con,"update user set name='$name',loc=$loc,mobile='$mob' where id=$u_id");
		$msg="Profile updated Successfully!";
		
	}
}









$pro=mysqli_query($con,"select * from user where id=$u_id");
$row_p=mysqli_fetch_array($pro,MYSQLI_ASSOC);



?>



                    <div class="inner-box">
                        <div class="welcome-msg">
                           <?php if($msg!= NULL) { ?>
								<center><div class="alert alert-info" role="alert" style="width:90%;"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
								  <?php echo $msg; ?>
								</div></center>
								<?php } ?> 
							
                        </div>
                        <div id="accordion" class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="#collapseB1" data-toggle="collapse"> My
                                        Profile </a></h4>
                                </div>
                                <div class="panel-collapse collapse in" id="collapseB1">
                                    <div class="panel-body">
                                        <form class="form-horizontal" role="form" method="post" action="">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Name</label>

                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="name" placeholder="Enter your name" value="<?php echo $row_p["name"]; ?>">
                                                </div>
                                            </div>
											
                                           
                                            
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Location</label>

                                                <div class="col-sm-9">
                                                    <select class="form-control" name="loc">
														<option value="<?php echo $row_p["loc"]; ?>"><?php $loc_id=$row_p["loc"]; $loc_n=mysqli_query($con,"select area from s_loc where id=$loc_id"); $ron=mysqli_fetch_array($loc_n,MYSQLI_ASSOC); echo $ron["area"]; ?></option>
														<?php 	$categ=mysqli_query($con,"select * from s_loc");
																		
																		for($i=0; $i<mysqli_num_rows($categ); $i++){ 
																		$row3=mysqli_fetch_array($categ,MYSQLI_ASSOC);?>
																<option value="<?php echo $row3["id"] ?>"><?php echo $row3["area"] ?></option>
																		<?php } ?>
													</select>
                                                </div>
                                            </div>
											
											
											
                                            <div class="form-group">
                                                <label for="Phone" class="col-sm-3 control-label">Contact Number</label>

                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Type mobile number" name="mob" value="<?php echo $row_p["mobile"]; ?>">
                                                </div>
                                            </div>
											
											<div class="form-group">
                                                <label class="col-sm-3 control-label">Email</label>

                                                <div class="col-sm-9">
                                                    <input type="email" class="form-control"
                                                           value="<?php echo $row_p["email"]; ?>" disabled>
                                                </div>
                                            </div>
                                            

                                           
                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9"></div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <input type="submit" name="save" class="btn btn-success" value="Save Change">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                         
                        </div>
                        <!--/.row-box End-->

                    </div>
                </div>
                <!--/.page-content-->
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </div>
    <!-- /.main-container -->

<?php require_once "footer.php"; ?>