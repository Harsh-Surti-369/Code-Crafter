
<?php
session_start();
$fid = $_SESSION['fid'];

require '../public/back-end/dbconnect.php';

if ($_SESSION['loggedin'] === false) {
    header("Location: ../public/Front-end/login.php");
    exit();
} elseif ($_SESSION['loggedin'] === true && $_SESSION['role'] === 'faculty') {

    // Check if the course_name parameter is set in the URL
    if (isset($_GET['course_name'])) {
        $courseNameToUpdate = $_GET['course_name'];

        // Fetch course details based on $courseNameToUpdate from the database
        $query = "SELECT * FROM courses WHERE course_name = '$courseNameToUpdate'";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $course = mysqli_fetch_assoc($result);
        } else {
            // Handle the case where the course does not exist
            echo "Course not found.";
            exit;
        }
    } else {
        // Handle the case where course_name parameter is missing
        echo "Course name not provided.";
        exit;
    }

    // Handle the form submission to update course details
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $newCourseName = $_POST["new_course_name"];
        $newDescription = $_POST["new_description"];

        // File upload handling for intro image
        if ($_FILES['new_intro_image']['error'] === 0) {
            // Handle the intro image upload
            $introImageName = 'intro_' . time() . '_' . $_FILES['new_intro_image']['name'];
            $introImagePath = '' . $introImageName;
            move_uploaded_file($_FILES['new_intro_image']['tmp_name'], $introImagePath);
        } else {
            // No new intro image uploaded, keep the existing path
            $introImagePath = $course['intro_image'];
        }

        // File upload handling for course video
        if ($_FILES['new_course_video']['error'] === 0) {
            // Handle the course video upload
            $courseVideoName = 'video_' . time() . '_' . $_FILES['new_course_video']['name'];
            $courseVideoPath = 'uploads/' . $courseVideoName;
            move_uploaded_file($_FILES['new_course_video']['tmp_name'], $courseVideoPath);
        } else {
            // No new course video uploaded, keep the existing path
            $courseVideoPath = $course['course_video'];
        }

        // Update the course details in the database, including file paths
        $updateQuery = "UPDATE courses SET course_name = '$newCourseName', description = '$newDescription', intro_image = '$introImagePath', course_video = '$courseVideoPath' WHERE course_name = '$courseNameToUpdate'";

        if (mysqli_query($conn, $updateQuery)) {
            // Course updated successfully
            $successMessage = "Course details updated successfully.";
            // Update the $course array with the new details for displaying
            $course['course_name'] = $newCourseName;
            $course['description'] = $newDescription;
            $course['intro_image'] = $introImagePath;
            $course['course_video'] = $courseVideoPath;
        } else {
            // Error occurred during the update
            $errorMessage = "Error: " . mysqli_error($conn);
        }
    }
} else {
    header("Location: ../public/Front-end/login.php");
    exit();
}
?>

<!DOCTYPE html>
 <html lang="en">

 <head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <!-- bootstrap css -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
   <!-- jquery -->
   <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
   <!-- bootstrap js -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

   <!-- font awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="shortcut icon" href="../Assets/images/logo/cODE cRAFT lOGO.jpg" type="image/x-icon" />
   <link rel="stylesheet" href="../Public/Front-end/CSS/create_course.css">
   <link rel="stylesheet" href="../Public/Front-end/CSS/headerfooter.css" />
   <title>Update your course</title>
 </head>
 
 <?php include "header.php"; ?>
 <div class="container mt-5">
        <h1 class="display-4 mb-4">Update Course Details</h1>

        <?php if (isset($successMessage)) { ?>
            <div class="alert alert-success"><?php echo $successMessage; ?></div>
        <?php } elseif (isset($errorMessage)) { ?>
            <div class="alert alert-danger"><?php echo $errorMessage; ?></div>
        <?php } ?>

        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="new_course_name" class="form-label">New Course Name:</label>
                <input type="text" class="form-control" id="new_course_name" name="new_course_name" value="<?php echo $course['course_name']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="new_description" class="form-label">New Description:</label>
                <textarea class="form-control" id="new_description" name="new_description" rows="4" required><?php echo $course['description']; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="new_intro_image" class="form-label">New Intro Image:</label>
                <input type="file" class="form-control" id="new_intro_image" name="new_intro_image" accept="image/*">
            </div>
            <div class="mb-3">
                <label for="new_course_video" class="form-label">New Course Video:</label>
                <input type="file" class="form-control" id="new_course_video" name="new_course_video" accept="video/*">
            </div>
            <button type="submit" class="btn btn-primary">Update Course</button>
        </form>
    </div>
    </body>
</html>