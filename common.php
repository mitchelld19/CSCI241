<?php
session_start(); //starts a session

//reads a file and returns its contents
function readEvents($filename)
{
	$fileResource = fopen($filename, "r");
	
	if(!is_resource($fileResource))
	{
		exit("Could not open the file for reading.");
	}
	
	$events = array();
	
	while($line  = fgets($fileResource))
	{
		$events[] = $line;
	}
	
	fclose($fileResource);
	
	return $events;
}

function appendEvent($filename, $line)
{
	$fileResource = fopen($filename, "a");
	
	if(!is_resource($fileResource))
	{
		exit("Could not open the file for reading.");
	}
	
	fwrite($fileResource, $line);
	
	fclose($fileResource);
	
	return null;
	
}
function deleteEvent($filename, $line)
{
	$events = readEvents($filename);
	
	unset($events[$line]);
	
	$fileResource = fopen($filename, "w");
		
	if(!is_resource($fileResource))
	{
		exit("Could not open the file for reading.");
	}
	
	foreach($events as $eventLine)
	{
		fwrite($fileResource, $eventLine);
	}	
	
	fclose($fileResource);
	
	return null;
	
}