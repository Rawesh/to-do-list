<?php
session_start();

require(ROOT . "model/ToDoModel.php");
require(ROOT . "model/loginModel.php");
require(ROOT . "model/ListModel.php");

function index()
{
	render("list/index", array("lists" => getAllLists(),
								"users" => getAll()));
}

function getTasksByList($id)
{
	render("todo/index", array("tasks" => getAllTasks($id),
								"list" => getList($id)));
}

//create template
function create()
{
	render("list/createOrEdit");
}

// create task
function createSave()
{
	if (!createList())
	{
		render("error/setSaveError");
		exit();
	}

	echo "<script type='text/javascript'>alert('Lijst is aangemaakt.');</script>";
	render("list/createOrEdit");
}

function edit($id)
{
	render("list/createOrEdit", array("list" => getList($id)));
}

function editSave()
{

	if (editList() == true) {
		header("location:". URL . "list/index");
		exit();
	}

		header("location:". URL . "error/setSaveError");

}

function delete($id)
{
	if (deleteList($id) == true) {
		header("location:". URL . "list/index");
		exit();
	}

		header("location:". URL . "error/setSaveError");
}

