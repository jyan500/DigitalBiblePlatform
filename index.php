<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<title>Welcome</title>
		<link rel="stylesheet" href="css/w3.css">

		<!-- Import JQuery -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	</head>
	
	<!-- Page Content -->
	<body>
		<div class = "w3-panel w3-teal w3-round w3-mobile">
			<p> Welcome to the Digital Bible Platform App </p>
		</div>
		
		<!-- Form -->
		<!-- Form GET request using AJAX, action is jquery event -->
		<form id = "chooseBible" class = "w3-card-4 w3-container w3-mobile" action = ""> 
			<h1>Select a Book of the Bible</h1>
			<select id = "testDatalist" class="w3-select w3-center w3-padding w3-mobile" name="option"> 
				<option value="" disabled selected>Choose your option</option>
			</select>	
			<p><button class="w3-button w3-teal w3-mobile">Go</button></p>
		</form>
		
	</body>
</html>
