<?php
/*
	======================================
			  DATABASE  C L A S S
	======================================
	
	Table of Contents
		insert($tableName, $col, $values)
		select($tableName, $where)
		selectOrderBy($tableName, $where, $orderBy)
		function update($tableName, $colAndValues, $where)
		
*/

class Database {
	function insert($tableName, $col, $values)
	{
		$sql = "INSERT INTO ".$tableName." ( ".$col." )
				VALUES (".$values.")";
				
		if( !($result = mysql_query($sql)) )
		{ die ("Insert error:<br />".$sql." <br />Could not query the database: " . mysql_error()); return false; }
		else{ return true; }
	}
	
	function select($tableName, $where)
	{
		$sql = "SELECT * FROM ".$tableName." 
				WHERE ".$where."";
		if( !($result = mysql_query($sql)) )
		{ die ("Select error:<br />".$sql." <br />Could not query the database: " . mysql_error()); }
		else{ return $result; }
	}
	
	function selectOrderBy($tableName, $where, $orderBy)
	{
		$sql = "SELECT * FROM ".$tableName." 
				WHERE ".$where." ORDER BY ".$orderBy."";
		if( !($result = mysql_query($sql)) )
		{ die ("Select Order By error:<br />".$sql." <br />Could not query the database: " . mysql_error()); }
		else{ return $result; }
	}
	
	function update($tableName, $colAndValues, $where)
	{
		$sql = "UPDATE ".$tableName." SET ".$colAndValues." 
				WHERE ".$whereAttrib." = '".$whereEquals."'";
		if( !($result = mysql_query($sql)) )
		{ die ("Update error:<br />".$sql." <br />Could not query the database: " . mysql_error()); }
		else{ return $result; }
	}
}

?>