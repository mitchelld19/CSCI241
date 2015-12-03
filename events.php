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
		echo "</li>";
	}
	echo "</ul>";
	
	echo "<h2>Your List</h2>";
	echo "<ul>";
	
	if(!isset($_SESSION["events"]))
	{
		echo "You have no events";
	}
	else if (isset($_SESSION["events"]))
	{		
		foreach($_SESSION["events"] as $eventIndex => $event)
		{
			echo "<li>{$event}";
			?>
			<form method="post" action="events.php">
				<input type="hidden" name="deleteEvent" value="<?php  echo $eventIndex; ?>">
				<button type="submit">X</button>
			</form>
			<?php
			echo "</li>";
		}
	}
	
	echo "</ul>";
	
	echo "You can also " . '<a href="mail.php">email</a>' . " this to yourself or a friend.";
	require("footer.php"); 
}

else if($_SERVER["REQUEST_METHOD"] == "POST")
{
	 if(isset($_POST["addToList"]))
	 {
	 	$events = readEvents("events.txt");
		$userEvent = $events[$_POST["addToList"]];
		$userEvent = explode("|", $userEvent);
		$_SESSION["events"][] = $userEvent[0] . " - " . $userEvent[1];
			
		header("Location: events.php");
	}
	else if(isset($_POST["deleteEvent"]))
	{
		$events = $_SESSION["events"];
		$userEvent = $_POST["deleteEvent"];
		
		unset($events[$userEvent]);
		
		header("Location: events.php");
	}
	
}

require("footer.php");