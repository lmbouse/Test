<html>
<head>
	<title>WEIGHT WATCHER'S MANAGER</title>
	<link rel="stylesheet" type="text/css" href="header.css" /> 	
</head>
<body>
	<?php
		include('common.php');
	?>

	<center>
	<h1>WEIGHT WATCHER'S MANAGER</h1>
	<p>
		<a href="add.php?mode=ingredient">Add an Ingredient</a> | <a href="add.php?mode=recipe">Add a Recipe</a> | 
		<a href="view.php?mode=ingredients">View Ingredients</a> | <a href="view.php?mode-recipes">View Recipes</a>
	</p>
	</center>
	
	
	<form name="ingredient" action="submit.php" method="post">
		<label for="name">Name:</label><input type="text" name="name" />
	
		<input type="hidden" name="action" value="ingredient">
		<input type="submit" value="Add Ingredient" />
	</form>
	
	<form name="orig" action="submit.php" method="post">
	<table align="center">
		<tr><td valign="top">Title: </td><td> <input type="text" name="title" /></td></tr>
		<tr><td valign="top">Short Description: </td><td> <input type="text" name="desc" /></td></tr>
		<tr><td valign="top">Summary: </td><td> <textarea name="summary" cols="70" rows="20"></textarea></td></tr>
		<tr><td colspan="2" align="center"><input type="hidden" name="action" value="new"><input type="submit"></td></tr>
	</table>
	</form>

</body>

</html>