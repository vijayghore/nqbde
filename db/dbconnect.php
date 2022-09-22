<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "nqbde";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Sorry! Couldn't connect" . mysqli_connect_error());
        exit;
    }
