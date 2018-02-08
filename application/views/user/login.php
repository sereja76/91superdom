<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <base href="<?=base_url()?>">
        <title>Супер дом</title>
        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
        <script src="assets/js/modernizr.min.js"></script>
    </head>
    <body>
        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
            <div class="text-center">
                <a href="<?=base_url()?>" class="logo"><span>Супер<span> дом</span></span></a>
                <h5 class="text-muted m-t-0 font-600"></h5>
                        <div id="infoMessage"><?php //echo $message;?></div>
            </div>
          <div class="m-t-40 card-box">
                <div class="text-center">
                    <h4 class="text-uppercase font-bold m-b-0">Авторизация</h4>
                </div>
                <div class="p-20">
                    <form class="form-horizontal m-t-20" action="lk/login" method="post">

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" name="phone" id="phone" type="text" required="" placeholder="79991237755" data-mask="+7(999) 999-9999" value="79031458195">
                            </div>
                        </div>

                        <div class="form-group text-center m-t-30">
                            <div class="col-xs-12">
                                <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit">Получить код</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
            <!-- end card-box-->

            <div class="row">
                <div class="col-sm-12 text-center">
                    <!--p class="text-muted">Нет аккаунта? <a href="auth/create_user" class="text-primary m-l-5"><b>зарегистрироваться</b></a></p-->
                </div>
            </div>
            
        </div>
        <!-- end wrapper page -->

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
  
  </body>
</html>
