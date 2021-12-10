<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="backendUI.css">
<meta charset="utf-8">
<title>Western Travel Agency</title>
</head>
<body>
<?php
   include 'upload_file.php';
   include 'dataconnect.php';
?>
<h1>Here are your Trips:</h1>
<ol>
<?php
   $tripName = $_POST["tripName"];
   $startDate = $_POST["startDate"];
   $endDate = $_POST["endDate"];
   $destination = $_POST["destination"];
   $lPlate = $_POST["superLPlate"];
   $query1= 'select max(tripID) as maxMost from busTrip';
   $result=mysqli_query($connection,$query1);
   if (!$result) {
          die("database max query failed.");
   }
   $row=mysqli_fetch_assoc($result);
   $tripID = intval($row["maxMost"]) + 1;
   $query = 'INSERT INTO busTrip values("' . $tripID . '","' . $tripName . '","' . $startDate . '","' . $endDate . '","' . $destination . '","' . $lPlate . '","' . $tripPic . '")';
   if (!mysqli_query($connection, $query)) {
        die("Error: insert failed" . mysqli_error($connection));
    }
   echo "Your Trip Was Added!";
   mysqli_close($connection);
?>
</ol>
<form action="agency_backend.php" method="post">
<input type="submit" value="Return to Home">
</form>
</body>
</html>
