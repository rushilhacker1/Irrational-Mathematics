<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection parameters
    $db_host = "sql208.infinityfree.com";
    $db_user = "if0_35269814";
    $db_password = "LjuPgysjftc9d7O";
    $db_name = "if0_35269814_ir";

    // Create a database connection
    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get user input from the form
    $name = $_POST['name'];
    $symbol = $_POST['symbol'];
    $value = $_POST['value'];
    $position = intval($_POST['position']); // Convert position to an integer

    // Prepare a statement to insert the new entry
    $insertQuery = "INSERT INTO constants (name, symbol, value) VALUES (?, ?, ?)";

    // Create a prepared statement
    $stmt = $conn->prepare($insertQuery);

    if ($stmt) {
        // Bind parameters and execute the statement
        $stmt->bind_param("sss", $name, $symbol, $value);

        // Calculate the new ID based on the desired position
        $newId = $position;

        // Update IDs of subsequent entries
        $updateQuery = "UPDATE constants SET constant_id = constant_id + 1 WHERE constant_id >= ?";

        $stmt2 = $conn->prepare($updateQuery);
        if ($stmt2) {
            $stmt2->bind_param("i", $position);
            $stmt2->execute();
            $stmt2->close();
        }

        // Execute the insert statement
        if ($stmt->execute()) {
            echo "New entry added successfully!";
        } else {
            echo "Error adding new entry: " . $stmt->error;
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        echo "Error creating prepared statement: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Constant Entry</title>
</head>
<body>
    <h1>Add a New Constant Entry</h1>
    <form action="" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="symbol">Symbol:</label>
        <input type="text" id="symbol" name="symbol" required><br>

        <label for="value">Value:</label>
        <textarea id="value" name="value" required></textarea><br>

        <label for="position">Position (Enter an integer):</label>
        <input type="number" id="position" name="position" required><br>

        <input type="submit" value="Add Entry">
    </form>
</body>
</html>
