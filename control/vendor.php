<?php session_start();
		if($_SESSION['id']=="" || $_SESSION['name']=="" || $_SESSION['type']=="" || $_SESSION['status']=="") header("Location: ../login?r=session"); 
		require_once "../db_config.php";
		$u_id=$_SESSION['id'];
		
		$p_id=$_GET['id'];
		$pro=mysqli_query($con,"select * from user where id=$p_id");
		$row_u=mysqli_fetch_array($pro,MYSQLI_ASSOC);
		
		
		
		?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="../assets/ico/favicon.png">
    <title>Awwazz.com</title>
    <!-- Bootstrap core CSS -->
    <link href="../assets/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets/css/style.css" rel="stylesheet">

    <!-- styles needed for carousel slider -->
    <link href="../assets/css/owl.carousel.css" rel="stylesheet">
    <link href="../assets/css/owl.theme.css" rel="stylesheet">

    <!-- bxSlider CSS file -->
    <link href="../assets/plugins/bxslider/jquery.bxslider.css" rel="stylesheet"/>

    <!-- Just for debugging purposes. -->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- include pace script for automatic web page progress bar  -->

    <script>
        paceOptions = {
            elements: true
        };
    </script>
    <script src="../assets/js/pace.min.js"></script>
</head>
<body>
<div id="wrapper">
    <div class="header">
        <nav class="navbar   navbar-site navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
                            class="icon-bar"></span> <span class="icon-bar"></span></button>
                     <a href="index" class="navbar-brand logo logo-title"><img src="../logo.png" class="img-responsive" style="margin-top:-18%;"> </a></div>
                <div class="navbar-collapse collapse">

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="all_product">ALL PRODUCTS</a></li>
                        <li><a href="index">MY PROFILE</a></li>
                        <li><a href="logout">LOGOUT</a></li>
                       
						 <li class="postadd"><a class="btn btn-block   btn-border btn-post btn-danger"
                                               href="cart"><i class="fa fa-cart-plus"></i> Cart <sup id="p_count"><?php include ("cart_product.php")?></sup></a></li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </div>
    <!-- /.header -->

	

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
                                                <img class="img-responsive" alt="blog-post image" src="../images/seller/<?php echo $row_u['cover']; ?>">
                                            </figure>
											<img class="img-thumbnail" src="../images/seller/<?php echo $row_u['pro']; ?>" style="width:25%; margin:-15% 0 0 2%; padding:none;">
											<h1 style="margin-right:10px;float:right; padding:5px; background:none;"><a href="#"><i class="glyphicon glyphicon-ok-sign" style="color: #16A085; font-size:16px;"></i> <?php echo $row_u['company']; ?></a></h1>
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
													<?php echo $row_u['company']; ?> </h2> 
												</div>
												
											</div>
                                   
								   <p style="text-align:justify; padding:15px;"><?php echo $row_u['short_des']; ?></p>
								   <div class="col-lg-12  box-title no-border">
												<div class="inner"><h2><span>All</span>
													Products </h2>
												</div>
											</div>
								   

                                    <div class="blog-post-content-desc">
                                        <div class="blog-post-content">
                                          
											
											

											<div class="row">
                                                 <div class="adds-wrapper hasGridView">
												 
												 
												 <?php $v_id=$row_u['id']; $pro=mysqli_query($con,"select * from product where user=$v_id and status=1");
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
                                    <h5 class="list-title uppercase"><strong><a href="#"> Seller Info</a></strong></h5>

                            <div class="panel-content user-info">
                                <div class="panel-body text-center">
                                    <div class="seller-info">
                                        <h3 class="no-margin"><?php echo $row_u['name']; ?></h3>

                                        <p>Location: <strong><?php
								$s_loc=$row_u["loc"]; 
								$loc_r=mysqli_query($con,"select area,city from s_loc where id=$s_loc");
								$row_d=mysqli_fetch_array($loc_r,MYSQLI_ASSOC);  
								echo $row_d["area"]; 
								$l_id=$row_d["city"]; 
								$loc_c=mysqli_query($con,"select city from loc where id=$l_id");
								$row_dt=mysqli_fetch_array($loc_c,MYSQLI_ASSOC); 
								echo ", ".$row_dt["city"];

								?> </strong></p>

                                        <p> Joined: <strong><?php echo $row_u['date']; ?></strong></p>
                                    </div>
									
                                    
									
									
                                </div>
                            </div>      
                         </div>
                                <!--/.categories-list-->
                                <div class="categories-list  list-filter">
                                    


                                    <div class="blog-popular-content">
                                       


                                            <div class="inner-box no-padding">
												<div class="inner-box-content">
													<a href="#"><img class="img-responsive" src="../images/site/app.jpg" alt="tv"></a>
												</div>
											</div>


											<div class="inner-box no-padding">
												<img class="img-responsive" src="../images/add2.jpg" alt="">
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
    <!-- /.footer -->
</div>
<!-- /.wrapper -->



<!-- Modal contactAdvertiser -->



<!-- Le javascript
================================================== -->

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
