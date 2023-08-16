<?php
session_start();
require 'dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {

  $sname = $_POST['sname'];
  $semail = $_POST['semail'];
  $pswd = $_POST['pswd'];
  $cpswd = $_POST['cpswd'];

  // Use prepared statements to prevent SQL injection

  $stmt = $conn->prepare("INSERT INTO student (sname, semail, pswd, cpswd) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $sname, $semail, $pswd, $cpswd);

  if ($stmt->execute()) {
    echo "Success";
  } 
  else {
    echo "Problem in execution of query";
  }

  $stmt->close();
} 
else{
    echo "error inForm submission";
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
  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="shortcut icon" href="../Assets/images/logo_for_website-removebg-preview.png" type="image/x-icon">
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
        <a class="navbar-brand" href="index.html"><img src="../Assets/images/logo_for_website-removebg-preview.png" alt="Code-Crafetr" class="logo" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="../front-end/index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">My Course</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../Front-end/whyus.php">Why We</a>
            </li>
            <li class="nav-item cc">
              <a class="nav-link cart"><i class="fa-solid fa-cart-shopping fa-xl" style="color: #ad78df"></i></a>
            </li>
            <li class="nav-item cls">
              <a class="nav-link ls">Log in</a>
            </li>
            <li class="nav-item dropdown cls">
              <a class="nav-link dropdown-toggle ls active" href="#" id="signupDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

  <!-- <section class="h-100 bg-dark">
    <div class="h-100 container py-5">
      <div class="row align-items-center d-flex h-100 justify-content-center">
        <div class="col">
          <div class="card card-registration my-4">
            <div class="row g-0">
              <div class="col-xl-6 d-none d-xl-block">
                <img alt="Sample photo" class="img-fluid" src="../Assets/images/studentimages/studnetform1.webp" style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem" />
              </div>
              <div class="col-xl-6">
                <div class="card-body p-md-5 text-black">
                  <h3 class="mb-5 text-uppercase">Student registration form</h3>
                  <form action="student.signup.php" method="post">
                    <div class="row">
                      <div class="mb-4 col-md-6">
                        <div class="form-outline">
                          <input class="form-control form-control-lg" id="form3Example1m" name="fname" type="text" />
                          <label class="form-label" for="form3Example1m">First name</label>
                        </div>
                      </div>
                      <div class="mb-4 col-md-6">
                        <div class="form-outline">
                          <input class="form-control form-control-lg" id="form3Example1n" name="lname" type="text" />
                          <label class="form-label" for="form3Example1n">Last name</label>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="mb-4 col-md-6">
                        <div class="form-outline">
                          <input class="form-control form-control-lg" id="form3Example1m1" name="mname" type="text" />
                          <label class="form-label" for="form3Example1m1">Mother's name</label>
                        </div>
                      </div>
                      <div class="mb-4 col-md-6">
                        <div class="form-outline">
                          <input class="form-control form-control-lg" id="form3Example1n1" name="faname" type="text" />
                          <label class="form-label" for="form3Example1n1">Father's name</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-outline mb-4">
                      <input class="form-control form-control-lg" id="form3Example9" name="dob" type="date" />
                      <label class="form-label" for="form3Example9">DOB</label>
                    </div>
                    <div class="form-outline mb-4">
                      <input class="form-control form-control-lg" id="form3Example90" name="pincode" type="number" />
                      <label class="form-label" for="form3Example90">Pincode</label>
                    </div>
                    <div class="form-outline mb-4">
                      <input class="form-control form-control-lg" id="form3Example97" name="email" type="email" />
                      <label class="form-label" for="form3Example97">Email ID</label>
                    </div>
                    <div class="justify-content-end d-flex pt-3">
                      <button class="btn btn-lg btn-info" type="submit">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->

  <section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                  <form class="mx-1 mx-md-4" action="student.signup.php" method="POST">

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input name="sname" type="text" id="form3Example1c" class="form-control" />
                        <label class="form-label" for="form3Example1c">Your Name</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input name="semail" type="email" id="form3Example3c" class="form-control" />
                        <label class="form-label" for="form3Example3c">Your Email</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input name="pswd" type="password" id="form3Example4c" class="form-control" />
                        <label class="form-label" for="form3Example4c">Password</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input name="cpswd" type="password" id="form3Example4cd" class="form-control" />
                        <label class="form-label" for="form3Example4cd">Repeat your password</label>
                      </div>
                    </div>

                    <div class="form-check d-flex justify-content-center mb-5">
                      <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                      <label class="form-check-label" for="form2Example3">
                        I agree all statements in <a href="#!">Terms of service</a>
                      </label>
                    </div>

                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button type="submit" class="btn btn-primary btn-lg">Register</button>
                    </div>

                  </form>

                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                  <img src="../Assets/images/studentimages/studnetform1.webp" class="img-fluid" alt="Sample image">

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
            <img src="../Assets/images/logo_for_website-removebg-preview.png" alt="Code-Crafter Logo" class="mb-3" style="max-width: 100px;">
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