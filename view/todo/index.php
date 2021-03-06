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

		<a id="filterButton" href="<?=URL?>todo/taskSortEnd/<?=$list['id']?>/<?="end"?>/<?="ASC"?>">
			EindDatum (oplopend)
		</a>

		<a id="filterButton" href="<?=URL?>todo/taskSortEnd/<?=$list['id']?>/<?="end"?>/<?="DESC"?>">
			EindDatum (aflopend)
		</a>

		<a id="filterButton" href="<?=URL?>todo/getStatus/<?=$list['id']?>/<?='normaal'?>">
			status (Normaal)
		</a>

		<a id="filterButton" href="<?=URL?>todo/getStatus/<?=$list['id']?>/<?='spoed'?>">
			status (Spoed)
		</a>

		<table>
			<tr>

 		<?php foreach ($tasks as $task) { ?>
			<td id="td">
				<a id="task" href="<?=URL?>todo/edit/<?=$task['id']?>/<?=$list['id']?>" >
					<?=$task['todo']?> - Status: <?=$task['status']?>  
				</a>
				<a id="delete" href="<?=URL?>todo/delete/<?=$task['id']?>/<?=$list['id']?>">
						<i class="fa fa-check" id="check" aria-hidden="true"></i>
						|
						<i class="fa fa-trash" id="trash" aria-hidden="true"></i>
				</a>
			</td>
			<td id="date">Eind: <?=$task['end']?></td>
		<?php } ?>
		
			</tr>
		</table>
	</article>

	<footer>
		
	</footer>
