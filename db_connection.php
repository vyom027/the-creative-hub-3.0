<?php
// Database connection settings
$host = "localhost"; // Your database host (usually "localhost")
$db_name = "the-creative-hub"; // Your database name
$username = "root"; // Your database username
$password = ""; // Your database password

// Create connection
$conn = mysqli_connect($host, $username, $password, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
