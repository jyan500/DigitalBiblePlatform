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
	
	// DEFINE CONSTANTS
	$API_KEY = "3519f5a27b814b79ded7c05507de8cbd";
	$BOOK_DAM_ID = "ENGESV";
	$API_VERSION = 2;
	$service_url = "";

	// VALIDATION

	// Only can access the page through ajax request from index.php 
	if(!isAjax())
	{
	   header("HTTP/1.0 403 Forbidden");
	   exit;
	}

	// GET URL PARAMS AND DEFINE URL FOR API REQUEST

	$lcIsDropDown = $_REQUEST["idp"];

	if (isset($lcIsDropDown) ){
		$GET_BOOK_URL = "http://dbt.io/library/book";
		$service_url = "$GET_BOOK_URL?key=$API_KEY&dam_id=$BOOK_DAM_ID&v=$API_VERSION";
	}

	// API CALL (Code from http://www.techflirt.com/php/php-curl/curl-examples.html)
	$curl = curl_init($service_url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($curl);
	curl_close($curl);
	echo json_encode($result);

?>

<?php 
	function isAjax(){
		return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
	}?>