<?php
// db_config.php (for DB connection)
$host = 'localhost';      // Your database host
$username = 'root';       // Database username
$password = '';           // Database password
$database = 'db_supply';     // Database name

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>