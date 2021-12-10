<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="backendUI.css">
<meta charset="utf-8">
<title>Western Booking Agency</title>
</head>
<body>
<?php
   include 'dataconnect.php';
?>
<h1>Booking Status:</h1>
<ol>
<?php

   /* split bookValue apart to extract useful information */
   $bookArr = explode(" ", bookValue);

   $persID= intval($_POST[bookArr[0]]);
   $tripID = intval($_POST[bookArr[1]]);

   $query = "DELETE FROM booking WHERE superPersID=$persID AND superTripID=$tripID";
   if (!mysqli_query($connection, $query)) {
        die("Booking Could Not Be Deleted");
    }
   echo "Your booking was deleted!";
   mysqli_close($connection);
?>
</ol>
<form action="bookinginfo.php" method="post">
<input type="submit" value="Back">
</body>
</html>
