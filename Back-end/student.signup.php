<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$server = "localhost";
$user = "root";
$password = "";
$db = "practice";

// Establish a connection to the database
$con = mysqli_connect($server, $user, $password, $db);

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Retrieve form data
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mname = $_POST['mname'];
    $faname = $_POST['faname'];
    $dob = $_POST['dob'];
    $pincode = $_POST['pincode'];
    $email = $_POST['email'];

    if ($con) {
        // SQL query with placeholders
        $query = "INSERT INTO `student` (`fname`, `lname`, `mname`, `faname`, `dob`, `pincode`, `email`)
                  VALUES (?, ?, ?, ?, ?, ?, ?)";

        // Prepare the query using the database connection
        $stmt = mysqli_prepare($con, $query);

        // Bind the values to the placeholders
        mysqli_stmt_bind_param($stmt, "sssssss", $fname, $lname, $mname, $faname, $dob, $pincode, $email);

        // Execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            echo "<h1>Now you are our student</h1>";
            // Display a success message if the insertion is successful
        } else {
            echo "<h3>Technical issue, please try again</h3>";
            // Display an error message if the insertion fails
        }

        // Close the prepared statement
        mysqli_stmt_close($stmt);
    } else {
        echo "<h3>Technical issue, please try again</h3>";
        // Display an error message if the database connection fails
    }
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
  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../Front-end/CSS/headerfooter.css" />
  <link rel="stylesheet" href="../Front-end/CSS/student.signup.css" />
  <link rel="shortcut icon" href="../Assets/images/logo_for_website-removebg-preview.png" type="image/x-icon" />
  <title>Sign up to Code-crafter</title>
</head>

<body>
  <!-- header navbar -->
  <header class="sticky-top">

    <nav class="navbar navbar-expand-lg p-3 mb-2 bg-light bg-gradient text-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.html"><img src="../Assets/images/logo_for_website-removebg-preview.png"
            alt="Code-Crafetr" class="logo" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link active" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">My Course</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Why We</a>
            </li>
            <li class="nav-item cc">
              <a class="nav-link cart"><i class="fa-solid fa-cart-shopping fa-xl" style="color: #ad78df"></i></a>
            </li>
            <li class="nav-item cls">
              <a class="nav-link ls">Log in</a>
            </li>
            <li class="nav-item dropdown cls">
              <a class="nav-link dropdown-toggle ls" href="#" id="signupDropdown" role="button"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Sign Up
              </a>
              <div class="dropdown-menu" aria-labelledby="signupDropdown">
                <a class="dropdown-item" href="#">Sign Up as Student</a>
                <a class="dropdown-item" href="#">Sign Up as Faculty</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <section class="h-100 bg-dark">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <div class="card card-registration my-4">
            <div class="row g-0">
              <div class="col-xl-6 d-none d-xl-block">
                <img src="../Assets/images/studentimages/studnetform1.webp" alt="Sample photo" class="img-fluid"
                  style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
              </div>
              <div class="col-xl-6">
                <div class="card-body p-md-5 text-black">
                  <h3 class="mb-5 text-uppercase">Student registration form</h3>

                  <form action="student.signup.php" method="post">
                    <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input name="fname" type="text" id="form3Example1m" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Example1m">First name</label>
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input name="lname" type="text" id="form3Example1n" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Example1n">Last name</label>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input name="mname" type="text" id="form3Example1m1" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Example1m1">Mother's name</label>
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input name="faname" type="text" id="form3Example1n1" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Example1n1">Father's name</label>
                      </div>
                    </div>
                  </div>

                  <div class="form-outline mb-4">
                    <input name="dob" type="text" id="form3Example9" class="form-control form-control-lg" />
                    <label class="form-label" for="form3Example9">DOB</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input name="pincode" type="text" id="form3Example90" class="form-control form-control-lg" />
                    <label class="form-label" for="form3Example90">Pincode</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input name="email" type="text" id="form3Example97" class="form-control form-control-lg" />
                    <label class="form-label" for="form3Example97">Email ID</label>
                  </div>

                  <div class="d-flex justify-content-end pt-3">
                    <button type="button" class="btn btn-light btn-lg">Reset all</button>
                    <button name="submit" type="button" class="btn btn-warning btn-lg ms-2">Submit form</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- footer -->
  <footer class="bg-light">
    <div class="container py-5">
      <div class="row">
        <div class="col-md-4">
          <h3 class="mb-4">About Us</h3>
          <p>We are dedicated to providing high-quality IT education and helping individuals become proficient coders.
          </p>
        </div>
        <div class="col-md-4">
          <h3 class="mb-4">Quick Links</h3>
          <ul class="list-unstyled">
            <li><a href="index.html">Home</a></li>
            <li><a href="#">My Course</a></li>
            <li><a href="#">Why We</a></li>
          </ul>
        </div>
        <div class="col-md-4">
          <div class="d-flex flex-column align-items-center">
            <img src="../Assets/images/logo_for_website-removebg-preview.png" alt="Code-Crafter Logo" class="mb-3"
              style="max-width: 100px;">
            <h3 class="mb-4">Contact Us</h3>
            <p>Email: info@code-crafter.com</p>
            <p>Phone: +123-456-7890</p>
            <div class="social-icons mt-4">
              <a href="#" class="text-dark"><i class="fab fa-facebook-square"></i></a>
              <a href="#" class="text-dark"><i class="fab fa-twitter-square"></i></a>
              <a href="#" class="text-dark"><i class="fab fa-instagram-square"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="text-center py-3" style="background-color: #f0f0f0;">
      <p class="mb-0">&copy; 2023 Code Crafter. All rights reserved.</p>
    </div>
  </footer>

</body>

</html>