<?php session_start();
		if($_SESSION['id']=="" || $_SESSION['name']=="" || $_SESSION['type']=="" || $_SESSION['status']=="") header("Location: ../login?r=session"); 
		require_once "../db_config.php";
		$u_id=$_SESSION['id'];
		
		
		$p_id=$_GET['id'];
		$pro=mysqli_query($con,"select * from invoice where id=$p_id");
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
                <div class="inner-box ">
                    <div class="row">


                        <div class="col-sm-6">
                            <div class="seller-info seller-profile">
                                
                                <h3 class="no-margin no-padding link-color uppercase "> Customer Invoice </h3>
								<h4>Invoice#<?php echo $row_u['id']; ?></h4><br>
                                <div class="text-muted">
								
								<dl class="dl-horizontal">
											<dt><strong>User: </strong></dt>
											<dd class="contact-sensitive"> <?php echo $_SESSION['name']; ?></dd>
											
											<dt><strong>Status: </strong></dt>
											<dd class="contact-sensitive">
											<?php if($row_u['status']=="0"){ ?> 											
											<small class="label label-info adlistingtype">Ready to deliver</small>
											<?php } else if($row_u['status']=="1") { ?>
											<small class="label label-success adlistingtype">Delivered</small>
											<?php } else if($row_u['status']=="2") { ?>
											<small class="label label-success adlistingtype">Recieved</small>
											<?php } else  { ?>
											<small class="label label-danger adlistingtype">Rejected</small>
											<?php } ?>
											</dd>
								</dl>
                                    
                                    
									
									<br>
									
                                </div>
                                <div class="user-ads-action">
                                    <a class="btn btn-sm   btn-danger " data-toggle="modal"
                                       href="#contactAdvertiser"><i class=" icon-mail-2"></i> Send Report </a>
                                     <a class="btn btn-sm  btn-success " href="pdf_invoice?id=<?php echo $row_u['id']; ?>" target="_blank"><i class="fa fa-download"></i> Download Invoice </a>
                                </div>

                                
                            </div>


                        </div>
                        <div class="col-sm-6">

                            <div class="seller-contact-info">

                                <h3 class="no-margin uppercase color-danger"> Billing Information </h3>

                                <dl class="dl-horizontal">
								
									
									
									<dt>Date-Time:</dt>
                                    <dd class="contact-sensitive"> <?php echo $row_u['date']; ?></dd>
									

                                    <dt>Delivery Address:</dt>
                                    <dd class="contact-sensitive"> <?php echo $row_u['address']; ?></dd>
									
									<dt>Extra Details:</dt>
                                    <dd class="contact-sensitive"> <?php echo $row_u['comment']; ?></dd>
                                    

                                    <dt>Contact Number:</dt>
                                    <dd class="contact-sensitive"> <?php echo $row_u['mobile']; ?></dd>

                                    <dt>E-mail:</dt>
                                    <dd class="contact-sensitive"><?php echo $row_u['email']; ?></dd>
									
									<dt>Payment Method:</dt>
                                    <dd class="contact-sensitive"> <?php echo $row_u['payment']; ?></dd>
									
									
									<dt>Total Product:</dt>
                                    <dd class="contact-sensitive"> <?php echo $row_u['product']; ?></dd><hr>
									
									<dt>Total Price:</dt>
                                    <dd class="contact-sensitive"> ৳ <strong style="font-size:20px;"><?php echo $row_u['price']; ?></strong> BDT</dd>
									
									
									
									
                                </dl>


                            </div>

                        </div>
                    </div>

                </div>

                <div class="section-block">
                    <div class="row">
                        <div class="col-sm-12 col-thin-left page-content ">

                            <div class="category-list">
                                <div class="tab-box ">

                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs add-tabs" role="tablist">
                                        <li class="active"><a href="#allAds" role="tab" data-toggle="tab"> <h3>Product Include</h3>
                                           </a></li>

                                    </ul>
                                   
                                </div>
                                <!--/.tab-box-->

                                <div class="listing-filter">
                                    <div class="pull-left col-xs-6">
                                        <div class="breadcrumb-list"><a href="#" class="current">
                                            <span>All Products of this invoice</span></a> </div>
                                    </div>
                                    <div class="pull-right col-xs-6 text-right listing-view-action"><span
                                            class="list-view active"><i class="  icon-th"></i></span> <span
                                            class="compact-view"><i class=" icon-th-list  "></i></span> <span
                                            class="grid-view "><i class=" icon-th-large "></i></span></div>
                                    <div style="clear:both"></div>
                                </div>
                                <!--/.listing-filter-->


                                <div class="adds-wrapper">
								
								
								<?php  $pd=mysqli_query($con,"select product from checkout where invoice=$p_id");
										for($i=0; $i<mysqli_num_rows($pd); $i++){
										$rt_p=mysqli_fetch_array($pd,MYSQLI_ASSOC);
										$pr_id=$rt_p['product'];
										
										$prd=mysqli_query($con,"select * from product where id=$pr_id");	
										$r_p=mysqli_fetch_array($prd,MYSQLI_ASSOC);
								?>
								
								
                                    <div class="item-list">


                                        <div class="col-sm-2 no-padding photobox">
                                            <div class="add-image"><span class="photo-count"><i
                                                    class="fa fa-camera"></i> 3 </span> <a href="p_view?id=<?php echo $r_p['id']; ?>"><img
                                                    class="thumbnail no-margin" src="../uploads/<?php echo $r_p['img1']; ?>"
                                                    alt="No Image"></a></div>
                                        </div>
                                        <!--/.photobox-->
                                        <div class="col-sm-7 add-desc-box">
                                            <div class="add-details">
                                                <h5 class="add-title"><a href="p_view?id=<?php echo $r_p['id']; ?>">
                                                    <?php echo $r_p['title']; ?> </a></h5>
                                                <span class="info-row"> <span class="add-type business-ads tooltipHere"
                                                                              data-toggle="tooltip"
                                                                              data-placement="right"
                                                                              title="<?php echo $r_p['brand']; ?>">B </span> <span
                                                        class="date"><i class=" icon-clock"> </i> <?php echo $r_p['date']; ?> </span> <br><span
                                                        class="category"><i class=" icon-briefcase"> </i> <?php 
								$s_cat=$r_p["s_cat"]; 
								$cat_r=mysqli_query($con,"select cat,name from sub_cat where id=$s_cat");
								$row_c=mysqli_fetch_array($cat_r,MYSQLI_ASSOC);  
								echo $row_c["name"]; 
								$c_id=$row_c["cat"]; 
								$cat_c=mysqli_query($con,"select name from category where id=$c_id");
								$row_ct=mysqli_fetch_array($cat_c,MYSQLI_ASSOC); 
								echo "(".$row_ct["name"].")";
								?>  </span>
								<br>
								<span class="item-location"><i class="fa fa-map-marker"></i> <?php
								$s_loc=$r_p["loc"]; 
								$loc_r=mysqli_query($con,"select area,city from s_loc where id=$s_loc");
								$row_d=mysqli_fetch_array($loc_r,MYSQLI_ASSOC);  
								echo $row_d["area"]; 
								$l_id=$row_d["city"]; 
								$loc_c=mysqli_query($con,"select city from loc where id=$l_id");
								$row_dt=mysqli_fetch_array($loc_c,MYSQLI_ASSOC); 
								echo ", ".$row_dt["city"];

								?> </span> </span>
                                            </div>
                                        </div>
                                        <!--/.add-desc-box-->
                                        <div class="col-sm-3 text-right  price-box">
                                            <h2 class="item-price"> ৳ <?php echo $r_p['price']; ?> </h2>
                                            <a class="btn btn-danger  btn-sm make-favorite" href="p_view?id=<?php echo $r_p['id']; ?>"> <i
                                                    class="fa fa-eye"></i> <span>See Product</span> </a> </div>
                                        <!--/.add-desc-box-->
                                    </div>
                                    <!--/.item-list-->

                                   

										<?php } ?>
                          
                            
                               


                                </div>
                                <!--/.adds-wrapper-->

                               
                            </div>
                           

                           
                        </div>


                    </div>
                </div>


            </div>

        </div>
    </div>
    
<?php require_once "footer.php"; ?>
