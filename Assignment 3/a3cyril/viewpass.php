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
<h1>Trips for Current Passenger</h1>
<ol>
<?php

/* find trips without bookings */

        $whichPass= $_POST["passValue"];
        $query = 'SELECT * FROM busTrip, booking, passenger WHERE booking.superTripID=busTrip.tripID AND booking.superPersID=passenger.persID AND passenger.persID="' . $whichPass . '"';
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
<form action="passinfo.php" method="post">
<input type="submit" value="Return to Passengers">
</form>
<?php
        mysqli_close($connection);
?>
</div>
</body>
</html>
