<h3>Список выплат и их статус</h3>
<table>
	<tr>
		<th>#</th>
		<th>сумма</th>
		<th>статус</th>	
<?
foreach ($money_row as $money_item):
	echo '<tr><td>'.$money_item['id'].'</td><td>'.$money_item['amount'].'</td><td>'.$money_item['statys'].'</td></tr>';
endforeach;
?>
</table>
