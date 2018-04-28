<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>User Login | MONTESSORI ELEMENTARY &amp; MIDDLE SCHOOL OF TRACY</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="#1 selling multi-purpose bootstrap admin theme sold in themeforest marketplace packed with angularjs, material design, rtl support with over thausands of templates and ui elements and plugins to power any type of web applications including saas and admin dashboards. Preview page of Theme #2 for "
            name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo base_url(); ?>assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo base_url(); ?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?php echo base_url(); ?>assets/pages/css/login.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> 
        <input type="hidden" type="text" id=hiddenUrl value="<?php echo base_url(); ?>">
    </head>
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="index.php">
                <img src="<?php echo base_url(); ?>assets/pages/img/logonlb-big.png" alt="" width="340px" />
                <!-- <h1 style="font-weight: 900; color: #C1E300;">SCHOOL MANAGEMENT</h1> -->
            </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
            <div class="content"><!--Start: First Time Login -->
                <!-- BEGIN LOGIN FORM -->
                <form class="login-form" id="AdminchangePassword" action="<?php echo base_url('login/change'); ?>" method="post">

                    <h3 class="form-title font-green">Change Password</h3>
                    <div class="alert alert-danger display-hide">
                        <button class="close" data-close="alert"></button>
                        <span>Old password is incorrect!</span>
                    </div>

                    <input type="hidden" name="userId" id="userId" value="<?php echo $this->session->userdata('user_id'); ?>">
                    <div class="form-group">
                        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                        <label class="control-label visible-ie8 visible-ie9">Old Password</label>
                        <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Old Password" id="oldpwd" name="oldpwd" value="" /> </div>
                    <div class="form-group">
                        <label class="control-label visible-ie8 visible-ie9">New Password</label>
                        <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" id="password" name="password" /> </div>
                    <div class="form-group">
                        <label class="control-label visible-ie8 visible-ie9">Confirm Password</label>
                        <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Confirm password" name="cfpassword" /> </div>

                    <div class="form-actions">
                        <a href="<?php echo base_url(); ?>" class="btn blue uppercase">Cancel</a>
                        <input type="submit" style="float: right;" name="cpwd" value="Submit" class="btn green uppercase">
                    </div>
                </form>
                <!-- END LOGIN FORM -->
            </div>

        <div class="copyright"> <?php echo date('Y'); ?> © Cloudit Automation </div>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/scripts/app.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/pages/scripts/form-validation.js" type="text/javascript"></script>

<script>
$(document).ready(function(){
    $("#oldpwd").blur(function (){
        
        var baseUrl=$('#hiddenUrl').val();
        var oldpwd=$(this).val();
        var userId=$('#userId').val();
        $.ajax({
          type: "POST",
           url: baseUrl+"login/checkAdminOldpwd",
          data: {"oldpwd": oldpwd, "userId": userId},
          success: function(response){
                if(response == 'false'){
                    $('.alert').show();
                    return false;
                }else{
                    $('.alert').hide();
                    return false;
                }
          }
        });
    });
});
</script>

    </body>

</html>