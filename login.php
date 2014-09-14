<?php
/*****************************************
 *                PANACEA                *
 *              LOGIN  PAGE              *
 *                                       *
 *=======================================*
 *                                       *
 *   DEVELOPED BY: LEANA BOUSE           *
 *   LAST UPDATED: 11/18/2012            *
 *                                       *
 *****************************************/
   /********************
   * GENERAL INCLUDES *
   ********************/
  $root = '';
  include 'includes/common.php';
  
  /******************
   *  DECLARATIONS  *
   ******************/
  $pageTitle = $lang['Site_name'] . $lang['Login_title'];
  
  /******************************************
   * CSS & JS INCLUDES TO BE USED IN HEADER *
   ******************************************/
  $cssA = '<link rel="stylesheet" type="text/css" href="'.$root.'css/main-layout.css">';
  $cssB = '<link rel="stylesheet" type="text/css" href="'.$root.'css/login-layout.css">';
  $cssIncludes = array($cssA, $cssB);
  
	/************************
	 * SET UP LOGIN COOKIES *
	 ************************/
	if(!isset($_POST['action'])){ $action = 'none'; }
	else{ $action = $_POST['action']; }
	
	// $errors['message'] = "";
	// $errors['errCnt'] = 0;
		
	if($action == 'VALID')
	{
		echo 'Form submitted.<br />';
		$error = check_userlogin($_POST['email'], $_POST['password']);
		
		if(is_array($error))	
		{
			//Set the cookies
			setcookie('user_email', $_POST['email'], false, "/");
			// setcookie('username', $data['user_name'], false, "/");
			
			// $url = absolute_url($root.$_POST['redirect']);
			// header("Location: $url");
			// exit();
		}
		
	}//end if($action == 'login')  
  
   /******************
   * OTHER INCLUDES *
   ******************/
  include "header.php";
?>
	<script src="js/register.js" type="text/javascript"></script>
	<div id="content">
    <div id="login">
		<div class="login-header">
			LOGIN
		</div>
		<div class="login-info">
<?php
	if($action == "none")
	{
		include "login-form.php";
	}
	else if(!is_array($error) && !empty($error))
	{
		echo 'Errors.<br />';
		echo print_login_error($error);
		
		include "login-form.php";
	}
	else if(isset($_COOKIE['user_email']) || is_array($error)){
		echo "You are now logged in,".$userdata['user_email']."!";
	}
	else{ echo "Something strange just happened. Screencap and email to Admin."; }
?>	
	</div><!--END div.login-info-->
	</div><!--END div.login-->
	</div><!--END div.content-->
<?php
  include "footer.php";
?>