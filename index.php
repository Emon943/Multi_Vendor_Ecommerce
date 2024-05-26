
<?php include('header.php'); ?>







<div class="modal fade" id="welcome" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
										  <div class="modal-dialog" role="document">
											<div class="modal-content">
											  <div class="modal-header">
												
												<center><h1 class="modal-title" id="myModalLabel">Welcome to Awwazz.com</h1></center>
											  </div>
											  
											  <div class="modal-body">
												
												
													 <center> <form action="ad_search" method="get">
													 <img src="images/welcome.png" class="image-responsive" alt="" style="height:150px;">
													 <h3><strong>First time in Awwazz?</strong><br>Let us try to help to find your right product.</h3>
													 <br> </center>
													 
													 
													 <div class="form-group">
														<label for="sender-email" class="control-label">From where you want to shop?</label>

														<div class="input-icon">
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
														<label for="sender-email" class="control-label">What you want to shop?</label>

														<div class="input">
															<input id="sender-email" name="product" type="text" placeholder="Type what are you want"
																   class="form-control email">
														</div>
													</div>
													
													
													
													<center> 
													 <br>
													 <button type="submit" class="btn btn-primary"><i class="fa fa-search"> </i> Shop Now</button>
													 <a class="btn btn-danger" data-dismiss="modal" aria-label="Close"><i class="icon-smiley"> </i> No Thanks</a>
													 </form>
													 </center>
												  
													  
													  													
											  </div>
											  
											 
											</div>
										  </div>
										</div>
										
										<style>
										.item{
											max-height:350px;
											
										}
										.item img{
											
											width:100%!important;
										}
										.intro-1{
											position: absolute;
										}
										
										</style>
										
	 <div class="intro-1" >
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
 
  
  <div class="carousel-inner" role="listbox">
    <div class="item active">
           <img src="images/slider/696.jpg" alt="">
      <div class="carousel-caption">
       
      </div>
    </div>
    <div class="item">
      <img src="images/slider/bg.jpg" alt="">
      <div class="carousel-caption">
      
      </div>
    </div>
	 <div class="item">
      <img src="images/slider/O6T7GZ0.jpg" alt="" >
      <div class="carousel-caption">
      
      </div>
    </div>
	 <div class="item">
      <img src="images/slider/OCD8IF0.jpg" alt="" >
      <div class="carousel-caption">
      
      </div>
    </div>
	
	 <div class="item">
      <img src="images/slider/OCDA1N0.jpg" alt="" >
      <div class="carousel-caption">
      
      </div>
    </div>
	
	 <div class="item">
      <img src="images/slider/OF8OMD0.jpg" alt="" >
      <div class="carousel-caption">
      
      </div>
    </div>
  
  </div>

 
</div>
</div>
 

	

  <div class="intro" >
        <div class="dtable hw100">
            <div class="dtable-cell hw100">
                <div class="container text-center">
                    <h1 class="intro-title animated fadeInDown"> Find Your Product </h1>

                    <p class="sub animateme fittext3 animated fadeIn"> Find what you want from our stores... </p>

                    <div class="row search-row animated fadeInUp">
                        <form action="search" method="GET">
                        <div class="col-lg-8 col-sm-8 search-col relative"><i class="icon-docs icon-append"></i>
                            <input type="text" name="topic" class="form-control has-icon"
                                   placeholder="I'm looking for a ..." value="">
                        </div>
                        <div class="col-lg-4 col-sm-4 search-col">
                            <button class="btn btn-primary btn-search btn-block" type="submit"><i
                                    class="icon-search"></i><strong>Find</strong></button>
                        </div></form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- /.intro -->

    <div class="main-container">
        <div class="container">

		
            <div class="col-lg-12 content-box ">
                <div class="row row-featured row-featured-category">
                    <div class="col-lg-12  box-title no-border">
                        <div class="inner"><h2><span>Browse by</span>
                            Category <!--<a href="category.html" class="sell-your-item"> View more <i
                                    class="  icon-th-list"></i> --></a></h2>
                        </div>
                    </div>
					
					<?php $pro=mysqli_query($con,"select * from category");
					for($i=0; $i<mysqli_num_rows($pro); $i++){ 
						$row1=mysqli_fetch_array($pro,MYSQLI_ASSOC); ?>

                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-4 f-category">
                        <a href="cat_product?id=<?php echo $row1['id']; ?>"><img src="images/category/<?php echo $row1['img']; ?>" class="img-responsive" alt="">
                            <h6> <?php echo $row1['name']; ?> </h6></a>
                    </div>
					
					<?php } ?>

                    

                </div>


            </div>

            <div style="clear: both"></div>
			
			
			
			<?php $pro=mysqli_query($con,"select * from category");
					for($i=0; $i<mysqli_num_rows($pro); $i++){ 
						$row1=mysqli_fetch_array($pro,MYSQLI_ASSOC); 
								$c_id=$row1['id'];
								$c_name=$row1['name'];
								$c_icon=$row1['icon'];
								
								$qry=mysqli_query($con,"select * from product where s_cat in(select id from sub_cat where cat=$c_id)");
								if(mysqli_num_rows($qry)>0){
							
						?>
			
			
			
			<div class="col-lg-12 content-box ">
                <div class="row row-featured">

                    <div style="clear: both"></div>

                    <div class=" relative  content  clearfix">
                            <div class="tab-lite">
                                <ul class="nav nav-tabs " role="tablist">
                                    <li role="presentation"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab"><i class="fa fa-<?php echo $c_icon; ?>"></i> All products of <strong><?php echo $c_name; ?></strong> </a></li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="tab1">

                                       

                                           <div class=" relative  content featured-list-row clearfix">
												<nav class="slider-nav has-white-bg nav-narrow-svg">
													<a class="prev">
														<span class="nav-icon-wrap"></span>

													</a>
													<a class="next">
														<span class="nav-icon-wrap"></span>
													</a>
												</nav>
												

												<div class="no-margin featured-list-slider ">
													
												<?php	
								for($j=0; $j<mysqli_num_rows($qry); $j++){ 
									$row_p=mysqli_fetch_array($qry,MYSQLI_ASSOC); ?>

													<div class="item">
														<a href="p_view?id=<?php echo $row_p['id']; ?>">
															 <span class="item-carousel-thumb">
																<img class="img-responsive" src="uploads/<?php echo $row_p['img1']; ?>" alt="No Image Found" style="height:100px; width: 120px;">
															 </span>
															<span class="item-name"> <?php echo $row_p['title']; ?></span>
															<span class="price"> ৳ <?php echo $row_p['price']; ?> </span>
														</a>
													</div>

								<?php } ?>	
								
								
													
											
												</div>
										</div>
										
                                    </div>
                    
                                </div>
                            </div>	
                    </div>
				
                </div>
            </div>
			
			
			
					<?php } }?>
			
			
			
			
			
			
			





            <div class="row">


        
				
				
				 <div class="col-lg-9 content-box ">
                <div class="row row-featured">

                    <div style="clear: both"></div>

                    <div class=" relative  content  clearfix">
						<div class="tab-lite">

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs " role="tablist">
                                    <li role="presentation" class="active"><a href="#tab1" aria-controls="tab1"
                                                                              role="tab" data-toggle="tab"><i
                                            class="icon-location-2"></i> Find Products Individually </a></li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="tab1">

                                        <div class="col-lg-12 tab-inner">

                                            <div class="row">

											<?php $pro=mysqli_query($con,"select * from category");
					for($i=0; $i<mysqli_num_rows($pro); $i++){ 
						$row1=mysqli_fetch_array($pro,MYSQLI_ASSOC); ?>
											
                                                <ul class="cat-list cat-list-border col-sm-4  col-xs-6 col-xxs-12">
												<h3 class="cat-title">
														<a href="category?id=<?php echo $c_id=$row1["id"]; ?>"><i class="fa fa-<?php echo $row1["icon"]; ?> ln-shadow"></i><?php echo $row1["name"]; ?> <span class="count"><?php echo rand(99,9999); ?></span> </a>

													<span data-target=".cat-id-1" data-toggle="collapse" class="btn-cat-collapsed collapsed">
													<span class=" icon-down-open-big"></span> </span>
												</h3>
												
													<?php $s_pro=mysqli_query($con,"select * from sub_cat where cat=$c_id");
																	for($j=0; $j<mysqli_num_rows($s_pro); $j++){ 
																		$row2=mysqli_fetch_array($s_pro,MYSQLI_ASSOC); ?>
																		
																						<li><i class="fa fa-<?php echo $row2["icon"]; ?>"></i> <a href="category?id=<?php echo $row2["id"]; ?>"><?php echo $row2["name"]; ?></a></li>
																	<?php } ?>
                                                </ul>

			<?php } ?>
                                                


                                            </div>

                                        </div>


                                    </div>
                             
                                  
                                </div>

                            </div>

                     
                    </div>

                </div>
            </div>
			
			
			
			
                <div class="col-sm-3 page-sidebar col-thin-left">
                    <aside>
                       
						<div class="inner-box no-padding">
                            <div class="inner-box-content"><a href="#"><img class="img-responsive"
                                                                            src="images/site/app.jpg" alt="tv"></a>
                            </div>
                        </div>
						
						<!--<div class="inner-box no-padding">
                            <div class="inner-box-content"><a href="#"><img class="img-responsive"
                                                                            src="images/bijoy.jpg" alt="tv"></a>
                            </div>
                        </div>-->

                        <div class="inner-box no-padding"><img class="img-responsive" src="images/add2.jpg" alt="">
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- /.main-container -->

    <div class="page-info hasOverly" style="background: url(images/bg.jpg); background-size:cover">
        <div class="bg-overly">
            <div class="container text-center section-promo">
                <div class="row">
                    <div class="col-sm-3 col-xs-6 col-xxs-12">
                        <div class="iconbox-wrap">
                            <div class="iconbox">
                                <div class="iconbox-wrap-icon">
                                    <i class="icon  icon-group"></i>
                                </div>
                                <div class="iconbox-wrap-content">
                                    <h5><span>22</span></h5>

                                    <div class="iconbox-wrap-text">Trusted Seller</div>
                                </div>
                            </div>
                            <!-- /..iconbox -->
                        </div>
                        <!--/.iconbox-wrap-->
                    </div>

                    <div class="col-sm-3 col-xs-6 col-xxs-12">
                        <div class="iconbox-wrap">
                            <div class="iconbox">
                                <div class="iconbox-wrap-icon">
                                    <i class="icon  icon-th-large-1"></i>
                                </div>
                                <div class="iconbox-wrap-content">
                                    <h5><span>38</span></h5>

                                    <div class="iconbox-wrap-text">Categories</div>
                                </div>
                            </div>
                            <!-- /..iconbox -->
                        </div>
                        <!--/.iconbox-wrap-->
                    </div>

                    <div class="col-sm-3 col-xs-6  col-xxs-12">
                        <div class="iconbox-wrap">
                            <div class="iconbox">
                                <div class="iconbox-wrap-icon">
                                    <i class="icon  icon-map"></i>
                                </div>
                                <div class="iconbox-wrap-content">
                                    <h5><span>15</span></h5>

                                    <div class="iconbox-wrap-text">Markets</div>
                                </div>
                            </div>
                            <!-- /..iconbox -->
                        </div>
                        <!--/.iconbox-wrap-->
                    </div>

                    <div class="col-sm-3 col-xs-6 col-xxs-12">
                        <div class="iconbox-wrap">
                            <div class="iconbox">
                                <div class="iconbox-wrap-icon">
                                    <i class="fa fa-user" style="color: #2ECC71;"></i>
                                </div>
                                <div class="iconbox-wrap-content">
                                    <h5><span>50,000</span></h5>

                                    <div class="iconbox-wrap-text"> User</div>
                                </div>
                            </div>
                            <!-- /..iconbox -->
                        </div>
                        <!--/.iconbox-wrap-->
                    </div>

                </div>

            </div>
        </div>
    </div>
	
    <!-- /.page-info -->
  <?php include('footer.php'); ?>
  
  <script type="text/javascript">
    $(window).load(function(){
        $('#welcome').modal('show');
    });
</script> 

