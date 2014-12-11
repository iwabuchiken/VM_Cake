<h1>Add Video</h1>
<?php
	
	$opt_input_w1 = array(
	
			'onmouseover' => 'this.select();',
	
			'rows' => '1',
	
			// 	        		'class'	=> 'add_name'
			'cols'	=> '5',
				
			//REF width http://mbsupport.dip.jp/hp/form_10.htm
			//REF color name http://www.colordic.org/
			'style'	=> 'width: 50%; background: lightsteelblue',
				
			// 						'width'	=> '100px'
	// 						'columns'	=> '5'
	
	);
	
	$opt_input_w2 = array(
	
			'onmouseover' => 'this.select();',
	
			'rows' => '2',
	
			// 	        		'class'	=> 'add_name'
			'cols'	=> '5',
				
			//REF width http://mbsupport.dip.jp/hp/form_10.htm
			//REF color name http://www.colordic.org/
			'style'	=> 'width: 50%; background: Thistle',
				
			// 						'width'	=> '100px'
	// 						'columns'	=> '5'
	
	);
	
	
	echo $this->Form->create('Video');
	echo $this->Form->input('title', $opt_input_w1);
	echo $this->Form->input('url', $opt_input_w2);
	
	echo $this->Form->input('genre_id',
			array('options' => $genre_names)
	
	);
	
// 	echo $this->Form->input('body', array('rows' => '3'));
	echo $this->Form->end('Save Video');
?>