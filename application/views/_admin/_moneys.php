<h3>Список выплат и их статус</h3>
<table>
	<tr>
		<th>#</th>
		<th>аккаунт </th>
		<th>сумма</th>
		<th>статус</th>
<?
foreach ($money_row as $money_item):
	echo '<tr><td><a href="admin/money/'.$money_item['id'].'">'.$money_item['id'].'</a></td><td>'.$money_item['user'].'</td><td>'.$money_item['amount'].'</td><td>'.$money_item['statys'].'</td><td></td></tr>';
endforeach;
?>
</table>