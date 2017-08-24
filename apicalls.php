<?php 
	// DOCUMENTATION: 
	// ------------------------------------------------------------------------------
	// Created: JY 2017-08-24
	// ------------------------------------------------------------------------------
	// Purpose of file: API calls to DigitalBiblePlatform to populate dropdowns, etc. based on hidden input field 
	// ------------------------------------------------------------------------------
	// URL Params:
	// 		idp = true/false (true/false to determine if populating drop down data)
	//				
	//		
	// ------------------------------------------------------------------------------



	// Only can access the page through ajax request from index.php 
	if(!$_SERVER['HTTP_X_REQUESTED_WITH'])
	{
	   header("HTTP/1.0 403 Forbidden");
	   exit;
	}
	
?>