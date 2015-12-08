<?php
require_once("header.php");
require_once("common.php");
?>
	<header>
		<h1>Which Mario Character Are You?</h1>
		<nav>
			<ul>
				<li id="home"><a href="index.php">Home</a></li>
				<li id="create"><a href="create.php">Create</a></li>
				<li id="mario"><a href="mario.php">Mario Quiz</a></li>
				<li id="character"><a href="character.php">Charater Quiz</a></li>
			</ul>
		</nav>	
	</header>
<?php

if($_SERVER["REQUEST_METHOD"]=="GET")
{
	$questions = readQuestions("characterQuestions.txt");
	?>
	<form method="post" action="character.php">
	<?php
		foreach($questions as $questionIndex => $question)
		{
			$question = explode("|", $question);
			echo "<h3>" . $question[0] . "</h3>";
			?>
			<select name="<?php echo $questionIndex; ?>">
				<option disabled selected> -- select an option -- </option>
				<option value="Mario"><?php echo $question[1];?>
				<option value="Yoshi"><?php echo $question[2];?>
				<option value="Donkey Kong"><?php echo $question[3];?>
				<option value="Princess Peach"><?php echo $question[4];?>
			</select>
			<?php	
		}
		?>
		<br>
		<button type="submit">Submit</button>
	</form>	
	<?php
}
else if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$answers = $_POST;
	
	$mario = 0;
	$yoshi = 0;
	$donkey = 0;
	$peach = 0;
	
	$characterTally = array();
	
	
	foreach($answers as $answer)
	{
		//checking to see what character the answer matches and adding +1 to that character
		if($answer == "Mario")
		{
			$mario++;
		}
		else if($answer == "Yoshi")
		{
			$yoshi++;
		}
		else if($answer == "Donkey Kong")
		{
			$donkey++;
		}
		else if($answer == "Princess Peach")
		{
			$peach++;
		}
	}
	
	//adding how many points towards each character to an array
	$characterTally[] = $mario;
	$characterTally[] = $yoshi;
	$characterTally[] = $donkey;
	$characterTally[] = $peach;
	
	$characterTally = implode("|", $characterTally);
	$_SESSION["characters"] = $characterTally;
	
	header("Location: characterResults.php");
}
require_once("footer.php");
