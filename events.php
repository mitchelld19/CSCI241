<?php
require_once("header.php");
require_once("common.php");

?>
	<h1>Events Page</h1>
	<a href="index.php">Home</a>
	<a href="events.php">Events</a>
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
			<form method="post" action="events.php">
				<input type="hidden" name="addToList" value="<?php  echo $eventIndex; ?>">
				<button type="submit">Add to List</button>
			</form>
		<?php
	}
	echo "</ul>";
	require("footer.php");
}	
else if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(isset($_POST["addToList"]))
	{
		echo "<h2>Your List:</h2>";
		$events = readEvents("events.txt");
		if(isset($events[$_POST["addToList"]]))
		{
			//an event exists at the position i am asked to add
			$event = $events[$_POST["addToList"]];
			$event = explode("|", $event);
			echo "<ul>";
			echo "<li>". $event[0] . " - " . $event[1] ."</li>";
			echo "</ul>";
			
			echo "You can also email this to yourself or a friend.";
		}
	}

	//header("Location: events.php");
}

require("footer.php");