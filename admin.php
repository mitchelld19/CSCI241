<?php 
require_once("header.php");
require_once("common.php");

//if username isn't admit then exit
if($_SESSION["username"] != "admin")
{
	exit("Page Restricted");
}

?>
	<h1>Admin Page:</h1>
	<a href="index.php">Home</a>
	<a href="events.php">Events</a>
	<a href="admin.php">Admin</a>
	<a href="login.php">Login</a>
	<a href="logout.php">Logout</a>
<?php

if($_SERVER["REQUEST_METHOD"]=="GET")
{		
	$events = readEvents("events.txt");
	echo "<h2>Current Events:</h2>";
	echo "<ul>";
	foreach($events as $eventIndex => $event)
	{
		$event = explode("|", $event);
		echo "<li>{$event[0]} - {$event[1]}";
		?>
			<form method="post" action="admin.php">
				<input type="hidden" name="deleteEvent" value="<?php  echo $eventIndex; ?>">
				<button type="submit" >X</button>
			</form>
		<?php
	}
	echo "</ul>";
	
	?>
		<h2>Add Events:</h2>
		<form action="admin.php" method="POST">
			<label>
				Event Name: <input type="text" name="event"><br>
			</label>
			<label>
				Event Location: <input type="text" name="location"><br>
			</label>
			<button type="submit">Submit</button>
		</form>
	<?php
}

else if($_SERVER["REQUEST_METHOD"] == "POST")
{
	//Delete or Insert
	if(isset($_POST["deleteEvent"]))
	{
		//Delete Event
		deleteEvent("events.txt", $_POST["deleteEvent"]);		
		header("Location: admin.php");
	}
	else if(isset($_POST["event"]))
	{
		//Insert Event
		//Add the event
		$event = array();
		
		$event[] = $_POST["name"];
		$event[] = $_POST["location"];
		
		appendEvent("events.txt", implode("|", $event) . "\r\n");
		
		header("Location: admin.php");
	}
	else
	{
		//No event exists 
			header("Location: admin.php");		
	}
}
else
{
	header("Location index1.php");			
	exit();
}

require_once("footer.php");