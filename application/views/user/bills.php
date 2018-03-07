<?php
/**
 * Created by PhpStorm.
 * User: Сергей
 * Date: 12.02.2018
 * Time: 15:42
 */
echo '<div class="col-md-12">
                                <div class="card-box">';
?>
<div class="text-center">
    <a href="lk/metric_list" class="btn btn-primary"><!--Внести -->показания счетчиков</a><br/>
    <h3>Баланс</h3>
    <h4><?=$bill_summary['total']?> руб.</h4>
    <p><?=$bill_summary['totalText']?></p>

    <!--<a href="lk/company_paymentDetails" class="btn btn-primary"><i class="fa fa-drivers-license-o"></i> Реквизиты</a>-->

    <button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg2"><i class="fa fa-drivers-license-o"></i> Реквизиты</button>

    <!--<a href="lk/company_costs" class="btn btn-primary"><i class="fa fa-list-alt"></i> Тарифы</a>-->

    <button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-list-alt"></i> Тарифы</button>


    <a href="lk/bill_payLink_summary" class="btn btn-primary"><i class="fa fa-money"></i> Оплатить</a>

    <h3>Список счетов</h3>
</div>
    </div></div>



    <!--  Modal content for the above example -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="myLargeModalLabel">Тарифы:</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">

                    <?
                    foreach ($company_costs['costs'] as $costs):
                    echo "<h4>{$costs['groupTitle']}:</h4>";
                        foreach ($costs['list'] as $list):
                            echo "<p>{$list['title']} ({$list['unit']})  {$list['price']} руб.</p>";
                        endforeach;

                    endforeach;
                    ?>


                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!--  Modal content for the above example -->
    <div class="modal fade bs-example-modal-lg2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="myLargeModalLabel">Реквизиты:</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">

                    <?
                    foreach ($company_paymentDetails['info'] as $info):

                        foreach ($info['paymentDetails'] as $key => $paymentDetails): // если надо и значение ключа получить

                            echo "<p>{$key}: {$paymentDetails}</p>";
                        endforeach;

                    endforeach;
                    ?>


                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

<?php
//echo "<pre>";
//print_r($bill_summary);
//echo "</pre>";

$tab_link = '';
$tab_content = '';
foreach ($bill_summary['years'] as $key => $years):
    if ($key == 0){$active = 'active';}
    else {$active = '';}
    $tab_link .= '<li class="nav-item"><a href="#pr'.$key.'" data-toggle="tab" class="nav-link '.$active.'">'.$years.'</a></li>';





    $bill_calendar = $this->superdom_model->bill_calendar($years);

    $tab_content .='<div class="tab-pane '.$active.'" id="pr'.$key.'"><div class="row">';

    foreach ($bill_calendar['calendar'][0]['months'] as $month):
        //echo $month['name'];
        if ($month['paid'] == 1){$paid = '<i class="fa fa-check-square-o"></i>';}
        else {$paid = '';}

        $tab_content .="<div class=\"col-lg-2 col-md-3 col-sm-12 col-xs-12\">
                                <div class=\"card-box\">


                                    <a href=\"lk/bill_month/{$month['id']}/{$years}\"><h4 class=\"header-title mt-0 m-b-30\">{$paid} {$month['name']}</h4></a>

                                </div>
                            </div>";

       /* echo "<pre>";
        print_r($month);
        echo "</pre>";*/

    endforeach;
    $tab_content .='</div></div>';

    /*echo "<pre>";
    print_r($bill_calendar);
    echo "</pre>"; */

endforeach;

?>





<div class="col-xl-12">

            <div id="rootwizard" class="pull-in">
                <ul class="nav nav-tabs nav-justified navtab-wizard bg-muted">
                    <?=$tab_link ?>
                </ul>
                <div class="tab-content col-xl-12 col-md-12">

                    <?=$tab_content?>

                </div>
            </div>



</div>

<?php
/*echo '</div></div>';*/