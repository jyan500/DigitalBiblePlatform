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

	// DEBUG INFO 	
	ini_set('display_errors', 'On');
	error_reporting(E_ALL | E_STRICT);

	// VALIDATION
	// Only can access the page through ajax request from index.php 
	if(!isAjax())
	{
	   header("HTTP/1.0 403 Forbidden");
	   exit;
	}

	// GET URL PARAMS AND DEFINE URL FOR API REQUEST
	// echo "Hello World";
	$lcIsDropDown = defineParam("idp");
	$lcBookId = defineParam("bid");
	$lcChapterId = defineParam("cid");
	// lcDamId is used to get the text for the specified book and chapter
	$lcDamId = defineParam("dam_id"); 


	$commonLibraryURL = "http://dbt.io/library/";
	$commonValidationParam = "key=$API_KEY&dam_id=$BOOK_DAM_ID&v=$API_VERSION";
	if ($lcIsDropDown != "" ){
		$GET_BOOK_URL = $commonLibraryURL . "book";
		$service_url = "$GET_BOOK_URL?" . $commonValidationParam;
	}
	elseif ($lcDamId != ""){
		$GET_TEXT_URL = "book_id=$lcBookId&chapter_id=$lcChapterId";
		$service_url =  "http://dbt.io/text/verse?key=$API_KEY&" . $GET_TEXT_URL . "&dam_id=$lcDamId" . "2ET" . "&v=$API_VERSION";
	}

	// API CALL (Code from http://www.techflirt.com/php/php-curl/curl-examples.html
	$curl = curl_init();
	

	// If curl session was successful
	if ($curl == true){
		curl_setopt($curl, CURLOPT_URL, $service_url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);
		echo $result;
	}
	else{
		echo "curl initialization failed";
	}
	
?>

<?php 
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