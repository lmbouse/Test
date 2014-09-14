<?php

/*****************************************
 *                PANACEA                *
 *       COMMON CONSTANT DECLARATIONS    *
 *=======================================*
 *                                       *
 *   DEVELOPED BY: LEANA BOUSE           *
 *   LAST UPDATED: 12/04/2012            *
 *****************************************/
 /************************
 * Class Includes *
 ************************/
 include 'database.php';
 include 'constants.php';
 
 /************************
 * Init *
 ************************/
 $lang = array();
 $db = new Database();
  
 /************************
 * Includes *
 ************************/  
 include 'functions_database.php';
 include 'functions_validations.php';
 include 'functions-general.php';
 include 'lang.php';

/************************
 * INDEX PAGE CONSTANTS *
 ************************/
  define('MAX_NEWS_DISPLAY', 7);
  define('MAX_PLAYER_DISPLAY', 10);

/********************
 *  SQL CONNECTION  *
 ********************/
 define('SQLUSER', 'eterne');
 define('SQLPASSWORD', 'N2%!Wrr');
 
$con = mysql_connect('localhost', SQLUSER, SQLPASSWORD);
if (!$con)
{ die('Could not connect: ' . mysql_error()); }

mysql_select_db("eterne", $con);

/**************
 * SQL TABLES *
 **************/
   define("USER_TABLE", "users");
   define("USER_GROUPS_TABLE", "user_groups");
   define("CHARACTER_TABLE", "characters");
   define("ACTIVATION_TABLE", "activate");
   
   // define("CLASS_TABLE", "class");
   // define("ITEM_TABLE", "item");
   // define("MAP_TABLE", "map");
   // define("MOB_TABLE", "monster");
   // define("MOB_INSTANCE_TABLE", "mobinstance");
   // define("NEWS_TABLE", "news");
   // define("EXP_CHART_TABLE", "expchart");
   
/***********
 * MAP IDs *
 ***********/
   define( "TRAIN01", 1);
   
/**************
 * MAP IMAGES *
 **************/
	define("MAP-TRAIN01", "map-train01.png");

/*****************
 * JOB CLASS IDs *
 *****************/
   define("NOVICE_CLASS", 5);

/*****************
 *    COOKIES    *
 *****************/
	$userdata = array('online' => false ,'user_email' => '', 'user_id' => 0);
	
	if( !empty($_GET) && $_GET['action'] == 'logout' )
	{
		setcookie('user_email', "", time() - 3600, "/");
		// setcookie('user_id', "", time() - 3600, "/");

		$url = absolute_url($root.'index.php');
		header("Location: $url");
		exit();
	}
	
	if( isset($_COOKIE['user_email']) )
	{	
		$userdata['user_email'] = $_COOKIE['user_email'];
		// $userdata['user_id'] = $_COOKIE['user_id'];
		$userdata['online'] = true;
	}
	else{
		$userdata['online'] = FALSE;
		$userdata['user_email'] = '';
		// $userdata['user_id'] = 0;
	}
	
/*****************
 *    COOKIES    *
 *****************/
?>