<?php

include 'db_connect.php';

// Handle update action
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $entry_id = $_POST['entry_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Update data in the database
    $sql = "UPDATE inquiries SET name='$name', email='$email', message='$message' WHERE id='$entry_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Form updated successfully!";
    } else {
        echo "Error updating form: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}

// Close connection
$conn->close();
?>
