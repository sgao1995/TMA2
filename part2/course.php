
<html>
	<head>
		<title>E-learning system</title>
		<link rel="stylesheet" type="text/css" href="../shared/style.css">
		<meta charset="utf-8">
	</head>
	
	<body class="homebody">
	<header class="homeheader"> 
			<h1 class="headerLink"><a href=#>ELEARN UNIVERSITY</a></h1>
			<a href="elearnsys.php">Back to course selection</a></h1>
		</header>
	
		<div class="homecontent">	
		
		<?php
			include '../shared/db_connect.php';
			session_start();
			if(!isset($_POST['cID'])){
				header("Location:elearnsys.php");
			}
			$cid = $_POST['cID'];
			//fetch xml of course from database
			$query = "SELECT xml FROM course WHERE cID = '$cid'";
			
			if(!($result=mysql_query($query,$database))){
				die("<p> Could not execute query </p>".mysql_error());
			}
			$row = mysql_fetch_array($result);
			
			//parse using regular expression to display the course
			//get and display course title
			preg_match_all("/<coursetitle>.*<\/coursetitle>/",$row[0],$match);
			echo "<h1>".$match[0][0]."<h1>";
			
			echo "<h2>Select a unit to begin: </h2>";
			//get and display units
			preg_match_all("/<unit>([0-9])+<\/unit>/",$row[0],$match);
			

			
			for($i = 0; $i < count($match[0]); $i++) {
				$v = preg_replace('/<unit>|<\/unit>/', '', $match[0][$i]); //remove unit tag
				
				echo '<a href="unit.php?&unitid='.$v.'">Click here for Unit '.$v.'</a></h1><br><br>';
				
			}
			
		?>
		

		</div>
		<footer class="homefooter">
			<p>Website created by Su Gao. It is assignment 2 part 2 for COMP466.</p>
		</footer>
	</body>
	
</html>

