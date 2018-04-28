<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if($this->session->userdata('logo') != ''){
    $logo=$this->session->userdata('logo');
}else{
    $logo='default.jpg';
}
?>
<!DOCTYPE html>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>Login</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="#1 selling multi-purpose bootstrap admin theme sold in themeforest marketplace packed with angularjs, material design, rtl support with over thausands of templates and ui elements and plugins to power any type of web applications including saas and admin dashboards. Preview page of Theme #6 for "
            name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo base_url(); ?>assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo base_url(); ?>assets/global/css/components-rounded.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?php echo base_url(); ?>assets/pages/css/login-5.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link type="text/css" rel="Stylesheet" href="<?php echo CaptchaUrls::LayoutStylesheetUrl() ?>" />
        <link rel="shortcut icon" href="favicon.ico" /> 

        <style type="text/css">
            .alert{margin-top:0 !important; }
        </style>
</head>
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN : LOGIN PAGE 5-1 -->
        <div class="user-login-5">
            <div class="row bs-reset">
                <div class="col-md-6 bs-reset mt-login-5-bsfix">
                    <div class="login-bg" style="background-image:url(../assets/pages/img/login/bg1.jpg)">
                        <img class="login-logo" src="../assets/logo/<?php echo $logo; ?>" /> </div>
                        
                </div>
                <div class="col-md-6 login-container bs-reset mt-login-5-bsfix">
                    <div class="login-content">
                        <h1>Admin Login</h1>
                        <br>
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#email">Sign in</a></li>
                            <!-- <li><a data-toggle="tab" href="#mobile">Sign in with mobile</a></li> -->
                        </ul>

                        <div class="tab-content">
                            <div id="email" class="tab-pane fade in active">
                              <form action="<?php echo base_url('login/auth'); ?>" class="login-form" method="post" id="login-form">
                                <?php if($this->session->flashdata('message')){ ?>
                                <div class="row">
                                  <div class="col-xs-12">
                                    <div class="alert alert-danger">
                                      <button class="close" data-close="alert"></button>
                                      <span><?php echo $this->session->flashdata('message'); ?></span>
                                    </div>
                                  </div>  
                                </div>
                                <?php }else{ ?>
                                <div class="row">
                                  <div class="col-xs-12">
                                    <div class="alert alert-danger display-hide">
                                        <button class="close" data-close="alert"></button>
                                        <span>Please enter email and password.</span>
                                    </div>
                                  </div>
                                </div>
                                <?php } ?>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <input class="form-control form-control-solid placeholder-no-fix form-group" type="text" autocomplete="off" placeholder="Email" name="email" value="<?php echo @$this->session->flashdata('email'); ?>" required/> </div>
                                        <div class="col-xs-6">
                                            <input class="form-control form-control-solid placeholder-no-fix form-group" type="password" autocomplete="off" placeholder="Password" name="password" value="<?php echo @$this->session->flashdata('password'); ?>" required/> </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-5">
                                            <?php echo $captchaHtml; ?>
                                        </div>
                                        <div class="col-xs-4">
                                            <input type="text" class="form-control form-control-solid placeholder-no-fix form-group" placeholder="Enter captcha here..." name="CaptchaCode" id="CaptchaCode" value="" required/>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="rem-password">
                                                <label class="rememberme mt-checkbox mt-checkbox-outline">
                                                    <input type="checkbox" name="remember" value="1" /> Remember me
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-8 text-right">
                                            <div class="forgot-password">
                                                <a href="<?php echo base_url('login/forgot'); ?>" id="forget-password" class="forget-password">Forgot Password?</a>
                                            </div>
                                            <button class="btn green" type="submit">Sign In</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- <div id="mobile" class="tab-pane fade">
                                <form method="post" action="<?php echo base_url('login/mobilelogin'); ?>" class="login-form">
                                    <?php if($this->session->flashdata('mobilemsg')){ ?>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="alert alert-danger">
                                              <button class="close" data-close="alert"></button>
                                              <span><?php echo $this->session->flashdata('mobilemsg'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <div class="row">
                                        <div class="col-xs-12"><strong>Enter your phone number and we will text you a verification code</strong></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-7">
                                            <input class="form-control form-control-solid placeholder-no-fix form-group" type="text" autocomplete="off" placeholder="Enter phone number" name="phone_number" value="" required/> </div>
                                        <div class="col-xs-1 text-right">
                                            <input class="btn green" type="submit" value="SIGN IN">
                                        </div>
                                    </div>
                                </form>
                            </div> -->
                        </div>
                    </div>

                    <div class="login-footer">
                        <div class="row bs-reset">
                            <div class="col-xs-12 bs-reset">
                                <div class="login-copyright text-right">
                                    <p>Copyright <?php echo date('Y'); ?> &copy; Excellers Ltd.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END : LOGIN PAGE 5-1 -->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo base_url(); ?>assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url(); ?>assets/pages/scripts/login-5.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>
</html>