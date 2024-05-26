 <?php require_once "header.php"; 
$msg="";

if(isset($_POST['inst'])){
	$name=mysqli_real_escape_string($con, trim($_POST['name']));
	$company=mysqli_real_escape_string($con, trim($_POST['company']));
	$des=mysqli_real_escape_string($con, trim($_POST['des']));

	$market=$_POST['market'];
	$loc=$_POST['loc'];
	$mobile=$_POST['mobile'];
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	
	$sign=mysqli_query($con,"select * from user where email='$email'");
	$amt=mysqli_affected_rows($con);
	
	
	if($name=="" || $mobile=="" || $email=="" || $pass=="" || $company=="" ){ $msg="Input missing, please fill up the form completely.";	}
	
	else if($amt>0){
		$msg="This user have already an account! Please try with different email id";
	}
	else{
	
	$upload_errors = array(
			UPLOAD_ERR_OK 				=> "No errors.",
			UPLOAD_ERR_INI_SIZE  	=> "Larger than upload_max_filesize.",
			UPLOAD_ERR_FORM_SIZE 	=> "Larger than form MAX_FILE_SIZE.",
			UPLOAD_ERR_PARTIAL 		=> "Partial upload.",
			UPLOAD_ERR_NO_FILE 		=> "No file.",
			UPLOAD_ERR_NO_TMP_DIR => "No temporary directory.",
			UPLOAD_ERR_CANT_WRITE => "Can't write to disk.",
			UPLOAD_ERR_EXTENSION 	=> "File upload stopped by extension."
			);
	
	if($_FILES['file_upload1']['tmp_name']==""){ $f_insnt1="";	}
	else{
	
			$tmp_file1 = $_FILES['file_upload1']['tmp_name'];
			$target_file1 = basename($_FILES['file_upload1']['name']);
			$upload_dir1 = "../images/seller/";
			$file_typ1 = basename($_FILES['file_upload1']['type']);
			$cur_file1=$upload_dir1."/".$target_file1;
			if($target_file1==""){ $f_insnt1="";} else{
			$ran=rand(20000,9999999999);
			$f_insnt1=$name."-$ran.".$file_typ1;
			$rename_file1=$upload_dir1."/".$name."-$ran.".$file_typ1;
			
			if(move_uploaded_file($tmp_file1, $upload_dir1."/".$target_file1)) {
				rename("$cur_file1", "$rename_file1");} 
			else {
				$error = $_FILES['file_upload1']['error'];
				$message = $upload_errors[$error];}}
					
	}
	
	if($_FILES['file_upload2']['tmp_name']==""){ $f_insnt2="";	}
	else{

			$tmp_file2 = $_FILES['file_upload2']['tmp_name'];
			$target_file2 = basename($_FILES['file_upload2']['name']);
			$upload_dir2 = "../images/seller/";
			$file_typ2 = basename($_FILES['file_upload2']['type']);
			$cur_file2=$upload_dir2."/".$target_file2;
			if($target_file2==""){ $f_insnt2="";} else{
			$ran=rand(20000,9999999999);
			$f_insnt2=$name."-$ran.".$file_typ2;
			$rename_file2=$upload_dir2."/".$name."-$ran.".$file_typ2;
			
			if(move_uploaded_file($tmp_file2, $upload_dir2."/".$target_file2)) {
				rename("$cur_file2", "$rename_file2");} 
			else {
				$error = $_FILES['file_upload2']['error'];
				$message = $upload_errors[$error];}}
					
	}
	
	
	$c_pass=md5($pass);
	
	mysqli_query($con,"insert into user(`name`,`type`,`short_des`,`loc`,`pro`,`cover`,`email`,`mobile`,`company`,`pass`,`market`,`status`) values('$name',1,'$des',$loc,'$f_insnt1','$f_insnt2','$email','$mobile','$company','$c_pass',$market,1)");
	$msg="Seller $company created Successfully!";
	
	$subject="Registration Successfull!";

		$code="Dear $name,\nYour seller account has been successfully created! This is considered as an email confirmation.\n\nShop Name: $company\nEmail: $email\nMobile: $mobile\nPassword: $pass\n\n\nNow you can login to your account from: http://www.awwazz.com/login Thank you very much for being with Awwazz.com\n\nFor more details please contact us at: +8801979955603-4 ";	

			$mail = mail($email, $subject, $code,

			"From: Awwazz.com <awwazz.com@awwazz.com>\r\n"

			."Reply-To: info@awwazz.com\r\n"

			."X-Mailer: PHP/" . phpversion());	
	
}

}

if(isset($_POST['edit'])){
	$name=mysqli_real_escape_string($con, trim($_POST['name']));
	$company=mysqli_real_escape_string($con, trim($_POST['company']));
	$des=mysqli_real_escape_string($con, trim($_POST['des']));

	$market=$_POST['market'];
	$loc=$_POST['loc'];
	$mobile=$_POST['mobile'];
	$id=$_POST['id'];
	
	$upload_errors = array(
			UPLOAD_ERR_OK 				=> "No errors.",
			UPLOAD_ERR_INI_SIZE  	=> "Larger than upload_max_filesize.",
			UPLOAD_ERR_FORM_SIZE 	=> "Larger than form MAX_FILE_SIZE.",
			UPLOAD_ERR_PARTIAL 		=> "Partial upload.",
			UPLOAD_ERR_NO_FILE 		=> "No file.",
			UPLOAD_ERR_NO_TMP_DIR => "No temporary directory.",
			UPLOAD_ERR_CANT_WRITE => "Can't write to disk.",
			UPLOAD_ERR_EXTENSION 	=> "File upload stopped by extension."
			);
	
	if($_FILES['file_upload1']['tmp_name']==""){ $f_insnt1=$_POST['pro'];	}
	else{
	
			$tmp_file1 = $_FILES['file_upload1']['tmp_name'];
			$target_file1 = basename($_FILES['file_upload1']['name']);
			$upload_dir1 = "../images/seller/";
			$file_typ1 = basename($_FILES['file_upload1']['type']);
			$cur_file1=$upload_dir1."/".$target_file1;
			if($target_file1==""){ $f_insnt1="";} else{
			$ran=rand(20000,9999999999);
			$f_insnt1=$name."-$ran.".$file_typ1;
			$rename_file1=$upload_dir1."/".$name."-$ran.".$file_typ1;
			
			if(move_uploaded_file($tmp_file1, $upload_dir1."/".$target_file1)) {
				rename("$cur_file1", "$rename_file1");} 
			else {
				$error = $_FILES['file_upload1']['error'];
				$message = $upload_errors[$error];}}
					
	}
	
	if($_FILES['file_upload2']['tmp_name']==""){ $f_insnt2=$_POST['cover'];	}
	else{

			$tmp_file2 = $_FILES['file_upload2']['tmp_name'];
			$target_file2 = basename($_FILES['file_upload2']['name']);
			$upload_dir2 = "../images/seller/";
			$file_typ2 = basename($_FILES['file_upload2']['type']);
			$cur_file2=$upload_dir2."/".$target_file2;
			if($target_file2==""){ $f_insnt2="";} else{
			$ran=rand(20000,9999999999);
			$f_insnt2=$name."-$ran.".$file_typ2;
			$rename_file2=$upload_dir2."/".$name."-$ran.".$file_typ2;
			
			if(move_uploaded_file($tmp_file2, $upload_dir2."/".$target_file2)) {
				rename("$cur_file2", "$rename_file2");} 
			else {
				$error = $_FILES['file_upload2']['error'];
				$message = $upload_errors[$error];}}
					
	}
	
	
	
	
	mysqli_query($con,"update user set name='$name',company='$company',loc=$loc,short_des='$des',market=$market,mobile='$mobile',pro='$f_insnt1',cover='$f_insnt2' where id=$id");
	
	$msg="Product $company updated Successfully!";
}

$pro=mysqli_query($con,"select * from user where type=1");
?>

<?php if($msg!= NULL) { ?>
								<center><div class="alert alert-info" role="alert">
								  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
								  <span class="sr-only"></span>
								  <?php echo $msg; ?>
								</div></center>
								<?php } ?>
								
  <div class="inner-box">
                <div class="col-sm-12 page-content">
                  
                        <h2 class="title-2"><i class="fa fa-user"></i> Seller Accounts </h2>

                        <div class="table-responsive">
                            <div class="table-action">
                                <label for="checkAll">
                                    
                                    <a href="#" class="btn btn-large btn-primary" data-toggle="modal" data-target="#ins">Add New Seller <i
                                        class="fa fa-plus-circle"></i></a> 
										
								</label>
								
								
								
								
								
								
								
								
								 <div class="modal fade" id="ins" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
										  <div class="modal-dialog" role="document">
											<div class="modal-content">
											  <div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h3 class="modal-title" id="myModalLabel">Create New Seller</h3>
											  </div>
											  
											  <div class="modal-body">
												<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
												
													  <div class="form-group">
														<label for="inputEmail3" class="col-sm-2 control-label">Name</label>
														<div class="col-sm-10">
														  <input type="text" class="form-control" name="name" placeholder="Enter seller name" required>
														</div>
													  </div>
													  
													  <div class="form-group">
														<label for="inputEmail3" class="col-sm-2 control-label">Company name</label>
														<div class="col-sm-10">
														  <input type="text" class="form-control" name="company" placeholder="Enter seller's shop name" required>
														</div>
													  </div>
													  
													  <div class="form-group">
														<label for="inputEmail3" class="col-sm-2 control-label">Description</label>
														<div class="col-sm-10">
														  <textarea type="text" name="des" class="form-control" placeholder="Enter a descriotion of company"></textarea>
														</div>
													  </div>
													  
													  
													  
													   <div class="form-group">
														<label for="inputEmail3" class="col-sm-2 control-label">Location</label>
														<div class="col-sm-10">
														  <select type="text" class="form-control" name="loc" required>
																<option value="">Select Location</option>
																
																<?php 	$categ=mysqli_query($con,"select * from s_loc");
																		
																		for($i=0; $i<mysqli_num_rows($categ); $i++){ 
																		$row3=mysqli_fetch_array($categ,MYSQLI_ASSOC);?>
																<option value="<?php echo $row3["id"] ?>"><?php echo $row3["area"] ?></option>
																		<?php } ?>
														  </select>
														</div>
													  </div>
													  
													   <div class="form-group">
														<label for="inputEmail3" class="col-sm-2 control-label">Market</label>
														<div class="col-sm-10">
														  <select type="text" class="form-control" name="market" required>
																<option value="">Select a market</option>
																
																<?php 	$categ=mysqli_query($con,"select * from market");
																		
																		for($i=0; $i<mysqli_num_rows($categ); $i++){ 
																		$row3=mysqli_fetch_array($categ,MYSQLI_ASSOC);?>
																<option value="<?php echo $row3["id"] ?>"><?php echo $row3["name"] ?></option>
																		<?php } ?>
														  </select>
														</div>
													  </div>
													  
													  <div class="form-group">
														<label for="inputEmail3" class="col-sm-2 control-label">Mobile Number</label>
														<div class="col-sm-10">
														  <input type="text" class="form-control" name="mobile" placeholder="Type contact number" required>
														</div>
													  </div>
													  
													  
													  
													  <div class="form-group">
														<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
														<div class="col-sm-10">
														  <input type="email" class="form-control" name="email" placeholder="Enter email" required>
														</div>
													  </div>
													  
													  <div class="form-group">
														<label for="inputEmail3" class="col-sm-2 control-label">Password</label>
														<div class="col-sm-10">
														  <input type="text" class="form-control" name="pass" placeholder="Enter password" required>
														</div>
													  </div>
													  
													  
													  
													   <div class="form-group">
														<label for="inputEmail3" class="col-sm-2 control-label">Profile Image (300X300 px)</label>
														<div class="col-sm-10">
														<input type="file" name="file_upload1" class="btn btn-border btn-primary" id="filesToUpload1">
														<input type="hidden" name="MAX_FILE_SIZE1" value="1000000" />
														</div>
													  </div>
													  
													  <div class="form-group">
														<label for="inputEmail3" class="col-sm-2 control-label">Cover Image (500X1000 px)</label>
														<div class="col-sm-10">
														<input type="file" name="file_upload2" class="btn btn-border btn-primary" id="filesToUpload2">
														<input type="hidden" name="MAX_FILE_SIZE2" value="1000000" />
														</div>
													  </div>
													  
													  
													  
													  
													  													
											  </div>
											  
											  <div class="modal-footer">
												<input type="submit" name="inst" class="btn btn-primary" value="Create Now"></form>
											  </div>
											</div>
										  </div>
										</div>
								
								
								
								
								
								
								
								
								
								
								

                                <div class="table-search pull-right col-xs-7">
                                    <div class="form-group">
                                        <label class="col-xs-5 control-label text-right">Search <br>
                                            <a title="clear filter" class="clear-filter" href="#clear">[clear]</a>
                                        </label>

                                        <div class="col-xs-7 searchpan">
                                            <input type="text" class="form-control" id="filter">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table id="addManageTable"
                                   class="table table-striped table-bordered add-manage-table table demo"
                                   data-filter="#filter" data-filter-text-only="true">
                                <thead>
                                <tr>
                                    
                                    <th> Photo</th>
                                    <th data-sort-ignore="true"> Seller Details</th>
                                    <th> Option</th>
                                </tr>
                                </thead>
                                <tbody>
								
								
								
								<?php for($i=0; $i<mysqli_num_rows($pro); $i++){ 
									$row_p=mysqli_fetch_array($pro,MYSQLI_ASSOC);?>
																		
																		
                                
								<tr>
                                    
                                    <td style="width:14%" class="add-img-td"><a href=""><img
                                            class="thumbnail  img-responsive"
                                            src="../images/seller/<?php echo $row_p["pro"]; ?>"
                                            alt="No Image"></a></td>
                                    <td style="width:58%" class="ads-details-td">
                                        <div>
                                            <p><strong> <a href="vendor?id=<?php echo $row_p["id"]; ?>"><h3><?php echo $row_p["company"]; ?></h3></a> </strong>

                                            <strong> Seller from </strong>:
                                                <?php echo $row_p["date"]; ?> <strong>User </strong>: <?php echo $row_p["name"]; ?> <br>

                                             <strong>Location:</strong> <?php 
								$s_cat=$row_p["loc"]; 
								$cat_r=mysqli_query($con,"select * from s_loc where id=$s_cat");
								$row_c=mysqli_fetch_array($cat_r,MYSQLI_ASSOC);  
								echo $row_c["area"]; 
								$c_id=$row_c["city"]; 
								$cat_c=mysqli_query($con,"select * from loc where id=$c_id");
								$row_ct=mysqli_fetch_array($cat_c,MYSQLI_ASSOC); 
								echo "(".$row_ct["city"].")";
								?>  <strong>Mobile:</strong> <?php echo $row_p["mobile"]; ?> <Br><strong>Email:</strong> <?php echo $row_p["email"]; ?>
                                            </p>
                                        </div>
                                    </td>
                                    
                                    <td style="width:10%" class="action-td">
                                        <div>
                                            <p><a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#edit<?php echo $row_p["id"]; ?>"> <i class="fa fa-edit"></i> Edit </a>
                                            </p>
											
											
											
									
													 <div class="modal fade" id="edit<?php echo $row_p["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
										  <div class="modal-dialog" role="document">
											<div class="modal-content">
											  <div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h3 class="modal-title" id="myModalLabel">Edit Seller</h3>
											  </div>
											  
											  <div class="modal-body">
											  
											  
											  
												<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
												
													  <div class="form-group">
														<label for="inputEmail3" class="col-sm-2 control-label">User Name</label>
														<div class="col-sm-10">
														  <input type="text" class="form-control" name="name" value="<?php echo $row_p["name"]; ?>" placeholder="Enter Title" required>
														</div>
													  </div>
													  
													   <input type="hidden" value="<?php echo $row_p["id"] ?>" name="id">
													   
													      <div class="form-group">
														<label for="inputEmail3" class="col-sm-2 control-label">Market</label>
														<div class="col-sm-10">
														  <select type="text" class="form-control" name="market" required>
																<option value="<?php echo $row_p["market"]; ?>"><?php echo $row_p["market"]; ?></option>
																
																<?php 	$categ=mysqli_query($con,"select * from market");
																		
																		for($j=0; $j<mysqli_num_rows($categ); $j++){ 
																		$row3=mysqli_fetch_array($categ,MYSQLI_ASSOC);?>
																<option value="<?php echo $row3["id"] ?>"><?php echo $row3["name"] ?></option>
																		<?php } ?>
														  </select>
														</div>
													  </div>
													  
													   <div class="form-group">
														<label for="inputEmail3" class="col-sm-2 control-label">Location</label>
														<div class="col-sm-10">
														  <select type="text" class="form-control" name="loc" required>
																<option value="<?php echo $row_p["loc"]; ?>"><?php echo $row_p["loc"]; ?></option>
																
																<?php 	$categ=mysqli_query($con,"select * from s_loc");
																		
																		for($j=0; $j<mysqli_num_rows($categ); $j++){ 
																		$row3=mysqli_fetch_array($categ,MYSQLI_ASSOC);?>
																<option value="<?php echo $row3["id"] ?>"><?php echo $row3["area"] ?></option>
																		<?php } ?>
														  </select>
														</div>
													  </div>
													  
													  <div class="form-group">
														<label for="inputEmail3" class="col-sm-2 control-label">Company Name</label>
														<div class="col-sm-10">
														  <input type="text" class="form-control" name="company" placeholder="Type Brand name" value="<?php echo $row_p["company"]; ?>" required>
														</div>
													  </div>
													  
													  <div class="form-group">
														<label for="inputEmail3" class="col-sm-2 control-label">Description</label>
														<div class="col-sm-10">
														  <textarea type="text" name="des" class="form-control" placeholder="Enter a descriotion of your product"><?php echo $row_p["short_des"]; ?></textarea>
														</div>
													  </div>
													  
													
													  
													  <div class="form-group">
														<label for="inputEmail3" class="col-sm-2 control-label">Mobile</label>
														<div class="col-sm-10">
														  <input type="text" class="form-control" name="mobile" value="<?php echo $row_p["mobile"]; ?>" placeholder="Enter Product Price" required>
														</div>
													  </div>
													  
													   
												 <div class="form-group">
														<label for="inputEmail3" class="col-sm-2 control-label">Profile Image</label>
														<div class="col-sm-10">
														<input type="file" name="file_upload1" class="btn btn-border btn-primary" id="filesToUpload1">
														<input type="hidden" name="MAX_FILE_SIZE1" value="1000000" />
														<img class="img-responsive" src="../images/seller/<?php echo $row_p["pro"]; ?>" alt="" style="max-width:20%;">
														<input type="hidden" value="<?php echo $row_p["pro"]; ?>" name="pro">
														</div>
													  </div>
													  
													  <div class="form-group">
														<label for="inputEmail3" class="col-sm-2 control-label">Cover Image</label>
														<div class="col-sm-10">
														<input type="file" name="file_upload2" class="btn btn-border btn-primary" id="filesToUpload2">
														<input type="hidden" name="MAX_FILE_SIZE2" value="1000000" />
														<img class="img-responsive" src="../images/seller/<?php echo $row_p["cover"]; ?>" alt="" style="max-width:20%;">
														<input type="hidden" value="<?php echo $row_p["cover"]; ?>" name="cover">
														</div>
													  </div>
													  
													
													  
													  
													  
													  
													  
													  
													  
													  
													  
													  
													  													
											  </div>
											  
											  <div class="modal-footer">
												<input type="submit" name="edit" class="btn btn-primary" value="Save Change">
												</form>
											  </div>
											</div>
										  </div>
										</div>
											
											
											
											
											<p><a class="btn btn-success btn-xs" href="vendor?id=<?php echo $row_p["id"]; ?>"> <i class="fa fa-search-plus"></i> View </a>
                                            </p>
											
											<p><a class="btn btn-danger btn-xs" href="#"> <i class="fa fa-ban"></i> Suspend</a>
                                            </p>
											
                                          
                                        </div>
                                    </td>
									
                                </tr>
								
								
                              
								<?php } ?>
                               
                               
                                </tbody>
                            </table>
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
    </div>
    <!-- /.main-container -->
<script src="../assets/js/footable.js?v=2-0-1" type="text/javascript"></script>
<script src="../assets/js/footable.filter.js?v=2-0-1" type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
        $('#addManageTable').footable().bind('footable_filtering', function (e) {
            var selected = $('.filter-status').find(':selected').text();
            if (selected && selected.length > 0) {
                e.filter += (e.filter && e.filter.length > 0) ? ' ' + selected : selected;
                e.clear = !e.filter;
            }
        });

        $('.clear-filter').click(function (e) {
            e.preventDefault();
            $('.filter-status').val('');
            $('table.demo').trigger('footable_clear_filter');
        });

    });
</script>
	<?php require_once "footer.php"; ?>
