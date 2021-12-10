<html>
<head>
<link rel="stylesheet" href="backendUInull.css">
</head>
<?php
        $query = "SELECT * FROM passenger";
        $result = mysqli_query($connection,$query);

        if (!$result) {
                die("databases query failed.");
        }

        echo "<div class = 'steele'>";
        echo "Find a Passenger";
        echo "</div>";

        echo "<div class = 'centre'>";
        echo '<table border = "1"> <tr> <th>Select</th> <th>ID</th> <th>Name</th> <th>Passport ID</th> </tr>';

        while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . '<input type="radio" name="passValue" value="';
                echo $row["persID"] . '</td>';
                echo '">' . '<td>' . $row["persID"] . '</td>';
                echo '<td>' . $row["fNamePers"] . " " . $row["lNamePers"] . '</td>';
                echo '<td>' . $row["superNum"] . '</td>';
  	}

        echo "</table>";
        /* echo "</div>; */

        mysqli_free_result($result);
?>
</html>
