<a href="admin/add_order">Добавить заказ</a><br/><br/>

<table class="simple table">
<tr>
	<th>№</th>
	<th>Тема</th>
	<th>Клиент</th>
	<th>Срок заказа автору</th>
	<th>Срок доработки автором</th>
	<th>Цена заказа</th>
	<th>Итоговая цена</th>
	<!--th>Аванс 1</th>
	<th>Аванс 2</th-->
	<th>Оплачено</th>
	<th>Возврат денег</th>
	<th>Статус</th>
</tr>

<?php foreach ($orders as $order_item): ?>
		<tr>
			<td><a href="admin/orders/<?=$order_item['order_id']?>"><?=$order_item['order_id']?></a></td>
			<td><a href="admin/orders/<?=$order_item['order_id']?>"><?=$order_item['order_subject']?></a></td>
			<td><?=$order_item['order_user_identity']?></td>
			<td><?=$order_item['order_autor_deadline']?></td>
			<td><?=$order_item['order_autor_deadline']?></td>
			<td><?=$order_item['order_price_start']?></td>
			<td><?=$order_item['order_price_finish']?></td>
			<!--td><?//=$order_item['order_pay_1']?></td>
			<td><?//=$order_item['order_pay_2']?></td-->
			<td><?=$order_item['order_pay']?></td>
			<td><?=$order_item['order_manyback']?></td>
			<? foreach ($order_status as $status):

    			if($order_item['order_statys'] == $status['order_status_id']) {echo "<td>".$status['order_status_title']."</td>";}

			endforeach; ?>
		</tr>

<?php endforeach; ?>

</table>