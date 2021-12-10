<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="backendUI.css">
<meta charset="utf-8">
<title>Western Travel Agency</title>
</head>
<body>
<div class = 'centre'>
<?php
include 'upload_file.php';
include 'dataconnect.php';
?>
<h1>Current Passengers</h1>
<ol>
<?php

/* find trip */

if ($_POST["find"]){
	$whichTrip= $_POST["tripValue"];
	$query = 'SELECT * FROM busTrip, booking, passenger WHERE booking.superTripID=busTrip.tripID AND booking.superPersID=passenger.persID AND busTrip.tripID="' . $whichTrip . '"';
	$result=mysqli_query($connection,$query);
	
	/* test for errors, return error message */

	if (!$result) {
		die("database query2 failed.");
	}
	
	while ($row=mysqli_fetch_assoc($result)) {
		echo '<li>';
		echo $row["fNamePers"] . " " . $row["lNamePers"] . "<br>";
	}
	mysqli_free_result($result);
}

/* delete trip */

if ($_POST["delete"]){
   $tripID= intval($_POST["tripValue"]);

   $query = "DELETE busTrip FROM busTrip, booking WHERE tripID = $tripID";

   /* test for errors */

   if (!mysqli_query($connection, $query)) {
        die("Trip Could Not Be Deleted: Must NOT Have Prior Bookings");
   }

   echo "Trip was deleted!";
}

/* change trip */

if ($_POST["change"]){
   $modTripName = $_POST["modTripName"];
   $modStartDate = $_POST["modStartDate"];
   $modEndDate = $_POST["modEndDate"];
   $modTripID = intval($_POST["tripValue"]);

   /* if trip name can be modified */

   if (!empty($modTripName)) {
   	$queryNameTrip = "UPDATE busTrip SET tripName='$modTripName' WHERE tripID=$modTripID";
   	if (!mysqli_query($connection, $queryNameTrip)) {
        	die("Trip name could not be modified for whatever reason");
   	}
   }

   /* if start date can be modified */

   if (!empty($modStartDate)) {
        $queryEnd = "UPDATE busTrip SET startDate='$modStartDate' WHERE tripID=$modTripID";
        if (!mysqli_query($connection, $queryEnd)) {
                die("Trip start date could not be modified for whatever reason");
        }
   }

   /* if end date can be modified */

   if (!empty($modEndDate)) {
        $queryStart = "UPDATE busTrip SET endDate='$modEndDate' WHERE tripID=$modTripID";
        if (!mysqli_query($connection, $queryStart)) {
                die("Trip end date could not be modified for whatever reason");
        }
   }

   if (!empty($tripPic)){
	$queryPic = "UPDATE busTrip SET tripPicture='$tripPic' WHERE tripID=$modTripID";
        if (!mysqli_query($connection, $queryPic)) {
                die("Upload failed");
        }
   }

   echo "Your Trip Was Modified!";
   mysqli_close($connection);	
}

?>
</ol>
<form action="agency_backend.php" method="post">
<input type="submit" value="Return to Home">
</form>
<?php
	mysqli_close($connection);
?>
</div>
</body>
</html>
