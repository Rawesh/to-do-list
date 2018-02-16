<?php

 function getAllLists()
 {
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM lists WHERE users_id = :uid";
	$query = $db->prepare($sql);
	$query->execute(array(
			'uid' => $_SESSION['id']));

	return $query->fetchAll();

	$db = null;
}

function createList()
{
	$db = openDatabaseConnection();

	//set post in task
	$list = isset($_POST['listName']) ? $_POST['listName'] : NULL;
	$user_id = isset($_SESSION['id']) ? $_SESSION['id'] : NULL;

	if (strlen($list) == 0)
	{
		return false;
	}
 
	$sql = "INSERT INTO lists (listName, users_id) VALUES (:l, :uid)";
	$query = $db->prepare($sql);
	$query->execute(array(
		':l' => $list,
		':uid' => $user_id
		));

	return true;

	$db = null;
}

function getList($id) 
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM lists WHERE id = :id";
	$query = $db->prepare($sql);
	$query->execute(array(
		':id' => $id));

	return $query->fetch();

	$db = null;

}

function editList()
{
	$db = openDatabaseConnection();

	//set post in list
	$list = isset($_POST['listName']) ? $_POST['listName'] : NULL;
	$id = isset($_POST['id']) ? $_POST['id'] : NULL;

	if (strlen($list) == 0)
	{
		return false;
	}

	$sql = "UPDATE lists SET `listName` = :l WHERE id = :id";

	$query = $db->prepare($sql);
	$query->execute(array(
		':l' => $list,
		':id' => $id));

	$db = null;
	
	return true;
}

function deleteList($id)
{
	$db = openDatabaseConnection();

	$sql = "DELETE FROM lists WHERE id=:id";
	
	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id));
	
	$db = null;
	
	return true;
}