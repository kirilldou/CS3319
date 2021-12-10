
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="backendUI.css">
<meta charset="utf-8">
<title>Western Travel Agency</title>
</head>
<body>
<?php
	include 'dataconnect.php';
?>
<div class='headDiv'>
</br><h1>Welcome to the Western Travel Agency</h1></br>

<form action="agency_backend.php" method="post" style="display: inline;">
<input type="submit" value="Trips">
</form>

<form action="bookinginfo.php" method="post" style="display: inline;">
<input type="submit" value="Bookings">
</form>

<form action="passinfo.php" method="post" style="display: inline;">
<input type="submit" value="Passengers">
</form>

<form action="countryinfo.php" method="post" style="display: inline;">
<input type="submit" value="Countries">
</form>

</div>
<br><h2>An Adventure of a Lifetime!</h2><br>
<form action="tripinfo.php" method="post" enctype="multipart/form-data">
<?php
	include 'tripdata.php';
?>
<input type="submit" value="View Current Passengers" name = "find">
<input type="submit" value="Delete Trip" name = "delete">

<!-- modify row -->
<input type="submit" value="Modify Trip" name = "change">
<br><br>Trip Name: <input type="text" name="modTripName"><br>
Trip Start: <input type="date" name="modStartDate"><br>
Trip End: <input type="date" name="modEndDate"><br>
<input type="file" name="file" id="file"><br>
<br>
</form>

<!-- view bookingless trips -->

<form action="nobookingtrips.php" method="post">
<input type="submit" value="View Trips Without Bookings">
</form>

<p>
<hr>
<p>

<!-- add new trip -->

<h2> Add A New Trip:</h2>
<form action="addtrip.php" method="post" enctype="multipart/form-data">
Trip Name: <input type="text" name="tripName"><br>
Trip Start: <input type="date" name="startDate"><br>
Trip End: <input type="date" name="endDate"><br>
Destination: <input type="text" name="destination"><br>
For which bus: <br>
<?php
	include 'busdata.php';
?>
<input type="file" name="file" id="file"><br>
<input type="submit" value="Add New Trip">
</form>

<?php
mysqli_close($connection);
?>
</body>
</html>
