<?php
// include headers
include "sql_files/database.php";
include "tools/validation.php";

// Functions from other files:
// connDatabase: connection object in database.php
// test_input: sanitize form input, in validation.php
// isAjax(): test if the request is an ajax request

// for "test user" 
// prepared statements

$text = "";
echo "testing<br>";
// VALIDATION
// Only can access the page through ajax request from index.php 
if(!isAjax())
{
   header("HTTP/1.0 403 Forbidden");
   exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){

	echo "testing post<br>";

	// establish the variables for the prepared statement
	$text = test_input($_POST["txt"]);
	$date = date("Y-m-d H:i:s");
	$curr_chapter_id = $_POST["cid"];
	$curr_book_id = $_POST["bid"];

	// hardcode the user_id to the test user "2" for now
	$user_id = 2;

	echo $text;

	echo "curr_chapter_id" . $curr_chapter_id . "curr_book_id" . $curr_book_id;

	// establish connection with the database
	try{

		$conn = connDatabase();

		// create prepared statement to insert text content
		$stmt = $conn->prepare( "INSERT INTO text_content (content , user_id, date_created,
			chapter_name, book_name) 
				values (:content ,:user_id ,:date_created ,:chapter_name, :book_name)");
		// bind params
		$stmt->bindParam(':content', $text);
		$stmt->bindParam(':user_id', $user_id);
		$stmt->bindParam(':date_created', $date);
		$stmt->bindParam(':chapter_name', $curr_chapter_id);
		$stmt->bindParam(':book_name', $curr_book_id);
		$stmt->execute();

		echo "Inserted Successfully";

	}
	catch (PDOException $e){
		echo "Error:" . $e->getMessage();
	}
	
	

}
?>