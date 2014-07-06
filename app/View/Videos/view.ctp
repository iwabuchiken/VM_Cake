<h1>Title: <?php echo $this->Html->link($video['Video']['title'],
										$url = $video['Video']['url']
										 
									); ?>
									
	 / (position = <?php echo count($positions) ?>)
</h1>


<?php echo $this->element('videos/video_view_controller'); ?>

<br>
<br>

<?php
	$subject = $video['Video']['url'];
// 	$subject = "123?v=aaaaAAAAAbbb&xyz";
	
	//REF http://stackoverflow.com/questions/3392993/php-regex-to-get-youtube-video-id answered Aug 3 '10 at 1:27
	parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
// 	echo $my_array_of_vars['v'];
	
// 	echo "<br>";
	
?>

<!-- <br> -->
<br>

<script type="text/javascript" src="swfobject.js"></script>    

<div>

	<?php echo $this->element('videos/view/view_table_poslist')?>

  <div id="ytplayer">
<!--   <div id="ytapiplayer"> -->
    You need Flash player 8+ and JavaScript enabled to view this video.
    
  </div>
  
</div>

  <!-- REF http://stackoverflow.com/questions/16293741/original-purpose-of-input-type-hidden answered Apr 30 '13 at 6:43 -->
  <input type="hidden" id="video_id_hidden" name="video_id" value="<?php echo $video['Video']['id']?>">
  
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


  </script>
  
