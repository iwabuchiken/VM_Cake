<div>
	<a href="javascript:void(0);" 
		onclick="play();" 
		class="button_controller" id="button_play">
		
		Play</a>
	
	<a href="javascript:void(0);" onclick="pause();" class="button_controller">
	
		Pause</a>
</div>


<a href="javascript:void(0);" 
	onclick="stop();" 
	class="button_controller" id="button_stop">
	
	Stop
	
</a>

<a href="javascript:void(0);" 
	onclick="saveCurrentTime_js();" 
	class="button_controller" id="button_save_current_time">
	
	Save time
	
</a>

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
