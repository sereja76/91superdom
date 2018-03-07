<?php
/**
 * Created by PhpStorm.
 * User: Сергей
 * Date: 12.02.2018
 * Time: 17:12
 */
echo '<div class="col-md-12">
                                <div class="card-box">';

if ($bill_month['statusCode'] == 204 ){
    echo "<p>{$bill_month['userText']}</p>";
}
else {

    echo "<h3>{$bill_month['totalSum']} руб.</h3>";
    if ($bill_month['paid'] == 1) {
        echo '<p><i class="fa fa-check-square-o"></i>' . $bill_month['title'] . '</p>';
    } else {
        echo '<p>' . $bill_month['title'] . '</p>';

        echo '<a href="lk/company_paymentDetails" class="btn btn-primary"><i class="fa fa-drivers-license-o"></i> Реквизиты</a>

<a href="lk/bill_payLink/' . $bill_month['id'] . '" class="btn btn-primary"><i class="fa fa-money"></i> Оплатить</a>';
    }

    foreach ($bill_month['billSections'] as $childSections):
        echo "<h3>{$childSections['title']}</h3><p>На сумму {$childSections['value']}</p>";

        foreach ($childSections['childSections'] as $childSection):
            echo "<p>{$childSection['title']} {$childSection['value']}</p>";
        endforeach;

    endforeach;
}
/*
echo "<pre>";
print_r($bill_month);
echo "</pre>";*/
echo '</div></div>';