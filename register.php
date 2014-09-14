<?php
  
/*****************************************
 *                PANACEA                *
 *           REGISTRATION PAGE           *
 *                                       *
 *=======================================*
 *                                       *
 *   DEVELOPED BY: LEANA BOUSE           *
 *   LAST UPDATED: 11/15/2012            *
 * ..................................... *
 *                                       *
 * INCLUDED FILES:                       *
 *   header.php                          *
 *   footer.php                          *
 *   common.php                          *
 *   lang.php                            *
 *                                       *
 *****************************************/
  /********************
   * INCLUDES *
   ********************/
  include 'includes/common.php';
  
  /******************
   *  DECLARATIONS  *
   ******************/
  $root = '';
  $pageTitle = $lang['Site_name'] . $lang['Registration_title'];
  
  /******************************************
   * CSS & JS INCLUDES TO BE USED IN HEADER *
   ******************************************/
  $cssA = '<link rel="stylesheet" type="text/css" href="'.$root.'css/main-layout.css">';
  $cssB = '<link rel="stylesheet" type="text/css" href="'.$root.'css/register-layout.css">';
  $cssIncludes = array($cssA, $cssB);
  
  /******************
   * OTHER INCLUDES *
   ******************/
  include "header.php";
?>

<script src="js/register.js" type="text/javascript"></script>
    <div class="register">
<?php
  if(!isset($_POST['action'])){ $action = 'none'; }
  else{ $action = $_POST['action']; }
  
  if($action == "none")
  {
	include "register-form.php";
  }
  if($action == "VALID")
  {
		$errCnt = 0;
	//Presence check - make sure all parts of the form are present.
	//Then trim the incoming data.
		$trimmed = array_map('trim', $_POST);
		
		if(isset($trimmed['email'])){ 
			$pEmail = mysql_real_escape_string($trimmed['email']);
		}
		else{
			$errors[$errCnt] = "Email field empty.<br />";
			$errCnt++;
		}
		
		if(isset($trimmed['password'])){ $pPassword = mysql_real_escape_string($trimmed['password']); }
		else{
			$errors[$errCnt] = "Password field empty.<br />";
			$errCnt++;
		}
		
		if(isset($trimmed['password']) && isset($trimmed['password-confirm'])){ $pConfirm = mysql_real_escape_string($trimmed['password-confirm']); }
		else{
			$errors[$errCnt] = "Confirm password.<br />";
			$errCnt++;
		}
		
		if(!isset($_POST['agree-tos'])){
			$errors[$errCnt] = "You must agree to the TOS before signing up.<br />";
			$errCnt++;
		}
		
		if(!isset($_POST['agree-coppa'])){
			$errors[$errCnt] = "You must be 13 years old or older to sign up.<br />";
			$errCnt++;
		}
		
	//Check the email for errors, and register them as errors if there are any.
		switch(check_useremail($pEmail))
		{
			case 1:
				$errors[$errCnt] = $lang['ERROR_email.01'];
				$errCnt++;
				break;
			case 2:
				$errors[$errCnt] = $lang['ERROR_email.02'];
				$errCnt++;
				break;	
		}
	//Password must have at least one uppercase, one lower case, one number, and be 6 chars long.
		switch(check_password($pPassword))
		{
			case 1:
				$errors[$errCnt] = $lang['ERROR_password.01'];
				$errCnt++;
				break;
		}
		
		if($errCnt > 0)
		{
			echo '<div class="register-errors">';
			for($i = 0; $i < count($errors); $i++)
			{ echo $errors[$i]; }
			echo '</div>';
			
			include "register-form.php";
		}
		else{
			//Okay, let's create the account!						
			switch(create_user($pEmail, $pPassword))
			{
				case 1: echo $lang['ERROR_create_user.01']; break;
				default: echo $lang['SUCCESS_create_user']; break;
			}

		}
  }
  
?>

	</div><!--END div.register-->	
<?php

  /*******************
   * FOOTER INCLUDES *
   *******************/
  include "footer.php";
?>
