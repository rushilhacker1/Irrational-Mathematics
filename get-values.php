<?php
include("connect.php"); // Include your database connection code

if (isset($_GET['name'])) {
    $constantName = $_GET['name'];
    $query = "SELECT value FROM Constants WHERE name = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $constantName);
    $stmt->execute();
    $stmt->bind_result($value);
    $stmt->fetch();
    $stmt->close();
    echo $value;
} else {
    echo 'Constant not found';
}

// Close the database connection
$conn->close();
?>
