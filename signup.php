<?php
	include_once("header.php");
?>

<!-- 	<div class = "w3-container w3-mobile w3-padding">
		<div class = "w3-container w3-teal">
			<h2> Signup </h2>
		</div>
		<form class = "w3-container">
			<section class = "w3-section">
				<label> Firstname </label>
				<input class = "w3-input w3-border"  type = "text" required name = "firstname"></input>
			</section>
		</form>
	</div> -->
<!-- Page content -->
<div class="w3-content w3-padding-large w3-margin-top" id="portfolio">
	<!-- Contact -->
	<div class="w3-light-grey w3-padding-large w3-padding-32 w3-margin-top" id="contact">
		<h3 class="w3-center">Signup</h3>
		<hr>
		<form action="/action_page.php" target="_blank">
		<div class="w3-section">
			<label>Username</label>
			<input class="w3-input w3-border" type="text" required name="username">
		</div>
		<div class="w3-section">
			<label>Password</label>
			<input class="w3-input w3-border" type="text" required name="password">
		</div>
		<div class="w3-section">
			<label>Email</label>
			<input class="w3-input w3-border" required name="email">
		</div>
		<button type="submit" class="w3-button w3-block w3-dark-grey">Send</button>
		</form><br>
		<p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank" class="w3-hover-text-green">w3.css</a></p>

	</div>
</div>


<?php
	include_once("footer.php");
?>