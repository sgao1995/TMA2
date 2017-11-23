<?php
//connect to MySQL
if(!($database = mysql_connect("localhost", "iw3htp", "password"))){
	die("Could not connect to database".mysql_error());
}
//select right database
if(!mysql_select_db("myElearning", $database)){
					die("<p> Could not connect to database </p>");
				}
?>
