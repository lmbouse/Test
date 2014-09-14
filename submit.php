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
	?>
	</td></tr></table>	
	
	<center>

	<?php
	
		include('common.php');
			
		$title = $_POST['title'];
		$desc = $_POST['desc'];
		$summary = $_POST['summary'];
		$action = ( $_POST['action'] | $_GET['action'] | NULL );
		
		if($action == 'delete')
		{
			$storyid = $_GET['storyid'];
			
			$sql = " DELETE FROM original WHERE story_id='$storyid'";
			if (!mysql_query($sql))
			{ die('Error: ' . mysql_error()); }
			echo "Story deleted.";
		}
		elseif( $title && $desc && $summary )
		{			
			$summary = htmlspecialchars(strip_tags($summary), ENT_QUOTES);
			
			if($action == 'new')
			{
				$sql = "INSERT INTO original (title, description, summary) VALUE ( '$title', '$desc', '$summary' )";
				if (!mysql_query($sql))
				{ die('Error: ' . mysql_error()); }
				echo "Story submitted.";
			}
			else
			{
				$storyid = $_POST['storyid'];
				$sql = "UPDATE original SET title='$title', description='$desc', summary='$summary' WHERE story_id='$storyid'";
				if (!mysql_query($sql))
				{ die('Error: ' . mysql_error()); }
				echo "Story edited.";			
			}
		}
		else
		{
			echo "Error.";
		}
	
	?>
		<p><a href="index.php">Back to Index</a></p>
	</center>
</body>
</html>