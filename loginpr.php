<?php
	$username = $_POST['user']; // getting the user's values form from login.php file
	$password = $_POST['pass'];

	$username = stripcslashes($username); // preventing mysql injection
	$password = stripcslashes($password);
	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);

	mysql_connect("localhost", "root", ""); // connecting to the server and selecting the database
	mysql_select_db("login");

	// query the database for the user
	$result = mysql_query("select * from users where username = '$username' and password = '$password'") or die("Failed to query database ".mysql_error());
	$row = mysql_fetch_array($result);
	if ($row['username'] == $username && $row['password'] == $password ){
	$row['username'].header('Location: Successful login.html');
	} else {
		header('Location: Unsuccessful login.html');
	}
?>	