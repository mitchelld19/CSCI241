<?php 
require_once("header.php");
require_once("common.php");

?>
	<h1>Login Page</h1>
	<a href="index.php">Home</a>
	<a href="events.php">Events</a>
	<a href="login.php">Login</a>
	<a href="logout.php">Logout</a>
<?php

if($_SERVER["REQUEST_METHOD"]=="GET")
{
	?>
		<form method="post" action="login.php">
			Username: <input type="text" name="username"><br>
			Password: <input type="password" name="password"><br>
			<button type="submit">Submit</button>
		</form>
	<?php
}
else if($_SERVER["REQUEST_METHOD"]=="POST")
{

	//check if username is admin and password is the admin's password
	if($_POST["username"]=="admin" && $_POST["password"]=="adminmaypass")
	{
		$_SESSION["username"] = "admin";
		header("Location: index.php");
	}
	//check if username is user and password is the user's password
	else if($_POST["username"]=="user" && $_POST["password"]=="usermaypass")
	{
		$_SESSION["username"] = "user";
		header("Location: index.php");
	}
	else {
		{
			session_destroy(); //destroy session
			$_SESSION = array(); //put session contents in an array
			session_write_close(); //close the session
			header("Location: login.php"); //redirect to the login page
			exit();
		}
	}
}
else {
	exit("Unsupported");
}

require_once("footer.php");