<?php
require '../Back-end/dbconnect.php';

if (["REQUEST_METHOD"] == "POST") {
    $lmail = $_POST['lmail'];
    $lpswd = $_POST['lpswd'];

    $query = "SELECT pswd FROM student WHERE semail = `$lmail`";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        if (password_verify($lpswd, $row['pswd'])) {
            echo "Login successfully with <br>";
            echo "SELECT pswd FROM student WHERE semail = `$lmail`";
        } else {
            echo "Invalid password";
        }
    } else {
        echo "User not found";
    }
}
?>