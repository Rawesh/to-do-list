<?php

function createAccount()
{
	$db = openDataBaseConnection();

	$firstname = isset($_POST['user_firstname']) ? $_POST['user_firstname'] : null;
	$lastname = isset($_POST['user_lastname']) ? $_POST['user_lastname'] : null;
	$email = isset($_POST['user_email']) ? $_POST['user_email'] : null;
	$password = isset($_POST['user_password']) ? $_POST['user_password'] : null;

	// check input
	if (strlen($firstname) == 0 || strlen($lastname) == 0 || strlen($email) == 0 || strlen($password) == 0) {
		return false;
	}

	// check of email exist
	$userMail = $db->prepare("SELECT user_email FROM users WHERE user_email = '$email'");
	$userMail->execute();

	$count = $userMail->rowCount();
	if ($count != 0)
	{
		$email_exist = "Uw opgegeven e-mailadres bestaat al, probeer een ander e-mailadres.";
		echo "<SCRIPT type='text/javascript'> alert('$email_exist'); </SCRIPT>";
	}
	else
	{
		// create user
		$sql = "INSERT INTO users (user_firstname, user_lastname, user_email, user_password) VALUES (:f, :l, :e, :p)";

		$query = $db->prepare($sql);
		$query->execute(array(
			":f" => $firstname,
			":l" => $lastname,
			":e" => $email,
			":p" => $password
			));
	}

	$db = null;

	return true;	
}

 function getAll()
 {
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM users";
	$query = $db->prepare($sql);
	$query->execute();

	return $query->fetchAll();

	$db = null;
}

 function logIn()
 {
	$db = openDatabaseConnection();

	$email = isset($_POST['user_email']) ? $_POST['user_email'] : null;
	$password = isset($_POST['user_password']) ? $_POST['user_password'] : null;

	// check input
	if (strlen($email) == 0 || strlen($password) == 0) {
		return false;
	}

	$sql = "SELECT * FROM users WHERE user_email = '$email' AND user_password = '$password'";

	$query = $db->query($sql);

	// returns an array indexed by column name as returned in your result set
	if (!$result = $query->fetch(PDO::FETCH_ASSOC)) 
	{
		$logIn_error = "Er is iets fout gegaan met het inloggen, controleer uw gegevens.";
		echo "<SCRIPT type='text/javascript'> alert('$logIn_error'); </SCRIPT>";
	}
	else
	{
		if (isset($_POST['login']))
		{
			$_SESSION['id'] = $result['id'];
			$_SESSION['user_firstname'] = $result['user_firstname'];
			$_SESSION['user_lastname'] = $result['user_lastname'];

			// $user_exist = "Welkom: " . $result['firstname'] . $result['lastname'];
			// echo "<SCRIPT type='text/javascript'> alert('$user_exist'); </SCRIPT>";
		}
	}

	return true;
	return $_SESSION;

	$db = null;
	
}

// function getPassword()
//  {
// 	$db = openDatabaseConnection();

// 	$email = isset($_POST['email']) ? $_POST['email'] : null;

// 	// check input
// 	if (strlen($email) == 0) {
// 		return false;
// 	}

// 	$db = openDatabaseConnection();

// 	$sql = "SELECT * FROM users WHERE email = '$email'";
// 	$query = $db->prepare($sql);
// 	$query->execute();

// 	return $query->fetchAll();

// 	return true;
// 	$db = null;
	
// }
