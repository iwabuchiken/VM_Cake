  	<table id="table_poslist">
  	
  	<?php 
//   		for ($i = 0; $i < 10; $i++) {
		foreach ($positions as $position):
  	?>

<!--   		<tr> -->
<!--   			<td id="poslist_1"> -->
  				<?php //echo $position['Position']['point']; 
					
					$tag = "<tr><td id=\"poslist_1\" onclick=\"seek("
							.$position['Position']['point']
							.")\">"
  							.$position['Position']['point']
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
