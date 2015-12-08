<?php
function combinationCheck($largestValue, $marioPercent, $yoshiPercent, $peachPercent, $donkeyPercent)
{
	//largest value = 0 
	if($largestValue == 0)
	{
		echo "<p>You are none of the characters! You must not have answered any questions!</p>";
	}
	
	//combination of all characters
	else if($marioPercent == $largestValue && $yoshiPercent == $largestValue && $donkeyPercent == $largestValue && $peachPercent == $largestValue)
	{
		echo "<p>It looks like you are a combination of all four characters!</p>";
		?><img src="images/combo.png" alt="combo"><?php
	}
	
	/* ------3 Combinations------- */	
	//mario, yoshi and donkey
	else if($marioPercent == $largestValue && $yoshiPercent == $largestValue && $donkeyPercent == $largestValue)
	{
		echo "<p>You are a combination of Mario, Yoshi, and Donkey Kong!</p>";
		?><img src="images/combo.png" alt="combo"><?php
	}
	
	//mario, yoshi and peach
	else if($marioPercent == $largestValue && $yoshiPercent == $largestValue && $peachPercent == $largestValue)
	{
		echo "<p>You are a combination of Mario, Yoshi, and Princess Peach!</p>";
		?><img src="images/combo.png" alt="combo"><?php
	}
	
	//mario, peach, donkey
	else if($marioPercent == $largestValue && $peachPercent == $largestValue && $donkeyPercent == $largestValue)
	{
		echo "<p>You are a combination of Mario, Princess Peach, and Donkey Kong!</p>";
		?><img src="images/combo.png" alt="combo"><?php
	}
	
	//peach, donkey, yoshi
	else if($peachPercent == $largestValue && $donkeyPercent == $largestValue && $yoshiPercent == $largestValue)
	{
		echo "<p>You are a combination of Princess Peach, Donkey Kong, and Yoshi!</p>";
		?><img src="images/combo.png" alt="combo"><?php
	}
	
	/* ------2 Combinations------- */	
	//mario peach
	else if($peachPercent == $largestValue && $marioPercent == $largestValue)
	{
		echo "<p>You are a combination of Princess Peach and Mario!</p>";
		?><img src="images/combo.png" alt="combo"><?php
	}
	
	//mario yoshi
	else if($yoshiPercent == $largestValue && $marioPercent == $largestValue)
	{
		echo "<p>You are a combination of Yoshi and Mario!</p>";
		?><img src="images/combo.png" alt="combo"><?php
	}
	
	//mario donkey
	else if($donkeyPercent == $largestValue && $marioPercent == $largestValue)
	{
		echo "<p>You are a combination of Donkey Kong and Mario!</p>";
		?><img src="images/combo.png" alt="combo"><?php
	}
	
	//peach yoshi
	else if($peachPercent == $largestValue && $yoshiPercent == $largestValue)
	{
		echo "<p>You are a combination of Princess Peach and Yoshi!</p>";
		?><img src="images/combo.png" alt="combo"><?php
	}
	
	//peach donkey
	else if($peachPercent == $largestValue && $donkeyPercent == $largestValue)
	{
		echo "<p>You are a combination of Princess Peach and Donkey Kong!</p>";
		?><img src="images/combo.png" alt="combo"><?php
	}
	
	//donkey yoshi
	else if($yoshiPercent == $largestValue && $donkeyPercent == $largestValue)
	{
		echo "<p>You are a combination of Yoshi and Donkey Kong!</p>";
		?><img src="images/combo.png" alt="combo"><?php
	}
	
	/* ------ Only one character ------ */
	//mario
	else if($marioPercent == $largestValue)
	{
		echo "<p>You are most like Mario!</p>";
		?><img src="images/mario.png" alt="mario"><?php
	}
	
	//peach
	else if($peachPercent == $largestValue)
	{
		echo "<p>You are most like Princess Peach!</p>";
		?><img src="images/peach.png" alt="princess peach"><?php
	}
	
	//yoshi
	else if($yoshiPercent == $largestValue)
	{
		echo "<p>You are most like Yoshi!</p>";
		?><img src="images/yoshi.png" alt="yoshi"><?php
	}
	
	//donkey
	else if($donkeyPercent == $largestValue)
	{
		echo "<p>You are most like Donkey Kong!</p>";
		?><img src="images/donkey.png" alt="donkey kong"><?php
	}
}