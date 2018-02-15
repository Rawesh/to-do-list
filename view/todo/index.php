<link rel="stylesheet" href="<?= URL ?>css/style.css">
<script src="https://use.fontawesome.com/25eaac5d3c.js"></script>
<!-- <?php foreach ($users as $user) { ?>
	<?php if ($user['id'] = $_SESSION['id'] ) { ?>
	<?php } ?>
<?php } ?> -->


	<nav>
		<a  href="<?=URL?>todo/create">
			<i class="fa fa-plus" aria-hidden="true"></i>
			Nieuw
		</a>

		<a id="logout" href="<?=URL?>login/logout">
			<i class="fa fa-sign-out" aria-hidden="true"></i>
			Log uit
		</a>
	</nav>

	<article>
		<h1>To Do List:</h1>

		<table>
			<tr>

 		<?php foreach ($tasks as $task) { ?>
			<td>
				<a id="task" href="<?=URL?>todo/edit/<?=$task['id']?>" >
					<?=$task['todo']?>
					<a id="delete" href="<?=URL?>todo/delete/<?=$task['id']?>">
						<i class="fa fa-check" id="check" aria-hidden="true"></i>
						|
						<i class="fa fa-trash" id="trash" aria-hidden="true"></i>
					</a>
				</a>
			</td>
		<?php } ?>
		
			</tr>
		</table>

	</article>

	<footer>
		
	</footer>
