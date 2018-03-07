<?php
/**
 * Created by PhpStorm.
 * User: Сергей
 * Date: 08.02.2018
 * Time: 21:21
 */

echo '<div class="col-md-12">
                                <div class="card-box">';
//echo "";
//echo "<pre>";
//print_r($place_events_list);
//echo "</pre>";
?>
<h3>Пользователи</h3>
<table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
    <!--<tr>
        <th></th>
        <th></th>
        <th></th>
    </tr>-->
    </thead>
    <tbody>

    <?php foreach ($place_customers['customers'] as $place_customer): ?>

        <tr>
            <td><img src="<?=$place_customer['image']?>" height="50px"></td>
            <td><?=$place_customer['firstName']?> <?=$place_customer['lastName']?></td>
            <td><?=$place_customer['title']?></td>
        </tr>

    <?php endforeach;  ?>
    </tbody>

</table>

<a href="lk/add_customer" class="btn btn-primary">Добавить</a><br/>

<!-- lk/add_customer -->

<h3>Моя акивность</h3>

<table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
    <!--<tr>
        <th></th>
        <th></th>
        <th></th>
    </tr>-->
    </thead>
    <tbody>

    <?php foreach ($place_events_list['events'] as $place_event): ?>

        <tr>

                <td><img src="<?=$place_event['image']?>" height="50px"></td>
                <td><?=$place_event['date']?></td>
                <td><a href="lk/event/<?=$place_event['id']?>"><?=$place_event['title']?></a></td>

        </tr>

    <?php endforeach;  ?>
    </tbody>

</table>


<?
echo '</div></div>';