<?php
/**
 * Created by PhpStorm.
 * User: Сергей
 * Date: 12.02.2018
 * Time: 17:47
 */
echo '<div class="col-md-12">
                                <div class="card-box">';

foreach ($company_paymentDetails['info'] as $info):

    foreach ($info['paymentDetails'] as $key => $paymentDetails): // если надо и значение ключа получить

        echo "<p>{$key}: {$paymentDetails}</p>";
    endforeach;

endforeach;



/*    echo "<pre>";
    print_r($company_paymentDetails);
    echo "</pre>";*/

echo '</div></div>';