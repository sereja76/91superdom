<?
echo validation_errors();
echo form_open('admin/promo/'.$promo_id);
?>

<div class='form-group row'>
    <label class='col-2 col-form-label'>Код</label>
    <div class='col-10'>    
        <input type="text" size="40" name="promo_code" value="<?=$promo_code?>" placeholder="Код" class='form-control'>
    </div>
</div>
<div class='form-group row'>
    <label class='col-2 col-form-label'>Сумма</label>
    <div class='col-10'>    
        <input type="text" size="40" name="promo_sum" value="<?=$promo_sum?>" placeholder="Сумма" class='form-control'>
    </div>
</div>
<div class='form-group row'>
    <label class='col-2 col-form-label'>Описание</label>
    <div class='col-10'>    
        <input type="text" size="40" name="promo_title" value="<?=$promo_title?>" placeholder="Описание" class='form-control'>
    </div>
</div>
<button type="submit" class="btn btn-primary">Обновить</button>


<?
echo form_close();

?>

