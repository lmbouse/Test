<?php
//Referenced from page 331 of "PHP6 and Mysql5" by Larry Ullman

//This function determines and returns an absolute URL.
//It takes one argument, the page that concludes the URL. Defaults to index.
	function absolute_url($page = 'index.php')
	{
		$url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
		
		$url = rtrim($url, '/\\');
		$url .= '/' . $page;
		
		return $url;
	}
	
//Verify form data
	function check_logins($username = '', $pass = '')
	{
		$errors = array();
		$success = FALSE;
		
		if( !empty($_POST['username']) )
		{ $lUsername = mysql_real_escape_string($_POST['username']); }
		else{
			$lUsername = FALSE;
			$errors[$errCnt] = "Username not entered.";
			$errCnt++;
		}
		
		if( !empty($_POST['password']) )
		{ $lPassword = mysql_real_escape_string($_POST['password']); }
		else{
			$lPassword = FALSE;
			$errors[$errCnt] = "Password not entered.";
			$errCnt++;
		}		
		
		if(empty($errors))
		{
			$sql = "SELECT user_id, user_name FROM ".USER_TABLE." 
					WHERE user_name = '".$lUsername."' AND user_password = '".SHA1($lPassword)."'";
			
			if( !($result = mysql_query($sql)) )
			{ die ("Could not query the database: " . mysql_error()); }
			
			if(mysql_num_rows($result) == 1)
			{ //A match was made
				$row = mysql_fetch_array($result, MYSQL_ASSOC);
				return array(true, $row);				
			}
			else{
				$errors[$errCnt] = "Username and password do not match.";
				$errCnt++;
			}
		}
		
		return array(false, $errors);
	}	

?>