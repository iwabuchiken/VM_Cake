
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
	
	
	<div id="controller">
		<?php echo $this->Html->link($video['Video']['title'],
												$url = $video['Video']['url']
												 
											); ?>
											
		 (position = <?php echo count($positions) ?>)
	
		<br>
		<br>
		<?php echo $this->element('videos/video_view_controller'); ?>
		
		<?php echo $this->element('videos/view/view_table_poslist')?>
		
	</div>
	
	<div>
		
		<?php //echo $this->element('videos/view/view_table_poslist')?>
		
	</div>
	
  <div id="ytplayer">
<!--   <div id="ytapiplayer"> -->
    You need Flash player 8+ and JavaScript enabled to view this video.
    
  </div>
  
</div>

  <!-- REF http://stackoverflow.com/questions/16293741/original-purpose-of-input-type-hidden answered Apr 30 '13 at 6:43 -->
  <input type="hidden" id="" name="video_id" value="<?php echo $video['Video']['id']?>">

  <?php echo $this->element('videos/view/view_script_swf')?>
  

<br>

<div id="div_slider" style="background: green">
	<div id="volume"></div>
	<span id="volume_val"></span>
</div>
<!-- <div id="volume_val"></div> -->

<br>

<!-- <div id="sample"> -->
	
<!-- 	Zoom -->

<!-- </div> -->
<!-- <div> -->

	<!-- <button onclick="body.style.zoom='50%'">Zoom 50%</button> -->
	<!-- <button onclick="ytplayer.style.zoom='50%'">Zoom 50%</button> -->
	<!-- <button onclick="sample.style.zoom='50%'">Zoom 50%</button> -->

<!-- </div> -->

<table class="table_no_line">
  <tr>
    <td>
	    <?php echo $this->Html->link(
						'Edit Video',
						array(
								'controller' => 'videos', 
								'action' => 'edit', 
								$video['Video']['id']
						)
				
				);
		
		?>
    </td>
    
    <!-- REF padding http://www.htmq.com/style/margin.shtml -->
    <td 
    	onclick="add_Memo_js(<?php echo $video['Video']['id'] ?>)" 
    	rowspan="2" 
    	id="td_video_memo"
    	style="font-size: 20px; padding: 20px;"
    	>
    	
<!--     <td rowspan="2" id="td_video_memo"> -->
    	<?php 
    	
    		echo $video['Video']['memo'];
    		
    	?>
    
    </td>
  </tr>
  <tr>
    <td>
    	<?php echo $this->Html->link(
					'Delete Video',
					array(
							'controller' => 'videos', 
							'action' => 'delete', 
							$video['Video']['id']
					),
					array(
							// 							'style'	=> 'color: blue'
 							'class'		=> 'link_alert'
					),
						
					//REF http://stackoverflow.com/questions/22519966/cakephp-delete-confirmation answered Mar 19 at 23:18
					__("Delete? => %s", $video['Video']['title'])
			
			);
		
		?>
    
        </td>
  </tr>
</table>

<script type="text/javascript">
// 	$("#div_slider").slider();

// 	$(function() {
// 	    $( "#div_slider" ).slider();
// 	    $(".ui-slider-range").css("width",300);
// 	    var range = $( ".selector" ).slider( "option", "range" );
// // 	    alert("range" => range);
	    
// 	  });

</script>

<div id="div_message">
</div>

<?php //echo $this->element('videos/view/view_tests')?>
