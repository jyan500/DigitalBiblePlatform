<?php 
	// Code from StackOverflow, to prevent users from directly accessing this file via url 
	if(!isset($_SERVER['HTTP_REFERER'])){
	    // redirect them to your desired location
	    header('location: index.php');
	    exit;
	}
?>