<?php require_once "header.php";

		$product=$_GET["product"];
		$market=$_GET["market"];
		
		$q="select * from product where (title like '%$product%' or short_des like '%$product%') and (user in(select id from user where market=$market and type=1))";
		
		if(isset($_POST['srch'])){
			$topic=$_POST['topic'];
			$srch_cat=$_POST['cat'];
			$q="select * from product where s_cat=$srch_cat and(title like '%$topic%' or short_des like '%$topic%')";
		}
		?>
    <div class="search-row-wrapper">
        <div class="container text-center"><form method="POST" action="">
            <div class="col-sm-6">
                <input class="form-control keyword" type="text" placeholder="Type what you want" name="topic" required>
            </div>
            <div class="col-sm-4">
                <select class="form-control" name="cat" required>
                    <option selected="selected" value="">Select Category</option>
					
					<?php $pro=mysqli_query($con,"select * from category");
											for($i=0; $i<mysqli_num_rows($pro); $i++){ 
												$row1=mysqli_fetch_array($pro,MYSQLI_ASSOC); 
												
												$m_id=$row1["id"];
												$m_name=$row1["name"]; ?>
												
												 <option value="<?php echo $m_id; ?>" style="background-color:#E9E9E9;font-weight:bold;" disabled="disabled"> 
													<?php echo $m_name; ?> 
												</option>
											<?php	
												$qry=mysqli_query($con,"select * from sub_cat where cat=$m_id");
													for($j=0; $j<mysqli_num_rows($qry); $j++){ 
														$row_c=mysqli_fetch_array($qry,MYSQLI_ASSOC);
												?>

										<option value="<?php echo $row_c["id"]; ?>"> <?php echo $row_c["name"]; ?></option>
                     
										<?php } ?>
							  
					<?php } ?> 
					
                </select>
            </div>
            
            <div class="col-sm-2">
                <input class="btn btn-block btn-primary  " type="submit" value="GO" name="srch">
            </div>
        </div></form>
    </div>
    <!-- /.search-row -->
        <div class="main-container">
        <div class="container">
            <div class="row">
                <!-- this (.mobile-filter-sidebar) part will be position fixed in mobile version -->
                <div class="col-sm-3 page-sidebar mobile-filter-sidebar">
                    <aside>
                        <div class="inner-box">
                            <div class="categories-list  list-filter">
                                <h5 class="list-title"><strong><a href="#">All Categories</a></strong></h5>
                                <ul class=" list-unstyled">
								<?php $pro=mysqli_query($con,"select * from category");
											for($i=0; $i<mysqli_num_rows($pro); $i++){ 
												$row1=mysqli_fetch_array($pro,MYSQLI_ASSOC); ?>
                                    <li><a href="cat_product?id=<?php echo $row1['id']; ?>"><span class="title"><?php echo $row1['name']; ?></span></a></li>
											<?php } ?>
                                </ul>
                            </div>
                            <!--/.categories-list-->


                            <div class="locations-list  list-filter">
                                <h5 class="list-title"><strong><a href="#">Price range</a></strong></h5>

                                <form role="form" class="form-inline " action="">
                                    <div class="form-group col-sm-4 no-padding">
                                        <input type="text" placeholder="৳ 10 " id="minPrice" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-1 no-padding text-center hidden-xs"> -</div>
                                    <div class="form-group col-sm-4 no-padding">
                                        <input type="text" placeholder="৳ 10000 " id="maxPrice" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-3 no-padding">
                                        <button class="btn btn-default pull-right btn-block-xs" type="button">GO
                                        </button>
                                    </div>
                                </form>
                                <div style="clear:both"></div>
                            </div>
                            <!--/.list-filter-->
							
							
							<div class="locations-list  list-filter">
                                <h5 class="list-title"><strong><a href="#">Markets</a></strong></h5>
                                <ul class="browse-list list-unstyled long-list">
                                   
                                   <?php $pro=mysqli_query($con,"select * from market where status=1");
											for($i=0; $i<mysqli_num_rows($pro); $i++){ 
												$row1=mysqli_fetch_array($pro,MYSQLI_ASSOC); ?>
                                    <li><a href="market?id=<?php echo $row1['id']; ?>"><span class="title"><?php echo $row1['name']; ?></span></a></li>
											<?php } ?>
                                    
                                </ul>
                            </div>
							
							
                            <div class="locations-list  list-filter">
                                <h5 class="list-title"><strong><a href="#">Seller</a></strong></h5>
                                <ul class="browse-list list-unstyled long-list">
                                   
                                   <?php $pro=mysqli_query($con,"select * from user where type=1");
											for($i=0; $i<mysqli_num_rows($pro); $i++){ 
												$row1=mysqli_fetch_array($pro,MYSQLI_ASSOC); ?>
                                    <li><a href="vendor?id=<?php echo $row1['id']; ?>"><span class="title"><?php echo $row1['company']; ?></span></a></li>
											<?php } ?>
                                    
                                </ul>
                            </div>
                           
                            <div style="clear:both"></div>
                        </div>

                        <!--/.categories-list-->
                    </aside>
                </div>
                <!--/.page-side-bar-->
                <div class="col-sm-9 page-content col-thin-left">

                    <div class="category-list">
                        

                        <div class="listing-filter">
                            <div class="pull-left col-xs-6">
                                <div class="breadcrumb-list"><a href="#" class="current"> <span>All ads</span></a> 

                                </div>
                            </div>
                            <div class="pull-right col-xs-6 text-right listing-view-action"><span
                                    class="list-view "><i class="  icon-th"></i></span> <span
                                    class="compact-view"><i class=" icon-th-list  "></i></span> <span
                                    class="grid-view active"><i class=" icon-th-large "></i></span></div>
                            <div style="clear:both"></div>
                        </div>
                        <!--/.listing-filter-->

                        <!-- Mobile Filter bar-->
                        <div class="mobile-filter-bar col-lg-12  ">
                            <ul class="list-unstyled list-inline no-margin no-padding">
                                <li class="filter-toggle">
                                    <a class="">
                                        <i class="  icon-th-list"></i>
                                        Filters
                                    </a>
                                </li>
                                <li>


                                    <div class="dropdown">
                                        <a data-toggle="dropdown" class="dropdown-toggle"><i class="caret "></i> Short
                                            by </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="" rel="nofollow">Relevance</a></li>
                                            <li><a href="" rel="nofollow">Date</a></li>
                                            <li><a href="" rel="nofollow">Company</a></li>
                                        </ul>
                                    </div>

                                </li>
                            </ul>
                        </div>
                        <div class="menu-overly-mask"></div>
                        <!-- Mobile Filter bar End-->


                        <div class="adds-wrapper hasGridView">
                            

                          <?php	$qry=mysqli_query($con,$q);
								for($j=0; $j<mysqli_num_rows($qry); $j++){ 
									$row_p=mysqli_fetch_array($qry,MYSQLI_ASSOC); ?>

                            <div class=" item-list make-grid">
                                <div class="cornerRibbons urgentAds">
                                    <a href="#"> Top Product</a>
                                </div>
                                <div class="col-sm-2 no-padding photobox">
                                    <div class="add-image"><a href="p_view?id=<?php echo $row_p["id"]; ?>"><img
                                            class="thumbnail no-margin"
                                            src="uploads/<?php echo $row_p["img1"]; ?>"
                                            alt="No image" style="height:100px; width:120px;"></a></div>
                                </div>
                                <!--/.photobox-->
                                <div class="col-sm-7 add-desc-box">
                                    <div class="add-details">
                                        <h5 class="add-title"><a href="p_view?id=<?php echo $row_p["id"]; ?>"> <?php echo $row_p["title"]; ?></a></h5>
                                        <span class="info-row"> <span class="add-type business-ads tooltipHere"
                                                                      data-toggle="tooltip" data-placement="right"
                                                                      title="<?php echo $row_p["brand"]; ?>">B </span> <span>View: <?php echo $row_p["view"]; ?></span>  <br>
												<span class="date"><i class=" icon-clock"> </i> <?php echo $row_p["date"]; ?> </span><br>
												<span class="category"><i class="fa fa-briefcase"> </i> <?php 
								$s_cat=$row_p["s_cat"]; 
								$cat_r=mysqli_query($con,"select cat,name from sub_cat where id=$s_cat");
								$row_c=mysqli_fetch_array($cat_r,MYSQLI_ASSOC);  
								
								$c_id=$row_c["cat"]; 
								$cat_c=mysqli_query($con,"select name from category where id=$c_id");
								$row_ct=mysqli_fetch_array($cat_c,MYSQLI_ASSOC); 
								echo $row_ct["name"];
								?>  </span>
												
										</span>
									</div>
                                </div>
                                <!--/.add-desc-box-->
                                <div class="col-sm-3 text-right  price-box">
                                    <h2 class="item-price"> ৳ <?php echo $row_p["price"]; ?> </h2>
                                    <a class="btn btn-default  btn-sm make-favorite"> <i class="fa fa-cart-plus"></i> <span>cart</span>
                                    </a></div>
                                <!--/.add-desc-box-->
                            </div>
                            <!--/. item-list make-grid-->

								<?php } ?>


                        </div>
                        <!--/.adds-wrapper-->

                        <div class="tab-box  save-search-bar text-center">
								 <div class="pagination-bar text-center">
									<ul class="pagination">
										<li class="active"><a href="#">1</a></li>
										<li><a href="#">2</a></li>
										<li><a href="#">3</a></li>
										<li><a href="#">4</a></li>
										<li><a href="#">5</a></li>
										<li><a href="#"> ...</a></li>
										<li><a class="pagination-btn" href="#">Next &raquo;</a></li>
									</ul>
								</div>
                    <!--/.pagination-bar -->
						</div>
                    </div>
                   

                

                </div>
                <!--/.page-content-->

            </div>
        </div>
    </div>
    <!-- /.main-container -->

<?php require_once "footer.php"; ?>