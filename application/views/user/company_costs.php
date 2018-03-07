<?php
/**
 * Created by PhpStorm.
 * User: Сергей
 * Date: 12.02.2018
 * Time: 17:56
 */

echo '<div class="col-md-12">
                                <div class="card-box">';

foreach ($company_costs['costs'] as $costs):
echo "<h3>{$costs['groupTitle']}:</h3>";
    foreach ($costs['list'] as $list):

        echo "<p>{$list['title']} ({$list['unit']})  {$list['price']} руб.</p>";
    endforeach;

endforeach;


/*echo "<pre>";
print_r($company_costs);
echo "</pre>";*/

echo '</div></div>';