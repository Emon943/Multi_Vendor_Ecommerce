<?php require_once "header.php";
		
		$p_id=$_GET['id'];
		$pro=mysqli_query($con,"select * from market where id=$p_id");
		$row_u=mysqli_fetch_array($pro,MYSQLI_ASSOC);
		
		
		
		?><!DOCTYPE html>

	

    <div class="main-container inner-page">
        <div class="container">
            <div class="section-content">
                <div class="row ">
                    <div class="col-sm-8 blogLeft">
                        <div class="blog-post-wrapper">


                            <article class="blog-post-item">
                                <div class="inner-box">


                                    <!--blog image-->
                                    <div class="blog-post-img">

                                        <a href="blog-details.html">
                                            <figure>
                                                <img class="img-responsive" alt="blog-post image" src="images/mall/<?php echo $row_u['cover']; ?>">
                                            </figure>
											
											<h1 style="margin-right:10px;float:right; padding:5px; background:none;"><a href="#"><i class="glyphicon glyphicon-ok-sign" style="color: #16A085; font-size:16px;"></i> <?php echo $row_u['name']; ?></a></h1>
											
											
											
                                        </a>
									
                                    </div>
									
								
                                   
								  
								   <div class="col-lg-12  box-title no-border">
												<div class="inner"><h2><span>All</span>
													Shops </h2>
												</div>
											</div>
								   

                                    <div class="blog-post-content-desc">
                                        <div class="blog-post-content">
                                          
											
											

											<div class="row">
                                                 <div class="adds-wrapper hasGridView">
												 
												 
												 <?php $pro=mysqli_query($con,"select * from user where market=$p_id and status=1");
												 for($i=0; $i<mysqli_num_rows($pro); $i++){ 
													$row_p=mysqli_fetch_array($pro,MYSQLI_ASSOC);
													?>
												 
														<div class=" item-list make-grid " style="border: 1px solid #EDEDED;">


															<div class="col-sm-2 no-padding photobox">
																<div class="add-image"> <a href="vendor?id=<?php echo $row_p["id"]; ?>"><img
																		class="thumbnail no-margin" src="images/seller/<?php echo $row_p["pro"]; ?>"
																		alt="No Image" style="height:100px; width:120px;"></a></div>
															</div>
															<!--/.photobox-->
															<div class="col-sm-7 add-desc-box">
																<div class="add-details">
																	<h5 class="add-title"><a href="vendor?id=<?php echo $row_p["id"]; ?>">
																		<?php echo $row_p["company"]; ?> </a></h5>
																		</strong>
																</div>
																
															
															</div>
															
														
														</div>

														

												 <?php } ?>
														

                            
                           

											</div>

                                            </div>


                                        </div>


                                        <div class="clearfix">
                                            <div class="col-md-12  blog-post-bottom">

                                                <ul class="share-this-post">
                                                    <li>Social Links:</li>

                                                    <li><a class="google-plus"><i class="fa fa-google-plus"></i>Google-plus</a>
                                                    </li>
                                                    <li><a class="facebook"><i class="fa fa-facebook"></i>Facebook</a>
                                                    </li>
                                                    <li><a><i class="fa fa-twitter"></i>Twitter</a>
                                                    </li>
                                                    <li><a class="pinterest"><i
                                                            class="fa fa-pinterest"></i>Pinterest</a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                  


                                </div>
                            </article>


                        </div>
                        <!--/.blog-post-wrapper-->
                    </div>
                    <!--blogLeft-->


                    <div class="col-sm-4 blogRight page-sidebar">
                        <aside>
                            <div class="inner-box">
                                <div class="categories-list  list-filter">
                                    <h5 class="list-title uppercase"><strong><a href="#"> Market Info</a></strong></h5>

                            <div class="panel-content user-info">
                                <div class="panel-body text-center">
                                    <div class="seller-info">
                                        <h3 class="no-margin"><?php echo $row_u['name']; ?></h3>

                                        <p><strong><?php echo $row_u['location']; ?></strong></p>

                                        
                                    </div>
									
                                    
									
									
                                </div>
                            </div>      
                         </div>
                                <!--/.categories-list-->
                                <div class="categories-list  list-filter">
                                    


                                    <div class="blog-popular-content">
                                       


                                            <div class="inner-box no-padding">
												<div class="inner-box-content">
													<a href="#"><img class="img-responsive" src="images/site/app.jpg" alt="tv"></a>
												</div>
											</div>


											<div class="inner-box no-padding">
												<img class="img-responsive" src="images/add2.jpg" alt="">
											</div>


                                       

                                        

                                      


                                    </div>


                                    <div style="clear:both"></div>

                                    <!--/.categories-list-->

                                </div>

                            </div>
                        </aside>
                    </div>
                    <!--page-sidebar-->

                </div>
            </div>

        </div>
    </div>
    <!-- /.main-container -->
    
<?php require_once "footer.php"; ?>
