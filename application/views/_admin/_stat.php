<p>Всего переходов <?=$digit_cross?></p>

<table class="simple">
<tr>
	<th>№</th>
	<th>Дата</th>
	<th>ip</th>
<tr>

<?php foreach ($cross as $cross_item): ?>

		<tr>
			<td><?php echo $cross_item['id']; ?></a></td>
			<td><?php echo $cross_item['date']; ?></td>
			<td><?php echo $cross_item['ip']; ?></td>
		<tr>

<?php endforeach; ?>	

</table>