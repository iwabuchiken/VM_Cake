function show_category_list() {
	
	var select_genre = $("#keyword_genre_id");
	
	var selected_genre_id = select_genre.val();
	
//	alert("Selected genre => " + selected_genre_id);
	
	// Chagne the div background to yellow while ajaxing
	//REF .css() http://stackoverflow.com/questions/4283141/jquery-change-background-color answered Nov 26 '10 at 7:12
	$("#category_list").css("background-color", "yellow");
	
	$.ajax({
		
	    url: "/nr4/keywords/show_category_list?selected_genre=" + selected_genre_id,
	    type: "GET",
	    timeout: 10000
	    
	}).done(function(data, status, xhr) {
		
		$("#category_list").css("background-color", "white");
		
//	    $("#js").html(data);
//	    $("#js").append(data);
		$("#category_list").html(data);
//	    $("#js").append("<br/>");
		
		// Get the background color back to white
	    
	    
	}).fail(function(xhr, status, error) {
		
	    $("#genre_list").append("xhr.status = " + xhr.status + "<br>");          // 例: 404
	    
	});
	
//	$("#category_list").html("Selected genre => " + selected_genre_id);
	
}//function show_category_list() {

function show_Message() {
	
//	alert("jquery!");
	
//	$("#jqarea").text("done");
	
	$.ajax({
		
	    url: "/VM_Cake/videos/retrieve_CurrentTime",
	    type: "GET",
	    timeout: 10000
	    
	}).done(function(data, status, xhr) {
		
		$("#jqarea").text(data);
		
		seek(data);
		
	}).fail(function(xhr, status, error) {
		
	    $("#jqarea").append("xhr.status = " + xhr.status + "<br>");          // 例: 404
	    
	});
	
}

function play() {
	
	  if (ytplayer) {
	
		ytplayer.playVideo();
	
	  }
	
	}

function pause() {
	
  if (ytplayer) {

	ytplayer.pauseVideo();

  }

}



function stop() {

  if (ytplayer) {

	ytplayer.stopVideo();

  }

}

function seek($position) {

  if (ytplayer) {

	ytplayer.seekTo($position);
//		ytplayer.seekTo(<?php //echo $position;?>);
//		ytplayer.seekTo(<?php //echo 20;?>);
//		ytplayer.seekTo(10);

  }

}
function saveCurrentTime_js() {
	
	var curTime = ytplayer.getCurrentTime();
//	var curTime = getCurrentTime();
	
	$.ajax({
		
	    url: "/VM_Cake/videos/save_CurrentTime?curTime=" + curTime,
	    type: "GET",
//	    data: {curTime: curTime},
	    timeout: 10000
	    
	}).done(function(data, status, xhr) {
		
		$("#jqarea").text(data);
		
		seek(data);
		
	}).fail(function(xhr, status, error) {
		
	    $("#jqarea").append("xhr.status = " + xhr.status + "<br>");          // 例: 404
	    
	});
	
	
}

function getCurrentTime() {
	
  if (ytplayer) {

	$cur = ytplayer.getCurrentTime();

	alert($cur);
//		alert("current = ".$cur);
//		ytplayer.seekTo(<?php //echo $position;?>);
//		ytplayer.seekTo(<?php //echo 20;?>);
//		ytplayer.seekTo(10);

  }
	
}
