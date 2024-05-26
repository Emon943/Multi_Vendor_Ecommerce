<?php require_once "header.php"; 

?>
 <div class="inner-box">
                <div class="col-sm-12 page-content">
              

					<div class="row ">
                    <div class="col-sm-12 blogLeft">
                        <div class="blog-post-wrapper">


                            <article class="blog-post-item">
                               


                                    <!--blog image-->
                                    <div class="blog-post-img">

                                        <a href="blog-details.html">
                                            <figure>
                                                <img class="img-responsive" alt="blog-post image" src="../images/seller/<?php echo $_SESSION['cover']; ?>">
                                            </figure>
											<img class="img-thumbnail" src="../images/seller/<?php echo $_SESSION['pro']; ?>" style="width:25%; margin:-15% 0 0 2%; padding:none;">
											<h1 style="margin-right:10px;float:right; padding:5px; background:none;"><a href="#"><i class="glyphicon glyphicon-ok-sign" style="color: #16A085; font-size:16px;"></i> <?php echo $_SESSION['company']; ?></a></h1>
											<div style="float:right; margin:8% -27% 0 0;">
											<i class="glyphicon glyphicon-star" style="font-size:13px;"></i>
											<i class="glyphicon glyphicon-star" style="font-size:13px;"></i>
											<i class="glyphicon glyphicon-star-empty" style="font-size:13px;"></i>
											<i class="glyphicon glyphicon-star-empty" style="font-size:13px;"></i>
											<i class="glyphicon glyphicon-star-empty" style="font-size:13px;"></i>
											</div>
											
											
                                        </a>
									
                                    </div>
									
									<div class="col-lg-12  box-title no-border">
												<div class="inner"><h2><span>About</span>
													<?php echo $_SESSION['company']; ?> </h2> 
												</div>
												
											</div>
                                   <p style="text-align:justify; padding:15px;"><?php echo $_SESSION['short_des']; ?></p>
								   <div class="col-lg-12  box-title no-border">
												<div class="inner"><h2><span>All</span>
													Products </h2>
												</div>
											</div>
								   

                                    <div class="blog-post-content-desc">
                                        <div class="blog-post-content">
                                          
											
											

											<div class="row">
                                                 <div class="adds-wrapper hasGridView">
												 
												 
												 <?php $pro=mysqli_query($con,"select * from product where user=$u_id and status=1");
												 for($i=0; $i<mysqli_num_rows($pro); $i++){ 
													$row_p=mysqli_fetch_array($pro,MYSQLI_ASSOC);
													?>
												 
														<div class=" item-list make-grid " style="border: 1px solid #EDEDED;">


															<div class="col-sm-2 no-padding photobox">
																<div class="add-image"> <a href="p_view?id=<?php echo $row_p["id"]; ?>"><img
																		class="thumbnail no-margin" src="../uploads/<?php echo $row_p["img1"]; ?>"
																		alt="No Image" style="height:100px; width:120px;"></a></div>
															</div>
															<!--/.photobox-->
															<div class="col-sm-7 add-desc-box">
																<div class="add-details">
																	<h5 class="add-title"><a href="p_view?id=<?php echo $row_p["id"]; ?>">
																		<?php echo $row_p["title"]; ?> </a></h5>
																		<strong>৳ <?php echo $row_p["price"]; ?></strong>
																</div>
																
																<span class="info-row">
																			  <span class="category"><i class="fa fa-briefcase"></i> <?php 
								$s_cat=$row_p["s_cat"]; 
								$cat_r=mysqli_query($con,"select cat,name from sub_cat where id=$s_cat");
								$row_c=mysqli_fetch_array($cat_r,MYSQLI_ASSOC);  
								echo $row_c["name"]; 
								
								?> </span>
																</span>
															</div>
															
														
														</div>

														

												 <?php } ?>
														

                            
                           

											</div>

                                            </div>


                                        </div>


                                       
                                    </div>

                                  


                                </div>
                            </article>


                        </div>
                        <!--/.blog-post-wrapper-->
                    </div>
                    <!--blogLeft-->



                </div>
			  
                


                </div>
                <!--/.page-content-->
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </div>
    <!-- /.main-container -->
</div>
	<?php require_once "footer.php"; ?>
