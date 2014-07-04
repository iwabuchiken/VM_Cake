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
	
	var hostname = window.location.hostname;
	
	var url;
	
	if (hostname == "benfranklin.chips.jp") {
		
		url = "/cake_apps/VM_Cake/videos/save_CurrentTime";
		
	} else {

		url = "/VM_Cake/videos/save_CurrentTime";

	}
	
//	alert(hostname);
	
//	var video_id = $("#video_id_hidden").text();
	
	//REF http://stackoverflow.com/questions/4582423/get-value-of-input-tag-using-jquery answered Jan 3 '11 at 6:14
	var video_id = $("#video_id_hidden").val();
	
	$.ajax({
		
	    url: url,
//	    url: "/cake_apps/VM_Cake/videos/save_CurrentTime",
//	    url: "/VM_Cake/videos/save_CurrentTime",
//	    url: "/VM_Cake/videos/save_CurrentTime?curTime=" + curTime,
	    type: "GET",
	    //REF http://stackoverflow.com/questions/1916309/pass-multiple-parameters-to-jquery-ajax-call answered Dec 16 '09 at 17:37
	    data: {curTime: curTime, video_id: video_id},
	    timeout: 10000
	    
	}).done(function(data, status, xhr) {
		
		$("#jqarea").text(data);
		
//		seek(data);
		
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
