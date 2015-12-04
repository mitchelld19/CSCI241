<?php

session_start();

function readQuestions($filename)
{
	$fileResource = fopen($filename, "r");
	
	if(!is_resource($fileResource))
	{
		exit("Could not open file.");
	}
	
	$questions = array();
	
	while($line  = fgets($fileResource))
	{
		$questions[] = $line;
	}
	
	fclose($fileResource);
	
	return $questions;
}

function appendQuestion($filename, $line)
{
	$fileResource = fopen($filename, "a");
	
	if(!is_resource($fileResource))
	{
		exit("Could not open file.");
	}
	
	fwrite($fileResource, $line);
	
	fclose($fileResource);
	
	return null;
	
}

function deleteQuestion($filename, $line)
{
	$questions = readQuestions($filename);
	
	unset($questions[$line]);
	
	$fileResource = fopen($filename, "w");
		
	if(!is_resource($fileResource))
	{
		exit("Could not open file.");
	}
	
	foreach($questions as $line)
	{
		fwrite($fileResource, $line);
	}	
	
	fclose($fileResource);
	
	return null;
	
}