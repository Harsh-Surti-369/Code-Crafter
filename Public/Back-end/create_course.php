<?php
session_start();
require 'dbconnect.php';

if ($_SESSION['role'] !== 'faculty') {
    header("Location: ../Front-end/login.html");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $courseName = $_POST['courseName'];
    $courseDesc = $_POST['courseDesc'];

    // Handle image and video uploads
    $introImage = $_FILES['introImage']['tmp_name'];
    $courseVideo = $_FILES['courseVideo']['tmp_name'];

    // Validate file types and move them to appropriate directories
    $introImageName = 'intro_' . time() . '_' . $_FILES['introImage']['name'];
    $courseVideoName = 'video_' . time() . '_' . $_FILES['courseVideo']['name'];

    move_uploaded_file($introImage, 'uploads/' . $introImageName);
    move_uploaded_file($courseVideo, 'uploads/' . $courseVideoName);

    // Insert new course details into the database
    $insertQuery = "INSERT INTO courses (course_name, description, intro_image, course_video) 
                    VALUES ('$courseName', '$courseDesc', '$introImageName', '$courseVideoName')";
    mysqli_query($conn, $insertQuery);

    // Redirect to the course intro page or a suitable location
    header("Location: course.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- bootstrap css -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
  <!-- jquery -->
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <!-- bootstrap js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="shortcut icon" href="../Assets/images/logo/cODE cRAFT lOGO.jpg" type="image/x-icon" />
  <title>Create your new course</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="course-card p-3">
                <h1>Create Course</h1>
    <form action="process_course.php" method="post" enctype="multipart/form-data">
        <label for="courseName">Course Name:</label>
        <input type="text" id="courseName" name="courseName" required><br><br>

        <label for="courseDesc">Course Description:</label><br>
        <textarea id="courseDesc" name="courseDesc" rows="4" cols="50" required></textarea><br><br>

        <label for="introImage">Intro Image:</label>
        <input type="file" id="introImage" name="introImage" accept="image/*" required><br><br>

        <label for="courseVideo">Course Video:</label>
        <input type="file" id="courseVideo" name="courseVideo" accept="video/*" required><br><br>

        <button type="submit">Create Course</button>
    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
