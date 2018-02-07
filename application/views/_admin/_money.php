
<?
echo validation_errors();
echo form_open('admin/money/'.$money_row['id']);
	?>
	#:<?=$money_row['id']?><br/>
	Сумма: <?=$money_row['amount']?> руб.<br/>
	Аккаунт: <?=$money_row['user']?><br/>
Статус:<br/>

<select name="statys">
  <option <? if($money_row['statys'] == 'оплачен') {echo 'selected="selected"';}?> value="оплачен">оплачен</option>
   <option <? if($money_row['statys'] == 'не оплачен') {echo 'selected="selected"';}?> value="не оплачен">не оплачен</option>
</select>
<br/>
	
<?
echo form_submit('mysubmit', 'Обновить статус');
echo form_close();

if($money_row['statys'] == 'не оплачен') {
?>


<h3>Произвести выплату</h3>

<center>
<iframe frameborder="0" allowtransparency="true" scrolling="no" src="https://money.yandex.ru/quickpay/shop-widget?account=<?=$money_row_user['num_yd']?>&quickpay=shop&payment-type-choice=on&mobile-payment-type-choice=on&writer=seller&targets=komissionnye_ess&targets-hint=&default-sum=<?=$money_row['amount']*0.87?>&button-text=01&successURL=&amount_due=<?=$money_row['amount']*0.87?>" width="450" height="198"></iframe>
</center>

<? }