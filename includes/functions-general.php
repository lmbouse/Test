<?php
/*
	======================================
			  F U N C T I O N S - General
	======================================
	Table of Contents
		absolute_url
		send_email
*/

	//This function determines and returns an absolute URL.
	//It takes one argument, the page that concludes the URL. Defaults to index.
	function absolute_url($page = 'index.php')
	{
		$url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
		
		$url = rtrim($url, '/\\');
		$url .= '/' . $page;
		
		return $url;
	}
	
	//http://www.daniweb.com/web-development/php/threads/8158/array-to-string
	function displayErrors($errArray)
	{
		if (count($errArray) > 0) {
		
			$string = implode(',', array_values($errArray));
			// foreach ($errArray as $val) {
				// $string .= $val."<br />\n";
			// }
			return $string;
		} 
		else {
			return false;
		}
	}

	//send Email
	//http://www.w3schools.com/php/php_secure_mail.asp
	function activation_email($emailTo, $actCode)
	{
		global $lang;
		$msg = $lang['EMAIL_activation.message.1'].$lang['EMAIL_activation.message.2'].$actCode.$lang['EMAIL_activation.message.3'];
	
		//mail(to,subject,message,headers,parameters)
		mail($emailTo, $lang['EMAIL_activation.subject'], $msg);
	}
?>