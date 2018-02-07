<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <base href="<?=base_url()?>">
        
        <title>Дипломы</title>

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
                <a href="<?=base_url()?>" class="logo"><span>Сервис<span> дипломы</span></span></a>
                <h5 class="text-muted m-t-0 font-600"></h5>
                        <div id="infoMessage"><?php echo $message;?></div>
            </div>
          <div class="m-t-40 card-box">
                <div class="text-center">
                    <h4 class="text-uppercase font-bold m-b-0">Добавление нового покупателя</h4>
                </div>
                <div class="p-20">
                    <form class="form-horizontal m-t-20" action="admin/customer_add"  method="post">

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Имя" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Фамилия"  />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Пароль"  />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input type="text" name="username" id="username" class="form-control"  placeholder="Email" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input type="text" name="phone" id="phone" class="form-control" placeholder="Телефон" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                               <select name="sex" class="form-control">
                                  <option value="Мужской">Мужской</option>
                                  <option value="Женский">Женский</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input type="text" name="social" id="social" class="form-control" placeholder="Ссылка в соцсетях" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input type="date" name="dr" id="dr" class="form-control" placeholder="День рождения" />
                            </div>
                        </div>

                        <input type="hidden" name="refer" value="" id="refer"  />
                        <input type="hidden" name="mode" value="user"  />
                        <!--div class="form-group ">
                            <div class="col-xs-12">
                                <div class="checkbox checkbox-custom">
                                    <input id="checkbox-signup" type="checkbox">
                                    <label for="checkbox-signup">
                                        Remember me
                                    </label>
                                </div>

                            </div>
                        </div-->

                        <div class="form-group text-center m-t-30">
                            <div class="col-xs-12">
                                <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit">Добавить нового покупателя</button>
                            </div>
                        </div>

                        <!--div class="form-group m-t-30 m-b-0">
                            <div class="col-sm-12">
                                <a href="page-recoverpw.html" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                            </div>
                        </div-->
                    </form>

                </div>
            </div>
            <!-- end card-box-->

            <!--div class="row">
                <div class="col-sm-12 text-center">
                    <p class="text-muted">Нет аккаунта? <a href="auth/create_user" class="text-primary m-l-5"><b>зарегистрироваться</b></a></p>
                </div>
            </div-->
            
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
