<?php
	$dbms = 'mysqli';
	$dbhost = 'localhost';
	$dbport = '3306';
	$dbname = 'wwmanager';
	$dbuser = 'root';
	$dbpasswd = '';
	$acm_type = 'file';
	$load_extensions = '';
	
	//Connect to Database
	mysql_connect($dbhost, $dbuser, $dbpasswd, $dbname, $dbport);
	$con = mysql_connect($dbhost,$dbuser,$dbpasswd);
	if (!$con)
	{ die('Could not connect: ' . mysql_error()); }		
	mysql_select_db($dbname, $con);
	
	//Misc Repeated Layout Pieces
	$border = "==================================================================================";
	
	//bbcode
	$bbcodes = array('[b]','[/b]','[i]','[/i]','[u]','[/u]');
	$bbcode_replace = array('<b>','</b>','<i>','</i>','<u>','</u>');
?>