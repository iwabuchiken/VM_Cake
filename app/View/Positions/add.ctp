<h1>Add Position</h1>
	<?php
	echo $this->Form->create('Position');
	echo $this->Form->input('title');
	echo $this->Form->input('url');
// 	echo $this->Form->input('body', array('rows' => '3'));
	echo $this->Form->end('Save Position');
	?>