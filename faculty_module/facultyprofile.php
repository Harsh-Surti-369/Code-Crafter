<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- bootstrap css -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../Public/Front-end/CSS/headerfooter.css" />
  <link rel="stylesheet" href="../Public/Front-end/CSS/facultyprofile.css" />
  <link rel="shortcut icon" href="../Assets/images/logo/cODE cRAFT lOGO.jpg" type="image/x-icon" />
  <title>Faculty Profile</title>
</head>

<body>
  <?php
  session_start();
  require '../public/back-end/dbconnect.php';

  if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === false || $_SESSION['role'] === "guest") {
    // Display an alert message using Bootstrap classes
    echo '<div class="alert alert-danger" role="alert">';
    echo '<h2 class="alert-heading">Login Required</h2>';
    echo '<p>Login first to access your profile.</p>';
    echo '<a class="btn btn-primary custom-login-button" href="../public/front-end/login.php">Log in</a>';
    echo '</div>';
    exit(); // Stop further execution
  }

  // Get faculty details based on session data
  $fid = $_SESSION['fid'];
  // echo $fid;
  $facultyQuery = "SELECT * FROM faculty WHERE fid = $fid";
  $facultyResult = mysqli_query($conn, $facultyQuery);

  // Check if the faculty record exists
  if (mysqli_num_rows($facultyResult) === 1) {
    $faculty = mysqli_fetch_assoc($facultyResult);
  } else {
    // Handle the case where the faculty record doesn't exist
    echo "Faculty not found.";
    exit();
  }

  // Update faculty details if the form is submitted
  if (isset($_POST['update_profile'])) {
    $newFullName = $_POST['fullname'];
    $newEmail = $_POST['email'];

    // Update faculty information in the database
    $updateQuery = "UPDATE faculty SET fullname = '$newFullName', femail = '$newEmail' WHERE fid = $fid";

    if (mysqli_query($conn, $updateQuery)) {
      echo '<div class="alert alert-success" role="alert">';
      echo 'Profile updated successfully';
      echo '</div>';
      $faculty['fullname'] = $newFullName;
      $faculty['femail'] = $newEmail;
    } else {
      // Handle the update error
      echo '<div class="alert alert-danger" role="alert">';
      echo 'Error updating faculty information: ';
      echo '</div>';
    }
  }

  // Handle account deletion
  if (isset($_POST['delete_profile'])) {
    $deleteQuery = "DELETE FROM faculty WHERE fid= $fid";

    if (mysqli_query($conn, $deleteQuery)) {
      // Redirect to the logout page or any other page after successful deletion
      header("Location: ../public/front-end/login.php");
      exit();
    } else {
      echo '<div class="alert alert-danger" role="alert">';
      echo 'Error deleting account: ';
      echo '</div>';
    }
  }
  // Logout faculty
  if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
  }

  // Initialize $searchQuery
  $searchQuery = "";

  if (isset($_GET['search_query'])) {
    $fid = $_SESSION['fid'];

    // Replace 'YOUR_SEARCH_QUERY' with the search query entered by the faculty
    $searchQuery = mysqli_real_escape_string($conn, $_GET['search_query']);

    // Construct the SQL query
    $coursesQuery = "SELECT * FROM courses
                    WHERE fid = $fid 
                    AND (course_name LIKE '%$searchQuery%' OR description LIKE '%$searchQuery%')";

    // Execute the search query
    $coursesResult = mysqli_query($conn, $coursesQuery);
  }
  ?>

<?php include 'header.php';?>

  <!-- Add the search form here -->
  <form method="GET" action="facultyprofile.php">
    <div class="mb-3">
      <input type="text" name="search_query" placeholder="Search your courses">
      <button type="submit">Search</button>
    </div>
  </form>

  <!-- Display Searched Courses -->
  <h5>Your Courses:</h5>
  <?php
  if (isset($coursesResult)) {
    while ($course = mysqli_fetch_assoc($coursesResult)) {
  ?>
      <div class="faculty-course">
        <h6><?php echo $course['course_name']; ?></h6>
        <p><?php echo $course['description']; ?></p>
        <img src="../uploads/<?php echo $course['intro_image']; ?>" alt="Course Image" class="course-image" />

        <!-- Update Button to Open Modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateCourseModal<?php echo $course['course_name']; ?>">Update</button>

        <!-- Delete Form Button -->
        <form method="POST" class="delete-form">
          <input type="hidden" name="course_name" value="<?php echo $course['course_name']; ?>">
          <button name="delete_course" type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>

      <!-- Update Course Modal -->
      <div class="modal fade" id="updateCourseModal<?php echo $course['course_name']; ?>" tabindex="-1" role="dialog" aria-labelledby="updateCourseModalLabel<?php echo $course['course_name']; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="updateCourseModalLabel<?php echo $course['course_name']; ?>">Update Course</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <!-- Update Course Form -->
            <form action="update_course.php" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="mb-3">
                  <label for="updateCourseName" class="form-label">Course Name:</label>
                  <input type="text" id="updateCourseName" name="updateCourseName" class="form-control" value="<?php echo $course['course_name']; ?>" required>
                </div>
                <div class="mb-3">
                  <label for="updateCourseDesc" class="form-label">Course Description:</label>
                  <textarea id="updateCourseDesc" name="updateCourseDesc" rows="2" class="form-control" required><?php echo $course['description']; ?></textarea>
                </div>
                <div class="mb-3">
                  <label for="updateIntroImage" class="form-label">Intro Image:</label>
                  <input type="file" id="updateIntroImage" name="updateIntroImage" accept="image/*" class="form-control">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
  <?php
    }
  } else {
    echo '<p>No courses found.</p>';
  }
  ?>

  <!-- profile -->
  <div class="container my-4">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="profile-card">
          <h2 class="card-header">Faculty Profile</h2>
          <div class="card-body">
            <h5>faculty Details:</h5>
            <p>Name: <?php echo $faculty['fullname']; ?></p>
            <p>Email: <?php echo $faculty['femail']; ?></p>
            <form method="POST">
              <div class="mb-3">
                <label for="fullname" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $faculty['fullname']; ?>">
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $faculty['femail']; ?>">
              </div>
              <button name="update_profile" type="submit" class="btn btn-primary">Update Profile</button>
            </form>
            <form action="facultyprofile.php" method="post">
              <button name="delete_profile" type="submit" class="btn btn-danger" name="delete_account">Delete Account</button>
            </form>
            <form method="POST" name="logout">
              <button type="submit" name="logout" class="btn btn-danger mt-3 logout-button">Logout</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Add these script imports at the end of your HTML body -->
  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>