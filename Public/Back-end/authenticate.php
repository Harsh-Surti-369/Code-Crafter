<?php
session_start(); // Start the session

require '../Back-end/dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lmail = $_POST['lmail'];
    $lpswd = $_POST['lpswd'];

    $student_query = "SELECT * FROM student WHERE semail = '$lmail' and pswd = '$lpswd'";
    $faculty_query = "SELECT * FROM faculty WHERE femail = '$lmail' and fpswd = '$lpswd'";

    $student_result = mysqli_query($conn, $student_query);
    $faculty_result = mysqli_query($conn, $faculty_query);
    
    if ($student_result->num_rows == 1) {
        // Set session variables to mark the user as logged in and as a student
        $_SESSION['loggedin'] = true;
        $_SESSION['role'] = 'student';

        // Redirect to the student dashboard or explore courses page
        header("Location: ../Front-end/index.html");
        exit();
    } elseif ($faculty_result->num_rows == 1) {
        // Set session variables to mark the user as logged in and as a faculty
        $_SESSION['loggedin'] = true;
        $_SESSION['role'] = 'faculty';

        // Redirect to the faculty dashboard or other appropriate page
        header("Location: ../Front-end/whyus.php");
        exit();
    } else {
        // No matching account found
        $login = "../Front-end/login.html";
        header("Location: ". $login);
        exit();
    }  
}
?>