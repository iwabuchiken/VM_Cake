<h1><?php echo $this->Html->link($video['Video']['title'],
										$url = $video['Video']['url']
										 
									); ?></h1>
<div id="jqarea">
Hi
</div>

<?php 
// 	echo "hi";
	
// 	echo $this->Html->link('Home', $url = "javascript:void(0);",
	echo $this->Html->link('Home', "javascript:void(0);",
			array('onclick' => 'show_Message()'));

?>

<?php
	$subject = $video['Video']['url'];
// 	$subject = "123?v=aaaaAAAAAbbb&xyz";
	
	//REF http://stackoverflow.com/questions/3392993/php-regex-to-get-youtube-video-id answered Aug 3 '10 at 1:27
	parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
	echo $my_array_of_vars['v'];
	
	echo "<br>";
	echo "<br>";
	
	echo $subject;
	echo "<br>";
// 	echo $video['Video']['url']."<br>";
	
	$pattern = '/\?v=(.+?)&/';	// [0] => ?v=aaaaAAAAAbbb& [1] => aaaaAAAAAbbb

	preg_match($pattern, $subject, $matches);
// 	preg_match($pattern, $subject, $matches, PREG_OFFSET_CAPTURE, 3);
	print_r($matches);
	
	echo "<br>";
	
	if (count($matches) > 1) {
	
		echo $matches[1];;
		
	} else {
	
		echo "No matches";
	
	}
	
?>

<br>
<br>

<script type="text/javascript" src="swfobject.js"></script>    
  <div id="ytplayer">
<!--   <div id="ytapiplayer"> -->
    You need Flash player 8+ and JavaScript enabled to view this video.
  </div>

  <script type="text/javascript">

    var params = { allowScriptAccess: "always" };
    var atts = { id: "ytplayer" };
//     var atts = { id: "myytplayer" };
    swfobject.embedSWF(
    	    "http://www.youtube.com/v/"
    	    + "<?php echo $my_array_of_vars['v']; ?>"
//     	    + "imc4xQDp_Fs"
    	    + "?enablejsapi=1&playerapiid=ytplayer&version=3",
                       "ytplayer", "760", "581", "8", null, null, params, atts);
//                        "ytapiplayer", "760", "581", "8", null, null, params, atts);
//                        "ytplayer", "760", "581", "8", null, null, params);
//                        "ytapiplayer", "425", "356", "8", null, null, params, atts);

// 	function play() {
	
// 	  if (ytplayer) {
	
// 		ytplayer.playVideo();
	
// 	  }
	
// 	}
	
	
	
// 	function pause() {
	
// 	  if (ytplayer) {
	
// 		ytplayer.pauseVideo();
	
// 	  }
	
// 	}
	
	
	
// 	function stop() {
	
// 	  if (ytplayer) {
	
// 		ytplayer.stopVideo();
	
// 	  }
	
// 	}
	
// 	function seek($position) {
	
// 	  if (ytplayer) {
	
// 		ytplayer.seekTo($position);
//		ytplayer.seekTo(<?php //echo $position;?>);
//		ytplayer.seekTo(<?php //echo 20;?>);
// // 		ytplayer.seekTo(10);
	
// 	  }
	
// 	}
	
	function getCurrentTime() {
	
	  if (ytplayer) {
	
		$cur = ytplayer.getCurrentTime();

		alert($cur);
// 		alert("current = ".$cur);
//		ytplayer.seekTo(<?php //echo $position;?>);
//		ytplayer.seekTo(<?php //echo 20;?>);
// 		ytplayer.seekTo(10);
	
	  }
	
	}
	
	

  </script>
  
<br>
<br>
<p>
	<?php echo $this->Html->link(
					'Delete Video',
					array(
							'controller' => 'videos', 
							'action' => 'delete', 
							$video['Video']['id']
					),
					array(
							// 							'style'	=> 'color: blue'
// 							'class'		=> 'link_word_alert'
					),
						
					//REF http://stackoverflow.com/questions/22519966/cakephp-delete-confirmation answered Mar 19 at 23:18
					__("Delete? => %s", $video['Video']['title'])
	
				);
	?>

</p>

<br>
<br>

<a href="javascript:void(0);" onclick="play();">Play</a>

<a href="javascript:void(0);" onclick="pause();">Pause</a>

<a href="javascript:void(0);" onclick="stop();">Stop</a>

<a href="javascript:void(0);" onclick="seek(30);">Seek</a>

<a href="javascript:void(0);" onclick="getCurrentTime();">Current time</a>

<br>
<br>
<?php for ($i = 0; $i < 10; $i++) {
		echo "<a href=\"javascript:void(0);\" onclick=\"seek("
				.($i * 20)
				.");\">"
				.($i * 20)."</a>";
		echo " | ";
	}
?>