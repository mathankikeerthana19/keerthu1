<?php
$servername = "localhost";  // Your database server (use 'localhost' if it's on the same server)
$username = "root";         // Your database username
$password = "";             // Your database password
$dbname = "dance_booking";  // The name of your database

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
