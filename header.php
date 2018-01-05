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
		<script src = "header.js"></script>

	</head>

	<body>
		<header>
			<!-- Side Bar -->
			<div id = "sidebar" class = "w3-sidebar w3-bar-block w3-animate-left" style = "display:none;z-index:5">

				<!-- close button -->
				<button id = "closesidebar" class = "w3-bar-item w3-black w3-button w3-large" onclick = "closeSideBarNav()">
					Close &times;
				</button>
				<a class = "tablink w3-bar-item w3-button w3-animate-opacity" href = "index.php">Home</a>
				<a class = "tablink w3-bar-item w3-button w3-animate-opacity" href = "memorize.php">Memorize</a>
				<a class = "tablink w3-bar-item w3-button w3-animate-opacity" href = "about.php">About</a>
				<a id = "openmodal" class = "w3-bar-item w3-button w3-animate-opacity">Login</a>

				<!-- As of 1/4/18, will not use "display:block" style with js, and instead redirect to other links -->
				<!-- onclick = "openTab(event, 'hometab') -->
				<!-- onclick = "openTab(event, 'memorizetab') -->
				<!-- onclick = "openTab(event, 'abouttab') -->
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
	
		</header>
