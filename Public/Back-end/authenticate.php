<?php
session_start(); // Start the session

require '../Back-end/dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lmail = $_POST['lmail'];
    $lpswd = $_POST['lpswd'];

    // Check if the email exists in the student table
    $student_query = "SELECT * FROM student WHERE semail = '$lmail'";
    $student_result = mysqli_query($conn, $student_query);
    
    // Check if the email exists in the faculty table
    $faculty_query = "SELECT * FROM faculty WHERE femail = '$lmail'";
    $faculty_result = mysqli_query($conn, $faculty_query);

    if ($student_result->num_rows == 1) {
        // Email found in student table, now check the password
        $student_data = $student_result->fetch_assoc();
        if ($lpswd == $student_data['pswd']) {
            // Set session variables to mark the user as logged in and as a student
            $_SESSION['role'] = 'student';
            $_SESSION['loggedin'] = true;

            // Redirect to the student dashboard or explore courses page
            header("Location: ../Front-end/home.php");
            exit();
        }
    } elseif ($faculty_result->num_rows == 1) {
        // Email found in faculty table, now check the password
        $faculty_data = $faculty_result->fetch_assoc();
        if ($lpswd == $faculty_data['fpswd']) {
            // Set session variables to mark the user as logged in and as a faculty
            $_SESSION['role'] = 'faculty';
            $_SESSION['loggedin'] = true;

            // Redirect to the faculty dashboard or other appropriate page
            header("Location: ../../faculty_module/facultyprofile.php");
            exit();
        }
    }
 else {
        // No matching account found
        $_SESSION['loggedin'] = false;
        $_SESSION['role'] = 'guest';
        $login = "../Front-end/index.php";
        header("Location: ". $login);
        exit();
    }  
}
?>