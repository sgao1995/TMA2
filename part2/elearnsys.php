<?php
	session_start();

?>
<!DOCTYPE html>

<html>
	<head>
		<title>E-learning system</title>
		<link rel="stylesheet" type="text/css" href="../shared/style.css">
		<meta charset="utf-8">
	</head>
	
	<body class="homebody">
	<header class="homeheader"> 
			<h1 class="headerLink"><a href=#>ELEARN UNIVERSITY</a></h1>
			
		</header>
	
		<div class="homecontent">	
			<h1>Welcome to Elearn University</h1>
			<h2>Please select a course to begin: </h2>
			<form action = "course.php" method= "POST">
				<input type="hidden" name="cID" value="1">
				<button type ="submit">COMPUTER SCIENCE 466</button>
			
			</form>
		</div>
		<footer class="homefooter">
			<p>Website created by Su Gao. It is assignment 2 part 2 for COMP466.</p>
		</footer>
	</body>
	
</html>

