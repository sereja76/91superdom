<?
echo validation_errors();
echo form_open('admin/discipline/'.$discipline_id);
?>

<div class='form-group row'>
    <label class='col-2 col-form-label'>Значение</label>
    <div class='col-10'>    
        <input type="text" size="40" name="title" value="<?=$discipline_title?>" placeholder="Дисциплина" class='form-control'>
    </div>
</div>

<button type="submit" class="btn btn-primary">Обновить</button>


<?
echo form_close();

?>

