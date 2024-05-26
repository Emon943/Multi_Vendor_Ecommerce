<?php session_start();
		if($_SESSION['id']=="" || $_SESSION['name']=="" || $_SESSION['type']=="" || $_SESSION['status']=="" || $_SESSION['type']=="0" || $_SESSION['type']=="1") header("Location: ../login?r=session"); 
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
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets/css/style.css" rel="stylesheet">

    <!-- styles needed for carousel slider -->
    <link href="../assets/css/owl.carousel.css" rel="stylesheet">
    <link href="../assets/css/owl.theme.css" rel="stylesheet">

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
                    <a href="index" class="navbar-brand logo logo-title"><img src="../logo.png" class="img-responsive" style="margin-top:-18%;"> </a></div>
                <div class="navbar-collapse collapse">

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="all_product">ALL PRODUCTS</a></li>
						 <li><a href="logout">LOGOUT</a></li>
                        <!--<li class="postadd"><a class="btn btn-block   btn-border btn-post btn-danger"
                                               href="cart"><i class="fa fa-cart-plus"></i> Cart <sup id="p_count"><?php include ("cart_product.php")?></sup></a></li>-->
						
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
            <div class="row">
                <div class="col-sm-3 page-sidebar">
                    <aside>
                        <div class="inner-box">
                            <div class="user-panel-sidebar">
                                <div class="collapse-box">
                                    <h5 class="collapse-title no-border"> My Awwazz <a href="#MyClassified"
                                                                                           data-toggle="collapse"
                                                                                           class="pull-right"><i
                                            class="fa fa-angle-down"></i></a></h5>

                                    <div class="panel-collapse collapse in" id="MyClassified">
                                        <ul class="acc-list">
                                            <li><a href="index"><i class="icon-home"></i> HOME </a></li>
											
											<li><a href="seller"><i class="fa fa-user"></i>
                                                Seller Accounts </a></li>
												

											<!--<li><a href="inbox"><i class="fa fa-inbox"></i>
                                                Inbox  </a></li>
												
												<li><a href="fav_product"><i class="fa fa-heart"></i>
                                                Favourite Products </a></li>-->
												
											<li><a href="pur_history?status=0"><i class="fa fa-clock-o"></i>
                                                Pending Order </a></li> 
												
												<li><a href="pur_history?status=1"><i class="fa fa-truck"></i>
                                                Delivered Order </a></li>
												
												<li><a href="pur_history?status=2"><i class="fa fa-check-square-o"></i>
                                                Complete Order </a></li>
												
												
												
												<li><a href="live_product"><i class="fa fa-cube"></i>
                                                Live Products </a></li>
												
												<li><a href="archive_product"><i class="fa fa-gift"></i>
                                                Archive Products  </a></li> 
												
												<li><a href="create_invoice"><i class="fa fa-money"></i>
                                                Custom Invoice  </a></li> 
												
                                        </ul>
                                    </div>
                                </div>
                                

                                <div class="collapse-box">
                                    <h5 class="collapse-title"> My Account <a href="#TerminateAccount"
                                                                                     data-toggle="collapse"
                                                                                     class="pull-right"><i
                                            class="fa fa-angle-down"></i></a></h5>

                                    <div class="panel-collapse collapse in" id="TerminateAccount">
                                        <ul class="acc-list">
										 <li><a href="change_pass"> <i class="fa fa-lock "></i> Change Password </a></li>
										 
										 <li><a href="log_history"> <i class="fa fa-user "></i> Login History </a></li>
										 
										 <!--<li><a href="reseler_page"> <i class="fa fa-file "></i> My Page </a></li>-->
										 
										 <li><a href="logout"> <i class="fa fa-sign-out "></i> Logout </a></li>
												
                                           <!--- <li><a href="account-close.html"><i class="fa fa-times-circle "></i> Close
                                                account </a></li> -->
                                        </ul>
                                    </div>
                                </div>
                                <!-- /.collapse-box  -->
                            </div>
                        </div>
                        <!-- /.inner-box  -->

                    </aside>
                </div>
                <!--/.page-sidebar-->

                <div class="col-sm-9 page-content">
                    <div class="inner-box">
                        <div class="row">
                            <div class="col-md-5 col-xs-4 col-xxs-12">
                                <h3 class="no-padding text-center-480 useradmin"><a href=""><img class="userImg"
                                                                                                 src="../images/user.jpg"
                                                                                                 alt="user"> <?php echo $_SESSION['name']; ?>
                                </a></h3>
                            </div>
                            <div class="col-md-7 col-xs-8 col-xxs-12">
                                <div class="header-data text-center-xs">

                                    <!-- Traffic data -->
                                    <div class="hdata">
                                        <div class="mcol-left">
                                            <!-- Icon with red background -->
                                            <i class="fa fa-eye ln-shadow"></i></div>
                                        <div class="mcol-right">
                                            <!-- Number of visitors -->
                                            <p><a href="#">7000</a> <em>visits</em></p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                    <!-- revenue data -->
                                    <div class="hdata">
                                        <div class="mcol-left">
                                            <!-- Icon with green background -->
                                            <i class="icon-th-thumb ln-shadow"></i></div>
                                        <div class="mcol-right">
                                            <!-- Number of visitors -->
                                            <p><a href="#">12</a><em>Products</em></p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                  
                                </div>
                            </div>
                        </div>
                    </div>