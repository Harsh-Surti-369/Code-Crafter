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

  if (mysqli_query($conn,$updateQuery)) {
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
?>
  <!-- header navbar -->
  <header class="sticky-top">
    <nav class="navbar navbar-expand-lg p-2 mb-2 bg-light bg-gradient text-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.html"><img src="../public/Assets/images/logo/cODE cRAFT lOGO.jpg" alt="Code-Crafetr" class="logo" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse flex-row-reverse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="../public/Front-end/home.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../public/Front-end/course.php">Courses</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../public/Front-end/whyus.php">Why We</a>
            </li>

            <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true  && $_SESSION['role'] == 'student') {
              echo '<li class="nav-item cls mx-2">
                      <a class="nav-link ls" href="mycourse.php">My course</a>
                      </li>';
              echo '<li class="nav-item cls">
                        <a class="nav-link ls" href="Pofile.php">
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
</body>

</html>