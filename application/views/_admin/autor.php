<?
echo validation_errors();
echo form_open('admin/autors/'.$id);

?>

<div class='form-group row'>
    <label class='col-2 col-form-label'>Порядковый номер</label>
    <div class='col-10'>	
		<?=$id ?>
	</div>
</div>

<div class='form-group row'>
    <label class='col-2 col-form-label'>Логин</label>
    <div class='col-10'>	
		<?=$username?>
	</div>
</div>

<div class='form-group row'>
    <label class='col-2 col-form-label'>Имя</label>
    <div class='col-10'>	
		<input type="text" size="40" name="first_name" value="<?=$first_name?>"   class="form-control">
	</div>
</div>

<div class='form-group row'>
    <label class='col-2 col-form-label'>Фамилия</label>
    <div class='col-10'>	
		<input type="text" size="40" name="last_name" value="<?=$last_name?>"   class="form-control">
	</div>
</div>

<div class='form-group row'>
    <label class='col-2 col-form-label'>Телефон</label>
    <div class='col-10'>	
		<input type="text" size="40" name="phone" value="<?=$phone?>"   class="form-control">
	</div>
</div>




<button type="submit" class="btn btn-primary">Обновить</button>

<?
//echo form_submit('mysubmit', 'Обновить');
echo form_close();

?>

