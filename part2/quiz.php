<?php
	if(!isset($_POST['unitid'])){
		header("Location:elearnsys.php");
	}

	$unitid = $_POST['unitid'];
	$totalq = $_POST['totalq'];

	$numcorrect = 0;//keeps track of number of questions we get correct
	for($i=0; $i<$totalq ; $i++){
		$num = $i+1;//question number
		if(!isset($_POST['q'.$num.''])){	//check if questions have been answered
			echo '<script language="javascript">';
			echo 'alert("Please answer all questions before submitting");';
			echo 'window.location.href = "unit.php?unitid='.$unitid.'";';
			echo '</script>';
		}
		$answer = $_POST['q'.$num.''];
		$correct=$_POST['correct'.$num.''];
		if($answer == $correct) {$numcorrect++;}
		$numanswered =$i;
	}
	
	
	echo '<script language="javascript">';
	echo 'alert("You got '.$numcorrect.' out of '.$totalq.' questions correct!");';
	echo 'window.location.href = "unit.php?unitid='.$unitid.'";';
	echo '</script>';
	
?>