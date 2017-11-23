<?php
	include '../shared/db_connect.php';
	session_start();
	
	$user=$_SESSION['UserID'];
	$url=$_POST['url'];
	if(!empty($url)){
		$query = "INSERT INTO Bookmarks (UserID, URL) VALUES ('$user', '$url')";

		if(!($result=mysql_query($query,$database))){
		die("<p> Could not execute query </p>".mysql_error());
		}
	
		mysql_close();
		header("Location:main.php");
	}
	else{
		header("Location:main.php");
	}
	
?>	