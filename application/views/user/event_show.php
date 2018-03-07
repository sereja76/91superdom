<?php
/**
 * Created by PhpStorm.
 * User: Сергей
 * Date: 09.02.2018
 * Time: 10:24
 */


echo '<div class="col-md-12">
                                <div class="card-box">';

echo '<h3>'.$event_show['title'].'</h3>';

foreach ($event_show['summary'] as $summary):
    echo '<p>'.$summary['title'].' '.$summary['description'].'</p>';
endforeach;

//echo "<pre>";
//print_r($event_show);
//echo "</pre>";

echo '</div></div>';