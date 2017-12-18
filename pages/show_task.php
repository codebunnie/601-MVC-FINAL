<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>The HTML5 Herald</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">

    <link rel="stylesheet" href="css/styles.css?v=1.0">

    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <![endif]-->
</head>

<body>
<h1>User Task Information </h1>

<?php
//this is how you print something  $data contains the record that was selected on the table.

//print_r($data);


?>

<form action="index.php?page=edit_task&action=edit&id=<?php echo $data->todo_id; ?>" method="post">

User ID: <input type="text" name="acct_id" disabled value="<?php echo $data->acct_id; ?>"><br>
    
	To Do ID: <input type="text" name="todo_id" disabled value="<?php echo $data->todo_id; ?>"><br>	
	
    Creation Date: <input type="text" name="todo_create_date" value="<?php echo $data->todo_create_date; ?>"><br>
    End Date: <input type="text" name="todo_end_date" value="<?php echo $data->todo_end_date; ?>"><br>
	Due Date: <input type="text" name="todo_due_date" value="<?php echo $data->todo_due_date; ?>"><br>
	Task Description: <input type="text" name="todo_desc" value="<?php echo $data->todo_desc; ?>"><br>
	
    Task Status: <select type="text" name="todo_status_id" value="<?php echo $data->todo_status_id; ?>"><br>
			<option value="1">COMPLETED</option>
		<option value="2">PENDING</option>
		<option value="3">IN PROCESS</option>
		<option value="4">REASSIGNED</option>
	</select><BR>
	
	
	
    <input type="submit" value="Submit form">
</form>


<form action="index.php?page=accounts&action=delete&id=<?php echo $data->acct_id; ?> " method="post" id="form1">
    <button type="submit" form="form1" value="delete">Delete</button>
</form>


<script src="js/scripts.js"></script>
</body>
</html>