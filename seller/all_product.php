<?php session_start();
		if($_SESSION['id']=="" || $_SESSION['name']=="" || $_SESSION['type']=="" || $_SESSION['status']=="") header("Location: ../login?r=session"); 
		require_once "../db_config.php";
		$u_id=$_SESSION['id'];

		
		
		
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
                        <a href="cat_product?id=<?php echo $row1['id']; ?>"><img src="../images/category/<?php echo $row1['img']; ?>" class="img-responsive" alt="">
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
																<img class="img-responsive" src="../uploads/<?php echo $row_p['img1']; ?>" alt="No Image Found" style="height:100px; width: 120px;">
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
