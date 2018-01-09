<?php
	// code based on mtuts coding sample
	include_once("validation.php");
	include_once("database.php");
	// if user clicked the submit button
	$errorVar = "default";
	if (isset($_POST['submit'])){
		$user = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		// Check for empty fields
		if (empty($user) || empty($password) || empty($email)){
			$errorVar = "empty"
		}
		// check for valid user name
		else if (!isValidUser($user)){
			$errorVar = "user";
		}
		// check for valid email
		else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$errorVar = "email";
		}	
	}
	else{
		header("Location: signup.php?signup=$errorVar");
		exit();
	}

	// validate for valid password ... 
	// possible email validation ... 
	// insert code here: 

	$hashPassword = password_hash($password, PASSWORD_DEFAULT);

	// check if username already exists in the database  
	$conn = connDatabase();
	$date = date("Y-m-d H:i:s");
	$stmt = $conn->prepare("INSERT INTO user(username, password, email, date_created) 
								values (:username, :password, :email, :date_created)";
	
	// bind params 
	$stmt->bindParam(':username', $user);
	$stmt->bindParam(':password', $password);
	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':date_created', $date);

	// insert new user into the database
	$stmt->execute();	

	// close connection
	$conn = null;

	// hash the password
	function isValidUser($user){
		// check if username has valid characters
		if (preg_match("/^[a-zA-Z0-9]*$/")){

			// check if username already exists in the database  
			$conn = connDatabase();
			$stmt = $conn->prepare("SELECT username from user where username = :username");

			// bind params 
			$stmt->bindParam(':username', $user);
			$stmt->execute();	
			$numResults = $stmt->rowCount();

			// close connection
			$conn = null;
			if $(numResults == 0){
				return true;
			}
		}	
		return false;
	}
?>