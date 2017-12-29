<?php
// connect to database
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "dbt_db";
try{
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	// set PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "Connected Successfully";
}
catch (PDOException $e){
	echo "Connection failed: " . $e->getMessage();
}

?>