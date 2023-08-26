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
  <link rel="stylesheet" href="CSS/headerfooter.css" />
  <link rel="stylesheet" href="CSS/course.css" />
  <link rel="shortcut icon" href="../Assets/images/logo/cODE cRAFT lOGO.jpg" type="image/x-icon" />
  <title>Best IT courses</title>
</head>

<body>
      <!-- header navbar -->
  <header class="sticky-top">
    <nav class="navbar navbar-expand-lg p-3 mb-2 bg-light bg-gradient">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.html"><img src="../Assets/images/logo/cODE cRAFT lOGO.jpg" alt="Code-Crafetr" class="logo" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse flex-row-reverse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="../Front-end/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="corse.php">Courses</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="whyus.php">Why We</a>
            </li>
            <li class="nav-item cc">
              <a class="nav-link cart"><i class="fa-solid fa-cart-shopping fa-xl" style="color: #ad78df"></i></a>
            </li>
            <li class="nav-item cls">
              <a class="nav-link ls" href="login.html">Log in</a>
            </li>
            <div class="dropstart cls">
              <button type="button" class="btn dropdown-toggle ls" data-bs-toggle="dropdown">
                Sign Up
              </button>
              <ul class="dropdown-menu">
                <a class="dropdown-item" href="../Back-end/student.signup.php">Sign Up as Student</a>
                <a class="dropdown-item" href="../Back-end/teacher.signup.php">Sign Up as Faculty</a>
              </ul>
            </div>
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
                <!-- Course 1 -->
                <div class="col-md-4">
                  <div class="course-card">
                      <img src="../Assets/couse image/c2.jpg" class="img-fluid mb-3" alt="Course Image">
                      <h5 class="card-title">Introduction to Web Development</h5>
                      <p class="card-text">Learn the basics of building websites using HTML, CSS, and JavaScript.</p>
                      <p class="faculty-name">Faculty: John Doe</p>
                      <div class="buttons">
                          <a href="#" class="btn btn-primary">Buy Now</a>
                          <a href="#" class="btn btn-secondary">Learn More</a>
                      </div>
                  </div>
              </div>
                <!-- Course 2 -->
                <div class="col-md-4">
                  <div class="course-card">
                      <img src="../Assets/couse image/c3.jpg" class="img-fluid mb-3" alt="Course Image">
                      <h5 class="card-title">Introduction to Web Development</h5>
                      <p class="card-text">Learn the basics of building websites using HTML, CSS, and JavaScript.</p>
                      <p class="faculty-name">Faculty: John Doe</p>
                      <div class="buttons">
                          <a href="#" class="btn btn-primary">Buy Now</a>
                          <a href="#" class="btn btn-secondary">Learn More</a>
                      </div>
                  </div>
              </div>
                <!-- Course 3 -->
                <div class="col-md-4">
                  <div class="course-card">
                      <img src="../Assets/couse image/c2.jpg" class="img-fluid mb-3" alt="Course Image">
                      <h5 class="card-title">Introduction to Web Development</h5>
                      <p class="card-text">Learn the basics of building websites using HTML, CSS, and JavaScript.</p>
                      <p class="faculty-name">Faculty: John Doe</p>
                      <div class="buttons">
                          <a href="#" class="btn btn-primary">Buy Now</a>
                          <a href="#" class="btn btn-secondary">Learn More</a>
                      </div>
                  </div>
              </div>
            </div>
        </section>

        <!-- Section 2: Most Viewed Courses -->
        <section class="mb-5">
            <h2>Most Viewed Courses</h2>
            <div class="row">
                <!-- Course 1 -->
                <div class="col-md-4">
                  <div class="course-card">
                      <img src="../Assets/couse image/c1.jpg" class="img-fluid mb-3" alt="Course Image">
                      <h5 class="card-title">Introduction to Web Development</h5>
                      <p class="card-text">Learn the basics of building websites using HTML, CSS, and JavaScript.</p>
                      <p class="faculty-name">Faculty: John Doe</p>
                      <div class="buttons">
                          <a href="#" class="btn btn-primary">Buy Now</a>
                          <a href="#" class="btn btn-secondary">Learn More</a>
                      </div>
                  </div>
              </div>
                <!-- Course 2 -->
                <div class="col-md-4">
                  <div class="course-card">
                      <img src="../Assets/couse image/c4.jpg" class="img-fluid mb-3" alt="Course Image">
                      <h5 class="card-title">Introduction to Web Development</h5>
                      <p class="card-text">Learn the basics of building websites using HTML, CSS, and JavaScript.</p>
                      <p class="faculty-name">Faculty: John Doe</p>
                      <div class="buttons">
                          <a href="#" class="btn btn-primary">Buy Now</a>
                          <a href="#" class="btn btn-secondary">Learn More</a>
                      </div>
                  </div>
              </div>
                <!-- Course 3 -->
                <div class="col-md-4">
                  <div class="course-card">
                      <img src="course_image1.jpg" class="img-fluid mb-3" alt="Course Image">
                      <h5 class="card-title">Introduction to Web Development</h5>
                      <p class="card-text">Learn the basics of building websites using HTML, CSS, and JavaScript.</p>
                      <p class="faculty-name">Faculty: John Doe</p>
                      <div class="buttons">
                          <a href="#" class="btn btn-primary">Buy Now</a>
                          <a href="#" class="btn btn-secondary">Learn More</a>
                      </div>
                  </div>
              </div>
            </div>
        </section>

         <!-- Section 3: Best Rated Courses -->
         <section class="mb-5">
            <h2>Best Rated Courses</h2>
            <div class="row">
            <div class="col-md-4">
              <div class="course-card">
                  <img src="../Assets/couse image/c3.jpg" class="img-fluid mb-3" alt="Course Image">
                  <h5 class="card-title">Introduction to Web Development</h5>
                  <p class="card-text">Learn the basics of building websites using HTML, CSS, and JavaScript.</p>
                  <p class="faculty-name">Faculty: John Doe</p>
                  <div class="buttons">
                      <a href="#" class="btn btn-primary">Buy Now</a>
                      <a href="#" class="btn btn-secondary">Learn More</a>
                  </div>
              </div>
          </div>
                <!-- Course 2 -->
                <div class="col-md-4">
            <div class="course-card">
                <img src="../Assets/couse image/c2.jpg" class="img-fluid mb-3" alt="Course Image">
                <h5 class="card-title">Introduction to Web Development</h5>
                <p class="card-text">Learn the basics of building websites using HTML, CSS, and JavaScript.</p>
                <p class="faculty-name">Faculty: John Doe</p>
                <div class="buttons">
                    <a href="#" class="btn btn-primary">Buy Now</a>
                    <a href="#" class="btn btn-secondary">Learn More</a>
                </div>
            </div>
        </div>
                <!-- Course 3 -->
                <div class="col-md-4">
                  <div class="course-card">
                      <img src="../Assets/couse image/c1.jpg" class="img-fluid mb-3" alt="Course Image">
                      <h5 class="card-title">Introduction to Web Development</h5>
                      <p class="card-text">Learn the basics of building websites using HTML, CSS, and JavaScript.</p>
                      <p class="faculty-name">Faculty: John Doe</p>
                      <div class="buttons">
                          <a href="#" class="btn btn-primary">Buy Now</a>
                          <a href="#" class="btn btn-secondary">Learn More</a>
                      </div>
                  </div>
              </div>
                <!-- Add more course cards as needed -->
            </div>
        </section>

        <!-- Section 4: Courses Filtered by Faculty -->
        <section class="mb-5">
            <h2>Courses by Faculty</h2>
            <div class="dropdown mb-3">
              <button class="btn btn-success dropdown-toggle" type="button" id="facultyDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                  Select Faculty
              </button>
              <ul class="dropdown-menu" aria-labelledby="facultyDropdown">
                  <li><a class="dropdown-item" href="#">Faculty 1</a></li>
                  <li><a class="dropdown-item" href="#">Faculty 2</a></li>
                  <!-- Add more faculty options as needed -->
              </ul>
          </div>
            </div>
            <div class="row">
                <!-- Display filtered course cards here -->
            </div>
        </section>
    </div>
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
            <img src="../Assets/images/logo/cODE cRAFT lOGO.jpg" alt="Code-Crafter Logo" class="mb-3"
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

    <!-- Include your JavaScript scripts here if needed -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>