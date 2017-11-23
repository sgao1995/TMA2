
<!DOCTYPE html>

<html>
	<head>
		<title>Bookmark App Login</title>
		<link rel="stylesheet" type="text/css" href="../shared/style.css">
		<meta charset="utf-8">
		
	</head>
	
	<body class="homebody">
		<header class="homeheader"> 
			<h1 class="headerLink"><a href=#>Bookmarking App</a></h1>	
		</header>
	
		<div class="homecontent">	
		<a href="logout.php">Click Here to Log Out</a>
			<h1>Hello! Here are your bookmarks: </h1>

		
<?php
	include '../shared/db_connect.php';
	session_start();
	if(!isset($_SESSION['UserID'])){
		header("Location:home.php");
	}
	$user=$_SESSION['UserID'];
	
	$query = "SELECT * FROM Bookmarks WHERE UserID = '$user'";

	if(!($result=mysql_query($query,$database))){
		die("<p> Could not execute query </p>".mysql_error());
	}
	echo '<div class="bmtable"><form action="deleteBM.php" method ="post">';
	while($row = mysql_fetch_assoc($result)){//used this to know to use target to open new window/tab when clicking link: http://stackoverflow.com/questions/18870366/how-to-make-php-image-link-open-in-a-new-window
		echo '
			<input type="checkbox" name="BM[]" value='.$row['BmID'].'>
			<a href='.$row['URL'].' class="bookmark" target="_blank">'.$row['URL'].'</a><br><br>
		';
		
	}
	echo '<input type = "submit" value="Delete Selected Bookmarks!">';

	echo '</form></div><br>';
	mysql_close();
	
?>	

	
	<!--add button to add new bookmarks-->
	<form action ="addBM.php" method ="post">
		Type in URL to bookmark: <input type = "URL" name = "url">
		<input type = "submit" value="Add Bookmark!">
	</form>
	</div>
	<footer class="homefooter">
			<p>Website created by Su Gao. It is assignment 2 part 1 for COMP466.</p>
		</footer>
	</body>
	
</html>
