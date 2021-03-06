<?php

 function getAllTasks($id)
 {
	$db = openDatabaseConnection();

	$sql = 
		"SELECT *, DATE_FORMAT(start_date, '%d-%m-%Y') as 'start' ,DATE_FORMAT(end_date, '%d-%m-%Y') as 'end'
		 FROM todolists
		 WHERE lists_id = :lid 
		 ORDER BY 'end'";

	$query = $db->prepare($sql);
	$query->execute(array(
			':lid' => $id));

	return $query->fetchAll();

	$db = null;
}

function getAllTasksByStatus($id, $status)
{
	$db = openDatabaseConnection();

	$sql = 
		"SELECT *, DATE_FORMAT(start_date, '%d-%m-%Y') as 'start' ,DATE_FORMAT(end_date, '%d-%m-%Y') as 'end'
		 FROM todolists
		 WHERE lists_id = :lid AND status = :status 
		 ORDER BY 'todo'";

	$query = $db->prepare($sql);
	$query->execute(array(
			':status' => $status,
			':lid' => $id));

	return $query->fetchAll();

	$db = null;

}

 function sortTask($id, $columm, $sort)
 {
	$db = openDatabaseConnection();

	$sql = 
		"SELECT *, DATE_FORMAT(start_date, '%d-%m-%Y') as 'start' ,DATE_FORMAT(end_date, '%d-%m-%Y') as 'end'
		 FROM todolists
		 WHERE lists_id = :lid 
		 ORDER BY $columm $sort";

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
	$status = isset($_POST['status']) ? $_POST['status'] : NULL;

	$end_date = isset($_POST['end_date']) ? $_POST['end_date'] : NULL;
	$start_date = isset($_POST['start_date']) ? $_POST['start_date'] : NULL;


	if (strlen($task) == 0 || strlen($end_date) == 0 || strlen($start_date) == 0 || strlen($status) == 0)
	{
		return false;
	}
 
	$sql = "INSERT INTO todolists (todo, start_date, end_date, status, lists_id)
			VALUES (:t, :start_date, :end_date, :status, :lid)";
	$query = $db->prepare($sql);
	$query->execute(array(
		':t' => $task,
		':start_date' => $start_date,
		':end_date' => $end_date,
		':status' => $status,
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
	$status = isset($_POST['status']) ? $_POST['status'] : NULL;
	$end_date = isset($_POST['end_date']) ? $_POST['end_date'] : NULL;
	$start_date = isset($_POST['start_date']) ? $_POST['start_date'] : NULL;
	$id = isset($_POST['id']) ? $_POST['id'] : NULL;

	$sql = "UPDATE todolists 
			SET `todo` = :t, `status` = :s, `end_date` = :end_date, `start_date` = :start_date
			 WHERE id = :id AND lists_id = :lid";

	$query = $db->prepare($sql);
	$query->execute(array(
		':t' => $task,
		':s' => $status,
		':start_date' => $start_date,
		':end_date' => $end_date,
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