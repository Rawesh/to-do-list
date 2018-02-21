<?php
session_start();

require(ROOT . "model/ToDoModel.php");
require(ROOT . "model/loginModel.php");
require(ROOT . "model/ListModel.php");

function taskSortEnd($id, $column, $sort)
{
	render("todo/index", array("tasks" => sortTask($id, $column, $sort),
								"list" => getList($id)
								));
}

//create template
function create($id)
{
	render("todo/createOrEdit", array("list" => getList($id)));
}

// create task
function createSave($id)
{
	if (!createTask($id))
	{
		echo "<script type='text/javascript'>alert('Alle velden moeten ingevuld zijn.');</script>";	
		render("todo/createOrEdit", array("list" => getList($id)));	
		exit();
	}

	echo "<script type='text/javascript'>alert('Taak is aangemaakt.');</script>";
	render("todo/createOrEdit", array("list" => getList($id)));
}

function edit($id, $listId)
{
	render("todo/createOrEdit", array("task" => getTask($id),
									"list" => getList($listId)));
}

function editSave($list_id)
{
	if (editTask($list_id) == true) {
		 	
		header("location:". URL . "list/getTasksByList/". $list_id);
		exit();
	}
	
	echo "<script type='text/javascript'>alert('Alle velden moeten ingevuld zijn.');</script>";	
	render("todo/createOrEdit", array("list" => getList($id)));
}

function delete($id, $list_id)
{
	if (deleteTask($id) == true) {
		header("location:". URL . "list/getTasksByList/". $list_id);
		exit();
	}

		header("location:". URL . "error/index");
}

function getStatus($id, $status)
{
	render("todo/index", array("tasks" => getAllTasksByStatus($id, $status),
								"list" => getList($id)));
}

