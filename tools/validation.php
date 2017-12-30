
<?php
// DOCUMENTATION:

function test_input($data){
	$data = defineParam($data);
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
// checks to see if the request made from the client is an ajax request
function isAjax(){
	return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

// if the url param is defined, return the value. Otherwise, return an empty string
function defineParam($value){
	if (!isset($_REQUEST["$value"])){
		return "";
	}
	return $_REQUEST["$value"];
}

?>