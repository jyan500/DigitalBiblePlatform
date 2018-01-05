// JAVASCRIPT FOR THE HEADER CONTENT
// 1/4/18 JY: separated the javascript from index.js

 // open the tab content
function openTab(event, tabID){
	// return all the tab content
	var listOfContent = $(".content");
	// hide all tab content
	for (var i = 0; i < listOfContent.length; i++){
		var childID = listOfContent[i].id;
		$("#" + childID).hide();
	}
	//alert(tabID);
	$("#" + tabID).fadeIn("fast");
	console.log($("#" + tabID).css("display"));
	//$("#" + tabID).show();

}

// open the sidebar and overlay
function openSideBarNav(){
	$("#sidebar").show();
	$("#overlay").show();
}

// close the sidebar and overlay
function closeSideBarNav(){
	$("#sidebar").fadeOut("fast");
	$("#overlay").fadeOut("fast");
}

$(document).ready(function(){
	$("#openmodal").on("click", function(){
			$("#modal").show();	
	})
	$("#closemodal").on("click", function(){
		$("#modal").hide();
	})	
})