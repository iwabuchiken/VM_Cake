<h1>

	Videos (<a href="#bottom">Bottom</a><a name="top"></a>)
	(total = <?php echo $num_of_videos; ?>, pages = <?php echo $num_of_pages; ?>)	
	
</h1>

<?php echo $this->element('videos/_index_pagination')?>

<table>

	<?php echo $this->element('videos/index/index_t_headers')?>
<!-- 		<tr> -->
<!-- 				<th>Id</th> -->
<!-- 				<th>Title</th> -->
<!-- 				<th>Genre</th> -->
<!-- 				<th>Url</th> -->
<!-- 		</tr> -->

		<!-- Here is where we loop through our $videos array, printing out post info -->

	<?php echo $this->element('videos/index/index_t_entries')?>
	

</table>

(<a href="#top">Top</a><a name="bottom"></a>)

<br>
<br>

<?php echo $this->Html->link(
    'Add Video',
    array('controller' => 'videos', 'action' => 'add')
); ?>
