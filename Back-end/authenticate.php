<?php
require '../Back-end/dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lmail = $_POST['lmail'];
    $lpswd = $_POST['lpswd'];

    $student_query = "SELECT * FROM student WHERE semail = '$lmail' and pswd = '$lpswd'";
    $faculty_query = "SELECT * FROM faculty WHERE femail = '$lmail' and fpswd = '$lpswd'";

    $student_result = mysqli_query($conn,$student_query);
    $faculty_result = mysqli_query($conn,$faculty_query);
    
    if ($student_result->num_rows == 1) {
        // $home = "";
        header("Location : ../Front-end/index.html");
        
    }
    elseif ($faculty_result->num_rows == 1) {
        echo "Login successfully as student";
    }else{
        $login = "../Front-end/login.html";
        header("Location: ". $login);
        echo "Not found account sign up first";
    }  
}
?>