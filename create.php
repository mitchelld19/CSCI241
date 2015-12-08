<?php
require_once("header.php");
require_once("common.php");
?>
	<header>
		<h1>Create Your Own Quiz</h1>
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
	?>
		<h2>Add Questions:</h2>
		<form action="create.php" method="POST">
			<label>Question: <input type="text" name="question"><br></label>
			<label>Answer Choice 1: </label><input type="text" name="answerChoice1"><br>
			<label>Answer Choice 2: </label><input type="text" name="answerChoice2"><br>
			<label>Answer Choice 3: </label><input type="text" name="answerChoice3"><br>
			<label>Answer Choice 4: </label><input type="text" name="answerChoice4"><br>
			<label>Correct Answer: </label><input type="text" name="correctAnswer"><br>
			<button type="submit">Submit</button>
		</form>
	<?php
	
	echo "<h2>Your Quiz:</h2>";
	$questions = readQuestions("createdQuiz.txt");
	
	foreach($questions as $index => $question)
	{
		$question = explode("|", $question);
		
		?>
			<form method="post" action="create.php">
				<h3 class="question"><?php echo $question[0];?></h3>
				<input type="hidden" name="deleteQuestion" value="<?php  echo $index; ?>">
				<button type="submit" >X</button><br>
				<label><?php echo "a) " . $question[1];?></label><br>
				<label><?php echo "b) " . $question[2];?></label><br>
				<label><?php echo "c) " . $question[3];?></label><br>
				<label><?php echo "d) " . $question[4];?></label><br>
				<label><?php echo "Correct Answer: " . $question[5];?></label>
			</form>
		<?php		
	}
}

else if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(isset($_POST["deleteQuestion"]))
	{
		//Delete Question
		deleteQuestion("createdQuiz.txt", $_POST["deleteQuestion"]);		
		header("Location: create.php");
	}
	else if(isset($_POST["question"]))
	{
		//Add questions
		$myQuestions = array();
		
		$myQuestions[] = $_POST["question"];
		$myQuestions[] = $_POST["answerChoice1"];
		$myQuestions[] = $_POST["answerChoice2"];
		$myQuestions[] = $_POST["answerChoice3"];
		$myQuestions[] = $_POST["answerChoice4"];
		$myQuestions[] = $_POST["correctAnswer"];
		
		$question = implode("|", $myQuestions);
		appendQuestion("createdQuiz.txt", $question . "\r\n");
		
		header("Location: create.php");
	}
}

require_once("footer.php");