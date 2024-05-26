<?php require_once "header.php"; 



$msg="";
if(isset($_POST['save'])){
	$address=mysqli_real_escape_string($con, trim($_POST['address']));
	$comment=mysqli_real_escape_string($con, trim($_POST['commt']));

	$email=$_POST['email'];
	$phone=$_POST['mobile'];
	$product=$_POST['product'];
	
	
	$prc=mysqli_query($con,"select price from product where id=$product");
	$row_pc=mysqli_fetch_array($prc,MYSQLI_ASSOC);
	$price=$row_pc['price'];
	
	$pmnt=$_POST['payment'];
	
	
	mysqli_query($con,"insert into invoice(`user`,`price`,`email`,`mobile`,`address`,`product`,`comment`,`payment`) values(0,$price,'$email','$phone','$address',1,'$comment','$pmnt')");
	
	$lst_id=mysqli_insert_id($con);
	mysqli_query($con,"insert into checkout(`product`,`invoice`) values($product,$lst_id)");
	
	$msg="Invoice is created Successfully";				
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
                                    <h4 class="panel-title"><a href="#collapseB1" data-toggle="collapse"> Create Custom Invoice </a></h4>
                                </div>
                                <div class="panel-collapse collapse in" id="collapseB1">
                                    <div class="panel-body">
                                        <form class="form-horizontal" role="form" method="post" action="">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Email</label>

                                                <div class="col-sm-9">
                                                    <input type="email" class="form-control" name="email" placeholder="Enter user email" required>
                                                </div>
                                            </div>
											
											<div class="form-group">
                                                <label class="col-sm-3 control-label">Contact Number</label>

                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="mobile" placeholder="Enter user mobile number" required>
                                                </div>
                                            </div>
											
											<div class="form-group">
                                                <label class="col-sm-3 control-label">Delivery Address</label>

                                                <div class="col-sm-9">
                                                    <textarea class="form-control" name="address" placeholder="Type Full Delivery address" required></textarea>
                                                </div>
                                            </div>
											
											<div class="form-group">
                                                <label class="col-sm-3 control-label">Comment</label>

                                                <div class="col-sm-9">
                                                    <textarea class="form-control" name="commt" placeholder="Type extra details like size, color etc." required></textarea>
                                                </div>
                                            </div>
											
                                           
                                            
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Product</label>

                                                <div class="col-sm-9">
                                                    <select class="form-control" name="product">
														
														<?php 	$categ=mysqli_query($con,"select * from product");
																		
																		for($i=0; $i<mysqli_num_rows($categ); $i++){ 
																		$row3=mysqli_fetch_array($categ,MYSQLI_ASSOC);?>
																<option value="<?php echo $row3["id"] ?>"><?php echo $row3["title"] ?>(Code-<?php echo $row3["id"] ?>)</option>
																		<?php } ?>
													</select>
                                                </div>
                                            </div>
											
											
											
                                             <div class="form-group">
                                                <label class="col-sm-3 control-label">Payment Method</label>

                                                <div class="col-sm-9">
                                                    <select class="form-control" name="payment">
																<option value="Cash on Delivery">Cash on Delivery</option>		
													</select>
                                                </div>
                                            </div>
                                            

                                           
                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9"></div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <input type="submit" name="save" class="btn btn-success" value="Create">
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