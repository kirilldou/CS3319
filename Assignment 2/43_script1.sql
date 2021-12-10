-- build database
SHOW DATABASES;
DROP DATABASE IF EXISTS 43_assign2db;
CREATE DATABASE 43_assign2db;
USE 43_assign2db;

-- create the 
SHOW TABLES;
CREATE TABLE passport (
	passID VARCHAR(4) NOT NULL,
	passCountry VARCHAR(30) NOT NULL,
	expiryDate DATE NOT NULL,
	doB DATE NOT NULL,
	UNIQUE (passID),
	PRIMARY KEY (passID)
);

CREATE TABLE passenger (
	persID INT NOT NULL,
	fNamePers VARCHAR(20) NOT NULL,
	lNamePers VARCHAR(20) NOT NULL,
	superNum VARCHAR(4) NOT NULL UNIQUE,
	PRIMARY KEY (persID),
	FOREIGN KEY (superNum) references passport(passID)
);

CREATE TABLE bus (
	lPlateNo VARCHAR(7) NOT NULL,
	capacity INT NOT NULL,
	PRIMARY KEY (lPlateNo)
);

CREATE TABLE busTrip (
	tripID INT NOT NULL,
	tripName VARCHAR(50) NOT NULL,
	startDate DATE NOT NULL,
	endDate DATE NOT NULL,
	destination VARCHAR(30) NOT NULL,
	superLPlate VARCHAR(7) NOT NULL,
	FOREIGN KEY (superLPlate) references bus(lPlateNo),
	PRIMARY KEY (tripID)
);

CREATE TABLE booking (
	superPersID INT NOT NULL,
	superTripID INT NOT NULL,
	bookPrice DOUBLE NOT NULL,
	FOREIGN KEY (superPersID) references passenger(persID),
	FOREIGN KEY (superTripID) references busTrip(tripID),
	PRIMARY KEY (superPersID, superTripId)	
);

-- list tables again
SHOW TABLES;

-- we good
