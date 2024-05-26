<?php require_once "db_config.php"; 
$msg="";
if(isset($_GET['r']) && $_GET['r']=="session"){
		$msg="Your Session may expire! Please Login";
	}

	if(isset($_GET['r']) && $_GET['r']=="logout"){
		$msg="Logout Successful!";
	}

	if(isset($_GET['r']) && $_GET['r']=="s"){
		$msg="<span style='color:#15967D;'>Registration Successful! Please Login Now</span>";
	}

if(isset($_POST['log'])){
	
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$c_pass=md5($pass);
	
	function get_client_ip() {
  $ipaddress = '';
      if (getenv('HTTP_CLIENT_IP'))
          $ipaddress = getenv('HTTP_CLIENT_IP');
      else if(getenv('HTTP_X_FORWARDED_FOR'))
          $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
      else if(getenv('HTTP_X_FORWARDED'))
          $ipaddress = getenv('HTTP_X_FORWARDED');
      else if(getenv('HTTP_FORWARDED_FOR'))
          $ipaddress = getenv('HTTP_FORWARDED_FOR');
      else if(getenv('HTTP_FORWARDED'))
          $ipaddress = getenv('HTTP_FORWARDED');
      else if(getenv('REMOTE_ADDR'))
          $ipaddress = getenv('REMOTE_ADDR');
      else
          $ipaddress = 'UNKNOWN';

      return $ipaddress;
}

$ip=get_client_ip();

	
	
$log=mysqli_query($con,"select * from user where email='$email' and pass='$c_pass'");
$amt=mysqli_affected_rows($con);
	
	if($email=="" || $pass==""){
		$msg="Input Missing! Please retry";
	}
	
	else if($amt==0){
		$msg="Wrong user id and password! Please retry";
	}
	
else{
	$row2=mysqli_fetch_array($log,MYSQLI_ASSOC);
	
	$id=$row2["id"];
	$name=$row2["name"];
	$company=$row2["company"];
	$email=$row2["email"];
	$mobile=$row2["mobile"];
	$type=$row2["type"];
	$status=$row2["status"];
	$pro=$row2["pro"];
	$cover=$row2["cover"];
	$short_des=$row2["short_des"];
	
	
		Session_start();
		$_SESSION['id']=$id;
		$_SESSION['name']=$name;
		$_SESSION['company']=$company;
		$_SESSION['email']=$email;
		$_SESSION['mobile']=$mobile;
		$_SESSION['type']=$type;
		$_SESSION['status']=$status;
		$_SESSION['pro']=$pro;
		$_SESSION['cover']=$cover;
		$_SESSION['short_des']=$short_des;
		
		
		mysqli_query($con,"insert into log(`ip`,`user`) values('$ip', $id)");
		
		if($type=="0") header("Location: user/cart");
		else if($type=="1") header("Location: seller/");
		else if($type=="2") header("Location: control/");
		else $msg="Your Account has been suspended!<br>Please contact with our customer care.";
		
	}
}

require_once "header.php"; 
?>

    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-5 login-box">
                    <div class="panel panel-default">
                        <div class="panel-intro text-center">
                            <h2 class="logo-title">
                                <!-- Original Logo will be placed here  -->
                                <span class="logo-icon"><i
                                        class="fa fa-user"></i> </span> User Login <span></span>
                            </h2>
							
							
                        </div>
						
						
						
						<?php if($msg!= NULL) { ?>
								<center><div class="alert alert-danger" role="alert" style="width:90%;">
								  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
								  <?php echo $msg; ?>
								</div></center>
								<?php } ?>
								
								
                        <div class="panel-body">
                            <form role="form" class="loginForm" method="post" action="">
                                <div class="form-group">
                                    <label for="sender-email" class="control-label">E-mail:</label>

                                    <div class="input-icon"><i class="icon-user fa"></i>
                                        <input id="sender-email" name="email" type="email" placeholder="E-mail"
                                               class="form-control email" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="user-pass" class="control-label">Password:</label>

                                    <div class="input-icon"><i class="icon-lock fa"></i>
                                        <input type="password" name="pass" class="form-control" placeholder="Password"
                                               id="user-pass" required>
                                    </div>
                                </div>
                                <div class="form-group">

                                    <input name="log" class="btn btn-primary  btn-block" value="Login"
                                           type="submit">
                                </div>
                            </form>
                        </div>
                        <div class="panel-footer">

                            <div class="checkbox pull-left">
                                <label> <input type="checkbox" value="1" name="remember" id="remember"> Keep me logged
                                    in</label>
                            </div>


                            <p class="text-center pull-right"><a href="forget"> Lost your password? </a>
                            </p>

                            <div style=" clear:both"></div>
                        </div>
                    </div>
                    <div class="login-box-btm text-center">
                        <p> Don't have an account? <br>
                            <a href="sign"><strong>JOIN NOW !</strong> </a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.main-container -->

   <?php require_once "footer.php"; ?>