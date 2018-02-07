<br/><br/>
<h4>Заказы автора:</h4>
<table class="simple table">
<tr>
	<th>№</th>
	<th>Тема</th>
	<th>Срок заказа</th>
	<th>Срок доработки</th>
	<th>Цена автора</th>
	<th>Аванс 1</th>
	<th>Аванс 2</th>
	<th>Оплачено</th>
	<th>Возврат денег</th>
	<th>Статус</th>
<tr>

<?php foreach ($orders as $order_item): ?>
		<tr>
			<td><a href="admin/orders/<?=$order_item['order_id']?>"><?=$order_item['order_id']?></a></td>
			<td><a href="admin/orders/<?=$order_item['order_id']?>"><?=$order_item['order_subject']?></a></td>
			<td><?=$order_item['order_autor_deadline']?></td>
			<td><?=$order_item['order_autor_deadline_fix']?></td>
			<td><?=$order_item['order_autor_price']?></td>
			<td><?=$order_item['order_autor_pay_1']?></td>
			<td><?=$order_item['order_autor_pay_2']?></td>
			<td><?=$order_item['order_autor_pay']?></td>
			<td><?=$order_item['order_autor_manyback']?></td>

			<? foreach ($order_status as $status):

    			if($order_item['order_statys'] == $status['order_status_id']) {echo "<td>".$status['order_status_title']."</td>";}

			endforeach; ?>
		<tr>

<?php endforeach; ?>

</table>