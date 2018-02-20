<link rel="stylesheet" href="<?= URL ?>css/style.css">
<script src="https://use.fontawesome.com/25eaac5d3c.js"></script>

	<nav>
		<a id="back" href="<?=URL?>list/getTasksByList/<?=$list['id']?>">
			<i class="fa fa-reply" aria-hidden="true"></i>
			Terug
		</a>
	</nav>

	<article>
		<?php if (isset($task['todo'])) { ?>
			
			<h2>Wijzig taak</h2>
			<form action="<?=URL?>todo/editSave/<?=$list['id']?>" method="post">
				<input type="hidden" name="id" value="<?=$task['id']?>">
				<label>Naam taak</label>
				<input type="text" name="todo" value="<?=$task['todo']?>">

				<label>Wijzig startdatum</label>
				<input type="date" name="start_date" value="<?=$task['start_date']?>">

				<label>Wijzig einddatum</label>
				<input type="date" name="end_date" value="<?=$task['end_date']?>">
				<input type="submit">
			</form>

		<?php }else { ?>

			<h2>Maak taak aan</h2>
			<form action="<?=URL?>todo/createSave/<?=$list['id']?>" method="post">
				<label>Taak</label>
				<input type="text" name="todo">
				<label>Start datum</label>
				<input type="date" name="start_date"">
				<label>Eind datum</label>
				<input type="date" name="end_date"">
				<input type="submit">
			</form>


		<?php } ?>
	</article>

	<footer>
		
	</footer>
