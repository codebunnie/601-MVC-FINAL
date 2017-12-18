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
<h1>User Account Information </h1>

<?php
//this is how you print something  $data contains the record that was selected on the table.

//print_r($data);


?>

<form action="index.php?page=accounts&action=save&id=<?php echo $data->acct_id; ?>" method="post">

User ID: <input type="text" name="acct_id" disabled value="<?php echo $data->acct_id; ?>"><br>
Password: <input type="text" name="acct_password" disabled value="<?php echo $data->acct_password; ?>"><br>
<i>
*Contact an Administrator to change these fields</i><br>

 
    First name: <input type="text" name="acct_fname" value="<?php echo $data->acct_fname; ?>"><br>
    Last name: <input type="text" name="acct_lname" value="<?php echo $data->acct_lname; ?>"><br>
    Email: <input type="text" name="acct_email" value="<?php echo $data->acct_email; ?>"><br>
    Phone: <input type="text" name="acct_phone" value="<?php echo $data->acct_phone; ?>"><br>
    Birthday: <input type="text" name="acct_birthday" value="<?php echo $data->acct_birthday; ?>"><br>
    Gender: <select type="text" name="acct_gender" value="<?php echo $data->acct_gender; ?>"><br>
			<option value="FEMALE">FEMALE</option>
		<option value="MALE">MALE</option>
	</select><BR>
	Account Type:
	<select name="acct_type_id" value="<?php echo $data->acct_type_id; ?>">
	<option value="1">USER</option>
	<option value="2">ADMINISTRATOR</option>
	</select> 
	
	
    <input type="submit" value="Submit form">
</form>


<form action="index.php?page=accounts&action=delete&id=<?php echo $data->acct_id; ?> " method="post" id="form1">
    <button type="submit" form="form1" value="delete">Delete</button>
</form>


<script src="js/scripts.js"></script>
</body>
</html>