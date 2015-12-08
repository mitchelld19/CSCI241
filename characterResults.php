<?php
require_once("header.php");
require_once("common.php");
require_once("combination.php");
?>
	<header>
		<h1>Character Quiz Results</h1>
		<nav>
			<ul>
				<li id="home"><a href="index.php">Home</a></li>
				<li id="create"><a href="create.php">Create</a></li>
				<li id="mario"><a href="mario.php">Mario Quiz</a></li>
				<li id="character"><a href="character.php">Charater Quiz</a></li>
			</ul>
		</nav>	
	</header>
	<h2 class="result2">What character are you?</h2>
<?php

$tally = explode("|", $_SESSION["characters"]); //[0]= $mario, [1]=$yoshi, [2]=$donkey, [3]=$peach
$total = count(readQuestions("characterQuestions.txt")); //reading the characterQuestions.txt file and counting its contents

//Calculating percentage for each character
$marioPercent = number_format(((int)$tally[0]/$total)*100, 2);
$yoshiPercent = number_format(((int)$tally[1]/$total)*100, 2);
$donkeyPercent = number_format(((int)$tally[2]/$total)*100, 2);
$peachPercent = number_format(((int)$tally[3]/$total)*100, 2);

//checking to see what the largest value is from characters
$largestValue = max($marioPercent, $yoshiPercent, $donkeyPercent, $peachPercent);

//checking for combinations
combinationCheck($largestValue, $marioPercent, $yoshiPercent, $peachPercent, $donkeyPercent);

echo "<h2>Percentage Breakdown for each character:</h2>";
echo "<p>Mario: " . $marioPercent . "%</p>";
echo "<p>Yoshi: " . $yoshiPercent . "%</p>";
echo "<p>Donkey Kong: " . $donkeyPercent . "%</p>";
echo "<p>Princess Peach: " . $peachPercent . "%</p>";


require_once("footer.php");