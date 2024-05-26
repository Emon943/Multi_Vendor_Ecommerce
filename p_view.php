<?php require_once "db_config.php";
		$p_id=$_GET['id'];
		$pro=mysqli_query($con,"select * from product where id=$p_id");
		$row_p=mysqli_fetch_array($pro,MYSQLI_ASSOC);
		
		$ms="";
		
		if(isset($_POST['feed'])){
	$name=mysqli_real_escape_string($con, trim($_POST['name']));
	$msg=mysqli_real_escape_string($con, trim($_POST['msg']));
	$rev=$_POST['rev'];
	$p_id=$_POST['p_id'];
	
	mysqli_query($con, "Insert into review(`name`,`msg`,`rev`,`p_id`) Values('$name','$msg',$rev,$p_id)");
	$ms="Your Feedback is successfully posted! Thanks";
		}
		
		if(isset($_POST['mes'])){
	$name=mysqli_real_escape_string($con, trim($_POST['name']));
	$msg=mysqli_real_escape_string($con, trim($_POST['msg']));
	$mail=$_POST['mail'];
	$p_id=$_POST['p_id'];
	$contact=$_POST['contact'];
	$u1_id=$_POST['u_id'];
	
	mysqli_query($con, "Insert into msg(`name`,`msg`,`mail`,`p_id`,`u_id`,`contact`) Values('$name','$msg','$mail',$p_id,$u1_id,'$contact')");
	$ms="Your message is successfully sent! Thanks";
		}
		
		
		
		?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="assets/ico/favicon.png">
    <title>Awwazz.com</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- styles needed for carousel slider -->
    <link href="assets/css/owl.carousel.css" rel="stylesheet">
    <link href="assets/css/owl.theme.css" rel="stylesheet">

    <!-- bxSlider CSS file -->
    <link href="assets/plugins/bxslider/jquery.bxslider.css" rel="stylesheet"/>

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
    <script src="assets/js/pace.min.js"></script>
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
                    <a href="index" class="navbar-brand logo logo-title"><img src="logo.png" alt="Awwazz.com" class="img-responsive" style="margin-top:-18%;"> </a></div>
                <div class="navbar-collapse collapse">

                    <ul class="nav navbar-nav navbar-right">
					
						<li><a href="index">ALL PRODUCTS</a></li>
						<li><a href="about">ABOUT</a></li>
                        <li><a href="login">LOGIN</a></li>
                        <li><a href="help">HELP</a></li>
                       
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

	<?php if($ms!= NULL) { ?>
								<center><div class="alert alert-info" role="alert">
								  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
								  <span class="sr-only"></span>
								  <?php echo $ms; ?>
								</div></center>
								<?php } ?>
								
    <div class="main-container">
        <div class="container">
            <ol class="breadcrumb pull-left">
                <li><a href="index"><i class="icon-home fa"></i></a></li>
                <li><a href="index">All Ads</a></li>
                <li class="active">Product View</li>
            </ol>
            <div class="pull-right backtolist"><a href="javascript:history.back()"> <i
                    class="fa fa-angle-double-left"></i> Back to Page</a></div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-9 page-content col-thin-right">
                    <div class="inner inner-box ads-details-wrapper">
                        <h2> <?php echo $row_p["title"]; ?>
                            <small class="label label-danger adlistingtype">Top Product</small>
                        </h2>
                        <span class="info-row"> <span class="date"><i class=" icon-clock"> </i> <?php echo $row_p["date"]; ?> </span>  <span
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

                        <div class="ads-image">
                            <h1 class="pricetag"> ৳ <?php echo $row_p["price"]; ?></h1>
                            <ul class="bxslider">
                                <li><img src="uploads/<?php echo $row_p["img1"]; ?>" alt=""/></li>
                                <li><img src="uploads/<?php echo $row_p["img2"]; ?>" alt=""/></li>
                                <li><img src="uploads/<?php echo $row_p["img3"]; ?>" alt=""/></li>
                            </ul>
                            <div id="bx-pager">
                                <a class="thumb-item-link" data-slide-index="0" href=""><img
                                        src="uploads/<?php echo $row_p["img1"]; ?>" alt=""/></a>
                                <a class="thumb-item-link" data-slide-index="1" href=""><img
                                        src="uploads/<?php echo $row_p["img2"]; ?>" alt=""/></a>
                                <a class="thumb-item-link" data-slide-index="2" href=""><img
                                        src="uploads/<?php echo $row_p["img3"]; ?>" alt=""/></a>
                            </div>
                        </div>
                        <!--ads-image-->

                        <div class="Ads-Details">
                            <h5 class="list-title"><strong>Product Detsils</strong></h5>

                            <div class="row">
                                <div class="ads-details-info col-md-8">
                                    <p><?php echo $row_p["short_des"]; ?>
									
									</p>
                                    
                                </div>
                                <div class="col-md-4">
                                    <aside class="panel panel-body panel-details">
                                        <ul>
                                            <li>
                                                <p class=" no-margin "><strong>Price:</strong> ৳ <?php echo $row_p["price"]; ?></p>
                                            </li>
                                            <li>
                                                <p class="no-margin"><strong>Sub-Category:</strong> <?php echo $row_c["name"]; ?></p>
                                            </li>
											<li>
                                                <p class="no-margin"><strong>Category:</strong> <?php echo $row_ct["name"]; ?></p>
                                            </li>
                                            <li>
                                                <p class="no-margin"><strong>Location:</strong> <?php echo $row_d["area"];  echo ", ".$row_dt["city"];?> </p>
                                            </li>
                                            <li>
                                                <p class=" no-margin "><strong>Status:</strong> Available</p>
                                            </li>
                                            <li>
                                                <p class="no-margin"><strong>Brand:</strong> <?php echo $row_p["brand"]; ?></p>
                                            </li>
                                        </ul>
                                    </aside>
                                    <div class="ads-action">
                                        <ul class="list-border">
                                            <li><a href="vendor?id=<?php echo $row_p["user"]; ?>"> <i class=" fa fa-user"></i> More ads by User </a></li>
                                            
													
											
                                            <li><a href="#" data-toggle="modal" data-target="#share"> <i class="fa fa-share-alt"></i> Share This Product </a></li>
                                          
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="content-footer text-left">
							<a class="btn  btn-default" data-toggle="modal" href="#msg"><i class=" icon-mail-2"></i> Send a message </a> 
									<a class="btn  btn-info" id="cart1"><i class="glyphicon glyphicon-shopping-cart"> </i>  Add to cart </a></div>
                        </div>
                    </div>
                    <!--/.ads-details-wrapper-->

                </div>
                <!--/.page-content-->

                <div class="col-sm-3  page-sidebar-right">
                    <aside>
                        <div class="panel sidebar-panel panel-contact-seller">
                            <div class="panel-heading">Contact Seller</div>
                            <div class="panel-content user-info">
                                <div class="panel-body text-center">
                                    <div class="seller-info">
                                        <h3 class="no-margin"><?php $us=$row_p["user"]; $u_r=mysqli_query($con,"select company,date from user where id=$us");
												$row_u=mysqli_fetch_array($u_r,MYSQLI_ASSOC);  
												echo $row_u["company"];?></h3>

                                        <p> Joined: <strong><?php echo $row_u["date"]; ?></strong></p>
                                    </div>
                                    <div class="user-ads-action"><a href="" data-toggle="modal" data-target="#msg" class="btn   btn-default btn-block"><i
                                            class=" icon-mail-2"></i> Send a message </a> <a
                                            class="btn  btn-info btn-block" id="cart2"><i class="glyphicon glyphicon-shopping-cart"> </i>  Add to cart
                                    </a></div>
                                </div>
                            </div>
                        </div>
                       
                        <!--/.categories-list-->
						
						 <div class="panel sidebar-panel">
                            <div class="panel-heading">Feedbacks</div>
                            <div class="panel-content">
                                <div class="panel-body text-left">
								<form action=" " method="post">
								
									<div class="form-group">
										<select name="rev"  class="form-control" required>
											<option value="">Select a review</option>
											<option value="1">*(Unacceptable)</option>
											<option value="2">**(Acceptable)</option>
											<option value="3">***(Poor)</option>
											<option value="4">****(Good)</option>
											<option value="5">*****(Excilent)</option>
										</select>
										<input type="hidden" name="p_id" value="<?php echo $row_p["id"]; ?>">
										<input type="text" name="name" maxlength="60" class="form-control" placeholder="Name" required>
										<textarea type="text" name="msg" maxlength="60" class="form-control" placeholder="Messeage"></textarea>
										<input type="submit" name="feed" class="btn btn-success" value="Post Review" style="width:100%">
									</div>
									
								
								</form><br>
								
								<hr>
                                    <ul>
                                        
										<?php 	$p=$row_p["id"]; $categ=mysqli_query($con,"select * from review where p_id=$p");
													for($j=0; $j<mysqli_num_rows($categ); $j++){ 
																		$row3=mysqli_fetch_array($categ,MYSQLI_ASSOC);?>
																
										
										<li><i class="fa fa-user"></i> <strong><?php echo $row3["name"] ?></strong> <span style="float:right;">
										<?php for($k=0; $k<$row3["rev"]; $k++){ ?>
										*
										<?php } ?></span>
										<br><?php echo $row3["msg"] ?> </li><hr>
                                       <?php } ?>
                                    </ul>
                                   
                                </div>
                            </div>
                        </div>
						
						
                    </aside>
                </div>
                <!--/.page-side-bar-->
            </div>
        </div>
    </div>
    <!-- /.main-container -->

   <div class="footer" id="footer">
        <div class="container">
            <ul class=" pull-left navbar-link footer-nav">
                <li><a href="about"> About </a> <a href="#"> Terms and
                    Conditions </a> <a href="#"> Privacy Policy </a>  <a
                        href="help"> Help </a>
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

<div class="modal fade" id="msg" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title"><i class=" icon-mail-2"></i> Contact Seller </h4>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Name:</label>
                        <input class="form-control required" name="name" placeholder="Your name" type="text">
                    </div>
                    <div class="form-group">
                        <label for="sender-email" class="control-label">E-mail:</label>
                        <input name="mail" type="email" placeholder="Your Email" class="form-control email">
                    </div>
                    <div class="form-group">
                        <label for="recipient-Phone-Number" class="control-label">Phone Number:</label>
                        <input type="number" class="form-control" name="contact" placeholder="Your Contact number">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Message <span class="text-count">(300) </span>:</label>
                        <textarea class="form-control" name="msg" placeholder="Your message here.." ></textarea>
                    </div>
					
					<input type="hidden" name="p_id" value="<?php echo $row_p["id"]; ?>">
					<input type="hidden" name="u_id" value="<?php echo $row_p["user"]; ?>">
                    
              
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-success pull-right" value="Send message!" name="mes">
            </div>
			  </form>
        </div>
    </div>
</div>





<div class="modal fade" id="share" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title"><i class=" icon-mail-2"></i> Share This Product on</h4>
            </div>
            <div class="modal-body">
               <script type="text/javascript" src="http://100widgets.com/js_data.php?id=255"></script>
            </div>
           
        </div>
    </div>
</div>
<!-- /.modal -->

<!-- Le javascript
================================================== -->

<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

<script type="text/javascript" src="assets/js/jquery-2.2.2.min.js"></script>
  <script>
  $(document).ready(function(){
	 $('#cart1').click(function(){
		 
		var id=1;

		$.ajax({
			
			type:'POST',
			
	url:'cartfunction.php?id=<?php echo $row_p["id"]; ?>&f=add',
	data:'id='+id,
	success: function (data) {
	
				
               $('#p_count').html(data);
		
	
            
        }
			
			
		})
	 }); 
	 
	  $('#cart2').click(function(){
		 
		var id=1;

		$.ajax({
			
			type:'POST',
			
	url:'cartfunction.php?id=<?php echo $row_p["id"]; ?>&f=add',
	data:'id='+id,
	success: function (data) {
	
				
               $('#p_count').html(data);
		
	
            
        }
			
			
		})
	 }); 
	  
  });
  </script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>

<!-- include carousel slider plugin  -->
<script src="assets/js/owl.carousel.min.js"></script>

<!-- include equal height plugin  -->
<script src="assets/js/jquery.matchHeight-min.js"></script>

<!-- include jquery list shorting plugin plugin  -->
<script src="assets/js/hideMaxListItem.js"></script>

<!-- bxSlider Javascript file -->
<script src="assets/plugins/bxslider/jquery.bxslider.min.js"></script>
<script>
    $('.bxslider').bxSlider({
        pagerCustom: '#bx-pager'
    });


</script>
<!-- include form-validation plugin || add this script where you need validation   -->

<!-- include jquery.fs plugin for custom scroller and selecter  -->
<script src="assets/plugins/jquery.fs.scroller/jquery.fs.scroller.js"></script>
<script src="assets/plugins/jquery.fs.selecter/jquery.fs.selecter.js"></script>
<!-- include custom script for site  -->
<script src="assets/js/script.js"></script>
</body>
</html>
