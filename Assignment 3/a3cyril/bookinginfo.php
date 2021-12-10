
<!DOCTYPE html>
<html>
<head>
<link rel = "stylesheet" href = "backendUI.css">
<meta charset="utf-8">
<title>Western Travel Agency</title>
</head>
<body>
<?php
        include 'dataconnect.php';
?>
<div class='headDiv'>
</br><h1>Western Travel Agency</h1></br>

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
<br><h2>All Current Bookings</h2><br>
<form action="deletebooking.php" method="post">
<?php
        include 'bookingdata.php';
?>
<input type="submit" value="Delete Booking">
</form>
<p>
<hr>
<p>

<h2> Add A New Booking:</h2>
<form action="addbooking.php" method="post">
<?php
        include 'passdata.php';
?>
<?php
        include 'tripdata.php';
?>

Select Price: <input type="number" name="tixPrice"><br>

<input type="submit" value="Add New Trip">
</form>

<?php
mysqli_close($connection);
?>
</body>
</html>
