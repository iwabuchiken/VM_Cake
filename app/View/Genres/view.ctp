<h1><?php echo h($genre['Genre']['name']); ?></h1>


<p>
	<small>
		ID: <?php echo $genre['Genre']['id']; ?>
	</small>
</p>

<p>
	<small>
		name: <?php echo $genre['Genre']['name']; ?>
	</small>
</p>

<p>
	<?php echo $this->Html->link(
					'Delete Genre',
					array(
							'controller' => 'genres', 
							'action' => 'delete', 
							$genre['Genre']['id']
					),
					array(
							// 							'style'	=> 'color: blue'
// 							'class'		=> 'link_word_alert'
					),
						
					//REF http://stackoverflow.com/questions/22519966/cakephp-delete-confirmation answered Mar 19 at 23:18
					__("Delete? => %s", $genre['Genre']['name'])
	
				);
	?>

</p>
