<?php require_once "header.php"; $sum=0;

if(isset($_POST['inst'])){
	$address=mysqli_real_escape_string($con, trim($_POST['address']));
	$comment=mysqli_real_escape_string($con, trim($_POST['commt']));

	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$price=$_POST['price'];
	$product=$_POST['product'];
	$pmnt=$_POST['p_type'];
	
	mysqli_query($con,"insert into invoice(`user`,`price`,`email`,`mobile`,`address`,`product`,`comment`,`payment`) values($u_id,$price,'$email','$phone','$address',$product,'$comment','$pmnt')");
	
	$lst_id=mysqli_insert_id($con);
	$mac= GetMAC();


	$pro=mysqli_query($con,"select * from cart where user='$mac' or user='$u_id'");
	for($i=0; $i<mysqli_num_rows($pro); $i++){ 
		$row_c=mysqli_fetch_array($pro,MYSQLI_ASSOC);
		$pr_id=$row_c['product'];
		$crt_id=$row_c['id'];
		
		mysqli_query($con,"insert into checkout(`product`,`invoice`) values($pr_id,$lst_id)");
		mysqli_query($con,"delete from cart where id=$crt_id");
	}							
		
	Header("Location: invoice?id=$lst_id");
}
?>
    
<script src="../ajax/1.10.1.js"></script>
  <div class="inner-box">
                <div class="col-sm-12 page-content">
                  
                        <h2 class="title-2"><i class="icon-hourglass"></i> All products of Your Cart </h2>

                        <div class="table-responsive" >
                            <div class="table-action">
                                <label for="checkAll">
                                    <a href="clr" class="btn btn-xs btn-danger">Clear Cart <i
                                        class="glyphicon glyphicon-remove "></i></a></label>

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
								
								<?php $pro=mysqli_query($con,"select * from cart where user='$mac' or user='$u_id'");
								for($i=0; $i<mysqli_num_rows($pro); $i++){ 
									$row_c=mysqli_fetch_array($pro,MYSQLI_ASSOC);
									$p_id=$row_c['product'];
									
								$crt_id=$row_c['id'];
									
									$duct=mysqli_query($con,"select * from product where id=$p_id");
									$row_p=mysqli_fetch_array($duct,MYSQLI_ASSOC);
									
									$sum=$sum+$row_p['price'];
									?> 
                                <tr>
                                   
                                    <td style="width:14%" class="add-img-td"><a href="p_view?id=<?php echo $row_p['id']; ?>"><img
                                            class="thumbnail  img-responsive"
                                            src="../uploads/<?php echo $row_p['img1']; ?>"
                                            alt="img"></a></td>
                                    <td style="width:58%" class="ads-details-td">
                                        <div>
                                            <p><strong> <a href="p_view?id=<?php echo $row_p['id']; ?>" title=""><?php echo $row_p['title']; ?></a> </strong></p>
											<p><strong>Brand:</strong> <?php echo $row_p['brand']; ?></p>
                                           <span class="info-row"> <span
                                class="category"><i class="fa fa-briefcase"></i> 
								
								
								<?php 
								$s_cat=$row_p["s_cat"]; 
								$cat_r=mysqli_query($con,"select cat,name from sub_cat where id=$s_cat");
								$row_c=mysqli_fetch_array($cat_r,MYSQLI_ASSOC);  
								echo $row_c["name"]; 
								$c_id=$row_c["cat"]; 
								$cat_c=mysqli_query($con,"select name from category where id=$c_id");
								$row_ct=mysqli_fetch_array($cat_c,MYSQLI_ASSOC); 
								echo "(".$row_ct["name"].")";
								?> 
								
								</span> <span class="item-location"><i
                                class="fa fa-map-marker"></i> 
								
								
								<?php
								$s_loc=$row_p["loc"]; 
								$loc_r=mysqli_query($con,"select area,city from s_loc where id=$s_loc");
								$row_d=mysqli_fetch_array($loc_r,MYSQLI_ASSOC);  
								echo $row_d["area"]; 
								$l_id=$row_d["city"]; 
								$loc_c=mysqli_query($con,"select city from loc where id=$l_id");
								$row_dt=mysqli_fetch_array($loc_c,MYSQLI_ASSOC); 
								echo ", ".$row_dt["city"];

								?> </span> </span>
                                        </div>
                                    </td>
                                    <td style="width:16%" class="price-td">
                                        <div><strong> ৳ <?php echo $row_p['price']; ?></strong></div>
                                    </td>
                                    <td style="width:10%" class="action-td">
                                        <div>
                                            <p><a class="btn btn-primary btn-xs" id="cart<?php echo $i; ?>"> <i class="fa fa-plus-circle"></i> Add Extra </a>
                                            </p>

                                            <p><a href="del?id=<?php echo $crt_id; ?>&field=cart&page=cart" class="btn btn-danger btn-xs"> <i class=" fa fa-trash"></i> Remove
                                            </a></p>
                                        </div>
                                    </td>
                                </tr>
								
								
							
  <script>
  $(document).ready(function(){
	 $('#cart<?php echo $i; ?>').click(function(){
		 
		var id=1;

		$.ajax({
			
			type:'POST',
			
	url:'cartfunction.php?id=<?php echo $row_p["id"]; ?>&f=add',
	data:'id='+id,
	success: function (data) {
	
				
               $('#p_count').html(data);
				
			location.reload();
            
        }
			
			
		})
	 }); 
	 
	 
	  
  });
  </script>
                                
								<?php } ?> 
                               
                             

								<tr>
                                    
                                    <td style="width:14%" class="add-img-td"></td>
                                    <td style="width:58%" class="ads-details-td">
                                        <h3>Total</h3>
                                    </td>
                                    <td style="width:16%" class="price-td">
                                        <div><strong> ৳ <?php echo $sum; ?></strong></div>
                                    </td>
                                    <td style="width:10%" class="action-td">
                                        <div>
                                            <a class="btn btn-primary" data-toggle="modal" data-target="<?php if($sum>0) {echo "#myModal"; }?>">
						<i class="glyphicon glyphicon-shopping-cart"> </i>
						Buy Now
						</a>
                                        </div>
                                    </td>
                                </tr>
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
	

										
										

   <div class="footer" id="footer">
        <div class="container">
            <ul class=" pull-left navbar-link footer-nav">
                <li><a href="#"> About </a> <a href="terms-conditions.html"> Terms and
                    Conditions </a> <a href="#"> Privacy Policy </a> <a href="#"> Contact us </a> <a
                        href="#"> Help </a>
            </ul>
            <ul class=" pull-right navbar-link footer-nav">
                <li> &copy; <?php echo date('Y'); ?> Awwazz.com | Powred by <a href="http://ramsitech.com">RAMS ITECH</a></li>
            </ul>
        </div>

    </div>
    <!--/.footer-->
</div>
<!-- /.wrapper -->

<!-- Le javascript
================================================== -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="myModalLabel"><i class="fa fa-money"></i> Checkout</h3>
      </div>
      <div class="modal-body">
												<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
												
													  <div class="form-group">
														<label for="inputEmail3" class="col-sm-2 control-label">E-mail</label>
														<div class="col-sm-10">
														  <input type="email" class="form-control" name="email" value="<?php echo $_SESSION['email']; ?>" placeholder="Enter email address" required>
														</div>
													  </div>
													  
													  <div class="form-group">
														<label for="inputEmail3" class="col-sm-2 control-label">Contact Number</label>
														<div class="col-sm-10">
														  <input type="text" class="form-control" name="phone" value="<?php echo $_SESSION['mobile']; ?>" placeholder="Enter contact number" required>
														</div>
													  </div>
													  

													  <div class="form-group">
														<label for="inputEmail3" class="col-sm-2 control-label">Delivery Address</label>
														<div class="col-sm-10">
														  <textarea type="text" name="address" class="form-control" placeholder="Enter detailed delivery address"></textarea>
														</div>
													  </div>
													  
													  
													  
													   <div class="form-group">
														<label for="inputEmail3" class="col-sm-2 control-label">Comment</label>
														<div class="col-sm-10">
														  <textarea type="text" name="commt" class="form-control" placeholder="Type extra details like size,color etc."></textarea>
														</div>
													  </div>
													  
													  
													  
													  <div class="form-group">
														<label for="inputEmail3" class="col-sm-2 control-label">Total Price(BDT)</label>
														<div class="col-sm-10">
														  <input type="text" class="form-control" name="price" value="<?php echo $sum; ?>" disabled>
														</div>
													  </div>
													  
													   <div class="form-group">
														<label for="inputEmail3" class="col-sm-2 control-label">Payment Method</label>
														<div class="col-sm-10">
														  <select class="form-control" name="p_type">
																<option value="Cash on Delivery">Cash on Delivery</option>
																
														  </select>
														</div>
													  </div>
													  
													  
													  <input name="price" type="hidden" value="<?php echo $sum; ?>">
													  <input name="product" type="hidden" value="<?php echo $i; ?>">
													   
													  
													  
													  													
											  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       <input type="submit" name="inst" class="btn btn-primary" value="GO"></form>
      </div>
    </div>
  </div>
</div>



<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>

<!-- include carousel slider plugin  -->
<script src="../assets/js/owl.carousel.min.js"></script>

<!-- include equal height plugin  -->
<script src="../assets/js/jquery.matchHeight-min.js"></script>

<!-- include jquery list shorting plugin plugin  -->
<script src="../assets/js/hideMaxListItem.js"></script>

<!-- bxSlider Javascript file -->
<script src="../assets/plugins/bxslider/jquery.bxslider.min.js"></script>
<script>
    $('.bxslider').bxSlider({
        pagerCustom: '#bx-pager'
    });


</script>
<!-- include form-validation plugin || add this script where you need validation   -->

<!-- include jquery.fs plugin for custom scroller and selecter  -->
<script src="../assets/plugins/jquery.fs.scroller/jquery.fs.scroller.js"></script>
<script src="../assets/plugins/jquery.fs.selecter/jquery.fs.selecter.js"></script>
<!-- include custom script for site  -->
<script src="../assets/js/script.js"></script>
</body>
</html>
