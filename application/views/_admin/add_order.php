<?
echo validation_errors();
echo form_open('admin/add_order');

echo "<h3>Общая часть</h3>";
// вид работы
?>
<div class="form-group row">
    <label class="col-2 col-form-label">Тип работы</label>
    <div class="col-10">
<?
echo "<select name='order_type_work' class='form-control'>
<option val='no'>Выберите </option>
";
foreach ($type_work as $work):
	echo "<option value='$work[type_work_id]'>$work[type_work_title]</option>";
endforeach;
echo "</select>
    </div>
</div>
<div class='form-group row'>
    <label class='col-2 col-form-label'>Дисциплина</label>
    <div class='col-10'>";


// дисциплина
echo "<select name='order_discipline' class='form-control'>
<option val='no'>Выберите дисциплину</option>";
foreach ($discipline as $discipline_one):
	
	echo "<option value='$discipline_one[discipline_id]'>$discipline_one[discipline_title]</option>";

endforeach;
echo "</select>
    </div>
</div>";
?>
<div class='form-group row'>
    <label class='col-2 col-form-label'>Тема</label>
    <div class='col-10'>
		<input type="text" size="40" name="order_subject" value="" placeholder="Тема" class="form-control">
	</div>
</div>


<div class='form-group row'>
    <label class='col-2 col-form-label'>Объем</label>
    <div class='col-10'>		
		<input type="text" size="40" name="order_volume" value="" placeholder="Объем" class="form-control">
	</div>
</div>

<div class='form-group row'>
    <label class='col-2 col-form-label'>Требования</label>
    <div class='col-10'>		
		<input type="text" size="40" name="order_requirement" value="" placeholder="Требования" class="form-control">
	</div>
</div>

<?

echo"<h3>Часть для клиента</h3>

<div class='form-group row'>
    <label class='col-2 col-form-label'>Выберите клиента</label>
    <div class='col-10'>
<select name='order_user_identity' id='order_user_identity' class='form-control'>
<option val='no'>Выберите клиента</option>";

foreach ($all_customers as $customer):
	
	echo "<option value='$customer[username]'>#$customer[id] $customer[first_name] $customer[first_name]  $customer[username]</option>";

endforeach;
?>
</select>    
</div>
</div>

<div class='form-group row'>
    <label class='col-2 col-form-label'>Срок заказа</label>
    <div class='col-10'>	
		<input type="date" size="40" name="order_deadline" value="" placeholder="Срок заказа"  class="form-control">
	</div>
</div>

<div class='form-group row'>
    <label class='col-2 col-form-label'>Срок доработки</label>
    <div class='col-10'>	
		<input type="date" size="40" name="order_deadline_fix" value="" placeholder="Срок доработки"  class="form-control">
	</div>
</div>

<div class='form-group row'>
    <label class='col-2 col-form-label'>Цена заказа</label>
    <div class='col-10'>	
		<input type="text" size="40" name="order_price_start" value="" placeholder="Цена заказа"  class="form-control">
	</div>
</div>

<div class='form-group row'>
    <label class='col-2 col-form-label'>Промокод</label>
    <div class='col-10'>    
        <input type="text" size="40" name="order_promo" id="order_promo" value="" placeholder="Промокод"  class="form-control" onchange="Check_code()">
        <p id="order_promo_text"></p>
    </div>
</div>

<div class='form-group row'>
    <label class='col-2 col-form-label'>Итоговая цена</label>
    <div class='col-10'>	
		<input type="text" size="40" name="order_price_finish" value="" placeholder="Итоговая цена"  class="form-control">
	</div>
</div>

<div class='form-group row'>
    <label class='col-2 col-form-label'>Аванс 1</label>
    <div class='col-10'>	
		<input type="text" size="40" name="order_pay_1" value="" placeholder="Аванс 1"  class="form-control">
	</div>
</div>

<div class='form-group row'>
    <label class='col-2 col-form-label'>Аванс 2</label>
    <div class='col-10'>	
		<input type="text" size="40" name="order_pay_2" value="" placeholder="Аванс 2"  class="form-control">
	</div>
</div>

<div class='form-group row'>
    <label class='col-2 col-form-label'>Оплачено</label>
    <div class='col-10'>	
 		<label class="custom-control custom-radio">
            <input id="radio1" name="order_pay" type="radio" class="custom-control-input" value='Да'>
            <span class="custom-control-indicator"></span>
            <span class="custom-control-description">Да</span>
        </label>
        <label class="custom-control custom-radio">
            <input id="radio2" name="order_pay" type="radio" class="custom-control-input" checked="" value='Нет'>
            <span class="custom-control-indicator"></span>
            <span class="custom-control-description">Нет</span>
        </label>
    </div>
</div>

<div class='form-group row'>
    <label class='col-2 col-form-label'>Возврат денег</label>
    <div class='col-10'>	
		<input type="text" size="40" name="order_manyback" value="" placeholder="Возврат денег" class="form-control">
	</div>
</div>

<div class='form-group row'>
    <label class='col-2 col-form-label'>Статус</label>
    <div class='col-10'>
<?

echo "<select name='order_statys' class='form-control'>
<option val='no'>Выберите стутус</option>";

foreach ($order_status as $status):
	echo "<option value='$status[order_status_id]'>$status[order_status_title]</option>";

endforeach;
?>
</select>
    </div>
</div>

<h3>Часть для автора</h3>
<div class='form-group row'>
    <label class='col-2 col-form-label'>Выберите автора</label>
    <div class='col-10'>
<?

echo "<select name='order_autor' class='form-control'>
<option val='no'>Выберите автора</option>";
foreach ($all_autors as $autor):

	echo "<option value='$autor[username]'>#$autor[id] $autor[first_name] $autor[first_name]  $autor[username]</option>";

endforeach;
?>
</select>    
</div>
</div>
<div class='form-group row'>
    <label class='col-2 col-form-label'>Срок заказа</label>
    <div class='col-10'>	
		<input type="date" size="40" name="order_autor_deadline" value="" placeholder="Срок заказа для автора"  class='form-control'>
    </div>
</div>

<div class='form-group row'>
    <label class='col-2 col-form-label'>Срок доработки</label>
    <div class='col-10'>	
		<input type="date" size="40" name="order_autor_deadline_fix" value="" placeholder="Срок доработки для автора" class='form-control'>
    </div>
</div>

<div class='form-group row'>
    <label class='col-2 col-form-label'>Цена автора</label>
    <div class='col-10'>	
		<input type="text" size="40" name="order_autor_price" value="" placeholder="Цена автора" class='form-control'>
    </div>
</div>

<div class='form-group row'>
    <label class='col-2 col-form-label'>Аванс автору 1</label>
    <div class='col-10'>	
		<input type="text" size="40" name="order_autor_pay_1" value="" placeholder="Аванс автору 1" class='form-control'>
    </div>
</div>

<div class='form-group row'>
    <label class='col-2 col-form-label'>Аванс автору 2</label>
    <div class='col-10'>	
		<input type="text" size="40" name="order_autor_pay_2" value="" placeholder="Аванс автору 2" class='form-control'>
    </div>
</div>

<div class='form-group row'>
    <label class='col-2 col-form-label'>Оплачено</label>
    <div class='col-10'>	
     	<label class="custom-control custom-radio">
            <input id="radio1" name="order_autor_pay" type="radio" class="custom-control-input" value='Да' >
            <span class="custom-control-indicator"></span>
            <span class="custom-control-description">Да</span>
        </label>
        <label class="custom-control custom-radio">
            <input id="radio2" name="order_autor_pay" type="radio" class="custom-control-input" checked="" value='Нет'>
            <span class="custom-control-indicator"></span>
            <span class="custom-control-description">Нет</span>
        </label>
    </div>
</div>

<div class='form-group row'>
    <label class='col-2 col-form-label'>Возврат денег</label>
    <div class='col-10'>	
		<input type="text" size="40" name="order_autor_manyback" value="" placeholder="Возврат денег" class='form-control'>
    </div>
</div>


<div class='form-group row'>
    <label class='col-2 col-form-label'>Заметки</label>
    <div class='col-10'>    
        <textarea id="elm1" name="order_note"></textarea>
    </div>
</div>






<input type="hidden" name="order_id" id="order_id"  value="new">

<button type="submit" class="btn btn-primary">Добавить заказ</button>
<?
//echo form_submit('btn btn-primary', 'Добавить заказ');
echo form_close();