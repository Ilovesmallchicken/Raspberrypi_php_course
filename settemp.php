
<?php
    $con = mysqli_connect("localhost", "phpmyadmin", "pi", "raspberryDB");
    if (mysqli_connect_errno()) {
        echo "Fail to connect to MySQL: " . mysqli_connect_error();
    }

    $now1 = date('Ymdhis');
    $id = $_GET['id'];
    $temp = $_GET['temp'];

    mysqli_query($con, "INSERT INTO temp (datetime, temp, userid) VALUE ($now1, $temp, $id)");

    mysqli_close($con);
    echo "get" . ", date time = " . $now1 . ", temp = " . $temp . ", id = " . $id;
?>
