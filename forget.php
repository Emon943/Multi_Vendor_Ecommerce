<?php include('header.php'); ?>
    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-5 login-box">
                    <div class="panel panel-default">
                        <div class="panel-intro text-center">
                            <h2 class="logo-title">
                                <!-- Original Logo will be placed here  -->
                                <span class="logo-icon"><i
                                        class="icon fa fa-lock ln-shadow-logo shape-0"></i> </span> Password<span>Recovery </span>
                            </h2>
                        </div>
                        <div class="panel-body">
                            <form role="form">
                                <div class="form-group">
                                    <label for="sender-email" class="control-label">Email:</label>

                                    <div class="input-icon"><i class="icon-user fa"></i>
                                        <input id="sender-email" type="text" placeholder="Email"
                                               class="form-control email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">Send me my password
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="panel-footer">
                            <p class="text-center "><a href="login"> Back to Login </a></p>

                            <div style=" clear:both"></div>
                        </div>
                    </div>
                    <div class="login-box-btm text-center">
                        <p> Don't have an account? <br>
                            <a href="sign"><strong>Sign Up !</strong> </a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.main-container -->
<?php include('footer.php'); ?>
