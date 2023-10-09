<!doctype html>
<html>
    <head>
        <title> Bar chart</title>
        <script src = "Chart.js/dist/Chart.min.js"></script>
    </head>
    <body>
        <div style = "width: 50%">
            <canvas id = "canvas" height="450" width="800"></canvas>
        </div>
    <?php
        $con = mysqli_connect("localhost", "phpmyadmin", "pi", "raspberryDB");
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_errno();
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
            $Lables = $Lables .  '"' . $row['datetime'] . '", ' ;
            $temps = $temps . '"' . $row['temp'] . '", ';
        }

        echo "</table>";
        //mysqli.close( $con );
    ?>
    <script>
        var barChartData = {
                labels : [ <?php echo $Lables; ?> ],
                datasets : [ {
                        label : "Temperature",
                        backgroundColor : 'rgba( 230, 99, 100, 0.5 )', 
                        borderWidth : 1,
                        borderColor : 'rgba( 200, 99, 132, 1 )',
                        data : [ <?php echo $temps; ?> ]
                } ]
        }

        window.onload = function() {
            var ctx = document.getElementById( "canvas" ).getContext( "2d" ) ;
            window.myBar = new Chart( ctx, { type : 'bar', data : barChartData } ) ;
        }
    </script>
    </body>
</html>
