<html>
<head>
<link rel="stylesheet" href="backendUInull.css">
</head>
<?php
        $query = "SELECT DISTINCT destination FROM busTrip";
        $result = mysqli_query($connection,$query);

        if (!$result) {
                die("databases query failed.");
        }

        echo "<div class = 'steele'>";
        echo "Select a Country";
        echo "</div>";

        echo "<div class = 'centre'>";

        echo '<table border = "1"> <tr> <th>Select</th> <th>Country</th> </tr>';
        while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . '<input type="radio" name="passValue" value="';
                echo $row["destination"];
                echo '">' . '</td>' . '<td>' . $row["destination"] . '</td>';
        }

        echo "</table>";
        /* echo "</div>; */

        mysqli_free_result($result);
?>
</html>
