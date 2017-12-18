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


<form action="index.php?page=accounts&action=register" method="post">
<input type="hidden" name="acct_id" value="">
    First name: <input type="text" name="acct_fname"><br>
    Last name: <input type="text" name="acct_lname"><br>
    Email: <input type="text" name="acct_email"><br>
    Phone: <input type="text" name="acct_phone"><br>
    Birthday: <input type="text" name="acct_birthday"><br>
    Gender: 
	<select type="text" name="acct_gender"><br>
	<option value="FEMALE">FEMALE</option>
	<option value="MALE">MALE</option>
	</select><BR>
    Password: <input type="password" name="acct_password"><br>
	Account Type:
	<select name="acct_type_id">
	<option value="1">USER</option>
	<option value="2">ADMINISTRATOR</option>
	</select> 
    <input type="submit" value="Submit form">
</form>


<script src="js/scripts.js"></script>
</body>
</html>
