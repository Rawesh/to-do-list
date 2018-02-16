<link rel="stylesheet" href="<?= URL ?>css/style.css">
<script src="https://use.fontawesome.com/25eaac5d3c.js"></script>

	<nav>
		<a id="back" href="<?=URL?>list/index">
			<i class="fa fa-reply" aria-hidden="true"></i>
			Terug
		</a>
	</nav>

	<article>
		<?php if (isset($list['listName'])) { ?>
			
			<h2>Wijzig lijst naam</h2>
			<form action="<?=URL?>list/editSave" method="post">
				<input type="hidden" name="id" value="<?=$list['id']?>">
				<input type="text" name="listName" value="<?=$list['listName']?>">
				<input type="submit">
			</form>

		<?php }else { ?>

			<h2>Maak lijst aan</h2>
			<form action="<?=URL?>list/createSave" method="post">
				<input type="text" name="listName">
				<input type="submit">
			</form>

		<?php } ?>
	</article>

	<footer>
		
	</footer>
