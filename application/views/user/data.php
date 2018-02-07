

		<?
		echo validation_errors();
		echo form_open('lk/data');

		?>


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

		<div class='form-group row'>
		    <label class='col-2 col-form-label'>Ссылка в соцсетях</label>
		    <div class='col-10'>	
				<input type="text" size="40" name="social" value="<?=$social?>"   class="form-control">
			</div>
		</div>

		<div class='form-group row'>
		    <label class='col-2 col-form-label'>День рождения</label>
		    <div class='col-10'>	
				<input type="date" size="40" name="dr" value="<?=$dr?>"   class="form-control">
			</div>
		</div>

		<div class='form-group row'>
		    <label class='col-2 col-form-label'>Пол</label>
		    <div class='col-10'>	
				<?=$sex?>
			</div>
		</div>



		<button type="submit" class="btn btn-primary">Обновить</button>


		<?
		//echo form_submit('mysubmit', 'Сохранить');
		echo form_close();
		?>