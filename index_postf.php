<?php
// include headers
include "sql_files/database.php";
include "tools/form_validation.php";
// Variables from other files:
// conn: connection object in database.php

// Functions from other files:
// test_input: sanitize form input, in form_validation.php

// for "test user" 
// prepared statements
$text = "";
echo "testing<br>";
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	echo "testing post<br>";
	$text = test_input($_POST["textbox"]);
	echo $text;

	$sql = $conn->prepare( "INSERT INTO text_content (content, user_id, date_created,
		chapter_name, book_name) 
			values (? ? ? ? ?)")
}
?>