<?php
	include '../shared/db_connect.php';
	session_start();
	$BM=$_POST['BM'];
	if(!empty($BM)){
		$BMArray = implode(',', $BM);
		
		$query = "DELETE FROM Bookmarks WHERE BmID in ($BMArray)";
		//print $query;
	
		if(!($result=mysql_query($query,$database))){
			die("<p> Could not execute query </p>".mysql_error());
		}
		
		mysql_close();
		header("Location:main.php");
	}else{
		header("Location:main.php");
	}
?>	