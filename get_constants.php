<?php

include("connect.php");

// Query to retrieve constant names, symbols, and numerical values from the "Constants" table
$query = "SELECT name, symbol, value FROM Constants ORDER BY `constant_id` ASC";

$result = $conn->query($query);

$constants = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $constants[] = $row;
    }
}

// Close the database connection
$conn->close();
?>
