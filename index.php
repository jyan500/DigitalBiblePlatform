<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<title>Welcome</title>
		<link rel="stylesheet" href="css/w3.css">
		<link rel ="stylesheet" href="css/snackbar.css">
	
		<!-- font awesome icons -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
			<a id = "openmodal" class = "w3-bar-item w3-button w3-animate-opacity">Login</a>
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
				<!-- <div id = "openrichtext" class = "w3-container">
					<a id = "richtextbutton" class = "w3-button"> Take Notes </a>
				</div> -->		

				<!--- add the text from the ajax request into a paragraph element -->
				<div class = "w3-container w3-margin-top">
					<div id = "txtblock" class = "w3-container  w3-mobile">
						<h2 class="w3-center"id = "textheader"></h2>
						<p id = "bibletxt" style = "line-height:30px"></p>
					</div>
					<form method = "post" action = "" id = "usertxt">
						<div class = "w3-container w3-mobile ">
							<h2 class="w3-center">Notes</h2>
							<textarea form = "usertxt" name = "textbox" id = "txtarea" class = "w3-padding" style="width:100%" placeholder="Type Here!"></textarea>
							<!-- use ajax instead to insert into the database -->
							<!-- <input id = "hinputchapter" type="hidden" name="chapter_id" value=""> 
							<input id = "hinputbook" type ="hidden" name="book_id" value=""> -->
							<p><input type ="submit" class = "w3-button w3-teal w3-mobile"></button></p>
						</div>

					</form>
				</div>
			</div>
		</div>
		

		<!-- alert bars -->
		<div id = "errorbar" class = "snackbar" style="background-color: Red">
			You must enter text before submit. 
			<span> <i class = "fa fa-close" aria-hidden="true"></i></span>
		</div>
		<!-- snack bar will display when submit button is successful -->
		<div id = "successbar" class = "snackbar" style="background-color: MediumSeaGreen" >
			Submission was successful!
			<span> <i class = "fa fa-check" aria-hidden="true"></i></span>
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

		<!--- Login modal -->
		<div id = "modal" class = "w3-modal">
			<div class = "w3-modal-content w3-animate-zoom">
				<header class = "w3-container w3-teal"> 
					<h2>Please Login</h2> 
					<span id = "closemodal" class = "w3-button w3-large w3-display-topright"> &times;</span>
				</header>
				<form class = "w3-container" action = "#" method = "post">
					<p>
						<label class = "w3-text-blue"><b>Username</b></label>
						<input class = "w3-input w3-border" type = "text" name = "username" required>
					</p>
					<p>
						<label class = "w3-text-blue"><b>Password</b></label>
						<input class = "w3-input w3-border" type = "password" name = "password" required>
					</p>
					<p>
						<button class = "w3-button w3-large w3-blue">Go</button>
					</p>
				</form>
				<footer class = "w3-container w3-teal">
					<h3>Thank you</h3>
				</footer>
			</div>
		</div> 

	</body>
</html>

