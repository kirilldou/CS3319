<html>
<head>
<link rel="stylesheet" href="backendUInull.css">
</head>
<?php
        $query = "SELECT * FROM booking, passenger, busTrip WHERE booking.superTripID=busTrip.tripID AND booking.superPersID=passenger.persID";
        $result = mysqli_query($connection,$query);

        if (!$result) {
                die("databases query failed.");
        }

        echo "<div class = 'steele'>";
        echo "Find a Booking";
        echo "</div>";

        echo "<div class = 'centre'>";
        echo '<table border = "1"> <tr> <th>Select</th> <th>Trip</th> <th>Passenger</th> <th>Price</th> </tr>';

        while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . '<input type="radio" name="bookValue" value="';
                echo $row["superPersID"] . " " . $row["superTripID"] . '</td>';

                echo '">' . '<td>' . $row["tripName"] . '</td>';
                echo '<td>' . $row["fNamePers"] . " " . $row["lNamePers"] . '</td>';
                echo '<td>' . $row["bookPrice"] . '</td>';
        }

        echo "</table>";
        /* echo "</div>; */

        mysqli_free_result($result);
?>
</html>
