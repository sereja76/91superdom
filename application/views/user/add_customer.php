<?php
/**
 * Created by PhpStorm.
 * User: Сергей
 * Date: 09.02.2018
 * Time: 10:03
 */

echo '<div class="col-md-12">
                                <div class="card-box">';
echo validation_errors();
echo form_open('lk/add_customer');
?>

    <div class='form-group row'>
        <label class='col-2 col-form-label'>Имя</label>
        <div class='col-10'>
            <input type="text" size="40" name="firstName" value="" placeholder="Имя" class='form-control'>
        </div>
    </div>

    <div class='form-group row'>
        <label class='col-2 col-form-label'>Фамилия</label>
        <div class='col-10'>
            <input type="text" size="40" name="lastName" value="" placeholder="Фамилия" class='form-control'>
        </div>
    </div>

    <div class='form-group row'>
        <label class='col-2 col-form-label'>Телефон</label>
        <div class='col-10'>
            <input type="text" size="40" name="phoneNumber" value="" placeholder="79991230099" class='form-control'>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Добавить</button>
<?
echo form_close();

echo '</div></div>';
?>