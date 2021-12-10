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
include 'dataconnect.php';
?>
<h1>Current Trips Without Bookings</h1>
<ol>
<?php

/* find trips without bookings */

        $query = 'SELECT * FROM busTrip LEFT JOIN booking ON booking.superTripID=busTrip.tripID WHERE busTrip.tripID NOT IN (SELECT superTripID FROM booking)'; 
        $result=mysqli_query($connection,$query);

        /* test for errors, return error message */

        if (!$result) {
                die("database query2 failed.");
        }

        while ($row=mysqli_fetch_assoc($result)) {
                echo '<li>';
                echo $row["tripName"] . "<br>";
        }
        mysqli_free_result($result);

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
