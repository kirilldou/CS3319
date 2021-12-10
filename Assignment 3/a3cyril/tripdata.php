<html>
<head>
<link rel="stylesheet" href="backendUInull.css">
</head>
<?php
	$query = "SELECT * FROM busTrip";
	$result = mysqli_query($connection,$query);
	
	if (!$result) {
		die("databases query failed.");
	}
	
	echo "<div class = 'steele'>";
	echo "Find a Trip that Suits You";
	echo "</div>";
	
	echo "<div class = 'centre'>";
	echo '<table border = "1"> <tr> <th>Select</th> <th>ID</th> <th>Name</th> <th>Start Date</th> <th>End Date</th> <th>Destination</th> <th>Image</th> </tr>';
	
	while ($row = mysqli_fetch_assoc($result)) {
		echo '<tr>';
		echo '<td>' . '<input type="radio" name="tripValue" value="';
		echo $row["tripID"] . '</td>';
		echo '">' . '<td>' . $row["tripID"] . '</td>';
		echo '<td>' . $row["tripName"] . '</td>';
		echo '<td>' . $row["startDate"] . '</td>';
        	echo '<td>' . $row["endDate"] . '</td>';
		echo '<td>' . $row["destination"] . '</td>';
		echo '<td>' . '<img src="' . $row["tripPicture"] . '" height="60" width="60">' . '</tr>';
	}
	
	echo "</table>";
	/* echo "</div>; */
   
	mysqli_free_result($result);
?>
</html>
