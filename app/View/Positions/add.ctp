<h1>Add Position</h1>
	<?php
	echo $this->Form->create('Position');
	echo $this->Form->input('video_id', array('options' => $data, 'default' => 3));
	echo $this->Form->input('point');
// 	echo $this->Form->input('body', array('rows' => '3'));
	echo $this->Form->end('Save Position');
	?>