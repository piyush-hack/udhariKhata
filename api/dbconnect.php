<?php


$servername = "localhost";
$username = "id17991223_piyush";
$password = "Piyushpuniya@2001";
$dbname = "id17991223_notes";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn)
    echo "Failed to connect to the database";

