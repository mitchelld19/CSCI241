<?php
require_once("header.php");
require_once("common.php");

if($_SERVER["REQUEST_METHOD"]=="GET")
{
?>
	<h1>Email Page</h1>
	<a href="index.php">Home</a>
	<a href="events.php">Events</a>
	<a href="login.php">Login</a>
	<a href="logout.php">Logout</a>
	
	<h2>Send email</h2>
	<form>
		<label>From: <input type="email" name="from"></label><br>
		<label>To: <input type="email" name="to"></label><br>
		<label>Subject: <input type="text" name="subject"</label><br>
		Message: 
		<?php 		
			$message = "<ul>";
			foreach($_SESSION["events"] as $event)
			{
				$message .= "<li>{$event}</li>";
			}
			$message .= "</ul>";
			
			echo $message;
		?>
		<br>
		<button type="submit">Send Email</button>
	</form>
<?php
}
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$to = $_POST["to"];
	$from = "From: {$_POST["from"]}" . "\r\n";
	$subject = $_POST["subject"];
	
	mail("$to", $subject, $message, $from);
	header("Location: mail.php");
	
	require_once("footer.php");
}
