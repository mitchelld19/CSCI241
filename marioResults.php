<?php
require_once("header.php");
require_once("common.php");
?>
	<header>
		<h1>Mario Quiz Results</h1>
		<nav>
			<ul>
				<li id="home"><a href="index.php">Home</a></li>
				<li id="create"><a href="create.php">Create</a></li>
				<li id="mario"><a href="mario.php">Mario Quiz</a></li>
				<li id="character"><a href="character.php">Charater Quiz</a></li>
			</ul>
		</nav>	
	</header>
	<h2 class="result">How Well do you know Mario?</h2>
<?php

$tries = explode("|", $_SESSION["tries"]); //[0]=right, [1]=wrong

$totalNumQuestions = count(readQuestions("marioQuestions.txt"));


switch($tries[1]){
	case $tries[1]==0: 
	case $tries[1]==1: //if 0-1 answers are wrong
		echo "<p>You are the ULTIMATE Mario fan! You are absolutely amazing!</p>";
		break;
	case $tries[1]<=5: //if 2-5 answers are wrong
		echo "<p>You know Mario pretty well, but you've missed a few questions. That is alright, you are still great!</p>";
		break;
	case $tries[1]<=9: //if 6-9 answers are wrong
		echo "<p>You do not know very much about Mario! You should play more Mario games!</p>";
		break;
	case $tries[1]<=10: //if 10 answers are wrong
		echo "<p>You do not know ANYTHING about Mario! How dare you!</p>";
		break;
}

echo "<p>You correctly answered " . $tries[0] . " out of " . $totalNumQuestions . " questions.</p>";

require_once("footer.php");