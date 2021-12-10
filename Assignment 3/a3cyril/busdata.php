
<?php
   $query = "SELECT * FROM bus";
   $result = mysqli_query($connection,$query);
   if (!$result) {
        die("databases query failed.");
    }
   while ($row = mysqli_fetch_assoc($result)) {
        echo '<input type="radio" name="superLPlate" value="';
        echo $row["lPlateNo"];
        echo '">' . $row["lPlateNo"] . "<br>";
   }
   mysqli_free_result($result);
?>
