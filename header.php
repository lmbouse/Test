<html>
<head>
    <title><?php echo $pageTitle; ?></title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>	
<?php
    if(is_array($cssIncludes))
	{
	  for($i = 0; $i < count($cssIncludes); $i++)
	  { echo $cssIncludes[$i]; }
	}
	else{
		echo $cssIncludes;
	}	
?>
</head>
<body>
    <div id="main">
        <div id="header"><img src="<?php echo $root; ?>images/beta-header3.png" /></div><!--END div.header-->

        <div id="logo">
            <a href="<?php echo $root; ?>index.php"><img src="<?php echo $root ?>images/eterne-logo.png"></a>
        </div><!--END div.logo-->

        <div id="menu">
<?php
	if( isset($_COOKIE['user_email']) )
	{
		echo "Hello, ".$userdata['user_email']."!<br />";
		echo '<a href="'.$root.'index.php?action=logout">Logout</a>';
	}
	else{
		echo '<a href="login.php">Login</a> | <a href="register.php">Register</a><br />';
	}
?>
            <a href="<?php echo $root ?>game/index.php"><img src="<?php echo $root ?>images/menu-play.png" /></a><br /><br />
            <a href="<?php echo $root ?>index.php"><img src="<?php echo $root ?>images/menu-home.png"></a><br /><br /><br />
            <img src="<?php echo $root ?>images/menu-guide.png"><br />
                <div class="links">
                    <a href="<?php echo $root ?>guide/howtoplay.php">How to Play</a><br />
                    <br /><br />
                </div>
            <img src="<?php echo $root ?>images/menu-support.png"><br />
                <div class="links">
                    <a href="<?php echo $root ?>support/faq.php">FAQ</a><br />
                    <a href="<?php echo $root ?>support/contact.php">Contact</a><br /><br />
                </div>
        </div><!--END div.menu-->