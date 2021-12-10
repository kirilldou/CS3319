-- select database and load file
USE 43_assign2db;
LOAD DATA LOCAL INFILE 'loaddatafall2021.txt' INTO TABLE bus FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n';
SELECT * FROM bus;

-- insert values
SELECT * FROM passport;
INSERT INTO passport values("US10", "USA", "2025-01-01", "1970-02-19");
INSERT INTO passport values("US12", "USA", "2025-01-01", "1972-08-12");
INSERT INTO passport values("US13", "USA", "2025-01-01", "2001-05-12");
INSERT INTO passport values("US14", "USA", "2025-01-01", "2004-03-19");
INSERT INTO passport values("US15", "USA", "2025-01-01", "2012-09-17");
INSERT INTO passport values("US22", "USA", "2030-04-04", "1950-06-11");
INSERT INTO passport values("US23", "USA", "2018-03-03", "1940-06-24");
INSERT INTO passport values("GE11", "Germany", "2027-01-01", "1970-07-12");
INSERT INTO passport values("US88", "Canada", "2030-02-13", "1979-04-25");
INSERT INTO passport values("US89", "Canada", "2022-02-02", "1976-04-08");
INSERT INTO passport values("US90", "Italy", "2020-02-28", "1980-04-04");
INSERT INTO passport values("US91", "Germany", "2030-01-01", "1959-02-02");
INSERT INTO passport values("NR42", "New Reno", "2242-03-17", "2164-09-22");
SELECT * FROM passport;

SELECT * FROM passenger;
INSERT INTO passenger values(11, "Homer", "Simpson", "US10");
INSERT INTO passenger values(22, "Marge", "Simpson", "US12");
INSERT INTO passenger values(33, "Bart", "Simpson", "US13");
INSERT INTO passenger values(34, "Lisa", "Simpson", "US14");
INSERT INTO passenger values(35, "Maggie", "Simpson", "US15");
INSERT INTO passenger values(44, "Ned", "Flanders", "US22");
INSERT INTO passenger values(45, "Todd", "Flanders", "US23");
INSERT INTO passenger values(66, "Heidi", "Klum", "GE11");
INSERT INTO passenger values(77, "Michael", "Scott", "US88");
INSERT INTO passenger values(78, "Dwight", "Schrute", "US89");
INSERT INTO passenger values(79, "Pam", "Beesly", "US90");
INSERT INTO passenger values(80, "Creed", "Bratton", "US91");
INSERT INTO passenger values(91, "Louis", "Salvatore", "NR42");
SELECT * FROM passenger;

SELECT * FROM busTrip;
INSERT INTO busTrip values(1, "Castles of Germany", "2022-01-01", "2022-01-17", "Germany", "VAN1111");
INSERT INTO busTrip values(2, "Tuscany Sunsets", "2022-03-03", "2022-03-14", "Italy", "TAXI222");
INSERT INTO busTrip values(3, "California Wines", "2022-05-05", "2022-05-10", "USA", "VAN2222");
INSERT INTO busTrip values(4, "Beaches Galore", "2022-04-04", "2022-04-14", "Bermuda", "TAXI222");
INSERT INTO busTrip values(5, "Cottage Country", "2022-06-01", "2022-06-22", "Canada", "CAND123");
INSERT INTO busTrip values(6, "Arrivaderci Roma", "2022-07-05", "2022-07-15", "Italy", "TAXI111");
INSERT INTO busTrip values(7, "Shetland and Orkney", "2022-09-09", "2022-09-29", "UK", "TAXI111");
INSERT INTO busTrip values(8, "Disney World and Sea World", "2022-06-10", "2022-06-20", "USA", "VAN2222");
INSERT INTO busTrip values(9, "Athos: The Holy Mountain", "2022-07-07", "2022-07-27", "Greece", "UWO3311");
INSERT INTO busTrip values(10, "You're Going to Brazil", "2022-09-11", "2022-09-16", "Brazil", "TAXI333");
SELECT * FROM busTrip;

SELECT * FROM booking;
INSERT INTO booking values(11, 1, 500);
INSERT INTO booking values(22, 1, 500);
INSERT INTO booking values(33, 1, 200);
INSERT INTO booking values(34, 1, 200);
INSERT INTO booking values(35, 1, 200);
INSERT INTO booking values(66, 1, 600.99);
INSERT INTO booking values(44, 8, 400);
INSERT INTO booking values(45, 8, 200);
INSERT INTO booking values(78, 4, 600);
INSERT INTO booking values(80, 4, 600);
INSERT INTO booking values(78, 1, 550);
INSERT INTO booking values(33, 8, 300);
INSERT INTO booking values(34, 8, 300);
INSERT INTO booking values(11, 6, 600);
INSERT INTO booking values(22, 6, 600);
INSERT INTO booking values(33, 6, 100);
INSERT INTO booking values(34, 6, 100);
INSERT INTO booking values(35, 6, 100);
INSERT INTO booking values(11, 7, 300);
INSERT INTO booking values(77, 7, 500);
INSERT INTO booking values(44, 7, 400);
INSERT INTO booking values(91, 10, 420);
SELECT * FROM booking;

-- update rows
UPDATE passport INNER JOIN passenger ON passport.passID=passenger.superNum SET passport.passCountry="Germany" WHERE passenger.fNamePers="Dwight" AND passenger.lNamePers="Schrute";
SELECT * FROM passport;

UPDATE busTrip SET superLPlate="VAN1111" WHERE destination="USA";
SELECT * FROM busTrip;

-- adio ma petite chau-fleur
