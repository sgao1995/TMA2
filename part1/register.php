<?php
	session_start();
?>
<!DOCTYPE html>

<html>
	<head>
		<title>Bookmark App Register</title>
		<link rel="stylesheet" type="text/css" href="../shared/style.css">
		<meta charset="utf-8">
	</head>
	
	<body class="homebody">
			<header class="homeheader"> 
			<h1 class="headerLink"><a href="../tma2.htm">Bookmarking App</a></h1>
			
			</header>
	
			<div class="homecontent">	
			<h1>Register Below: </h1>
			<form action = "registration.php" method= "POST">
			<!--form for inputs for registration-->
				<input type ="text" name = "fname" placeholder ="Enter First Name"><br><br>
				<input type ="text" name = "lname" placeholder ="Enter Last Name"><br><br>
				<input type ="email" name = "email" placeholder ="Enter Email"><br><br>
				<input type ="text" name = "pass" placeholder ="Enter Password"><br><br>
				<button type ="submit">Sign Up</button>
			</form>
			</div>
			<footer class="homefooter">
			<p>Website created by Su Gao. It is assignment 2 part 1 for COMP466.</p>
			</footer>
	</body>
</html>
