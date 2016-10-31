
<script type="text/javascript" src="swfobject.js"></script>    

<div>


	<?php echo $this->element('videos/view/view_zoom'); ?>
	
<!-- <div> -->

<!-- 	<button  -->
<!-- 		onclick="body.style.zoom='50%'" -->
<!-- 		style="font-size: 10px;" -->
<!-- 		> -->
<!-- 			Zoom 50% -->
<!-- 	</button> -->
	<!-- <button onclick="ytplayer.style.zoom='50%'">Zoom 50%</button> -->
	<!-- <button onclick="sample.style.zoom='50%'">Zoom 50%</button> -->

<!-- </div> -->

<!-- <br> -->


	<script type="text/javascript">
		//REF http://api.jquery.com/css/
		$("body").css("zoom", "75%");
	
	</script>
	
	<hr>
	<?php 
	
		echo $video['Video']['title']
	
	?>
		
	<hr>
<!-- 	<body> -->
  <button onclick="ShowTime()">Show Time</button>
  <br>
  <div id="it"></div>
<!-- </body -->