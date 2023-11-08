<?php
// Database connection parameters
$servername = "sql208.infinityfree.com";
$username = "if0_35269814";
$password = "LjuPgysjftc9d7O";
$database = "if0_35269814_ir";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>