<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
        <base href="<?=base_url()?>">
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <title>Супер дом</title>

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="assets/plugins/morris/morris.css">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <!--<div id="wrapper">-->

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="<?=base_url()?>" class="logo"><span>Супер <span>дом</span></span><i class="mdi mdi-layers"></i></a>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container-fluid">

                        <!-- Page title -->
                        <ul class="nav navbar-nav list-inline navbar-left">
                            <li class="list-inline-item">
                                <button class="button-menu-mobile open-left">
                                    <i class="mdi mdi-menu"></i>
                                </button>
                            </li>
                            <li class="list-inline-item">
                                <h4 class="page-title"><?=$title?></h4>
                            </li>
                        </ul>

                        <!--nav class="navbar-custom">

                            <ul class="list-unstyled topbar-right-menu float-right mb-0">

                                <li>
                                    <!-- Notification >
                                    <div class="notification-box">
                                        <ul class="list-inline mb-0">
                                            <li>
                                                <a href="javascript:void(0);" class="right-bar-toggle">
                                                    <i class="mdi mdi-bell-outline noti-icon"></i>
                                                </a>
                                                <div class="noti-dot">
                                                    <span class="dot"></span>
                                                    <span class="pulse"></span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- End Notification bar >
                                </li>

                                <li class="hide-phone">
                                    <form class="app-search">
                                        <input type="text" placeholder="Search..."
                                               class="form-control">
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </form>
                                </li>

                            </ul>
                        </nav-->
                    </div><!-- end container -->
                </div><!-- end navbar -->
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">

                    <!-- User -->
                    <div class="user-box">
                        <div class="user-img">
                            <img src="<?=$_SESSION['customerImage']?>" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail img-responsive">
                            <div class="user-status offline"><i class="mdi mdi-adjust"></i></div>
                        </div>
                        <h5><?=$_SESSION['customerName']?></h5>

                        <?
                            if (!isset($sel_or_not)){
                                echo $select_places;
                            }
                        ?>

                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <!--a href="#" >
                                    <i class="mdi mdi-settings"></i>
                                </a-->
                            </li>

                            <li class="list-inline-item">
                                <a href="lk/logout" class="text-custom">
                                    <i class="mdi mdi-power"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End User -->
                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <ul>
                          <li class="text-muted menu-title">Меню</li>
							<!--<li>
                                <a href="lk/index" class="waves-effect"><i class="fa fa-vcard-o"></i> <span> Главная </span> </a>
                            </li>-->
							
							<li>
                                <a href="lk/profile" class="waves-effect"><i class="fa fa-vcard-o"></i> <span> Профиль </span> </a>
                            </li>

                            
							<li>
                                <a href="lk/bills" class="waves-effect"><i class="fa fa-shopping-basket"></i> <span> Счета</span> </a>
                            </li>

                            
							<li>
                                <a href="lk/servis" class="waves-effect"><i class="fa fa-shopping-basket"></i> <span> # Сервис </span> </a>
                            </li>


                            
							<li>
                                <a href="#" class="waves-effect"><i class="fa fa-shopping-basket"></i> <span># Новости </span> </a>
                            </li>

                            
							<li>
                                <a href="#" class="waves-effect"><i class="fa fa-shopping-basket"></i> <span># Опросы </span> </a>
                            </li>

                            <li>
                                <a href="#" class="waves-effect"><i class="fa fa-shopping-basket"></i> <span># Информация </span> </a>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>

            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <!-- Row start -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box">

                                   <!-- <h3>Отладочная информация:</h3>
                                    <pre>
                                        <?/*  //print_r($_SESSION); */?>
                                    </pre>-->
	