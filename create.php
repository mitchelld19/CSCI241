<?php
require_once("header.php");
require_once("common.php");

if($_SERVER["REQUEST_METHOD"]=="GET")
{
	?>
		<h2>Add Questions:</h2>
		<form action="create.php" method="POST">
			<label>Question: <input type="text" name="question"><br></label>
			<label>Answer Choice 1: <input type="text" name="answerChoice1"><br></label>
			<label>Answer Choice 2: <input type="text" name="answerChoice2"><br></label>
			<label>Answer Choice 3: <input type="text" name="answerChoice3"><br></label>
			<label>Answer Choice 4: <input type="text" name="answerChoice4"><br></label>
			<label>Correct Answer: <input type="text" name="correctAnswer"><br></label>
			<button type="submit">Submit</button>
		</form>
	<?php
	
	echo "<h2>Your Quiz</h2>";
	$questions = readQuestions("myQuiz.txt");
	
	foreach($questions as $index => $question)
	{
		$question = explode("|", $question);
		
		echo "<h2>" . $question[0] . "</h2>";
		?>
			<form method="post" action="create.php">
				<input type="hidden" name="deleteQuestion" value="<?php  echo $index; ?>">
				<button type="submit" >X</button>
			</form>
		<?php
		echo "a) " . $question[1] . "<br>";
		echo "b) " . $question[2] . "<br>";
		echo "c) " . $question[3] . "<br>";
		echo "d) " . $question[4] . "<br>";
		echo "Correct Answer: " . $question[5];
		
	}
}

else if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(isset($_POST["deleteQuestion"]))
	{
		//Delete Question
		deleteQuestion("myQuiz.txt", $_POST["deleteQuestion"]);		
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
		appendQuestion("myQuiz.txt", $question . "\r\n");
		
		header("Location: create.php");
	}
}
