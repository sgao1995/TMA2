<html>
	<head>
		<title>Bookmark App Login</title>
		<link rel="stylesheet" type="text/css" href="../shared/style.css">
		<meta charset="utf-8">
	</head>
	
	<body class="homebody">
			<header class="homeheader"> 
			<h1 class="headerLink"><a href="../tma2.htm">Bookmarking App</a></h1>
			
			</header>
	
			<div class="homecontent">	
<?php
session_start();

include '../shared/db_connect.php';


$email = $_POST['email'];
$pass = $_POST['pass'];

$query = "SELECT * FROM Users WHERE Email = '$email' AND Password = '$pass'";

if(!($result=mysql_query($query,$database))){
	die("<p> Could not execute query </p>".mysql_error());
}
if(mysql_num_rows($result)<=0){
	print('<h1>Please Log In Below: </h1>
	<p><strong>You have entered the wrong email or password, please try again.</strong></p>
			<form action = "login.php" method= "POST">
			<!--form for inputs for login-->
				<input type ="email" name = "email" placeholder ="Enter Email"><br><br>
				<input type ="text" name = "pass" placeholder ="Enter Password"><br><br>
				<button type ="submit">Log In</button> 
			</form>
			<p><strong>OR </strong></p><a href="register.php">register</a>');
}else{
	$row = mysql_fetch_assoc($result);
	$_SESSION['UserID'] = $row['UserID'];
	header("Location:main.php");
}
mysql_close();
?>
</div>
	<footer class="homefooter">
			<p>Website created by Su Gao. It is assignment 2 part 1 for COMP466.</p>
			</footer>
	</body>
</html>

