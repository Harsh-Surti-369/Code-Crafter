<?php

require '../public/back-end/dbconnect.php';


session_start();
require '../public/back-end/dbconnect.php';

// if ($_SESSION['loggedin'] === false) {
//     header("Location: ../public/Front-end/login.php");
//     exit();
// }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $courseID = $_POST['courseID'];

    // Handle video upload
    $videoFile = $_FILES['videoFile']['tmp_name'];

    // Validate file type and move it to the appropriate directory
    $videoFileName = 'video_' . time() . '_' . $_FILES['videoFile']['name'];
    move_uploaded_file($videoFile, 'video_uploads/' . $videoFileName);

    // Insert video details into the database
    $insertVideoQuery = "INSERT INTO course_videos (course_id, video_file) 
                        VALUES ('$courseID', '$videoFileName')";
    mysqli_query($conn, $insertVideoQuery);

    // Redirect to a suitable location
    header("Location: ../public/front-end/course.php?course_id=$courseID");
    exit();
} else {
    // header("Location: ../public/Front-end/login.php");
    // exit();
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
  <link rel="stylesheet" href="../Public/Front-end/CSS/upload_video.css" />
  <link rel="shortcut icon" href="../Assets/images/logo/cODE cRAFT lOGO.jpg" type="image/x-icon" />
  <title>Upload video of exising course</title>
</head>

<body>
<div class="container mt-5">
        <h1>Upload Video for Course</h1>
        <form action="upload_video.php" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="selectCourse" class="form-label">Select Course:</label>
        <select id="selectCourse" name="courseID" class="form-control" required>
            <option value="" disabled selected>Select a Course</option>
            <!-- PHP code to populate the dropdown with available courses -->
            <?php
                $query = "SELECT course_id, course_name FROM courses";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['course_id']}'>{$row['course_name']}</option>";
                }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="videoFile" class="form-label">Upload Video:</label>
        <input type="file" id="videoFile" name="videoFile" accept="video/*" class="form-control" required>
    </div>

    <label class="file-input-label">Upload a video for the selected course.</label>

    <button type="submit" class="btn btn-upload-video">Upload Video</button>
</form>
    </div>
</body>
</html>
