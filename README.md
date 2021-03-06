Documentation for part 1:

Part 1 is a simple online bookmarking application. It allows users to register accounts and login to a page with their saved Bookmarks.

Used knowledge and examples from the textbook, http://www.w3schools.com/, and http://www.tutorialspoint.com/php/index.htm to help implement part 1.

To allow new tabs to be opened I used this: http://stackoverflow.com/questions/18870366/how-to-make-php-image-link-open-in-a-new-window.

Documentation for part 2:

Part 2 is a E-learning web application. This application allows users to select a course and then units and lessons for them to learn from. There are also quizzes at the end of each unit. Used knowledge and examples from the textbook and http://www.w3schools.com/, http://www.w3schools.com/, and http://www.tutorialspoint.com/php/index.htm to help implement part 2.


Interpretation of assignment question and requirements:

Assignment 2 part 1 is to create an online bookmarking application. The application should allow users to login and/or register. Logging in should display them bookmarks that they have saved for their account. Users should be directed to a new tab after clicking their bookmark and they should be allowed to add or delete bookmarks.

Assignment 2 part 2 is to create an E-Learning web application that stores hypertext in an educational markup language in a database. The EML has to have at least 10 tags relating to education. A PHP parser is used to parse the hypertext into HTML documents so that it can be rendered by the browsers. This is done using regular expression matching and string replacement.

A quiz is also required, I have created two, one for each unit. They are online quizzes so they are done using PHP and forms.


Design and implementation of part 1 and part 2:

Part 1 is composed of several PHP scripts: home.php (the main page that asks users to login or register), login.php (handles the logging in), logout.php (handles logging out), main.php (displays the bookmarks of users), register.php (registration page), registration.php (handles the registration), db_connect.php (handles connecting to the database and is in the shared folder), addBM.php (handles adding bookmarks), and deleteBM.php (handles deletion of bookmarks).

A sql file is also used, mydb.sql. It uses the myElearning database (created using the sql file in the second part of the assignment) and creates two tables: Users and Bookmarks. Users stores user info such as first name, last name, email, password, and userID (which is auto incremented). The Bookmarks table stores bookmark info such as the bookmark ID, userID of the user that the book marks belong to, and URL of the bookmark.

The file then uses INSERT to insert an admin account and a link into it for me to test.

home.php contains a form that will pass email and password information to the login.php file. login.php will take the info and will query the database to confirm that the info is in the database. It will then store the user ID in $_SESSION array and redirect to main.php

main.php is where the bookmarks will be displayed. It will use the UserID that was stored in $_SESSION in a query to get bookmark info of that user from the database. It will then display the bookmarks as links that will open a new tab when clicked. There will also be two forms, add and delete bookmark. The add form will direct to addBM.php to handle adding new bookmarks and delete will direct to deleteBM.php to handle deleting bookmarks.

Deleting and adding bookmarks are just queries to the database using DELETE FROM and INSERT INTO.

logout.php handles logging out, which just calls session_destroy() to end the session and header() to redirect to home.php.

register.php has a form that takes in first name, last name, email, and password and will then direct to registration.php. registration.php will use the inputs from register.php's form to query the database and insert new users, provided the email is unique (if not then it will tell the user that the email is already used).


Part 2 is composed of course.php, elearnsys.php, quiz.php, unit.php, and unitDB.sql.

unitDB.sql will create the database myElearning (that both parts use), and will create the tables course, unit, learnobj, quiz, and assignment.

The course table contains course ID and an XML file that describes the course. This XML file has the tags: <course>, <coursetitle>, and <unit>. <coursetitle> contains the course's title and <unit> contains unitIDs (integers) that are pointers to unitXMLs from the unit table.

The unit table contains unit ID, course ID, and unit's xml. This XML file has the tags: <unittitle> (unit's title), <learningobjective> (hold's learning objective of the unit.), <textbook> (hold's textbook chapter to read), <activities>, <activity> (hold's the activities that should be done in the unit), <learningobj type='text'> <learningobj type='image'> (learning objects and their types, they hold the type that they are and the learningobjID that are pointers to the objects stored in the learnobj table), <assignment> (holds pointer to assignment in assignment table), <quiz> (holds pointer to a quiz in the quiz table), and <unitsummary> (holds the unit summary).

The learnobj table contains the object's ID, and the object itself (text or a directory if it is an image). The quiz table contains the quiz's xml and id and the assignment table contains the assignment's xml and id.

The Quiz XML has tags: <quiz>, <quiztitle>, <question>, <ans>, and <correct>. quiztitle contains the quiz's title, question contains the question itself, ans contains the choices of answers, and correct contains the correct answer choice (a, b, c, or d).

The assignment XML has tags: <assignment>, <assignmenttitle>, <assignmentinfo>, <instructions>, and <duedate>. assignmenttitle holds the title of the assignment, assignmentinfo holds the instruction and duedate tags. instruction holds the instruction of the assignment and duedate has the due date of the assignment.

elearnsys.php is the main page and has the welcome page as well as course selection (which are forms that submit course ID as POST). Choosing a course will then redirect to course.php which will allow you to choose between units. It will query the database using the course ID chosen in elearnsys.php and use a parser to parse the xml and display the course. Choosing a unit will then send unit ID to in a GET method to unit.php.

In unit.php, query is performed on the database to get the xml files needed and then the files will be parsed so that the unit is displayed along with the quiz and assignment.

Quizzes are forms that take in radio button inputs and will give them as POST method to quiz.php. quiz.php will handle grading the quiz. This involves querying the database for the correct answer and then comparing with the inputs from the form.


Guide for users:

Go to http://sugaotma2.comxa.com/ to start the web application. It will lead you to the tma2.htm page (called index.htm because the web server I use requires it to be called that)

To set up the web application locally without using the link previously provided, you must go to cmd and cd to mysql and then use it and source the unitDB.sql file first and then the mydb.sql file. Make sure to change the mysql_connect function's inputs to the host name, username, and password that you are using and to change the database name in the db_connect.php file in the shared folder.
