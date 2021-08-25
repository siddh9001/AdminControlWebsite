<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "empdb";

    $conn = mysqli_connect($server, $user, $pass, $dbname);

    if(!$conn)
        echo "Connection Failed!...".mysqli_connect_error();
?>