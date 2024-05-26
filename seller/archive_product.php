<?php require_once "header.php"; 
$msg="";

if(isset($_POST['inst'])){
	$title=mysqli_real_escape_string($con, trim($_POST['title']));
	$brand=mysqli_real_escape_string($con, trim($_POST['brand']));
	$des=mysqli_real_escape_string($con, trim($_POST['des']));

	$cat=$_POST['cat'];
	$loc=$_POST['loc'];
	$price=$_POST['price'];
	
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
			$upload_dir1 = "../uploads/";
			$file_typ1 = basename($_FILES['file_upload1']['type']);
			$cur_file1=$upload_dir1."/".$target_file1;
			if($target_file1==""){ $f_insnt1="";} else{
			$ran=rand(20000,9999999999);
			$f_insnt1=$title."-$ran.".$file_typ1;
			$rename_file1=$upload_dir1."/".$title."-$ran.".$file_typ1;
			
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
			$upload_dir2 = "../uploads/";
			$file_typ2 = basename($_FILES['file_upload2']['type']);
			$cur_file2=$upload_dir2."/".$target_file2;
			if($target_file2==""){ $f_insnt2="";} else{
			$ran=rand(20000,9999999999);
			$f_insnt2=$title."-$ran.".$file_typ2;
			$rename_file2=$upload_dir2."/".$title."-$ran.".$file_typ2;
			
			if(move_uploaded_file($tmp_file2, $upload_dir2."/".$target_file2)) {
				rename("$cur_file2", "$rename_file2");} 
			else {
				$error = $_FILES['file_upload2']['error'];
				$message = $upload_errors[$error];}}
					
	}
	
	
	if($_FILES['file_upload3']['tmp_name']==""){ $f_insnt3="";	}
	else{

			$tmp_file3 = $_FILES['file_upload3']['tmp_name'];
			$target_file3 = basename($_FILES['file_upload3']['name']);
			$upload_dir3 = "../uploads/";
			$file_typ3 = basename($_FILES['file_upload3']['type']);
			$cur_file3=$upload_dir3."/".$target_file3;
			if($target_file3==""){ $f_insnt3="";} else{
			$ran=rand(20000,9999999999);
			$f_insnt3=$title."-$ran.".$file_typ3;
			$rename_file3=$upload_dir3."/".$title."-$ran.".$file_typ3;
			
			if(move_uploaded_file($tmp_file3, $upload_dir3."/".$target_file3)) {
				rename("$cur_file3", "$rename_file3");} 
			else {
				$error = $_FILES['file_upload3']['error'];
				$message = $upload_errors[$error];}}
					
	}
	
	mysqli_query($con,"insert into product(`title`,`s_cat`,`loc`,`short_des`,`brand`,`price`,`user`,`img1`,`img2`,`img3`,`status`) values('$title',$cat,$loc,'$des','$brand',$price,$u_id,'$f_insnt1','$f_insnt2','$f_insnt3',0)");
	$msg="Product $title inserted Successfully!";
	
}

if(isset($_POST['edit'])){
	$title=mysqli_real_escape_string($con, trim($_POST['title']));
	$brand=mysqli_real_escape_string($con, trim($_POST['brand']));
	$des=mysqli_real_escape_string($con, trim($_POST['des']));

	$cat=$_POST['cat'];
	$loc=$_POST['loc'];
	$price=$_POST['price'];
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
	
	if($_FILES['file_upload1']['tmp_name']==""){ $f_insnt1=$_POST['img1'];	}
	else{
	
			$tmp_file1 = $_FILES['file_upload1']['tmp_name'];
			$target_file1 = basename($_FILES['file_upload1']['name']);
			$upload_dir1 = "../uploads/";
			$file_typ1 = basename($_FILES['file_upload1']['type']);
			$cur_file1=$upload_dir1."/".$target_file1;
			if($target_file1==""){ $f_insnt1="";} else{
			$ran=rand(20000,9999999999);
			$f_insnt1=$title."-$ran.".$file_typ1;
			$rename_file1=$upload_dir1."/".$title."-$ran.".$file_typ1;
			
			if(move_uploaded_file($tmp_file1, $upload_dir1."/".$target_file1)) {
				rename("$cur_file1", "$rename_file1");} 
			else {
				$error = $_FILES['file_upload1']['error'];
				$message = $upload_errors[$error];}}
					
	}
	
	if($_FILES['file_upload2']['tmp_name']==""){ $f_insnt2=$_POST['img2'];	}
	else{

			$tmp_file2 = $_FILES['file_upload2']['tmp_name'];
			$target_file2 = basename($_FILES['file_upload2']['name']);
			$upload_dir2 = "../uploads/";
			$file_typ2 = basename($_FILES['file_upload2']['type']);
			$cur_file2=$upload_dir2."/".$target_file2;
			if($target_file2==""){ $f_insnt2="";} else{
			$ran=rand(20000,9999999999);
			$f_insnt2=$title."-$ran.".$file_typ2;
			$rename_file2=$upload_dir2."/".$title."-$ran.".$file_typ2;
			
			if(move_uploaded_file($tmp_file2, $upload_dir2."/".$target_file2)) {
				rename("$cur_file2", "$rename_file2");} 
			else {
				$error = $_FILES['file_upload2']['error'];
				$message = $upload_errors[$error];}}
					
	}
	
	
	if($_FILES['file_upload3']['tmp_name']==""){ $f_insnt3=$_POST['img3'];	}
	else{

			$tmp_file3 = $_FILES['file_upload3']['tmp_name'];
			$target_file3 = basename($_FILES['file_upload3']['name']);
			$upload_dir3 = "../uploads/";
			$file_typ3 = basename($_FILES['file_upload3']['type']);
			$cur_file3=$upload_dir3."/".$target_file3;
			if($target_file3==""){ $f_insnt3="";} else{
			$ran=rand(20000,9999999999);
			$f_insnt3=$title."-$ran.".$file_typ3;
			$rename_file3=$upload_dir3."/".$title."-$ran.".$file_typ3;
			
			if(move_uploaded_file($tmp_file3, $upload_dir3."/".$target_file3)) {
				rename("$cur_file3", "$rename_file3");} 
			else {
				$error = $_FILES['file_upload3']['error'];
				$message = $upload_errors[$error];}}
					
	}
	
	mysqli_query($con,"update product set title='$title',s_cat=$cat,loc=$loc,short_des='$des',brand='$brand',price=$price,img1='$f_insnt1',img2='$f_insnt2',img3='$f_insnt3' where user=$u_id and id=$id");
	
	$msg="Product $title updated Successfully!";
}

$pro=mysqli_query($con,"select * from product where user=$u_id and status=0");
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
                   
                        <h2 class="title-2"><i class="fa fa-gift"></i> Archive Products </h2>

                        <div class="table-responsive">
                            <div class="table-action">
                                <label for="checkAll">
                                    
                                    <a href="#" class="btn btn-large btn-primary" data-toggle="modal" data-target="#ins">Add New Product <i
                                        class="fa fa-plus-circle"></i></a> 
										
								</label>
								
								
								
								
								
								
								
						<div class="modal fade" id="ins" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
										  <div class="modal-dialog" role="document">
											<div class="modal-content">
											  <div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h3 class="modal-title" id="myModalLabel">Upload New Product</h3>
											  </div>
											  
											  <div class="modal-body">
												<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
												
													  <div class="form-group">
														<label for="inputEmail3" class="col-sm-2 control-label">Title</label>
														<div class="col-sm-10">
														  <input type="text" class="form-control" name="title" placeholder="Enter Title" required>
														</div>
													  </div>
													  
													   <div class="form-group">
														<label for="inputEmail3" class="col-sm-2 control-label">Category</label>
														<div class="col-sm-10">
														  <select type="text" class="form-control" name="cat" required>
																<option value="">Select Category</option>
																
																<?php 	$categ=mysqli_query($con,"select * from sub_cat");
																		
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
																<option value="">Select Location</option>
																
																<?php 	$categ=mysqli_query($con,"select * from s_loc");
																		
																		for($j=0; $j<mysqli_num_rows($categ); $j++){ 
																		$row3=mysqli_fetch_array($categ,MYSQLI_ASSOC);?>
																<option value="<?php echo $row3["id"] ?>"><?php echo $row3["area"] ?></option>
																		<?php } ?>
														  </select>
														</div>
													  </div>
													  
													  <div class="form-group">
														<label for="inputEmail3" class="col-sm-2 control-label">Brand Name</label>
														<div class="col-sm-10">
														  <input type="text" class="form-control" name="brand" placeholder="Type Brand name" required>
														</div>
													  </div>
													  
													  <div class="form-group">
														<label for="inputEmail3" class="col-sm-2 control-label">Description</label>
														<div class="col-sm-10">
														  <textarea type="text" name="des" class="form-control" placeholder="Enter a descriotion of your product"></textarea>
														</div>
													  </div>
													  
													  <div class="form-group">
														<label for="inputEmail3" class="col-sm-2 control-label">Price(BDT)</label>
														<div class="col-sm-10">
														  <input type="number" class="form-control" name="price" placeholder="Enter Product Price" required>
														</div>
													  </div>
													  
													  
													  
													   <div class="form-group">
														<label for="inputEmail3" class="col-sm-2 control-label">Image-1</label>
														<div class="col-sm-10">
														<input type="file" name="file_upload1" class="btn btn-border btn-primary" id="filesToUpload1">
														<input type="hidden" name="MAX_FILE_SIZE1" value="1000000" />
														</div>
													  </div>
													  
													  <div class="form-group">
														<label for="inputEmail3" class="col-sm-2 control-label">Image-2</label>
														<div class="col-sm-10">
														<input type="file" name="file_upload2" class="btn btn-border btn-primary" id="filesToUpload2">
														<input type="hidden" name="MAX_FILE_SIZE2" value="1000000" />
														</div>
													  </div>
													  
													  <div class="form-group">
														<label for="inputEmail3" class="col-sm-2 control-label">Image-3</label>
														<div class="col-sm-10">
														<input type="file" name="file_upload3" class="btn btn-border btn-primary" id="filesToUpload3">
														<input type="hidden" name="MAX_FILE_SIZE3" value="1000000" />
														</div>
													  </div>
													  
													  
													  													
											  </div>
											  
											  <div class="modal-footer">
												<input type="submit" name="inst" class="btn btn-primary" value="Insert Now"></form>
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
                                    <th data-sort-ignore="true"> Adds Details</th>
                                    <th data-type="numeric"> Price</th>
                                    <th> Option</th>
                                </tr>
                                </thead>
                                <tbody>
								
								
								<?php for($i=0; $i<mysqli_num_rows($pro); $i++){ 
									$row_p=mysqli_fetch_array($pro,MYSQLI_ASSOC);?>
                                <tr>
                                    
                                   <td style="width:14%" class="add-img-td"><a href="ads-details.html"><img
                                            class="thumbnail  img-responsive"
                                            src="../uploads/<?php echo $row_p["img1"]; ?>"
                                            alt="No Image"></a></td>
                                    <td style="width:58%" class="ads-details-td">
                                        <div>
                                            <p><strong> <a href="p_view?id=<?php echo $row_p["id"]; ?>"><?php echo $row_p["title"]; ?></a> </strong></p>

                                            <p><strong> Product ID </strong>: <?php echo $row_p["id"]; ?> <strong> Posted On </strong>:
                                                <?php echo $row_p["date"]; ?> </p>

                                            <p><strong>Category:</strong> <?php 
								$s_cat=$row_p["s_cat"]; 
								$cat_r=mysqli_query($con,"select cat,name from sub_cat where id=$s_cat");
								$row_c=mysqli_fetch_array($cat_r,MYSQLI_ASSOC);  
								echo $row_c["name"]; 
								$c_id=$row_c["cat"]; 
								$cat_c=mysqli_query($con,"select name from category where id=$c_id");
								$row_ct=mysqli_fetch_array($cat_c,MYSQLI_ASSOC); 
								echo "(".$row_ct["name"].")";
								?> <strong>Brand:</strong> <?php echo $row_p["brand"]; ?>
                                            </p>
                                        </div>
                                    </td>
                                    <td style="width:16%" class="price-td">
                                        <div><strong> ৳ <?php echo $row_p["price"]; ?></strong></div>
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
												<h3 class="modal-title" id="myModalLabel">Edit Product</h3>
											  </div>
											  
											  <div class="modal-body">
												<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
												
													  <div class="form-group">
														<label for="inputEmail3" class="col-sm-2 control-label">Title</label>
														<div class="col-sm-10">
														  <input type="text" class="form-control" name="title" value="<?php echo $row_p["title"]; ?>" placeholder="Enter Title" required>
														</div>
													  </div>
													  
													   <input type="hidden" value="<?php echo $row_p["id"] ?>" name="id">
													   
													   <div class="form-group">
														<label for="inputEmail3" class="col-sm-2 control-label">Category</label>
														<div class="col-sm-10">
														  <select type="text" class="form-control" name="cat" required>
																<option value="<?php echo $row_p["s_cat"]; ?>"><?php echo $row_p["s_cat"]; ?></option>
																
																<?php 	$categ=mysqli_query($con,"select * from sub_cat");
																		
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
														<label for="inputEmail3" class="col-sm-2 control-label">Brand Name</label>
														<div class="col-sm-10">
														  <input type="text" class="form-control" name="brand" placeholder="Type Brand name" value="<?php echo $row_p["brand"]; ?>" required>
														</div>
													  </div>
													  
													  <div class="form-group">
														<label for="inputEmail3" class="col-sm-2 control-label">Description</label>
														<div class="col-sm-10">
														  <textarea type="text" name="des" class="form-control" placeholder="Enter a descriotion of your product"><?php echo $row_p["short_des"]; ?></textarea>
														</div>
													  </div>
													  
													  <div class="form-group">
														<label for="inputEmail3" class="col-sm-2 control-label">Price(BDT)</label>
														<div class="col-sm-10">
														  <input type="number" class="form-control" name="price" value="<?php echo $row_p["price"]; ?>" placeholder="Enter Product Price" required>
														</div>
													  </div>
													  
													   
												 <div class="form-group">
														<label for="inputEmail3" class="col-sm-2 control-label">Image-1</label>
														<div class="col-sm-10">
														<input type="file" name="file_upload1" class="btn btn-border btn-primary" id="filesToUpload1">
														<input type="hidden" name="MAX_FILE_SIZE1" value="1000000" />
														<img class="img-responsive" src="../uploads/<?php echo $row_p["img1"]; ?>" alt="" style="max-width:20%;">
														<input type="hidden" value="<?php echo $row_p["img1"]; ?>" name="img1">
														</div>
													  </div>
													  
													  <div class="form-group">
														<label for="inputEmail3" class="col-sm-2 control-label">Image-2</label>
														<div class="col-sm-10">
														<input type="file" name="file_upload2" class="btn btn-border btn-primary" id="filesToUpload2">
														<input type="hidden" name="MAX_FILE_SIZE2" value="1000000" />
														<img class="img-responsive" src="../uploads/<?php echo $row_p["img2"]; ?>" alt="" style="max-width:20%;">
														<input type="hidden" value="<?php echo $row_p["img2"]; ?>" name="img2">
														</div>
													  </div>
													  
													  <div class="form-group">
														<label for="inputEmail3" class="col-sm-2 control-label">Image-3</label>
														<div class="col-sm-10">
														<input type="file" name="file_upload3" class="btn btn-border btn-primary" id="filesToUpload3">
														<input type="hidden" name="MAX_FILE_SIZE3" value="1000000" />
														<img class="img-responsive" src="../uploads/<?php echo $row_p["img3"]; ?>" alt="" style="max-width:20%;">
														<input type="hidden" value="<?php echo $row_p["img3"]; ?>" name="img3">
														</div>
													  </div>
													  
													  
													  													
											  </div>
											  
											  <div class="modal-footer">
												<input type="submit" name="edit" class="btn btn-primary" value="Save Change"></form>
											  </div>
											</div>
										  </div>
										</div>
											
											
											
											<p><a class="btn btn-success btn-xs" href="p_view?id=<?php echo $row_p["id"]; ?>"> <i class="fa fa-search-plus"></i> View </a>
                                            </p>
											
											
											
											<p><a class="btn btn-info btn-xs" href="change?id=<?php echo $row_p["id"]; ?>&value=1&page=archive_product"> <i class="fa fa-cube"></i> Live </a>
                                            </p>
											
											
											<p><a href="product?id=<?php echo $row_p["id"]; ?>" class="btn btn-default btn-xs" target="_blank"> <i class=" fa fa-download"></i> Export
                                            </a></p>
											
											
                                            <p><a href="del?id=<?php echo $row_p["id"]; ?>&page=archive_product&field=product" class="btn btn-danger btn-xs"> <i class=" fa fa-trash"></i> Delete
                                            </a></p>
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

	<?php require_once "footer.php"; ?>
