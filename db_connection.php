<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fastcourier";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection status
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// echo "Connected successfully to the database!";
?>
