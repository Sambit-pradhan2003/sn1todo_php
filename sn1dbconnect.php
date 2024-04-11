<?php 
    $servername = "localhost";
    $username = "root";
    $pass = "";
    $database = 'sn';
    $conn = mysqli_connect($servername, $username, $pass, $database);
    if (!$conn) {
        die("Sorry, failed to connect: " . mysqli_connect_error());
    }
    else{
        echo "sucessfull";
    }
?>