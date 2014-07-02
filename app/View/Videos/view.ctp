<h1><?php echo h($video['Video']['title']); ?></h1>


<p>
	<small>
		URL: <?php echo $this->Html->link($video['Video']['url'],
										$url = $video['Video']['url']
										 
									); ?>
	</small>
</p>

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
