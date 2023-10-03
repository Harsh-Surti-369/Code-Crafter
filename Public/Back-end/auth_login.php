<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php

// Function to check if the user is logged in and their role
function checkLogin() {
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        // User is not logged in, display a message and a login button with Bootstrap styles
        echo '<div class="container mt-5">';
        echo '<div class="alert alert-danger">You are not logged in. Please <a href="../Front-end/login.php" class="btn btn-primary">Log in</a> to access this page.</div>';
        echo '</div>';
        exit();
    } elseif ($_SESSION['role'] !== 'student' && $_SESSION['role'] !== 'faculty') {
        // User is logged in but does not have a valid role, display an error message
        echo '<div class="container mt-5">';
        echo '<div class="alert alert-danger">Error: Invalid user role.</div>';
        echo '</div>';
        exit();
    }
}

// Include the checkLogin() function at the top of your protected pages
?>
