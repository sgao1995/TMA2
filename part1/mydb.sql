USE myElearning;

CREATE TABLE Users
(
    UserID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    FirstName varchar(100) NOT NULL,
    LastName varchar(100) NOT NULL,
    Email varchar(100) NOT NULL,
    Password varchar(100) NOT NULL
);
CREATE TABLE Bookmarks
(
	BmID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    UserID int NOT NULL,
    URL varchar(1000) NOT NULL
);
INSERT INTO Users (FirstName, LastName, Email, Password) VALUES ('admin', 'admin', 'admin@example.com', 'adminpasswordexample');

INSERT INTO Bookmarks (UserID, URL) VALUES ('1', 'http://www.google.com');