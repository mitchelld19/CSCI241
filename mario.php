<?php
require_once("header.php");
require_once("common.php");
?>
	<header>
		<h1>How Well Do You Know Mario?</h1>
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
	$questions = readQuestions("marioQuestions.txt");
	?>
	<form method="post" action="mario.php">
	<?php
		foreach($questions as $questionIndex => $question)
		{
			$question = explode("|", $question);
			echo "<h3>" . $question[0] . "</h3>";
			?>
			<select name="<?php echo $questionIndex; ?>">
				<option disabled selected> -- select an option -- </option>
				<option value="<?php echo $question[1];?>"><?php echo $question[1];?>
				<option value="<?php echo $question[2];?>"><?php echo $question[2];?>
				<option value="<?php echo $question[3];?>"><?php echo $question[3];?>
				<option value="<?php echo $question[4];?>"><?php echo $question[4];?>
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
	$right = 0;
	$wrong = 0;
	$tries = array();
	
	$questions = readQuestions("marioQuestions.txt");
	
	foreach($questions as $key => $question)
	{
		$question = explode("|", $question);
		$correctAnswer = str_replace("\r\n", "", $question[5]);

		if($correctAnswer == $answers[$key])
		{
			$right++;
		}
		else{
			$wrong++;
		}
	}
	
	$tries[] = $right;
	$tries[] = $wrong;
	
	$tries = implode("|", $tries);
	$_SESSION["tries"] = $tries;
	
	header("Location: marioResults.php");
}
require_once("footer.php");
	
	
	

