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
<?php
	include '../shared/db_connect.php';

	session_start();

		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$pass = $_POST['pass'];
	if(empty($fname)|| empty($lname)|| empty($email)|| empty($pass)){
		print(	'<h1>Register Below: </h1>
		<p><strong> Please fill in all information before submitting </strong></p>
			<form action = "registration.php" method= "POST">
			<!--form for inputs for registration-->
				<input type ="text" name = "fname" placeholder ="Enter First Name"><br><br>
				<input type ="text" name = "lname" placeholder ="Enter Last Name"><br><br>
				<input type ="email" name = "email" placeholder ="Enter Email"><br><br>
				<input type ="text" name = "pass" placeholder ="Enter Password"><br><br>
				<button type ="submit">Sign Up</button>
			</form>');

	}else{
		
		$query = "INSERT INTO Users (FirstName, LastName, Email, Password) VALUES ('$fname', '$lname', '$email', '$pass')";
		$query2 = "SELECT * FROM Users WHERE Email = '$email'";

		if(!($result2=mysql_query($query2,$database))){
			die("<p> Could not execute query </p>".mysql_error());
		}
		if(mysql_num_rows($result2) > 0){
			print(	'<h1>Register Below: </h1>
			<p><strong>Email already used, please use another one! </strong></p>
			<form action = "registration.php" method= "POST">
			<!--form for inputs for registration-->
				<input type ="text" name = "fname" placeholder ="Enter First Name"><br><br>
				<input type ="text" name = "lname" placeholder ="Enter Last Name"><br><br>
				<input type ="email" name = "email" placeholder ="Enter Email"><br><br>
				<input type ="text" name = "pass" placeholder ="Enter Password"><br><br>
				<button type ="submit">Sign Up</button>
			</form>');
		}else 
			if(!($result=mysql_query($query,$database))){
			die("<p> Could not execute query </p>".mysql_error());
		}else{
			echo("<p>Registered! Please click the following link to go login: </p><a href='home.php'>LOGIN</a>");
		}
		mysql_close();
	}
	
	
?>
</div>
	<footer class="homefooter">
			<p>Website created by Su Gao. It is assignment 2 part 1 for COMP466.</p>
			</footer>
	</body>
</html>
