<h1>Positions</h1>
<table>
		<tr>
				<th>Id</th>
				<th>Video title</th>
				<th>point</th>
				<th>Created at</th>
		</tr>

		<!-- Here is where we loop through our $positions array, printing out post info -->

		<?php foreach ($positions as $position): ?>
		<tr>
				<td><?php echo $position['Position']['id']; ?></td>
				<td>
					<?php echo $this->Html->link($position['Video']['title'],
									array(
										'controller' => 'positions', 
										'action' => 'view', 
										$position['Position']['id'])
									); ?>
				</td>
				<td><?php echo $position['Position']['point']; ?></td>
				<td><?php echo $position['Position']['created_at']; ?></td>
		</tr>
		<?php endforeach; ?>
		<?php unset($position); ?>
</table>

<?php echo $this->Html->link(
    'Add Position',
    array('controller' => 'positions', 'action' => 'add')
); ?>
