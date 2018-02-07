<p>Всего заработано <?=$amount?> рублей</p>
<p>Минимальная сумма к выплате - <?=$min?> рублей
<?
//echo $good_amount['amount'];

if ($amount > $good_amount['amount']+$min ) { // показываем форму для вывода

	
	echo validation_errors();
	echo form_open('lk/money');
	$dostupno = $amount - ($good_amount['amount']+$min);
	?>
	Сумма:<br/>
	<input type="text" size="40" name="amount" value="<? echo $amount - ($good_amount['amount']);?>"><br/>



<?
echo form_submit('mysubmit', 'Заказать выплату');
echo form_close();



	
	
	
	
	
	
	
}

