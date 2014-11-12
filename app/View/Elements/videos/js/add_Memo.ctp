
<?php
	// Simpler way of making sure all no-cache headers get sent
	// and understood by all browsers, including IE.
	session_cache_limiter('nocache');
	header('Expires: ' . gmdate('r', 0));
	
	header('Content-type: text/html');

// 	echo "Done";

	echo "msg: ".$msg;
	
	echo "<br>";
	echo "<br>";
	
// 	echo "id => ".$id;
	
?>