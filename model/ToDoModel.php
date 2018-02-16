<?php

 function getAllTasks($id)
 {
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM todolists WHERE lists_id = :lid";
	$query = $db->prepare($sql);
	$query->execute(array(
			':lid' => $id));

	return $query->fetchAll();

	$db = null;
}

function createTask($id)
{
	$db = openDatabaseConnection();

	//set post in task
	$task = isset($_POST['todo']) ? $_POST['todo'] : NULL;

	if (strlen($task) == 0)
	{
		return false;
	}
 
	$sql = "INSERT INTO todolists (todo, lists_id) VALUES (:t, :lid)";
	$query = $db->prepare($sql);
	$query->execute(array(
		':t' => $task,
		':lid' => $id
		));

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

function editTask($list_id)
{
	$db = openDatabaseConnection();

	//set post in task
	$task = isset($_POST['todo']) ? $_POST['todo'] : NULL;
	$id = isset($_POST['id']) ? $_POST['id'] : NULL;

	if (strlen($task) == 0)
	{
		return false;
	}

	$sql = "UPDATE todolists SET `todo` = :t WHERE id = :id AND lists_id = :lid";

	$query = $db->prepare($sql);
	$query->execute(array(
		':t' => $task,
		':id' => $id,
		':lid' => $list_id));

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