<a href="admin/customer_add">Добавить клиента</a>
<br/><br/>
<table class="simple table">
<tr>
	<th>№</th>
	<th>Имя и фамилия</th>
	<th>Логин</th>


<tr>

<?php foreach ($users as $user_item): ?>

		<tr>
			<td><a href="admin/users/<?=$user_item['id']?>"><?php echo $user_item['id']; ?></a></td>
			<td><a href="admin/users/<?=$user_item['id']?>"><?php echo $user_item['first_name']; ?> <?php echo $user_item['last_name']; ?></a></td>
			<td><?php echo $user_item['username']; ?></td>

		<tr>

<?php endforeach; 

// ссылка -> <index.php/admin/users/<?php echo $user_item['id']; ?>
	



</table>