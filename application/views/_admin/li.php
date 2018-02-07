<h3>Тип работы</h3>
<a href='admin/type_work_add'>Добавить</a>
<table class="table">
<tr>
	<th>№</th>
	<th>Название</th>
	<th></th>
<tr>
<?php foreach ($type_work as $type_work_item): ?>

		<tr>
			<td><a href="admin/type_work/<?=$type_work_item['type_work_id']?>"># <?=$type_work_item['type_work_id']?></a></td>
			<td><?=$type_work_item['type_work_title']?></td>
			<td><a href="admin/type_work_del/<?=$type_work_item['type_work_id']?>"><i class="fa fa-trash-o fa-1x"></i></a></td>
		<tr>
<?php endforeach; ?>
</table>

<h3>Дисциплины</h3>
<a href='admin/discipline_add'>Добавить</a>
<table class="table">
<tr>
	<th>№</th>
	<th>Название</th>
	<th></th>
<tr>
<?php foreach ($discipline as $discipline_item): ?>

		<tr>
			<td><a href="admin/discipline/<?php echo $discipline_item['discipline_id']; ?>"># <?php echo $discipline_item['discipline_id']; ?></a></td>
			<td><?php echo $discipline_item['discipline_title']; ?></td>
			<td><a href="admin/discipline_del/<?php echo $discipline_item['discipline_id']; ?>"><i class="fa fa-trash-o fa-1x"></i></a></td>
		<tr>
<?php endforeach; ?>
</table>

<h3>Промокоды</h3>
<a href='admin/promo_add'>Добавить</a>
<table class="table">
<tr>
	<th>№</th>
	<th>Код</th>
	<th>Сумма</th>
	<th>Описание</th>
	<th></th>
<tr>
<?php foreach ($promo as $promo_item): ?>

		<tr>
			<td><a href="admin/promo/<?php echo $promo_item['promo_id']; ?>"># <?php echo $promo_item['promo_id']; ?></a></td>
			<td><?php echo $promo_item['promo_code']; ?></td>
			<td><?php echo $promo_item['promo_sum']; ?></td>
			<td><?php echo $promo_item['promo_title']; ?></td>
			<td><a href="admin/promo_del/<?php echo $promo_item['promo_id']; ?>"><i class="fa fa-trash-o fa-1x"></i></a></td>
		<tr>
<?php endforeach; ?>
</table>


