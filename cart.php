<?php require_once "header.php"; $sum=0;?>
    <div class="main-container">
        <div class="container">
            <div class="row">


                <div class="col-sm-12 page-content">
                    <div class="inner-box">
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
								
								<?php $pro=mysqli_query($con,"select * from cart where user='$mac'");
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
                                            src="uploads/<?php echo $row_p['img1']; ?>"
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
								
								
								<script type="text/javascript" src="assets/js/jquery-2.2.2.min.js"></script>
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
                                            <a class="btn btn-primary" data-toggle="modal" data-target="#ins">
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
    <!-- /.main-container -->

    <div class="footer" id="footer">
        <div class="container">
            <ul class=" pull-left navbar-link footer-nav">
                <li><a href="index.html"> Home </a> <a href="about-us.html"> About us </a> <a href="terms-conditions.html"> Terms and
                    Conditions </a> <a href="#"> Privacy Policy </a> <a href="contact.html"> Contact us </a> <a
                        href="faq.html"> FAQ </a>
            </ul>
            <ul class=" pull-right navbar-link footer-nav">
                <li> &copy; 2015 BootClassified</li>
            </ul>
        </div>

    </div>
    <!--/.footer-->
</div>
<!-- /.wrapper -->

<!-- Le javascript
================================================== -->

<div class="modal fade" id="ins" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
										  <div class="modal-dialog" role="document">
											<div class="modal-content">
											  <div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h2 class="modal-title" id="myModalLabel">Alart!</h2>
											  </div>
											  
											  <div class="modal-body">
												
												
													 <center> 
													 <i class="fa fa-info-circle" style="color: rgb(231,76,60); font-size:60px;"></i><br><br>
													 <h3>For buy those items please login and go to your cart for complete checkout.</h3> 
													 <br>
													 <a href="login" class="btn btn-primary"><i class="fa fa-sign-in"> </i> Login Now</a>
													 <a class="btn btn-danger" data-dismiss="modal" aria-label="Close"><i class="glyphicon glyphicon-shopping-cart"> </i> Continue Shoping</a>
													 </center>
												  
													  
													  													
											  </div>
											  
											 
											</div>
										  </div>
										</div>



<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>

<!-- include checkRadio plugin //Custom check & Radio  -->
<script type="text/javascript" src="assets/js/icheck.min.js"></script>


<!-- include carousel slider plugin  -->
<script src="assets/js/owl.carousel.min.js"></script>

<!-- include equal height plugin  -->
<script src="assets/js/jquery.matchHeight-min.js"></script>

<!-- include jquery list shorting plugin plugin  -->
<script src="assets/js/hideMaxListItem.js"></script>

<!-- include footable   -->

<script src="assets/js/footable.js?v=2-0-1" type="text/javascript"></script>
<script src="assets/js/footable.filter.js?v=2-0-1" type="text/javascript"></script>
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
<!-- include custom script for ads table [select all checkbox]  -->
<script>

    function checkAll(bx) {
        var chkinput = document.getElementsByTagName('input');
        for (var i = 0; i < chkinput.length; i++) {
            if (chkinput[i].type == 'checkbox') {
                chkinput[i].checked = bx.checked;
            }
        }
    }

</script>

<!-- include jquery.fs plugin for custom scroller and selecter  -->
<script src="assets/plugins/jquery.fs.scroller/jquery.fs.scroller.js"></script>
<script src="assets/plugins/jquery.fs.selecter/jquery.fs.selecter.js"></script>
<!-- include custom script for site  -->
<script src="assets/js/script.js"></script>
</body>
</html>
