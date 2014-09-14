<html>
<head>
	<title>STORY TIME</title>
	<link rel="stylesheet" type="text/css" href="header.css" /> 	
</head>
<body>
	<table align="center"><tr><td>
	<?php
		include('common.php');
		
		$sql = " SELECT * FROM ascii_art WHERE title='Story Time' ";
		if(!($result = mysql_query($sql)))
		{ die('Error: ' . mysql_error()); }
		
		$row = mysql_fetch_array($result);
		echo "<pre>" .  $row['payload'] . "</pre>";
		echo "<pre>" . $border . "</pre>";
		echo '<p><center><a href="index.php">Main Index</a></center></p>';
		
		$storyid = $_GET['storyid'];
		
		$sql = " SELECT * FROM original WHERE story_id='".$storyid."'";
		if(!($result = mysql_query($sql)))
		{ die('Error: ' . mysql_error()); }
		
		$row = mysql_fetch_array($result);		
	?>
	</td></tr></table>	
	
	<form name="orig" action="submit.php" method="post">
	<table align="center">
		<tr><td valign="top">Title: </td><td> <input type="text" name="title" value="<?php echo $row['title']; ?>" /></td></tr>
		<tr><td valign="top">Short Description: </td><td> <input type="text" name="desc" value="<?php echo $row['description']; ?>" /></td></tr>
		<tr><td valign="top">Summary: </td><td> <textarea name="summary" cols="70" rows="20"> <?php echo $row['summary']; ?></textarea></td></tr>
		<tr><td colspan="2" align="center"><input type="hidden" name="storyid" value="<?php echo $storyid ?>"><input type="hidden" name="action" value="edit"><input type="submit"></td></tr>
	</table>
	</form>

</body>

</html>