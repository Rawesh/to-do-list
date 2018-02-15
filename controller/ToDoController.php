<?php
session_start();

require(ROOT . "model/ToDoModel.php");

function index()
{
	render("todo/index", array("tasks" => getAllTasks()));
}

//create template
function create()
{
	render("todo/createOrEdit");
}

// create task
function createSave()
{
	if (!createTask())
	{
		render("error/index");
		exit();
	}

	echo "<script type='text/javascript'>alert('Taak is aangemaakt.');</script>";
	render("todo/createOrEdit");
}

function edit($id)
{
	render("todo/createOrEdit", array("task" => getTask($id)));
}

function editSave()
{

	if (editTask() == true) {
		header("location:". URL . "todo/index");
		exit();
	}

		header("location:". URL . "error/index");

}

function delete($id)
{
	if (deleteTask($id) == true) {
		header("location:". URL . "todo/index");
		exit();
	}

		header("location:". URL . "error/index");
}

