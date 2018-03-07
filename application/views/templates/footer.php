                            <!--    </div>
                            </div>-->

                        </div>
                        <!-- End of Row -->

                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                    2018 © Супердом. Разработано в <a href="http://it-76.ru" target="blank">it-76.ru</a>
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->




        </div>
        <!-- END wrapper -->


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

        <script src="assets/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js" type="text/javascript"></script>

        <script src="assets/plugins/jquery-knob/jquery.knob.js"></script>
        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>




        <script src="assets/plugins/tinymce/tinymce.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                if($("#elm1").length > 0){
                    tinymce.init({
                        selector: "textarea#elm1",
                        theme: "modern",
                        height:300,
                        plugins: [
                            "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                            "save table contextmenu directionality emoticons template paste textcolor"
                        ],
                        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                        style_formats: [
                            {title: 'Bold text', inline: 'b'},
                            {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                            {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                            {title: 'Example 1', inline: 'span', classes: 'example1'},
                            {title: 'Example 2', inline: 'span', classes: 'example2'},
                            {title: 'Table styles'},
                            {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                        ]
                    });
                }
            });




    function Check_code () {
        console.log("Проверка");
                    // получаем id заказа, в новом заказе нет, в текущем есть ссотв 0 или число
                    if ($('#order_id').val() == 'new'){
                        order_id = 0;
                    }
                    else {
                        order_id  = $('#order_id').val();
                    }
                    
                    order_promo = $('#order_promo').val();

                    // пользователь order_user_identity
                    order_user_identity = $('#order_user_identity').val();

                    //console.log('order_id='+order_id+'&order_promo='+order_promo+'&order_user_identity='+order_user_identity);
                    $.ajax({
                        type: 'POST',
                        url: '<?=base_url()?>admin/check_promo',
                        data: 'order_id='+order_id+'&order_promo='+order_promo+'&order_user_identity='+order_user_identity,
                        success: function(jsondata){
                            //console.log('blabla ' +jsondata);    

                            $('#order_promo_text').html(jsondata);
                          }         
                    });

    };





        </script>
    </body>
</html>