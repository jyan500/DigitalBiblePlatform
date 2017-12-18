
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<title>Welcome</title>
		<link rel="stylesheet" href="css/w3.css">

		<link rel="shortcut icon" href="#" />

		<!-- Import JQuery -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<!-- import BibleProject.js -->
		<script src = "index.js"></script>

	</head>

	<body>
		<!-- Side Bar -->
		<div id = "sidebar" class = "w3-sidebar w3-bar-block w3-animate-left" style = "display:none;z-index:5">

			<!-- close button -->
			<button id = "closesidebar" class = "w3-bar-item w3-black w3-button w3-large" onclick = "closeSideBarNav()">
				Close &times;
			</button>
			<a class = "tablink w3-bar-item w3-button w3-animate-opacity" onclick = "openTab(event, 'hometab')">Home</a>
			<a class = "tablink w3-bar-item w3-button w3-animate-opacity" onclick = "openTab(event, 'memorizetab')">Memorize</a>
			<a class = "tablink w3-bar-item w3-button w3-animate-opacity" onclick = "openTab(event, 'abouttab')">About</a>
		</div>	

		<!-- Overlay Effect -->
		<div id = "overlay" class = "w3-overlay w3-animate-opacity" style = "cursor:pointer" onclick = "closeSideBarNav()">
		</div>

		<!--- header -->
		<div class = "w3-container w3-teal w3-mobile">
			<h1> Welcome to the Digital Bible Platform App </h1>
			<!-- open hamburger button -->
			<button id = "opensidebar" class = "w3-button w3-teal w3-xxlarge" onclick = "openSideBarNav()">&#9776;</button>
		</div>

		<!--- homepage -->
		<div id = "hometab" class = "content w3-container">
			<!-- Form GET request using AJAX, action is jquery event -->
			<div class = "w3-container w3-padding w3-card-4 w3-mobile w3-border w3-margin-top" style="height:300px">
				<form id = "choosebible" class = "w3-center" action = "" > 
					<h2>Select a Book of the Bible</h2>
					<select id = "bookdatalist" class="w3-select w3-padding w3-mobile" name="option"> 
						<option value="" disabled selected>Choose your option</option>
					</select>	
					<!-- <p><button class="w3-button w3-teal w3-mobile">Go</button></p> -->
				</form>
				<form id = "choosechapter" class = "w3-center" action = "" style="display:none">
					<h2>Select a Chapter</h2>
					<select id = "chapterdatalist" class = "w3-select w3-padding w3-mobile" name = "option">
						<option value = "" disabled selected>Choose your option</option>
					</select>
					<p><button class = "w3-button w3-teal w3-mobile">Go</button></p>
				</form>
				<form id = "chooseverse" class = "w3-center" action = "" style="display:none">
					<h2>Select a Verse</h2>
					<select id = "versedatalist" class = "w3-select w3-padding w3-mobile" name = "option">
						<option value = "" disabled selected>Choose your option</option>
					</select>
					<p><button class = "w3-button w3-teal w3-mobile">Go</button></p>
				</form>
			</div>
			<div id = "textcontent" class = "w3-container w3-margin-top"  style = "display:none">
				<div id = "buttonbar" class = "w3-bar w3-round w3-border w3-padding">
					<a id = "prevbutton" class = "w3-button">&#10094; Previous Chapter</a>
					<a id = "nextbutton" class = "w3-button w3-right">Next Chapter &#10095;</a> 
				</div>
				<div id = "openrichtext" class = "w3-container">
					<a id = "richtextbutton" class = "w3-button"> Take Notes </a>
				</div>		

				<!--- add the text from the ajax request into a paragraph element -->
				<div id = "txtblock" class = "w3-container w3-center w3-mobile" style="width:100%">
					<h2 id = "textheader"></h2>
					<p id = "bibletxt" style = "line-height:30px"></p>
				</div>
			</div>
		</div>

		<!-- Memorize Page (In Progress) -->
		<div id = "memorizetab" class = "content w3-container" style = "display:none">
			<div class = "w3-panel w3-teal">
				<h1> Memorize Page is in Progress... </h1>
			</div>
		</div>

		<!-- About Page  (Copyright here) -->
		<div id = "abouttab" class = "content w3-container" style = "display:none">
			<div class = "w3-panel w3-teal">
				<h1> Copyright: Fair Use of the Digital Bible Platform API (DBT.io) </h1>
			</div>	
		</div>
		
		
		
	</body>
</html>


