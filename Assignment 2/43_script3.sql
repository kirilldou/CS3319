-- connect to database
USE 43_assign2db;

-- Query 1: show trip names of all trips from italy
SELECT tripName FROM busTrip;

-- Query 2: show non-repeating last names of all passengers
SELECT DISTINCT lNamePers FROM passenger;

-- Query 3: Show all the data in the bus trip table, but show them in order of their trip names from A to Z
SELECT * FROM busTrip ORDER BY tripName;

-- Query 4: List the trip name and country and start date of all trips that start after April 30 of 2022
SELECT tripName, destination, startDate FROM busTrip WHERE startDate >= '2022-04-30'; 

-- Query 5: List the first name, last name and birth date of all citizens of the USA
SELECT passenger.fNamePers, passenger.lNamePers, doB FROM passenger INNER JOIN passport ON passenger.superNum=passport.passID WHERE passport.passCountry="USA";

-- Query 6: List the trip name and the number of seat available for that trip for any trips starting between and including April 1, 2022 to Sept 1, 2022
SELECT busTrip.tripName, bus.capacity FROM busTrip INNER JOIN bus ON busTrip.superLPlate=bus.lPlateNo WHERE startDate >= '2022-04-01'
AND startDate <='2022-09-01';

-- Query 7: List all the data for both the passport and the passenger for any passenger whose passport has expired or will expire within 1 year from the current date
SELECT * FROM passenger JOIN passport ON passenger.superNum=passport.passID WHERE passport.expiryDate < ADDDATE(CURDATE(), INTERVAL 1 YEAR); 

-- Query 8: List the first name, last name and bus trip name for any trips that anyone whose last name starts with S
SELECT passenger.fNamePers, passenger.lNamePers, busTrip.tripName FROM passenger JOIN booking ON passenger.persID=booking.superPersID
JOIN busTrip ON booking.superTripID=busTrip.tripID WHERE passenger.lNamePers LIKE "s%"; 

-- Query 9: Count the number of passengers taking the Castles of Germany trip. List that total number of passengers and the trip name and trip id
SELECT busTrip.tripName, busTrip.tripID, COUNT(booking.superTripID) FROM booking INNER JOIN busTrip ON booking.superTripID=busTrip.tripID WHERE busTrip.tripName="Castles of Germany";

-- Query 10: List the countries that have trips and total amount of dollars brought in for each country. Each country name should just show up once along with the total
SELECT busTrip.destination, SUM(booking.bookPrice) FROM busTrip INNER JOIN booking ON busTrip.tripID=booking.superTripID GROUP BY booking.superTripID;

-- Query 11: List the passengers first and last names, citizenship country and the trip name and trip country name of any passengers taking trips in a country that they are NOT a citizen of
SELECT passenger.fNamePers, passenger.lNamePers, passport.passCountry, busTrip.tripName, busTrip.destination
FROM passport JOIN passenger ON passenger.superNum=passport.passID JOIN booking ON passenger.persID=booking.superPersID
JOIN busTrip ON booking.superTripID=busTrip.tripID WHERE passport.passCountry!=busTrip.destination;

-- Query 12: List the bus trip id and bus trip name of all bus trips that do not have any passengers yet
SELECT booking.superPersID, busTrip.tripID, busTrip.tripName FROM busTrip LEFT JOIN booking ON busTrip.tripID = booking.superTripID
UNION
SELECT booking.superPersID, busTrip.tripID, busTrip.tripName FROM busTrip RIGHT JOIN booking ON busTrip.tripID = booking.superTripID
WHERE booking.superPersID != NULL;

-- Query 13: Figure out which passenger is paying the most amount of money to our company
SELECT passenger.fNamePers, passenger.lNamePers, passport.passCountry, SUM(booking.bookPrice) FROM passenger INNER JOIN booking ON passenger.persID=booking.superPersID
JOIN passport ON passport.passID=passenger.superNum GROUP BY passenger.persID ORDER BY SUM(booking.bookPrice) DESC LIMIT 1;

-- Query 14: Find the names of any bus trips with bookings but with less than 4 people taking them
SELECT busTrip.tripName FROM busTrip INNER JOIN booking ON busTrip.tripID=booking.superTripID GROUP BY busTrip.tripID HAVING COUNT(booking.superTripID)<4;

-- Query 15: Write a query that figures out if any of the bus trips have too many passengers for the size of bus assigned to them 
SELECT busTrip.tripName AS "Bus Trip Name", COUNT(booking.superTripID) AS "Current Number of Passengers", busTrip.superLPlate AS "Current Bus Assigned License Plate",
bus.capacity AS "Capacity of Assigned Bus" FROM booking JOIN busTrip ON busTrip.tripID=booking.superTripID JOIN bus ON busTrip.superLPlate=bus.lPlateNo GROUP BY busTrip.tripID
HAVING COUNT(booking.superTripID)>bus.capacity;
