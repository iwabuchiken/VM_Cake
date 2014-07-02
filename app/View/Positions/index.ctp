<h1>Positions</h1>
<table>
		<tr>
				<th>Id</th>
				<th>Video id</th>
				<th>point</th>
		</tr>

		<!-- Here is where we loop through our $positions array, printing out post info -->

		<?php foreach ($positions as $position): ?>
		<tr>
				<td><?php echo $position['Position']['id']; ?></td>
				<td>
					<?php echo $this->Html->link($position['Position']['video_id'],
									array(
										'controller' => 'positions', 
										'action' => 'view', 
										$position['Position']['id'])
									); ?>
				</td>
				<td><?php echo $position['Position']['point']; ?></td>
		</tr>
		<?php endforeach; ?>
		<?php unset($position); ?>
</table>

<?php echo $this->Html->link(
    'Add Position',
    array('controller' => 'positions', 'action' => 'add')
); ?>
