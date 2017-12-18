<html>


<body>
  			<h3> Edit your Task and click 'Save'</h3>
  			
  			<form action="index.php?page=task&action=save&id=<?php echo $data->todo_id; ?>" method="post" id="updateForm">
    		<p><?php print utility\htmlTable::generateEditableForm($data); ?></p>
			<button type="submit" form="updateForm" value="store" class="edit">Save</button></form>
 			<hr>
  	
  			<a href="index.php?page=all_tasks&action=show&id=<?php echo $data->todo_id; ?> "><button class="cancel">Cancel</button></a>
  		
  			<form action="index.php?page=deleted&action=delete&id=<?php echo $data->todo_id; ?> " method="post" id="form1">
   			 <button type="submit" form="form1" value="delete" class="delete">Delete</button>
			</form>
  	
	</body>
	</html>