
<?php
	include_once("header.php");
?>

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




<?php
	include_once("footer.php");
?>