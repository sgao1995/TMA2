<?php
	session_start();

?>
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
		<h1>Please Log In Below: </h1>
			<form action = "login.php" method= "POST">
			<!--form for inputs for login-->
				<input type ="email" name = "email" placeholder ="Enter Email"><br><br>
				<input type ="text" name = "pass" placeholder ="Enter Password"><br><br>
				<button type ="submit">Log In</button>
			</form>
			<p><strong>OR </strong></p><a href="register.php">register</a>
		</div>
		<footer class="homefooter">
			<p>Website created by Su Gao. It is assignment 2 part 1 for COMP466.</p>
		</footer>
	</body>
	
</html>

