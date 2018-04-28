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
    <head>
        <meta charset="utf-8" />
        <title>Eazy Communication Portal</title>
        <meta http-equiv="cache-control" content="no-cache"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="#1 selling multi-purpose bootstrap admin theme sold in themeforest marketplace packed with angularjs, material design, rtl support with over thausands of templates and ui elements and plugins to power any type of web applications including saas and admin dashboards. Preview page of Theme #6 for statistics, charts, recent events and reports"
            name="description" />
        <meta content="" name="author" />
        <!-- BEGIN LAYOUT FIRST STYLES -->
        <link href="//fonts.googleapis.com/css?family=Oswald:400,300,700" rel="stylesheet" type="text/css" />
        <!-- END LAYOUT FIRST STYLES -->
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
         <link href="<?php echo base_url(); ?>assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
         <link href="<?php echo base_url(); ?>assets/global/plugins/jstree/dist/themes/default/style.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        
        <link href="<?php echo base_url(); ?>assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo base_url(); ?>assets/global/css/components-rounded.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?php echo base_url(); ?>assets/layouts/layout6/css/layout.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>assets/layouts/layout6/css/custom.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <!-- Start Dropdown Select  -->
        <link href="<?php echo base_url(); ?>assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- End Dropdown Select  -->  
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>

        <link rel="shortcut icon" href="favicon.ico" />
<style type="text/css">
    /*.dropdown-menu{
        margin:10px -100px 0 !important;
    }*/
    .not-active{
    pointer-events: none;
    cursor: no-drop;
  }
  table.dataTable td.sorting_1, table.dataTable td.sorting_2, table.dataTable td.sorting_3, table.dataTable th.sorting_1, table.dataTable th.sorting_2, table.dataTable th.sorting_3{
    background: none !important;
  }
</style>
        <input type="hidden" type="text" id=hiddenUrl value="<?php echo base_url(); ?>">
    </head>    
    <!-- END HEAD -->

    <body class="">
        <!-- BEGIN HEADER -->
        <header class="page-header">
            <nav class="navbar" role="navigation">
                <div class="container-fluid">
                    <div class="havbar-header">
                        <!-- BEGIN LOGO -->
                        <a id="index" class="navbar-brand" href="<?php echo base_url(); ?>">
                            <img src="<?php echo base_url(); ?>assets/logo/<?php echo $logo; ?>" alt="Logo"> </a>
                        <!-- END LOGO -->
                        <!-- BEGIN TOPBAR ACTIONS -->
                        <div class="topbar-actions">
                            
                            <!-- BEGIN USER PROFILE -->
                            <div class="btn-group-img btn-group">
                                <button type="button" class="btn btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <img src="<?php echo base_url(); ?>assets/layouts/layout5/img/avatar1.jpg" alt=""> </button>
                                <ul class="dropdown-menu-v2" role="menu">
                                    <!-- <li>
                                        <a href="page_user_profile_1.html">
                                            <i class="icon-user"></i> My Profile
                                            <span class="badge badge-danger">1</span>
                                        </a>
                                    </li> -->
                                    <?php if($headerData['userType']){ ?>
                                        <li>
                                            <a href="<?php echo base_url('login/changepwd'); ?>">
                                                <i class="icon-user"></i> Change password </a>
                                        </li>
                                     <?php } ?>
                                    <li class="divider"> </li>
                                    <li>
                                        <a href="<?php echo base_url('login/logout'); ?>">
                                            <i class="icon-key"></i> Log Out </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- END USER PROFILE -->
                        </div>
                        <!-- END TOPBAR ACTIONS -->
                    </div>
                </div>
                <!--/container-->
            </nav>
        </header>
        <!-- END HEADER -->

        <!-- BEGIN CONTAINER -->
        <div class="container-fluid">
            <div class="page-content page-content-popup">
        <!-- BEGIN CONTAINER -->

                <div class="page-content-fixed-header">
                    <!-- BEGIN BREADCRUMBS -->
                    <ul class="page-breadcrumb">
                        <li><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                    </ul>
                    <!-- END BREADCRUMBS -->
                    
                </div>

<div class="page-sidebar-wrapper">
                    <!-- BEGIN SIDEBAR -->
            
                    <div class="page-sidebar navbar-collapse collapse">
                        
                        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                            <li class="nav-item start active open">
                                <a href="<?php echo base_url(); ?>" class="nav-link nav-toggle">
                                    <i class="icon-home"></i>
                                    <span class="title">Dashboard</span>
                                    <span class="selected"></span>
                                    <span class="open"></span>
                                </a>
                            </li>
                            <?php 
                                foreach ($menuData as $key => $value){
                                    echo $value;
                                }
                            ?>

                            <li class="nav-item start">
                                <a href="<?php echo base_url('login/logout'); ?>" class="nav-link nav-toggle">
                                    <i class="icon-key"></i>
                                    <span class="title">Logout</span>
                                    <span class="selected"></span>
                                    <span class="open"></span>
                                </a>
                            </li>
                            <li class="nav-item start">
                                <a href="<?php echo base_url('login/changepwd'); ?>" class="nav-link nav-toggle">
                                    <i class="icon-user"></i>
                                    <span class="title">Change password</span>
                                    <span class="selected"></span>
                                    <span class="open"></span>
                                </a>
                            </li>
                        </ul>
                        <!-- END SIDEBAR MENU -->
                    </div>
                    <!-- END SIDEBAR -->
                </div>