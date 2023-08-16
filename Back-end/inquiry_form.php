<?php
session_start();
include 'dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Use prepared statement for inserting data
    $stmt = $conn->prepare("INSERT INTO inquiries (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Form submitted successfully! You will be responded to soon. Thank you for your feedback.";
    } else {
        $_SESSION['message'] = "Error submitting form. Please try again.";
    }

    $stmt->close();
} else {
    $_SESSION['message'] = "Invalid request. Please try again.";
}

// Close connection
$conn->close();

header("Location: ../front-end/whyus.php"); // Redirect to whyus.php
?>
