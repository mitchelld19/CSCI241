<?php
require_once("header.php");
require_once("common.php");

echo "<h1>How Well Do You Know Mario?</h1>";

if($_SERVER["REQUEST_METHOD"]=="GET")
{
	$questions = readQuestions("questions.txt");
	?>
	<form method="post" action="quiz.php">
	<?php
		foreach($questions as $question)
		{
			$question = explode("|", $question);
			echo "<p>" . $question[0] . "</p>";
			?>
			<select>
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
		<button type="submit" >Submit</button>
	</form>	
	<?php
}
else if($_SERVER["REQUEST_METHOD"]=="POST")
{
	
	
	
}
