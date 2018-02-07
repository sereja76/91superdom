<a href="admin/autor_add">Добавить автора</a>
<br/><br/>
<table class="simple table">
<tr>
	<th>№</th>
	<th>Имя и фамилия</th>
	<th>Логин</th>


<tr>

<?php foreach ($autors as $autor_item): ?>

		<tr>
			<td><a href="admin/autors/<?=$autor_item['id']?>"><?php echo $autor_item['id']; ?></a></td>
			<td><a href="admin/autors/<?=$autor_item['id']?>"><?php echo $autor_item['first_name']; ?> <?php echo $autor_item['last_name']; ?></a></td>
			<td><?=$autor_item['username']?></td>

		<tr>

<?php endforeach; ?>
</table>