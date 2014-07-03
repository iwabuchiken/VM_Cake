<br>
<br>

<?php echo $this->Html->link(
					'Videos',
					array('controller' => 'videos', 
							'action' => 'index'));
?>

|

<?php echo $this->Html->link(
					'Genres',
					array('controller' => 'genres', 
							'action' => 'index'));
?>

|

<?php echo $this->Html->link(
					'Positions',
					array('controller' => 'positions', 
							'action' => 'index'));
?>

|

<?php echo $this->Html->link(
					'Remote',
					$url = "http://benfranklin.chips.jp/cake_apps/VM_Cake/videos",
					array('target' => '_blank'));
?>
