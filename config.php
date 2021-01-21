<?php
    $host="localhost";    // Host Name
    $username = "root";  // Mysql Username
    $password = "";     // Mysql Password
    $db_name = "central_bank";  // Database Name in MYPHPADMIN

    $conn = mysqli_connect("$host","$username","$password","$db_name");

    if(!$conn){
        die("Could not connect to the database due to following error -->".mysqli_connect_error());
    }
?>