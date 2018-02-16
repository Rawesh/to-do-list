<link rel="stylesheet" href="<?= URL ?>css/style.css">
<script src="https://use.fontawesome.com/25eaac5d3c.js"></script>

	<nav>
		<a  href="<?=URL?>list/create">
			<i class="fa fa-plus" aria-hidden="true"></i>
			Nieuw
		</a>

		<b>Welkom: <?=$_SESSION['user_firstname']?> <?=$_SESSION['user_lastname']?></b>

		<a id="logout" href="<?=URL?>login/logout">
			<i class="fa fa-sign-out" aria-hidden="true"></i>
			Log uit
		</a>
	</nav>

	<article>
		<h1>Lijsten:</h1>

		<table>
			<tr>

 		<?php foreach ($lists as $list) { ?>
			<td>
				<a id="list" href="<?=URL?>list/edit/<?=$list['id']?>" >
					<?=$list['listName']?>
					<a id="delete" href="<?=URL?>list/delete/<?=$list['id']?>">
						<i class="fa fa-trash" id="trash" aria-hidden="true"></i>
					</a>
				</a>
			</td>
			<td>
				Bekijk lijst
				<a id="getIn" href="<?=URL?>list/getTasksByList/<?=$list['id']?>">
					<i id="runList" class="fa fa-sign-in" id="trash" aria-hidden="true"></i>
				</a>
			</td>
		<?php } ?>
		
			</tr>
		</table>
	</article>

	<footer>
		
	</footer>
