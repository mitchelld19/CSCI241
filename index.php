<?php
require_once("header.php");
require_once("common.php");

if(!isset($_SESSION["username"]))
{
	echo "<h1>Welcome</h1>";
}
else {
	echo "<h1>Welcome " . $_SESSION["username"] . "</h1>";
}

?>
	<a href="index.php">Home</a>
	<a href="events.php">Events</a>
	<a href="login.php">Login</a>
	<a href="logout.php">Logout</a>
	
<?php
echo "<p>Where you come for your daily events.</p>";
require_once("footer.php");