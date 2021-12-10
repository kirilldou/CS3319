-- select database
USE 43_assign2db;

-- create view
CREATE VIEW tripRentalView AS
SELECT passenger.fNamePers, passenger.lNamePers, busTrip.tripName, busTrip.destination, booking.bookPrice
FROM passenger JOIN booking ON passenger.persID=booking.superPersId JOIN busTrip ON booking.superTripID=busTrip.tripID;

-- select from view
SELECT * FROM tripRentalView;

-- select castles
SELECT * FROM tripRentalView WHERE tripName LIKE '%Castles%' ORDER BY bookPrice ASC;

-- Show all the bus table information
SELECT * FROM bus;

-- Delete any bus whose license plate contains "UWO" in it.
DELETE FROM busTrip WHERE superLPlate LIKE '%UWO%';
DELETE FROM bus WHERE lPlateNo LIKE '%UWO%';

-- Show all the bus information again to make sure it was remove
SELECT * FROM bus;

-- Show all the data from passport table
SELECT * FROM passport;

-- Show all the data from the passenger table
SELECT * FROM passenger;

-- Delete all the passport from Canada
DELETE booking, passenger, passport FROM passenger INNER JOIN passport ON passenger.superNum=passport.passID 
INNER JOIN booking ON booking.superPersID=passenger.persID WHERE passport.passCountry LIKE '%Canada%';

-- Show all the data from passport table
Select * FROM passport;

-- Show all the data from the passenger table
SELECT * FROM passenger;

-- passenger and booking were affected by the delete in passport, as both 

-- Show everything in the bustrip table. 
SELECT * FROM busTrip;

-- Delete the California Wines trip
DELETE FROM busTrip WHERE tripName="California Wines";

-- Show everything in the bustrip table again to make sure it was deleted.
SELECT * FROM busTrip;

-- Try to delete the Arrivaderci Roma trip
DELETE busTrip, booking FROM busTrip INNER JOIN booking ON busTrip.tripID=booking.superTripID WHERE busTrip.tripName="Arrivaderci Roma";

-- amogus

-- Show everything in the passenger table
SELECT * FROM passenger;

-- Delete anyone with the first name Pam
DELETE FROM passenger WHERE fNamePers="Pam";

-- Show everything in passenger table again to make sure she was deleted.
SELECT * FROM passenger;

-- Select everything from the view your created for this fourth script from the passenger table (you cannot delete from views, they just display data but don't actually hold the data)
SELECT fNamePers, lNamePers FROM tripRentalView;

-- Delete anyone with the last name Simpson.
DELETE passenger, booking FROM passenger INNER JOIN booking ON booking.superPersID=passenger.persID WHERE passenger.lNamePers = "Simpson";

-- Select everything from that view again and make sure the bookings for the Simpsons disappeared when they were deleted.
SELECT * FROM tripRentalView;
