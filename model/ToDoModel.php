<?php

 function getAllTasks()
 {
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM todolists";
	$query = $db->prepare($sql);
	$query->execute();

	return $query->fetchAll();

	$db = null;
}

function createTask()
{
	$db = openDatabaseConnection();

	//set post in task
	$task = isset($_POST['todo']) ? $_POST['todo'] : NULL;

	if (strlen($task) == 0)
	{
		return false;
	}
 
	$sql = "INSERT INTO todolists (todo) VALUES (:t)";
	$query = $db->prepare($sql);
	$query->execute(array(
		':t' => $task ));

	return true;

	$db = null;
}

function getTask($id) 
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM todolists WHERE id = :id";
	$query = $db->prepare($sql);
	$query->execute(array(
		':id' => $id));

	return $query->fetch();

	$db = null;

}

function editTask()
{
	$db = openDatabaseConnection();

	//set post in task
	$task = isset($_POST['todo']) ? $_POST['todo'] : NULL;
	$id = isset($_POST['id']) ? $_POST['id'] : NULL;

	if (strlen($task) == 0)
	{
		return false;
	}

	$sql = "UPDATE todolists SET `todo` = :t WHERE id = :id";

	$query = $db->prepare($sql);
	$query->execute(array(
		':t' => $task,
		':id' => $id));

	$db = null;
	
	return true;
}

function deleteTask($id)
{
	$db = openDatabaseConnection();

	$sql = "DELETE FROM todolists WHERE id=:id";
	
	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id));
	
	$db = null;
	
	return true;
}