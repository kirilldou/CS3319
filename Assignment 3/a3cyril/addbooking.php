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
   $persID= intval($_POST["passValue"]);
   $tripID = intval($_POST["tripValue"]);
   $price =$_POST["tixPrice"];

   $query = 'INSERT INTO booking values("' . $persID . '","' . $tripID . '","' . $price . '")';
   if (!mysqli_query($connection, $query)) {
        die("Error: Please Fill Out Selection Form Properly");
    }
   echo "Your booking was added!";
   mysqli_close($connection);
?>
</ol>
<form action="bookinginfo.php" method="post">
<input type="submit" value="Back">
</body>
</html>
