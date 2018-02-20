<link rel="stylesheet" href="<?= URL ?>css/style.css">
<script src="https://use.fontawesome.com/25eaac5d3c.js"></script>



	<nav>
		<a id="back"  href="<?=URL?>list/index">
			<i class="fa fa-reply" aria-hidden="true"></i>
			Lijsten overzicht
		</a>

		<a  href="<?=URL?>todo/create/<?=$list['id']?>">
			<i class="fa fa-plus" aria-hidden="true"></i>
			Nieuw
		</a>

		<a id="logout" href="<?=URL?>login/logout">
			<i class="fa fa-sign-out" aria-hidden="true"></i>
			Log uit
		</a>
	</nav>

	<article>
		<h1>To Do List: <?=$list['listName']?></h1>

		<a id="filterButton" href="<?=URL?>todo/taskSort/<?=$list['id']?>/<?="ASC"?>">
			Datum (oplopend)
		</a>

		<a id="filterButton" href="<?=URL?>todo/taskSort/<?=$list['id']?>/<?="DESC"?>">
			Datum (aflopend)
		</a>

		<table>
			<tr>

 		<?php foreach ($tasks as $task) { ?>
			<td>
				<a id="task" href="<?=URL?>todo/edit/<?=$task['id']?>/<?=$list['id']?>" >
					<?=$task['todo']?>:  
					<a id="delete" href="<?=URL?>todo/delete/<?=$task['id']?>/<?=$list['id']?>">
						<i class="fa fa-check" id="check" aria-hidden="true"></i>
						|
						<i class="fa fa-trash" id="trash" aria-hidden="true"></i>
					</a>
				</a>
			</td>
			<td id="date">Start: <?=$task['start']?> | Eind: <?=$task['end']?></td>
		<?php } ?>
		
			</tr>
		</table>
	</article>

	<footer>
		
	</footer>
