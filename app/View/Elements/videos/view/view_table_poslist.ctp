<table id="table_poslist">
  	
  	<?php 
  	
		foreach ($positions as $position):
		
			echo "<tr>";
		
			$url = $video['Video']['url'];
			
			parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
			
			$tag_Point = "<td onclick=\"seek("
					.$position['Position']['point']
					.")\">"
					.$this->Mytest->testFunction($position['Position']['point'])
					."</td>";
	
			echo $tag_Point;
			
			
			$tag_Memo = "<td>"
					.$position['Position']['memo']
					."</td>";
	
			echo $tag_Memo;
			
			
			echo "</tr>";
		
  		endforeach;
  	
  	?>
  		
  	</table>
