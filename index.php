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
		<div class = "w3-container">
			<div class = "w3-panel w3-teal w3-round w3-mobile">
				<h1> Welcome to the Digital Bible Platform App </h1>
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
		</div>
		
		
	</body>
</html>

<script>
	// Maps the book_id to the number of chapters
	var chapterBookMap = {};
	// Maps the book_id to the dam_id for that specific book
	var damIDBookMap = {};
	$(document).ready(function(){
		$.ajax({
			url: "apicalls.php",
			data:  {
				idp: "true",
				bid: ""
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

	// USE the same book_id when receiving verses below
	var curr_book_id = "";

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
			var numChapters = chapterBookMap[curr_book_id];
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



	$("#choosechapter").submit(function(){
		curr_chapter_id = $("#chapterdatalist").find("option:selected").attr("id");
		curr_dam_id = damIDBookMap[curr_book_id];
		$.ajax({
				url: "apicalls.php",
				data: {
					idp: "false",
					bid: curr_book_id,
					cid: curr_chapter_id,
					curr_dam_id: dam_id
				},
				type: "GET",
				dataType: "json"
			})	
			.done(function(json){
				if (json){
					// create a new paragraph element
					verseText = $("<p>");
					for (var i = 0; i < json.length; i++){
						// append the verse text to the paragraph element
						verseText.append(json[i].verse_text);
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

			})
	})
</script>
