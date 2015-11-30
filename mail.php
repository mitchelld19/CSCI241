<?php
require_once("header.php");
require_once("common.php");

?>
	<h1>Email Page</h1>
	<a href="index.php">Home</a>
	<a href="events.php">Events</a>
	<a href="login.php">Login</a>
	<a href="logout.php">Logout</a>
	
	<h2>Send email</h2>
	<form>
		<label>
			From: <input type="text" name="from"><br>
		</label>
		<label>
			To: <input type="text" name="to"><br>
		</label>
		<label>
			Subject: <input type="text" name="subject"><br>
		</label>
		Message: 
	</form>
	
<?php
require_once("footer.php");