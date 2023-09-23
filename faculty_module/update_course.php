<?php
session_start();
require '../public/back-end/dbconnect.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === false || $_SESSION['role'] === "guest") {
  // Redirect to login page if not logged in
  header("Location: ../public/front-end/login.php");
  exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Handle course update
  if (isset($_POST['updateCourseName']) && isset($_POST['updateCourseDesc'])) {
    $updateCourseName = $_POST['updateCourseName'];
    $updateCourseDesc = $_POST['updateCourseDesc'];

    // Check if an updated image is provided
    if ($_FILES['updateIntroImage']['size'] > 0) {
      $updateIntroImageName = 'intro_' . time() . '_' . $_FILES['updateIntroImage']['name'];
      $updateIntroImagePath = 'uploads/' . $updateIntroImageName;
      move_uploaded_file($_FILES['updateIntroImage']['tmp_name'], $updateIntroImagePath);

      // Update course details with the new image
      $updateQuery = "UPDATE courses SET description = '$updateCourseDesc', intro_image = '$updateIntroImageName' WHERE course_name = '$updateCourseName'";
    } else {
      // Update course details without changing the image
      $updateQuery = "UPDATE courses SET description = '$updateCourseDesc' WHERE course_name = '$updateCourseName'";
    }

    if (mysqli_query($conn, $updateQuery)) {
      header("Location: facultyprofile.php");
      exit();
    } else {
      echo "Error updating course.";
    }
  }

  // Handle course deletion
  if (isset($_POST['delete_course']) && isset($_POST['course_name'])) {
    $courseToDelete = $_POST['course_name'];

    // Delete the course and its associated files (if needed)
    $deleteQuery = "DELETE FROM courses WHERE course_name = '$courseToDelete'";

    if (mysqli_query($conn, $deleteQuery)) {
      // Redirect to the faculty profile page or another suitable location
      header("Location: facultyprofile.php");
      exit();
    } else {
      echo "Error deleting course.";
    }
  }
}
?>
