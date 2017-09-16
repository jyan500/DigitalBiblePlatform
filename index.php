<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<title>Welcome</title>
		<link rel="stylesheet" href="css/w3.css">

		<!-- Import JQuery -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	</head>

	<body>

		<!-- Side Bar -->
		<div id = "sidebar" class = "w3-sidebar w3-bar-block w3-animate-left" style = "display:none;z-index:5">

			<!-- close button -->
			<button id = "closesidebar" class = "w3-bar-item w3-button w3-large" onclick = "closeSideBarNav()">
				Close &times;
			</button>
			<a href = "#" class = "w3-bar-item w3-button">test</a>
			<a href = "#" class = "w3-bar-item w3-button">test</a>
			<a href = "#" class = "w3-bar-item w3-button">test</a>
		</div>	

		<!-- Overlay Effect -->
		<div id = "overlay" class = "w3-overlay w3-animate-opacity" style = "cursor:pointer" onclick = "closeSideBarNav()">
		</div>

		<!-- Page content -->
		<div class = "w3-container">
			<div class = "w3-panel w3-teal w3-round w3-mobile">
				<h1> Welcome to the Digital Bible Platform App </h1>
				<!-- open hamburger button -->
				<button id = "opensidebar" class = "w3-button w3-teal w3-xxlarge" onclick = "openSideBarNav()">&#9776;</button>
			</div>
			<!-- Form -->
			<!-- Form GET request using AJAX, action is jquery event -->
			<div class = "w3-container w3-padding w3-card-4 w3-mobile w3-border w3-margin" style="height:300px">
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
			<div id = "buttonbar" class = "w3-bar w3-round w3-border w3-padding" style = "display:none">
				<a id = "prevbutton" class = "w3-button">&#10094; Previous Chapter</a>
				<a id = "nextbutton" class = "w3-button w3-right">Next Chapter &#10095;</a> 
			</div>
			<!--- add the text from the ajax request into a paragraph element, still need to add the verse numbers -->
			<div id = "txtblock" class = "w3-container w3-center w3-mobile" style = "display:none">
				<h2 id = "textheader"></h2>
				<p id = "bibletxt"  style = "line-height:30px"></p>
			</div>
		</div>
		
		
		
	</body>
</html>

<script>

	// Maps the book_id to the number of chapters
	var chapterBookMap = {};

	// Maps the book_id to the dam_id for that specific book
	var damIDBookMap = {};

	// USE the same book_id when receiving verses below
	var curr_book_id = "";

	// current chapter_id
	var curr_chapter_id = 0;

	// current dam_id
	var curr_dam_id = "";

	// current number of chapters for a given book
	var numChapters = 0;

	$(document).ready(function(){
		$.ajax({
			url: "apicalls.php",
			data:  {
				idp: "true"
			},
			type: "GET",
			dataType: "json",
		})
		.done(function(json){
			// console.log(json);
			if (json){
				// iterate through the json array 
				for (var i= 0; i < json.length; i++){

					var book = json[i].book_name;
					var book_id = json[i].book_id;
					var numChapters = json[i].number_of_chapters;
					var dam_id = json[i].dam_id;

					// set id as book_id for each option 
					var newOptionNode = $("<option>").text(book);
					newOptionNode.attr("id", book_id);
					$("#bookdatalist").append(newOptionNode);

					// map the book_id to number of chapters as well as the dam_id
					chapterBookMap[book_id] = numChapters;
					damIDBookMap[book_id] = dam_id;
				}
			}
		})
		.fail(function(xhr, status, errorThrown){
			alert("There was a problem in the request");
			console.log("Error: " + errorThrown);
			console.log("Status: " + status);
			console.dir(xhr);
		})
		.always(function(xhr){
			// alert("The request is complete");
		})
	});


	//Populate the dropdown so user can select the chapter for the chosen book
	$("#bookdatalist").change(function(){
		curr_book_id = $("#bookdatalist").find("option:selected").attr("id");	
		if (curr_book_id != ""){

			// If there is already an item selected in the datalist
			if ($("#chapterdatalist").find("option:selected").text != "Choose your option"){
				// delete all previous option nodes for the chapter
				$("#chapterdatalist").empty();

				
			}
				
			// populate the drop down for chapters
			numChapters = chapterBookMap[curr_book_id];
			for (var i = 0; i < numChapters; i++){
				// Append the numbers 1 to numChapters 
				var newOptionNode = $("<option>").text(i+1);	
				newOptionNode.attr("id", i + 1);
				$("#chapterdatalist").append(newOptionNode);	

			}
			
		}
		// show the form for the chapters
		$("#choosechapter").show();
	})



	$("#choosechapter").on("submit", function(e){
		curr_chapter_id = $("#chapterdatalist").find("option:selected").attr("id");
		curr_dam_id = damIDBookMap[curr_book_id];
		getVerses(e, curr_chapter_id, curr_dam_id);
		alert("curr_chapter_id: " + curr_chapter_id);
	})


	$("#prevbutton").on("click", function(e){
		if (curr_chapter_id != 1){
			curr_chapter_id = parseInt(curr_chapter_id) - 1;
			//alert("curr_chapter_id: " + curr_chapter_id);
		}
		getVerses(e, curr_chapter_id, curr_dam_id);
	})

	$("#nextbutton").on("click", function(e){
		if (curr_chapter_id < numChapters){

			//alert("before addition: " + curr_chapter_id);
			// you need to parse int because the + operator in javascript is overloaded
			// for both string and integer concatenation (converts to string)
			// i.e 1 + '1' = '11' (does string concatenation)

			curr_chapter_id = parseInt(curr_chapter_id) + 1;
			//alert("curr_chapter_id: " + curr_chapter_id);
		}
		getVerses(e, curr_chapter_id, curr_dam_id);

	})

	// open the sidebar and overlay
	function openSideBarNav(){
		$("#sidebar").show();
		$("#overlay").show();
	}

	// close the sidebar and overlay
	function closeSideBarNav(){
		$("#sidebar").hide();
		$("#overlay").hide();
	}


	// gets the verses given the chapter, to be used as a callback for js event
	function getVerses(e, chapter_id, dam_id){

		//alert("debugging ajax, bid: " + curr_book_id + " cid: " + curr_chapter_id + " dam_id: " + curr_dam_id);
		e.preventDefault(); // prevent the actual form from submitting and reloading the page
		$.ajax({
				url: "apicalls.php",
				data: {
					bid: curr_book_id, // curr_book_id is global in the <script> scope
					cid: chapter_id,
					dam_id: dam_id
				},
				type: "GET",
				dataType: "json"
			})	
			.done(function(json){
				//alert(json);
				if (json){
					// create a new paragraph element
					verseText = $("#bibletxt");
					textheader = $("#textheader");
					// if the user selects a different chapter, delete previous verses and show the new one 
					if (verseText.text != "" && textheader.text != ""){
						verseText.empty();
						textheader.empty();
					}
					// set the header of the text to be chapter title
					textheader.append(json[0].chapter_title);

					for (var i = 0; i < json.length; i++){
						// append the verse text to the paragraph element
						verseText.append("<span class='verse'><span class='verse-number'><sup>" + 
									json[i].verse_id + "</sup></span>" + json[i].verse_text + "</span>");
						//verseText.append(json[i].verse_text);
					}
					
				}
				$("#txtblock").show();
				$("#buttonbar").show();

				// determine if button needs to be disabled based on the number of chapters
				// in given book
				if (curr_chapter_id == 1){
					// disable the prev button
					$("#prevbutton").disabled = true;	
					$("#prevbutton").addClass("w3-disabled");
				}
				// if the book is only one chapter long
				if (curr_chapter_id == numChapters){
					// disable the next button
					$("#nextbutton").disabled = true;
					$("#nextbutton").addClass("w3-disabled");
				}
				if (curr_chapter_id != 1 && curr_chapter_id < numChapters){
					// enable both buttons
					$("#prevbutton").disabled = false;
					$("#prevbutton").removeClass("w3-disabled");
					$("#nextbutton").disabled = false;
					$("#nextbutton").removeClass("w3-disabled");

				}

			})
			.fail(function(xhr, status, errorThrown){
				alert("There was a problem in the request");
				console.log("Error: " + errorThrown);
				console.log("Status: " + status);
				console.dir(xhr);	
			})
			.always(function(xhr){

			})
	}
</script>
