<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Profile</title>
  <!-- bootstrap css -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
  <!-- jquery -->
  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <!-- bootstrap js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script> <!-- Include your custom CSS styles here -->
  <link rel="stylesheet" href="../Front-end/CSS/headerfooter.css">
  <link rel="stylesheet" href="../Front-end/CSS/facultyprofile.css">
  <link rel="shortcut icon" href="../Assets/images/logo/cODE cRAFT lOGO.jpg" type="image/x-icon" />

</head>

<body>
<?php
session_start();
require '../Back-end/dbconnect.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === false || $_SESSION['role'] === "guest") {
  // Display an alert message using Bootstrap classes
  echo '<div class="alert alert-danger" role="alert">';
  echo '<h2 class="alert-heading">Login Required</h2>';
  echo '<p>Login first to access your profile.</p>';
  echo '<a class="btn btn-primary custom-login-button" href="login.php">Log in</a>';
  echo '</div>';
  exit(); // Stop further execution
}

// Get the student ID from the session (you can modify this based on your authentication logic)
$sid = $_SESSION['sid'];
// echo $sid;
$query = "SELECT * FROM student WHERE sid = $sid";
$result = mysqli_query($conn, $query);

// Check if the student exists
if (mysqli_num_rows($result) === 1) {
  $student = mysqli_fetch_assoc($result);
} else {
  // Handle the case where the student doesn't exist
  echo "Student not found.";
  exit();
}

// Handle profile update
if (isset($_POST['update_profile'])) {
  $updatedName = $_POST['name'];
  $updatedEmail = $_POST['email'];

  $updateQuery = "UPDATE student SET sname='$updatedName', semail='$updatedEmail' WHERE sid=$sid";

  if (mysqli_query($conn, $updateQuery)) {
    echo '<div class="alert alert-success" role="alert">';
    echo 'Profile updated successfully';
    echo '</div>';
    // Update the $student array to reflect the changes
    $student['sname'] = $updatedName;
    $student['semail'] = $updatedEmail;
  } else {
    echo '<div class="alert alert-danger" role="alert">';
    echo 'Error updating profile: ';
    echo '</div>';
  }
}

// Handle account deletion
if (isset($_POST['delete_account'])) {
  $deleteQuery = "DELETE FROM student WHERE sid= $sid";

  if (mysqli_query($conn, $deleteQuery)) {
    // Redirect to the logout page or any other page after successful deletion
    header("Location: login.php");
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

?>

<!-- header navbar -->
  <header class="sticky-top">
    <nav class="navbar navbar-expand-lg p-2 mb-2 bg-light bg-gradient text-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.html"><img src="../Assets/images/logo/cODE cRAFT lOGO.jpg" alt="Code-Crafetr" class="logo" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse flex-row-reverse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="../Front-end/home.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="course.php">Courses</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="whyus.php">Why We</a>
            </li>

            <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true  && $_SESSION['role'] == 'student') {
              echo '<li class="nav-item cls mx-2">
                      <a class="nav-link ls" href="mycourse.php">My course</a>
                      </li>';
              echo '<li class="nav-item cls">
                        <a class="nav-link ls active" href="Profile.php">
                          Profile
                        </a>
                      </li>';
            } elseif (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true  && $_SESSION['role'] == 'faculty') {
              echo '<li class="nav-item cls mx-2">
                      <a class="nav-link ls" href="../faculty_module/create_course.php">Create course</a>
                      </li>';
              echo '<li class="nav-item cls">
                        <a class="nav-link ls" href="../upload_video.php">
                          Update course
                        </a>
                      </li>';
            } elseif (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == false) {
              echo '<li class= "nav-item cls mx-2">
                        <a class="nav-link ls" href="login.php">Log in</a>
                      </li>';
              echo '<div class="dropstart cls">
                        <button type="button" class="btn dropdown-toggle ls" data-bs-toggle="dropdown">Sign Up</button>
                        <ul class="dropdown-menu">
                          <a class="dropdown-item" href="../Back-end/student.signup.php">Sign Up as Student</a>
                          <a class="dropdown-item" href="../Back-end/teacher.signup.php">Sign Up as Faculty</a>
                        </ul>
                      </div>';
            } elseif (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == false && $_SESSION['role'] == 'guest') {
              echo '<li class= "nav-item cls mx-2">
                        <a class="nav-link ls" href="login.php">Log in</a>
                      </li>';
              echo '<div class="dropstart cls">
                        <button type="button" class="btn dropdown-toggle ls" data-bs-toggle="dropdown">Sign Up</button>
                        <ul class="dropdown-menu">
                          <a class="dropdown-item" href="../Back-end/student.signup.php">Sign Up as Student</a>
                          <a class="dropdown-item" href="../Back-end/teacher.signup.php">Sign Up as Faculty</a>
                        </ul>
                      </div>';
            } else {
              echo '<li class= "nav-item cls mx-2">
                        <a class="nav-link ls" href="login.php">Log in</a>
                      </li>';
              echo '<div class="dropstart cls">
                        <button type="button" class="btn dropdown-toggle ls" data-bs-toggle="dropdown">Sign Up</button>
                        <ul class="dropdown-menu">
                          <a class="dropdown-item" href="../Back-end/student.signup.php">Sign Up as Student</a>
                          <a class="dropdown-item" href="../Back-end/teacher.signup.php">Sign Up as Faculty</a>
                        </ul>
                      </div>';
            }
            ?>
        </div>
        </ul>
      </div>
      </div>
    </nav>
  </header>

  <div class="container my-4">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="profile-card">
          <h2 class="card-header">Student Profile</h2>
          <div class="card-body">
            <h5>Student Details:</h5>
            <p>Name: <?php echo $student['sname']; ?></p>
            <p>Email: <?php echo $student['semail']; ?></p>
            <form action="profile.php" method="post">
              <div class="mb-3">
                <label for="name" class="form-label">Student Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $student['sname']; ?>">
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $student['semail']; ?>">
              </div>
              <button type="submit" class="btn btn-primary" name="update_profile">Update Profile</button>
            </form>
            <form action="profile.php" method="post">
              <button type="submit" class="btn btn-danger" name="delete_account">Delete Account</button>
            </form>
            <form method="POST" name="logout">
              <button type="submit" name="logout" class="btn btn-danger mt-3 logout-button">Logout</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>