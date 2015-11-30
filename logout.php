<?php
if($_SERVER["REQUEST_METHOD"]=="GET")
{
	session_destroy(); //destroy session
	$_SESSION = array(); //put session contents in an array
	session_write_close(); //close the session
	header("Location: login.php"); //redirect to the login page
	exit();
}