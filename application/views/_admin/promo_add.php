<?
echo "<p>".$ok."</p>";
echo validation_errors();
echo form_open('admin/promo_add');
?>


<div class='form-group row'>
    <label class='col-2 col-form-label'>Код</label>
    <div class='col-10'>    
        <input type="text" size="40" name="promo_code" value="" placeholder="Код" class='form-control'>
    </div>
</div>

<div class='form-group row'>
    <label class='col-2 col-form-label'>Сумма</label>
    <div class='col-10'>    
        <input type="text" size="40" name="promo_sum" value="" placeholder="Сумма" class='form-control'>
    </div>
</div>

<div class='form-group row'>
    <label class='col-2 col-form-label'>Описание</label>
    <div class='col-10'>    
        <input type="text" size="40" name="promo_title" value="" placeholder="Описание" class='form-control'>
    </div>
</div>


<button type="submit" class="btn btn-primary">Добавить</button>
<?
echo form_close();
?>