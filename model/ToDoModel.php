<?php

 function getAllTasks()
 {
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM todolists WHERE users_id = :uid";
	$query = $db->prepare($sql);
	$query->execute(array(
			'uid' => $_SESSION['id']));

	return $query->fetchAll();

	$db = null;
}

function createTask()
{
	$db = openDatabaseConnection();

	//set post in task
	$task = isset($_POST['todo']) ? $_POST['todo'] : NULL;
	$user_id = isset($_SESSION['id']) ? $_SESSION['id'] : NULL;

	if (strlen($task) == 0)
	{
		return false;
	}
 
	$sql = "INSERT INTO todolists (todo, users_id) VALUES (:t, :uid)";
	$query = $db->prepare($sql);
	$query->execute(array(
		':t' => $task,
		':uid' => $user_id
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