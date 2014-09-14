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
	
	<table align="center" width="600">
	<tr><td><b>Title:</b> <?php echo $row['title']; ?></td><td><b>Description:</b> <?php echo $row['description']; ?></td></tr>
	<tr><td colspan="2"><b>Summary:</b></td></tr>
	<tr><td colspan="2"><?php echo nl2br(str_ireplace($bbcodes,$bbcode_replace,$row['summary'])); ?></td></tr>
	</table>
	
	

</body>

</html>