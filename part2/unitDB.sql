DROP DATABASE IF EXISTS myElearning;

CREATE DATABASE myElearning;

USE myElearning;

CREATE TABLE course
(
    cID int NOT NULL PRIMARY KEY,
	xml TEXT NOT NULL
);
CREATE TABLE unit(
	unitID int NOT NULL PRIMARY KEY,
	cID int NOT NULL,
	unitxml TEXT NOT NULL,
	FOREIGN KEY (cID) REFERENCES course(cID)
);

CREATE TABLE learnobj
(
    loID int NOT NULL PRIMARY KEY,
	learningobj TEXT NOT NULL
  
);
CREATE TABLE quiz
(
	qID int NOT NULL PRIMARY KEY,
    quizxml TEXT NOT NULL 
);
CREATE TABLE assignment
(
    aID int NOT NULL PRIMARY KEY,
    assignmentXML TEXT NOT NULL
 
);
INSERT INTO course (cID, xml) VALUES (1,
"
<!--course consists of units and an assignment-->
<course>
	<coursetitle>COMP SCI 466</coursetitle>
	<unit>4</unit>
	<unit>5</unit>
</course>");

INSERT INTO unit (unitxml, cID, unitID) VALUES("<unittitle> Unit 4: Databases for the Web </unittitle>

		<learningobjective>Understand relational database models, be able to write database queries, and understand how to work with MySQL.</learningobjective>
		
		<textbook>Chapters to read in book: chapter 18</textbook>
			
		<activities> 
			<activity>Read textbook chapter 18 and the below sections then complete the quiz.</activity>
			<activity>Install MySQL and read MySQL's reference manual.</activity>
			<activity>Write a database for books, create at least two tables that relates to books.</activity>
		</activities>

		<learningobj type='text'>1</learningobj>
		<learningobj type='image'>2</learningobj>
		<learningobj type='text'>3</learningobj>
		<learningobj type='text'>4</learningobj>
		<assignment>1</assignment>
		<quiz>1</quiz>
	
		<unitsummary>You should now understand the basics of databases including how to write queries for them. You should also understand why databases are important for modern web applications.</unitsummary>",1,4
);

INSERT INTO unit (unitxml, cID, unitID) VALUES("<unittitle> Unit 5: PHP </unittitle>

		<learningobjective>Understand PHP's importance, learn to code PHP, and install it on your computer.</learningobjective>
			
		<textbook>Chapters to read in book: chapter 19</textbook>
				
		<activities> 
			<activity>Read textbook chapter 19 and the below sections then complete the quiz.</activity>
			<activity>Install PHP on your computer.</activity>
			<activity>Read more about PHP online and complete the assignment of this course.</activity>
		</activities>

		<learningobj type='text'>5</learningobj>
		<learningobj type='image'>6</learningobj>
		<learningobj type='text'>7</learningobj>
		<assignment>2</assignment>
		<quiz>2</quiz>
			
		<unitsummary>You should now understand that PHP is a powerful server-side scripting language that is useful for web based applications. PHP code can be embedded in HTML code. You should also know how to code in it and be able to develop web applications that use server side scripting.</unitsummary>",1,5
);
INSERT INTO assignment (aID, assignmentXML) VALUES (1,

"
<assignment>

	<assignmenttitle>Assignment 1</assignmenttitle>

	<assignmentinfo> 
		<instructions>Install MySQL and create a bookmarking web app that stores user login and registration information in a database using MySQL and PHP.</instructions>
		<duedate>Due after completing the reading of unit 4 and unit 5</duedate>
	</assignmentinfo>

</assignment>
");
INSERT INTO assignment (aID, assignmentXML) VALUES (2,

"
<assignment>

	<assignmenttitle>Assignment 2</assignmenttitle>

	<assignmentinfo> 
		<instructions>Create an Elearning web application that stores lesson information in a database in xml format.</instructions>
		<duedate>Due after completing the reading of unit 4 and unit 5</duedate>
	</assignmentinfo>

</assignment>
");
INSERT INTO quiz (qID,quizxml) VALUES (1,
"<quiz>
  <quiztitle>Databases Quiz</quiztitle>
 
    <question>Which SQL statement is used to add rows to a table?</question>
		<ans>UPDATE</ans>
		<ans>ADD</ans>
		<ans>INSERT</ans>
		<ans>SELECT</ans>
		<correct>c</correct>
	<question>Which statement is used to remove rows from a table?</question>
		<ans>MODIFY</ans>
		<ans>DROP</ans>
		<ans>DELETE</ans>
		<ans>REMOVE</ans>
		<correct>c</correct>
	<question>What is the point of the WHERE clause?</question>
		<ans>To get rows that meet a specified criteria</ans>
		<ans>To get columns that meet a specified criteria </ans>
		<ans>both a and b</ans>
		<ans>none of the above</ans>
		<correct>a</correct>
	<question>__ is a constraint used to uniquely identify each record in a database table</question>
		<ans>FOREIGN KEY</ans>
		<ans>NOT NULL</ans>
		<ans>UNIQUE KEY</ans>
		<ans>PRIMARY KEY</ans>
		<correct>d</correct>
</quiz>");
INSERT INTO quiz (qID,quizxml) VALUES (2,
"<quiz>
  <quiztitle>PHP Quiz</quiztitle>
    <question>PHP is original purpose is: </question>
		<ans>a client side scripting language</ans>
		<ans>a server side scripting language</ans>
		<ans>both a and b</ans>
		<ans>neither a nor b</ans>
		<correct>b</correct>
	<question>How does one start a session?</question>
		<ans>isset() function</ans>
		<ans>$_SESSION[]</ans>
		<ans>$_POST[]</ans>
		<ans>session_start() function</ans>
		<correct>d</correct>
	<question>How do you start a php file?</question>
		<ans>by naming the file with a .php extension</ans>
		<ans>use <html> tag </ans>
		<ans>by using the <?php tag to start it and ?> tag to end it</ans>
		<ans>none of the above</ans>
		<correct>c</correct>

</quiz>");
INSERT INTO learnobj(loID, learningobj) VALUES("1","SQL stands for Structured Query Language, it is used to send queries to a database. Some commands that you can use can be found here: http://www.w3schools.com/sql/sql_quickref.asp ");
INSERT INTO learnobj(loID, learningobj) VALUES("2","../shared/sqlexample.PNG");
INSERT INTO learnobj(loID, learningobj) VALUES("3","The above image shows an example of SQL table creation as well as insertion into tables.");
INSERT INTO learnobj(loID, learningobj) VALUES("4","Important statement and clauses include SELECT, WHERE, ORDER BY, INSERT, UPDATE, and DELETE. An example of SELECT is: SELECT * FROM tablename. This will select every column from the table tablename. An example of WHERE is SELECT * FROM tablename WHERE
 tableid = 1, this will return all columns in which the table id is equal to 1. ORDER BY will order the result by specified column names in ascending order by default. You can use DESC if you want it in descending order. INSERT will let you insert values into a table, an example is in the pic above. UPDATE will let you update the values and DELETE will let you delete rows from a table.");
INSERT INTO learnobj(loID, learningobj) VALUES("5","PHP is server scripting language. Variables in PHP have to begin with a $. For a list of functions, please to go http://www.w3schools.com/php/. Echo is used to output arguments, it is not a function so it does need to use parentheses.");
INSERT INTO learnobj(loID, learningobj) VALUES("6","../shared/phpexample.PNG");
INSERT INTO learnobj(loID, learningobj) VALUES("7","The above image is a code example of PHP. As you will notice, php can be embedded into html code and to start it, use the tag <?php. To close it, use the ?> tag.");

