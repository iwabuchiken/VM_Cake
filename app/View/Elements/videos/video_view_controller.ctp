<?php

	$hostname = Utils::get_HostName();
	
// 	echo $hostname;
	
	if ($hostname == "localhost") {
	
		$url_src = "/VM_Cake/img";
		
	} else {
	
		$url_src = "/cake_apps/VM_Cake/img";
	
	}
	;

?>

<table>
  <tr>
    <td class="td_controller">
    
<!--     	http://www.w3schools.com/tags/tag_img.asp -->
    	<img 
			src="<?php echo $url_src; ?>/player_play.png" 
			alt="play"
			onclick="play();"
			class="button_controller">
			
		<img 
			src="<?php echo $url_src; ?>/player_pause.png" 
			alt="play"
			onclick="pause();"
			class="button_controller"
			id="button_pause"
			>
    </td>

    <td class="td_controller">
    
		<a href="javascript:void(0);" 
			onclick="saveCurrentTime_js();" 
			class="button_controller" id="button_save_current_time">
			
			Save time
			
		</a>
			
		<a href="javascript:void(0);" onclick="sort();" class="button_controller">
		
			Sort</a>
	    
    </td>
    
  </tr>
  
  <tr>
  	<td class="td_controller">
  		
		<img 
			src="<?php echo $url_src; ?>/player_stop.png" 
			alt="play"
			onclick="stop();"
			class="button_controller">
	  	
		<img 
			src="<?php echo $url_src; ?>/player_repeat.png" 
			alt="play"
			onclick="repeat(0);"
			class="button_controller"
			id="button_repeat"
			>
	  	
  	</td>
  	
  	<td class="td_controller">
  	
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

