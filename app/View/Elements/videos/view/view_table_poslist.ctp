Table
<table id="table_poslist">
  	
  	<?php 
//   		for ($i = 0; $i < 10; $i++) {
		foreach ($positions as $position):
  	?>

<!--   		<tr> -->
<!--   			<td id="poslist_1"> -->
  				<?php //echo $position['Position']['point']; 
					
					$url = $video['Video']['url'];
					
					parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
		
					$tag = "<tr><td id=\"poslist_1\" onclick=\"seek("
							.$position['Position']['point']
// 							.", "
// 							."\"".$my_array_of_vars['v']."\""
							.")\">"
  							.$this->Mytest->testFunction($position['Position']['point'])
//   							."(".$my_array_of_vars['v'].")"
  							."</td></tr>";
							;

					echo $tag;
		
		
				?>
				
<!--   			</td> -->
<!--   		</tr> -->
  	
  	<?php 
  	
  		endforeach;
//   		}
  	
  	?>
  		
  		<tr>
  			<td id="poslist_2">
  				123
  			</td>
  		</tr>
  		
  	</table>
