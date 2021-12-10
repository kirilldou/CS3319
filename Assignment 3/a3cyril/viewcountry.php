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
<h1>Trips for Current Country</h1>
<ol>
<?php

/* find trips in a country */

        $whichCountry=strval($_POST["countryValue"]);
        $query = 'SELECT * FROM busTrip WHERE busTrip.destination="Italy"';
        $result=mysqli_query($connection,$query);

        /* test for errors, return error message */

        if (!$result) {
                die("database query2 failed.");
        }

        while ($row=mysqli_fetch_assoc($result)) {
                echo '<li>';
                echo $row["tripName"];
        }
        mysqli_free_result($result);

?>
</ol>
<form action="countryinfo.php" method="post">
<input type="submit" value="Return to Country">
</form>
<?php
        mysqli_close($connection);
?>
</div>
</body>
</html>
