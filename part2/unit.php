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
			<a href="elearnsys.php">Back to course selection</a></h1>

		</header>
	
		<div class="homecontent">	
			<?php
				include '../shared/db_connect.php';
				session_start();
				if(!isset($_GET['unitid'])){
				header("Location:elearnsys.php");
				}
				$unitid = $_GET['unitid'];
				//fetch xml of course from database
				$query = "SELECT unitxml FROM unit WHERE unitID = '$unitid'";
				
				if(!($result=mysql_query($query,$database))){
					die("<p> Could not execute query </p>".mysql_error());
				}
				$row = mysql_fetch_array($result);
			
				//display unit title
				preg_match_all("/<unittitle>.*<\/unittitle>/",$row[0],$match);
				echo "<h2>".$match[0][0]."</h2>";
				//display learning objective
				echo "<h3>Learning Objective: </h3>";
				preg_match_all("/<learningobjective>.*<\/learningobjective>/",$row[0],$innermatch);
				echo "<p>".$innermatch[0][0]."</p>";
				//display textbook info
				echo "<h3>Textbook section: </h3>";
				preg_match_all("/<textbook>.*<\/textbook>/",$row[0],$innermatch2);
				echo "<p>".$innermatch2[0][0]."</p>";
				//display activities
				echo "<h3>Activities: </h3>";
				preg_match_all("/<activity>.*<\/activity>/",$row[0],$innermatch3);
				foreach($innermatch3[0] as $key => $value){
					echo "<p>".$value."</p>";
				}
				//display learning objects
				echo '<h3>Learning Objects: </h3>';
				preg_match_all("/<learningobj type='([a-z])+'>([0-9])+<\/learningobj>/",$row[0],$innermatch6);
				preg_match_all("/type=.*?>/",$row[0],$typematch);
				for($i = 0; $i < count($innermatch6[0]); $i++) {
					$val=preg_replace("/<learningobj type='([a-z])+'>|<\/learningobj>/", '', $innermatch6[0][$i]);
					$typematch[0][$i]=preg_replace("/type=|>/",'',$typematch[0][$i]);

					$query = "SELECT learningobj FROM learnobj WHERE loID = $val";
					if(!($result=mysql_query($query,$database))){
						die("<p> Could not execute query </p>".mysql_error());
					}
					$rowquiz = mysql_fetch_array($result);
					if($typematch[0][$i] == "'text'"){
						echo "<p>".$rowquiz[0]."</p>";
					}else if ($typematch[0][$i] == "'image'"){
						echo "<img src=".$rowquiz[0]." alt='image'>";
					}
				}
				
				//display assignments
				preg_match_all("/<assignment>([0-9])+<\/assignment>/",$row[0],$innermatch7);
				for($i = 0; $i < count($row[0]); $i++) {
					$val=preg_replace('/<assignment>|<\/assignment>/', '', $innermatch7[0][$i]);
					$query = "SELECT assignmentxml FROM assignment WHERE aID = $val";
					if(!($result=mysql_query($query,$database))){
						die("<p> Could not execute query </p>".mysql_error());
					}
					$rowassignment = mysql_fetch_array($result);
					//display assignment title
					preg_match_all("/<assignmenttitle>.*<\/assignmenttitle>/",$rowassignment[0],$amatch);
					echo "<h3>".$amatch[0][$i].": </h3>";
					//display assignment instructions
					preg_match_all("/<instructions>.*<\/instructions>/",$rowassignment[0],$instructionmatch);
					$count = count($rowassignment[0]);
					echo '<h4>Assignment instructions: </h4>';
					for($j = 0; $j < $count; $j++) {
						echo '<p>'.$instructionmatch[0][$j].'</p>';
					}
					//display due date
					preg_match_all("/<duedate>.*<\/duedate>/",$rowassignment[0],$duematch);
					echo '<p>'.$duematch[0][0].'</p>';

				}
				//display quiz
				
				preg_match_all("/<quiz>([0-9])+<\/quiz>/",$row[0],$innermatch5);
				for($i = 0; $i < count($innermatch5[0]); $i++) {
					$val=preg_replace('/<quiz>|<\/quiz>/', '', $innermatch5[0][$i]);
					$query = "SELECT quizxml FROM quiz WHERE qID = $val";
					if(!($result=mysql_query($query,$database))){
						die("<p> Could not execute query </p>".mysql_error());
					}
					$rowquiz = mysql_fetch_array($result);
					//display quiz title
					preg_match_all("/<quiztitle>.*<\/quiztitle>/",$rowquiz[0],$quizmatch);
					echo "<h3>".$quizmatch[0][$i].": </h3>";
					
					
					//display quiz question
					
					preg_match_all("/<question>.*<\/question>/",$rowquiz[0], $quizmatch);
					echo '<form action = "quiz.php" method= "POST">';
					$k = 0;
					for($j = 0; $j < count($quizmatch[0]); $j++) {
						$totalq = count($quizmatch[0]);
						$num = $j+1; //question number
						echo "<p>Question #$num: ".$quizmatch[0][$j]."</p>";
						//match <ans> tag for the selectable answers
						preg_match_all("/<ans>.*<\/ans>/",$rowquiz[0], $ansmatch);
						preg_match_all("/<correct>.*<\/correct>/",$rowquiz[0], $correctmatch);
						$ans1=preg_replace('/<ans>|<\/ans>/', '', $ansmatch[0][0+$k]);
						$ans2=preg_replace('/<ans>|<\/ans>/', '', $ansmatch[0][1+$k]);
						$ans3=preg_replace('/<ans>|<\/ans>/', '', $ansmatch[0][2+$k]);
						$ans4=preg_replace('/<ans>|<\/ans>/', '', $ansmatch[0][3+$k]);
						$correct=preg_replace('/<correct>|<\/correct>/', '', $correctmatch[0][$j]);

						echo '
						<label><input type="radio" name= "q'.$num.'" value="a">'.$ans1.'</label><br>
						<label><input type="radio" name= "q'.$num.'" value="b">'.$ans2.'</label><br>
						<label><input type="radio" name= "q'.$num.'" value="c">'.$ans3.'</label><br>
						<label><input type="radio" name= "q'.$num.'" value="d">'.$ans4.'</label><br>';
						echo '<input type="hidden" name="totalq" value="'.$totalq.'">';
						echo '<input type="hidden" name="unitid" value="'.$unitid.'">';
						echo '<input type="hidden" name="correct'.$num.'" value="'.$correct.'">';
						$k = $k+4;
					}
						echo '<button type ="submit">Submit Quiz</button>
						</form>';
						
				}
				
				//display unit summary
				echo "<h3>Unit Summary: </h3>";
				preg_match_all("/<unitsummary>.*<\/unitsummary>/",$row[0],$innermatch4);
				
				echo "<p>".$innermatch4[0][0]."</p>";
				
			?>
		</div>
		<footer class="homefooter">
			<p>Website created by Su Gao. It is assignment 2 part 2 for COMP466.</p>
		</footer>
	</body>
	
</html>