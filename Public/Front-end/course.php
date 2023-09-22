<?php
session_start();
if (isset($SESSION['loggedin']) && $SESSION['loggedin'] == false) {
  echo "<h2>Login first to access courses</h>";
  echo "<a class='ls' href='login.php'>Log in</a>";
}
require '../back-end/dbconnect.php';

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
  <link rel="stylesheet" href="CSS/headerfooter.css" />
  <link rel="stylesheet" href="CSS/course.css" />
  <link rel="shortcut icon" href="../Assets/images/logo/cODE cRAFT lOGO.jpg" type="image/x-icon" />
  <title>Best IT courses</title>
</head>

<body>

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
              <a class="nav-link active" href="course.php">Courses</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="whyus.php">Why We</a>
            </li>

            <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true  && $_SESSION['role'] == 'student') {
              echo '<li class="nav-item cls">
                        <a class="nav-link ls" href="Profile.php">
                          Profile
                        </a>
                      </li>';
            } elseif (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true  && $_SESSION['role'] == 'faculty') {
              echo '<li class="nav-item cls mx-2">
                      <a class="nav-link ls" href="`../../faculty_module/create_course.php">Create course</a>
                      </li>';
              echo '<li class="nav-item cls">
                        <a class="nav-link ls" href="../../faculty_module/upload_video.php">
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

  <div class="container mt-5">
    <h1 class="mb-4">Explore Courses</h1>

    <!-- Section 1: Newly Arrived Courses -->
    <section class="mb-5">
      <h2>Newly Arrived Courses</h2>
      <div class="row">
        <?php
        // Retrieve course information from the database
        $coursesQuery = "SELECT * FROM courses";
        $coursesResult = mysqli_query($conn, $coursesQuery);

        if (!$coursesResult) {
          // Handle the query error for courses
          echo "Error: " . mysqli_error($conn);
        } else {
          while ($course = mysqli_fetch_assoc($coursesResult)) {
            // Retrieve faculty information based on 'fid'
            $fid = $course['fid'];
            $facultyQuery = "SELECT * FROM `faculty` WHERE fid = '$fid'";
            $facultyResult = mysqli_query($conn, $facultyQuery);

            if (!$facultyResult) {
              echo "Error in faculty query: ";
            } else {
              $faculty = mysqli_fetch_assoc($facultyResult);

              // Display the course card with the image and faculty information
        ?>
              <div class="col-md-4">
                <div class="course-card">
                  
                  <img src="../../faculty_module/uploads/ <?php echo $course['intro_image']; ?>" class="img-fluid mb-3" alt="Course Image">
                  <h5 class="card-title"><?php echo $course['course_name']; ?></h5>
                  <p class="card-text"><?php echo $course['description']; ?></p>
                  <p class="faculty-name">
                    <?php
                    if (isset($faculty['fullname'])) {
                      echo $faculty['fullname'];
                    } else {
                    }
                    ?>
                  </p>
                  <div class="buttons">
                    <a href="course_player.php?course_name=<?php echo urlencode($course['course_name']); ?>" class="btn btn-outline-warning">Learn</a>
                  </div>
                </div>
              </div>
        <?php
            }
          }
        }
        ?>
      </div>
    </section>
  </div>

  <!-- footer -->
  <?php include "../Back-end/footer.php"; ?>

</body>

</html>