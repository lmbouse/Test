<?php
/*
	======================================
			  F U N C T I O N S
	======================================
	Table of Contents
	  *Exist Functions
		userid_exist($checkThis) 		T/F
		useremail_exist($checkThis)		T/F
		charname_exist($checkThis)		T/F
		charid_exist($checkThis)		T/F
	  *Check Functions
		check_useremail($checkThis)
			Error Codes:
			0: no error
			1: Not valid email
			2: User email exists already
		check_password($checkThis)
			ErrorCodes:
			0: No error
			1: Password Invalid format
		
*/

	//=======================================================================================
	//Exist functions
	//Checks whether or not a certain user or character exists, by name email or id.
	//Requires "common.php" to be included before this file.
	//=======================================================================================
	function userid_exist($checkThis)
	{
		$sql = "SELECT * FROM ".USER_TABLE." WHERE user_id = '".$checkThis."'";
		if( !($result = mysql_query($sql)) )
		{ die ("Could not query the database: " . mysql_error()); }
		
		if( mysql_num_rows($result) > 0 ){ return false; }
		else { return true; }
	}
	
	function useremail_exist($checkThis)
	{
		$sql = "SELECT * FROM ".USER_TABLE." WHERE user_email = '".$checkThis."'";
		if( !($result = mysql_query($sql)) )
		{ die ("Could not query the database: " . mysql_error()); }
		
		if( mysql_num_rows($result) <= 0 ){ return false; }
		else { return true; }
	}
	
	function charname_exist($checkThis)
	{
		$sql = "SELECT * FROM ".CHARACTER_TABLE." WHERE char_name = '".$checkThis."'";
		if( !($result = mysql_query($sql)) )
		{ die ("Could not query the database: " . mysql_error()); }
		
		if( mysql_num_rows($result) <= 0 ){ return false; }
		else { return true; }
	}
	
	function charid_exist($checkThis)
	{
		$sql = "SELECT * FROM ".CHARACTER_TABLE." WHERE char_id = '".$checkThis."'";
		if( !($result = mysql_query($sql)) )
		{ die ("Could not query the database: " . mysql_error()); }
		
		if( mysql_num_rows($result) > 0 ){ return false; }
		else { return true; }
	}
	
	//=======================================================================================
	// Check Functions
	//=======================================================================================
	
	//Checks if email address is valid format and exists.
	//Returns error code
	//0: no error
	//1: Not valid email
	//2: User Email exists
	function check_useremail($checkThis)
	{
		if(preg_match("/^[a-zA-Z0-9_\-]+[\.]?[a-zA-Z0-9_\-]*[@]{1}[a-zA-Z0-9_\-]+[\.]?[a-zA-Z0-9_\-]*[.]{1}[a-zA-Z0-9_]+$/", $checkThis))
		{
			if(!useremail_exist($checkThis)){ return 0; }
			else{ return 2; }
		}
		else{ return 1; }
	}
	
	//Checks if password is valid.
	//Passwords must have atleast 6 characters, one uppercase, one lowercase, and one number.
	//Returns error code
	//0: No error
	//1: Password valid error
	function check_password($checkThis)
	{
		if( preg_match( '/^.*(?=.{6,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/', $checkThis ) )
		{ return 0; }
		else { return 1; }
	}
	
	 function print_login_error($errCode)
	 {
		$err;
		
		switch($errCode)
		{
			case 0: $err = 'No error.<br />';
				break;
			case 1: $err = $lang['ERROR_login.01'] . "<br />";
				break;
			case 2:	$err = $lang['ERROR_login.02'] . "<br />";
				break;
			case 3:
				$err = 'Password does not match.<br />';
				break;
			case 4: $err = 'Email does not exist.<br />';
				break;
			default:
				$err = 'Unknown error code.';
				break;
		}
		
		return $err;
	 }
	 
	 function return_one($email, $pass)
	 { 
		if(!empty($email))
		{ return 2; }
		{ return 1; }
		
		return 0;
	}
	 
	function check_userlogin($email, $pass)
	{
		global $db;
		
		if(!empty($email))
		{ $lEmail = mysql_real_escape_string($email); }
		else{
			// $errors[1] .= $lang['ERROR_login.01'] . "<br />";
			// $errors[0]++;
			$rtnCode = 1;
		}
		
		if(!empty($pass))
		{ $lPassword = mysql_real_escape_string($pass); }
		else{
			// $errors[1] .= $lang['ERROR_login.02'] . "<br />";
			// $errors[0]++;
			$rtnCode = 2;
		}
		
		
		// if($rtnCode == 0)
		// {	
			if(useremail_exist($lEmail))
			{
				$r = $db->select(USER_TABLE, "user_email = '".$lEmail."' AND user_password = '".SHA1($lPassword)."'");			
				if(mysql_num_rows($r) == 1)
				{ //A match was made
					$row = mysql_fetch_array($r, MYSQL_ASSOC);
					return array(true, $row);				
				}
				else{ 
					// $errors[1] .= 'Password does not match.<br />'; $errors[0]++; 
					$rtnCode = 3;
				}
			}
			else{
				// $errors[1] .= 'Email does not exist.<br />';
				// $errors[0]++;
				$rtnCode = 4;
			}
		// }
		
		// if(!$loginCheck)
		// { $errors[$errCnt++] = $lang['ERROR_login']; }
		return rtnCode;
	}

	//=======================================================================================
	// Login Functions
	//=======================================================================================

	//check to see if the user can log in
	//Input: User Id
	//Output: Array(true|false, "Error Message")
	function can_userLogIn($userId)
	{
		global $db;

		$r = $db->select(USER_TABLE, "user_id ='".$userId."'");
		if(mysql_num_rows($r) == 1)
		{//A match was made
			$row = mysql_fetch_array($r, MYSQL_ASSOC);
			switch($row['user_group'])
			{
				case SUSPENDED:
					return array(false, "Your account is temporarily suspended.");
					break;
				case BANNED:
					return array(false, "Your accound is permanently banned.");
					break;
				default:
					return array(true, "");
					break;
			}	
		}
		else{ return array(false, "ERROR.<br />User not found."); }
	}

	function is_userAdmin($userId)
	{
		global $db;

		$r = $db->select(USER_TABLE, "user_id ='".$userId."'");
		if(mysql_num_rows($r) == 1)
		{
			if($row['user_group'] == ADMIN)
			{ return true; }
			else{ return false; }
		}
		else{ return false; }
	}

	function is_userModerator($userId)
	{
		global $db;

		$r = $db->select(USER_TABLE, "user_id ='".$userId."'");
		if(mysql_num_rows($r) == 1)
		{
			if($row['user_group'] == MODERATOR || $row['user_group'] == SUPERMOD)
			{ return true; }
			else{ return false; }
		}
		else{ return false; }
	}

	function is_userSuperMod($userId)
	{
		global $db;

		$r = $db->select(USER_TABLE, "user_id ='".$userId."'");
		if(mysql_num_rows($r) == 1)
		{
			if($row['user_group'] == SUPERMOD)
			{ return true; }
			else{ return false; }
		}
		else{ return false; }
	}

	function is_userPremium($userId)
	{
		global $db;

		$r = $db->select(USER_TABLE, "user_id ='".$userId."'");
		if(mysql_num_rows($r) == 1)
		{
			if($row['user_group'] == PREMIUM)
			{ return true; }
			else{ return false; }
		}
		else{ return false; }
	}
?>