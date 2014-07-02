<h1>Genres</h1>
<table>
		<tr>
				<th>Id</th>
				<th>Name</th>
		</tr>

		<!-- Here is where we loop through our $genres array, printing out post info -->

		<?php foreach ($genres as $genre): ?>
		<tr>
				<td><?php echo $genre['Genre']['id']; ?></td>
				<td>
					<?php echo $this->Html->link($genre['Genre']['name'],
									array(
										'controller' => 'genres', 
										'action' => 'view', 
										$genre['Genre']['id'])
									); ?>
				</td>
		</tr>
		<?php endforeach; ?>
		<?php unset($genre); ?>
</table>

<?php echo $this->Html->link(
    'Add Genre',
    array('controller' => 'genres', 'action' => 'add')
); ?>
