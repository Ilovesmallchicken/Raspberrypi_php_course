
<?php
    $con = mysqli_connect("localhost", "phpmyadmin", "pi", "raspberryDB");
    if (mysqli_connect_errno()) {
        echo "Fail to connect to MySQL: " . mysqli_connect_error();
    }

    $result = mysqli_query($con, "SELECT * FROM temp");

    echo "<table border='1'>
            <tr>
              <th>Date Time</th>
              <th>Temperature</th>
              <th>user ID</th>
            </tr>";

    while ( $row = mysqli_fetch_array($result) ) {
        echo "<tr>";
        echo "<td>" . $row['datetime'] . "</td>";
        echo "<td>" . $row['temp'] . "</td>";
        echo "<td>" . $row['userid'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
    mysqli.close($con);
?>
