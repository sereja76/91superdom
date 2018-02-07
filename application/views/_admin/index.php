<?
//print_r($stat);
?>

<br/>
<center><a href="admin/add_order" class="btn-trans btn btn-primary btn-lg"><i class="fa fa-plus-square-o m-r-5"></i>Добавить заказ</a></center>
<br/><br/>
<div class="row">
                                        <div class="col-md-6 col-xl-3 text-center">
                                            <div class="m-b-25">
                                                <div style="display:inline;width:150px;height:150px;"><input data-min="0" data-displayprevious="true" data-max="<?=$stat['sall']?>" value="<?=$stat['s1']?>" data-plugin="knob" data-width="150" data-height="150" data-cursor="true" data-fgcolor="#00adff" value="9" data-readOnly=true style="width: 79px; height: 50px; position: absolute; vertical-align: middle; margin-top: 50px; margin-left: -114px; border: 0px; background: none; font-style: normal; font-variant: normal; font-weight: bold; font-stretch: normal; font-size: 30px; line-height: normal; font-family: Arial; text-align: center; color: rgb(16, 196, 105); padding: 0px; -webkit-appearance: none;"></div>
                                                <h5 class="font-600 text-muted"><i class="fa fa-reply" style="color:#00adff;"></i> Новый</h5>
                                            </div>
                                        </div><!-- end col-->

                                        <div class="col-md-6 col-xl-3 text-center">
                                            <div class="m-b-25">
                                                <div style="display:inline;width:150px;height:150px;"><input data-min="0" data-displayprevious="true" data-max="<?=$stat['sall']?>" value="<?=$stat['s11']?>" data-plugin="knob" data-width="150" data-height="150" data-cursor="true" data-fgcolor="#00adff" value="9" data-readOnly=true style="width: 79px; height: 50px; position: absolute; vertical-align: middle; margin-top: 50px; margin-left: -114px; border: 0px; background: none; font-style: normal; font-variant: normal; font-weight: bold; font-stretch: normal; font-size: 30px; line-height: normal; font-family: Arial; text-align: center; color: rgb(16, 196, 105); padding: 0px; -webkit-appearance: none;"></div>
                                                <h5 class="font-600 text-muted"><i class="fa fa-money" style="color:#00adff;"></i> На оценке у исполнителя</h5>
                                            </div>
                                        </div><!-- end col-->

										
                                        <div class="col-md-6 col-xl-3 text-center">
                                            <div class="m-b-25">
                                                <div style="display:inline;width:150px;height:150px;"><input data-min="0" data-displayprevious="true" data-max="<?=$stat['sall']?>" value="<?=$stat['s2']?>" data-plugin="knob" data-width="150" data-height="150" data-cursor="true" data-fgcolor="#00adff" value="9" data-readOnly=true style="width: 79px; height: 50px; position: absolute; vertical-align: middle; margin-top: 50px; margin-left: -114px; border: 0px; background: none; font-style: normal; font-variant: normal; font-weight: bold; font-stretch: normal; font-size: 30px; line-height: normal; font-family: Arial; text-align: center; color: rgb(16, 196, 105); padding: 0px; -webkit-appearance: none;"></div>
                                                <h5 class="font-600 text-muted"><i class="fa fa-pencil" style="color:#00adff;"></i> В работе</h5>
                                            </div>
                                        </div><!-- end col-->
                                        <div class="col-md-6 col-xl-3 text-center">
                                            <div class="m-b-25">
                                                <div style="display:inline;width:150px;height:150px;"><input data-min="0" data-displayprevious="true" data-max="<?=$stat['sall']?>" value="<?=$stat['s3']?>" data-plugin="knob" data-width="150" data-height="150" data-cursor="true" data-fgcolor="#00adff" value="9" data-readOnly=true style="width: 79px; height: 50px; position: absolute; vertical-align: middle; margin-top: 50px; margin-left: -114px; border: 0px; background: none; font-style: normal; font-variant: normal; font-weight: bold; font-stretch: normal; font-size: 30px; line-height: normal; font-family: Arial; text-align: center; color: rgb(16, 196, 105); padding: 0px; -webkit-appearance: none;"></div>
                                                <h5 class="font-600 text-muted"><i class="fa fa-file-text-o " style="color:#00adff;"></i> План в разработке у исполнителя</h5>
                                            </div>
                                        </div><!-- end col-->
                                        <div class="col-md-6 col-xl-3 text-center">
                                            <div class="m-b-25">
                                                <div style="display:inline;width:150px;height:150px;"><input data-min="0" data-displayprevious="true" data-max="<?=$stat['sall']?>" value="<?=$stat['s4']?>" data-plugin="knob" data-width="150" data-height="150" data-cursor="true" data-fgcolor="#ffa500" value="9" data-readOnly=true style="width: 79px; height: 50px; position: absolute; vertical-align: middle; margin-top: 50px; margin-left: -114px; border: 0px; background: none; font-style: normal; font-variant: normal; font-weight: bold; font-stretch: normal; font-size: 30px; line-height: normal; font-family: Arial; text-align: center; color: rgb(16, 196, 105); padding: 0px; -webkit-appearance: none;"></div>
                                                <h5 class="font-600 text-muted"><i class="fa fa-exclamation-triangle" style="color:#ffa500;"></i>  План на утверждении клиента</h5>
                                            </div>
                                        </div><!-- end col-->
                                         <div class="col-md-6 col-xl-3 text-center">
                                            <div class="m-b-25">
                                                <div style="display:inline;width:150px;height:150px;"><input data-min="0" data-displayprevious="true" data-max="<?=$stat['sall']?>" value="<?=$stat['s5']?>" data-plugin="knob" data-width="150" data-height="150" data-cursor="true" data-fgcolor="#00adff" value="9" data-readOnly=true style="width: 79px; height: 50px; position: absolute; vertical-align: middle; margin-top: 50px; margin-left: -114px; border: 0px; background: none; font-style: normal; font-variant: normal; font-weight: bold; font-stretch: normal; font-size: 30px; line-height: normal; font-family: Arial; text-align: center; color: rgb(16, 196, 105); padding: 0px; -webkit-appearance: none;"></div>
                                                <h5 class="font-600 text-muted"><i class="fa fa-thumbs-o-up" style="color:#00adff;"></i> Часть заказа на утверждении клиентом</h5>
                                            </div>
                                        </div><!-- end col-->
                                        <div class="col-md-6 col-xl-3 text-center">
                                            <div class="m-b-25">
                                                <div style="display:inline;width:150px;height:150px;"><input data-min="0" data-displayprevious="true" data-max="<?=$stat['sall']?>" value="<?=$stat['s6']?>" data-plugin="knob" data-width="150" data-height="150" data-cursor="true" data-fgcolor="#00adff" value="9" data-readOnly=true style="width: 79px; height: 50px; position: absolute; vertical-align: middle; margin-top: 50px; margin-left: -114px; border: 0px; background: none; font-style: normal; font-variant: normal; font-weight: bold; font-stretch: normal; font-size: 30px; line-height: normal; font-family: Arial; text-align: center; color: rgb(16, 196, 105); padding: 0px; -webkit-appearance: none;"></div>
                                                <h5 class="font-600 text-muted"><i class="fa fa-refresh" style="color:#00adff;"></i> Доработка</h5>
                                            </div>
                                        </div><!-- end col-->                                   

                                        <div class="col-md-6 col-xl-3 text-center">
                                            <div class="m-b-25">
                                                <div style="display:inline;width:150px;height:150px;"><input data-min="0" data-displayprevious="true" data-max="<?=$stat['sall']?>" value="<?=$stat['s7']?>" data-plugin="knob" data-width="150" data-height="150" data-cursor="true" data-fgcolor="#ffa500" value="9" data-readOnly=true style="width: 79px; height: 50px; position: absolute; vertical-align: middle; margin-top: 50px; margin-left: -114px; border: 0px; background: none; font-style: normal; font-variant: normal; font-weight: bold; font-stretch: normal; font-size: 30px; line-height: normal; font-family: Arial; text-align: center; color: rgb(16, 196, 105); padding: 0px; -webkit-appearance: none;"></div>
                                                <h5 class="font-600 text-muted"><i class="fa fa-hourglass-half" style="color:#ffa500;"></i> В ожидании</h5>
                                            </div>
                                        </div><!-- end col-->
                                        <div class="col-md-6 col-xl-3 text-center">
                                            <div class="m-b-25">
                                                <div style="display:inline;width:150px;height:150px;"><input data-min="0" data-displayprevious="true" data-max="<?=$stat['sall']?>" value="<?=$stat['s8']?>" data-plugin="knob" data-width="150" data-height="150" data-cursor="true" data-fgcolor="#00adff" value="9" data-readOnly=true style="width: 79px; height: 50px; position: absolute; vertical-align: middle; margin-top: 50px; margin-left: -114px; border: 0px; background: none; font-style: normal; font-variant: normal; font-weight: bold; font-stretch: normal; font-size: 30px; line-height: normal; font-family: Arial; text-align: center; color: rgb(16, 196, 105); padding: 0px; -webkit-appearance: none;"></div>
                                                <h5 class="font-600 text-muted"><i class="fa fa-pause" style="color:#00adff;"></i> Приостановлен</h5>
                                            </div>
                                        </div><!-- end col-->

                                        <div class="col-md-6 col-xl-3 text-center">
                                            <div class="m-b-25">
                                                <div style="display:inline;width:150px;height:150px;"><input data-min="0" data-displayprevious="true" data-max="<?=$stat['sall']?>" value="<?=$stat['s9']?>" data-plugin="knob" data-width="150" data-height="150" data-cursor="true" data-fgcolor="#ee0303" value="9" data-readOnly=true style="width: 79px; height: 50px; position: absolute; vertical-align: middle; margin-top: 50px; margin-left: -114px; border: 0px; background: none; font-style: normal; font-variant: normal; font-weight: bold; font-stretch: normal; font-size: 30px; line-height: normal; font-family: Arial; text-align: center; color: rgb(16, 196, 105); padding: 0px; -webkit-appearance: none;"></div>
                                                <h5 class="font-600 text-muted"><i class="fa fa-frown-o" style="color:#ee0303;"></i> Заказ задерживается (долговой)</h5>
                                            </div>
                                        </div><!-- end col-->

                                        <div class="col-md-6 col-xl-3 text-center">
                                            <div class="m-b-25">
                                                <div style="display:inline;width:150px;height:150px;"><input data-min="0" data-displayprevious="true" data-max="<?=$stat['sall']?>" value="<?=$stat['s10']?>" data-plugin="knob" data-width="150" data-height="150" data-cursor="true" data-fgcolor="#43b215" value="9" data-readOnly=true style="width: 79px; height: 50px; position: absolute; vertical-align: middle; margin-top: 50px; margin-left: -114px; border: 0px; background: none; font-style: normal; font-variant: normal; font-weight: bold; font-stretch: normal; font-size: 30px; line-height: normal; font-family: Arial; text-align: center; color: rgb(16, 196, 105); padding: 0px; -webkit-appearance: none;"></div>
                                                <h5 class="font-600 text-muted"><i class="fa fa-check" style="color:#43b215;"></i> Заказ выполнен</h5>
                                            </div>
                                        </div><!-- end col-->

                                        <div class="col-md-6 col-xl-3 text-center">
                                            <div class="m-b-25">
                                                <div style="display:inline;width:150px;height:150px;"><input data-min="0" data-displayprevious="true" data-max="<?=$stat['sprofit']?>" value="<?=$stat['sprofit']?>" data-plugin="knob" data-width="150" data-height="150" data-cursor="true" data-fgcolor="#43b215" value="9" data-readOnly=true style="width: 79px; height: 50px; position: absolute; vertical-align: middle; margin-top: 50px; margin-left: -114px; border: 0px; background: none; font-style: normal; font-variant: normal; font-weight: bold; font-stretch: normal; font-size: 30px; line-height: normal; font-family: Arial; text-align: center; color: rgb(16, 196, 105); padding: 0px; -webkit-appearance: none;"></div>
                                                <h5 class="font-600 text-muted"><i class="fa fa-rub" style="color:#43b215;"></i> Всего заказов на сумму</h5>
                                            </div>
                                        </div><!-- end col-->

                                                                                <div class="col-md-6 col-xl-3 text-center">
                                            <div class="m-b-25">
                                                <div style="display:inline;width:150px;height:150px;"><input data-min="0" data-displayprevious="true" data-max="<?=$stat['smanyback']?>" value="<?=$stat['smanyback']?>" data-plugin="knob" data-width="150" data-height="150" data-cursor="true" data-fgcolor="#ee0303" value="9" data-readOnly=true style="width: 79px; height: 50px; position: absolute; vertical-align: middle; margin-top: 50px; margin-left: -114px; border: 0px; background: none; font-style: normal; font-variant: normal; font-weight: bold; font-stretch: normal; font-size: 30px; line-height: normal; font-family: Arial; text-align: center; color: rgb(16, 196, 105); padding: 0px; -webkit-appearance: none;"></div>
                                                <h5 class="font-600 text-muted"><i class="fa fa-thumbs-o-down" style="color:#ee0303;"></i> Возврат денег</h5>
                                            </div>
                                        </div><!-- end col-->












                                    </div>
