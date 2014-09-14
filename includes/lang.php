<?php

/*****************************************
 *                PANACEA                *
 *         LANGUAGE DECLARATIONS         *
 *=======================================*
 *                                       *
 *   DEVELOPED BY: LEANA BOUSE           *
 *   LAST UPDATED: 11/8/2012             *
 *****************************************/


/*****************
 *  PAGE TITLES  *
 *****************/
  $lang['Site_name'] = 'Eterne Online';
  $lang['Index_title'] = '';
  $lang['Registration_title'] = 'Registration';
  $lang['Login_title'] = 'Login';
  $lang['Game_title'] = 'Game';
  
  // define( "SITE_NAME", "Eterne Online");
  // define( "INDEX_TITLE", SITE_NAME );
  // define( "REGISTRATION_TITLE", SITE_NAME." - Registration" );
  // define( "LOGIN_TITLE", SITE_NAME." - Login");
  // define( "GAME_TITLE", SITE_NAME." - Game" );

  /*
	TEMPORARY Messages
  */
  $lang['SUCCESS_create_user'] = 'Thank you for registering! Your activation email should be sent soon.';
  
 /*****************
 *  ERROR MESSAGES  *
 *****************/
 $lang['ERROR_email.01'] = 'Email typed is not a valid email. Please try agian.';
 $lang['ERROR_email.02'] = 'This email already exists in our database. Only one account per email allowed.';
 
 $lang['ERROR_password.01'] = 'Passwords must have at least one uppercase letter, one lowercase letter, one number, and must be at least 6 characters long.';
 
 $lang['ERROR_create_user.01'] = 'User could not be created.';
 
 $lang['ERROR_login'] = 'Email and password to not match.';
 $lang['ERROR_login.01'] = 'Email not present.';
 $lang['ERROR_login.02'] = 'Password not present.';
 /*****************
 *  EMAIL MESSAGES  *
 *****************/
  $lang['EMAIL_activation.from'] = 'donotreply@eterneonline.com';
  $lang['EMAIL_activation.subject'] = 'Eterne Online Account Activation';
  $lang['EMAIL_activation.message.1'] = 'Hello, new user! Welcome to Eterne Online!\nYou registered a new account to this email address,'
										.'and now its time to activate it! Hurray! Just click the link below, and we\'ll get you all set up.\n\n';
  $lang['EMAIL_activation.message.2'] = "localhost\\eterne\\activate.php?code=";
  $lang['EMAIL_activation.message.3'] = '\n\nThank you! Hope to see you soon!\nEterne Staff';
?>