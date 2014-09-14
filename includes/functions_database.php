<?php
/*
	======================================
			  F U N C T I O N S
	======================================
	Table of Contents
		create_user($email, $password)
			Error codes:
			1: Inserting User table
			2: Creating activation code
*/

	//User email, password
	// 1: Inserting User table
	// 2: Creating activation code
	function create_user($email, $password)
	{
		global $db;
		
		//$tableName, $col, $values
		if( !($db->insert(USER_TABLE, "user_email, user_password", "'".$email."', '".SHA1($password)."'")) )
		{ return 1; }
		
		//Get that user's userID
		$r = $db->select(USER_TABLE, "user_email = '".$email."'");
		$a = mysql_fetch_array($r);
		$userid = $a['user_id'];
		
		//Create an activation code
		if( !($db->insert(ACTIVATION_TABLE, "user_id, user_email, act_code", "'".$userid."', '".$email."', '".SHA1($email)."'")) )
		{ return 2; }
		
		//Send activation email.
		activation_email($email, SHA1($email));
		return 0;
	}

	//
	function create_character($userid, $charname, $chargender)
	{
	
	}
?>