<?php
session_start();

require(ROOT . "model/LogInModel.php");
require(ROOT . "model/ListModel.php");

function index()
{
	render("login/index", array("users" => getAll()));
}

// create an user
function create()
{
	if (!createAccount()) 
	{
		header("location:" . URL . "error/index");
		exit();
	}

	$created = "Gebruiker is aangemaakt.";
	echo "<SCRIPT type='text/javascript'> alert('$created'); </SCRIPT>";
	render("login/index");
}

// logs user in
function acces()
{
	if (!LogIn()) 
	{
		header("location:" . URL . "error/index");
		exit();
	}
	render("list/index", array("lists" => getAllLists(),
								"users" => getAll()
								));
}

// // gets user password
// function userPassword()
// {
// 	render("login/password");
// }

// // get user password
// function getUserPassword()
// {
// 	if (!(getPassword())) 
// 	{
// 		header("location:" . URL . "error/index");
// 		exit();
// 	}
// 	render("login/password", array("user_datas" => getPassword()));
// }

// logs user out
function logOut()
{	
	unset($_SESSION['id']);
	unset ($_SESSION['user_firstname']);
	unset ($_SESSION['user_lastname']);
	session_destroy();
	render("login/index");
} 


