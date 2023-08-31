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
  <link rel="stylesheet" href="CSS/index.css" />
  <link rel="shortcut icon" href="../Assets/images/logo/cODE cRAFT lOGO.jpg" type="image/x-icon" />
  <title>Conquer IT with Code Crafter</title>
</head>

<body>
  
  <!-- dismissable alert -->
  <div class="alert alert-primary alert-dismissible fade show" role="alert" id="dalert">
    <strong>Unleash your IT potential! Master tech skills with our online courses -
      Enroll now and embrace success!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" id="dalertbtn"></button>
  </div>

  <!-- header navbar -->
  <header class="sticky-top">
    <nav class="navbar navbar-expand-lg p-2 mb-2 bg-light bg-gradient text-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.html"><img src="../Assets/images/logo/cODE cRAFT lOGO.jpg"
            alt="Code-Crafetr" class="logo" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse flex-row-reverse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="../Front-end/home.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="course.php">Courses</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="whyus.php">Why We</a>
            </li>
            <li class="nav-item cc">
              <a class="nav-link cart"><i class="fa-solid fa-cart-shopping fa-xl" style="color: #ad78df"></i></a>
            </li>
            
            <?php
              session_start();
              if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                echo '<li class="nav-item cls mx-2">
                      <a class="nav-link ls" href="mycourse.php">My course</a>
                      </li>';
                echo '<li class="nav-item cls">
                        <a class="nav-link ls" href="Profile.php">
                          Profile
                        </a>
                      </li>';
                
              }
              elseif(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == false){
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
              else{
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

  <!-- herosection -->
<section class="hero-section">
  <div class="container">
    <div class="row hero-content">
      <div class="col-md-6 content-left">
        <h2 class="hero-slogan">Elevate Your IT Skills to New Heights</h2>
        <h1 class="hero-heading">Become a Code Craftsman</h1>
        <a href="course.php" class="cta-button btn btn-primary">Explore Courses</a>
      </div>
    </div>
  </div>
</section>

  <!-- achivements -->
<section class="achievements-section bg-light py-5">
  <div class="container">
    <h3 class="text-center mb-4">
      Proudly Partnered with <strong>50+ </strong> Leading Universities and Companies
    </h3>
    <div class="row justify-content-center">
      <div class="col-md-2 col-4 mb-3">
        <a href="#" class="achievement-company d-block">
          <img src="../Assets/images/1000px-IBM_logo.svg.png" alt="IBM Logo" class="img-fluid" />
        </a>
      </div>
      <div class="col-md-2 col-4 mb-3">
        <a href="#" class="achievement-company d-block">
          <img src="../Assets/images/penn.png" alt="University of Pennsylvania Logo" class="img-fluid" />
        </a>
      </div>
      <div class="col-md-2 col-4 mb-3">
        <a href="#" class="achievement-company d-block">
          <img src="../Assets/images/duke-3.png" alt="Duke University Logo" class="img-fluid" />
        </a>
      </div>
      <div class="col-md-2 col-4 mb-3">
        <a href="#" class="achievement-company d-block">
          <img src="../Assets/images/illinois-3.png" alt="University of Illinois Logo" class="img-fluid" />
        </a>
      </div>
      <div class="col-md-2 col-4 mb-3">
        <a href="#" class="achievement-company d-block">
          <img src="../Assets/images/imperial.png" alt="Imperial College London Logo" class="img-fluid" />
        </a>
      </div>
    </div>
  </div>
</section>

  <!-- cards for courses -->
  <section class="coursecontainer">
    <h2 class="text-info text-center">Explore our Courses</h2>
    <div class="container mt-5">
      <div class="d-flex flex-wrap justify-content-center">
        <div id="introCarousel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
              <div class="row justify-content-center">
                <!-- Card 1 -->
                <div class="col-lg-3 col-md-6 mb-4">
                  <div class="card">
                    <img src="https://via.placeholder.com/150?text=Image+1" class="card-img-top" alt="Image 3">
                    <div class="card-body">
                      <h5 class="card-title">Course Introduction</h5>
                      <p class="card-text">Welcome to our exciting course! In this module, you will learn...</p>
                      <p class="card-text"><strong>Price: $99.99</strong></p>
                      <a href="#" class="btn btn-primary">Learn More</a>
                      <button class="btn btn-success mt-2">Add to Cart</button>
                    </div>
                  </div>
                </div>
                <!-- Card 2 -->
                <div class="col-lg-3 col-md-6 mb-4">
                  <div class="card">
                    <img src="https://via.placeholder.com/150?text=Image+2" class="card-img-top" alt="Image 3">
                    <div class="card-body">
                      <h5 class="card-title">Course Introduction 2</h5>
                      <p class="card-text">Discover the amazing world of our course!...</p>
                      <p class="card-text"><strong>Price: $89.99</strong></p>
                      <a href="#" class="btn btn-primary">Explore</a>
                      <button class="btn btn-success mt-2">Add to Cart</button>
                    </div>
                  </div>
                </div>
                <!-- Card 3 -->
                <div class="col-lg-3 col-md-6 mb-4">
                  <div class="card">
                    <img src="https://via.placeholder.com/150?text=Image+3" class="card-img-top" alt="Image 3">
                    <div class="card-body">
                      <h5 class="card-title">Course Introduction 3</h5>
                      <p class="card-text">Embark on a journey of learning and growth...</p>
                      <p class="card-text"><strong>Price: $79.99</strong></p>
                      <a href="#" class="btn btn-primary">Start Now</a>
                      <button class="btn btn-success mt-2">Add to Cart</button>
                    </div>
                  </div>
                </div>
                <!-- Card 4 -->
                <div class="col-lg-3 col-md-6 mb-4">
                  <div class="card">
                    <img src="https://via.placeholder.com/150?text=Image+4" class="card-img-top" alt="Image 4">
                    <div class="card-body">
                      <h5 class="card-title">Course Introduction 4</h5>
                      <p class="card-text">Ready to dive into an exciting educational journey?...</p>
                      <p class="card-text"><strong>Price: $69.99</strong></p>
                      <a href="#" class="btn btn-primary">Get Started</a>
                      <button class="btn btn-success mt-2">Add to Cart</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Add more slides similarly with four cards each -->
            <div class="carousel-item">
              <div class="row justify-content-center">
                <!-- Card 5 -->
                <div class="col-lg-3 col-md-6 mb-4">
                  <div class="card">
                    <img src="https://via.placeholder.com/150?text=Image+5" class="card-img-top" alt="Image 5">
                    <div class="card-body">
                      <h5 class="card-title">IT Course 5</h5>
                      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      <p class="card-text"><strong>Price: $89.99</strong></p>
                      <a href="#" class="btn btn-primary">Learn More</a>
                      <button class="btn btn-success mt-2">Add to Cart</button>
                    </div>
                  </div>
                </div>
                <!-- Card 6 -->
                <div class="col-lg-3 col-md-6 mb-4">
                  <div class="card">
                    <img src="https://via.placeholder.com/150?text=Image+6" class="card-img-top" alt="Image 6">
                    <div class="card-body">
                      <h5 class="card-title">IT Course 6</h5>
                      <p class="card-text">Vestibulum facilisis bibendum dui, vel vehicula ex blandit vel.</p>
                      <p class="card-text"><strong>Price: $79.99</strong></p>
                      <a href="#" class="btn btn-primary">Explore</a>
                      <button class="btn btn-success mt-2">Add to Cart</button>
                    </div>
                  </div>
                </div>
                <!-- Card 7 -->
                <div class="col-lg-3 col-md-6 mb-4">
                  <div class="card">
                    <img src="https://via.placeholder.com/150?text=Image+7" class="card-img-top" alt="Image 7">
                    <div class="card-body">
                      <h5 class="card-title">IT Course 7</h5>
                      <p class="card-text">Aenean dapibus eget nisi sed varius.</p>
                      <p class="card-text"><strong>Price: $69.99</strong></p>
                      <a href="#" class="btn btn-primary">Start Now</a>
                      <button class="btn btn-success mt-2">Add to Cart</button>
                    </div>
                  </div>
                </div>
                <!-- Card 8 -->
                <div class="col-lg-3 col-md-6 mb-4">
                  <div class="card">
                    <img src="https://via.placeholder.com/150?text=Image+8" class="card-img-top" alt="Image 8">
                    <div class="card-body">
                      <h5 class="card-title">IT Course 8</h5>
                      <p class="card-text">Praesent eget lorem id erat varius vestibulum.</p>
                      <p class="card-text"><strong>Price: $59.99</strong></p>
                      <a href="#" class="btn btn-primary">Get Started</a>
                      <button class="btn btn-success mt-2">Add to Cart</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <!-- Carousel Controls -->
          <button class="carousel-control-prev" type="button" data-bs-target="#introCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#introCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
  </section>

  <!-- appreciation   -->
  <section id="student-reviews" class="py-5">
    <div class="container">
      <h2 class="text-center mb-4">Student Reviews</h2>
      <div id="studentCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row justify-content-center">
              <div class="col-md-8">
                <div class="review-card text-center">
                  <img src="https://via.placeholder.com/150" alt="Student 1" class="student-img rounded-circle mb-3">
                  <h4 class="mt-3">Rajesh Sharma</h4>
                  <p>"Code-Crafter has been an amazing learning experience for me. The instructors are
                    knowledgeable and supportive, and the hands-on projects have boosted my coding skills
                    immensely."</p>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row justify-content-center">
              <div class="col-md-8">
                <div class="review-card text-center">
                  <img src="https://via.placeholder.com/150" alt="Student 2" class="student-img rounded-circle mb-3">
                  <h4 class="mt-3">Priya Patel</h4>
                  <p>"I can't believe how much I've learned in such a short time with Code-Crafter. The
                    interactive lessons and real-world examples have made complex concepts easy to grasp. Highly
                    recommended!"</p>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row justify-content-center">
              <div class="col-md-8">
                <div class="review-card text-center">
                  <img src="https://via.placeholder.com/150" alt="Student 3" class="student-img rounded-circle mb-3">
                  <h4 class="mt-3">Amita Reddy</h4>
                  <p>"As a complete beginner, I was worried about diving into coding. But Code-Crafter's
                    step-by-step approach and supportive community made me feel confident and excited about my
                    coding journey."</p>
                </div>
              </div>
            </div>
          </div>
          <!-- Add more carousel items for additional students' reviews -->
          <!-- ... (more carousel items) ... -->
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#studentCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#studentCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </section>

  <!-- Upcoming Events Section -->
  <section class="upcoming-events text-center py-5 bg-light">
    <h2 class="mb-4">Upcoming Events</h2>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title">Web Development Workshop</h3>
              <p class="card-text">Join us for an interactive web development workshop on HTML and CSS.</p>
              <p class="card-text"><strong>Date: August 20, 2023</strong></p>
              <a href="#" class="btn btn-secondary">Learn More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title">Data Science Seminar</h3>
              <p class="card-text">Discover the world of data science in our upcoming seminar.</p>
              <p class="card-text"><strong>Date: September 5, 2023</strong></p>
              <a href="#" class="btn btn-secondary">Learn More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title">Coding Competition</h3>
              <p class="card-text">Test your coding skills in our annual coding competition.</p>
              <p class="card-text"><strong>Date: October 15, 2023</strong></p>
              <a href="#" class="btn btn-secondary">Learn More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<section class="past-highlights">
  <div class="container">
    <h2>Past Newsletter Highlights</h2>
    <div class="row">
      <div class="col-md-4">
        <div class="highlight-card">
          <h3 class="highlight-title">Coding Tips & Tricks</h3>
          <p class="highlight-content">Discover useful coding techniques and tricks to enhance your skills.</p>
          <a href="#" class="highlight-link">Read More</a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="highlight-card">
          <h3 class="highlight-title">Industry Trends</h3>
          <p class="highlight-content">Stay updated on the latest trends and developments in the tech industry.</p>
          <a href="#" class="highlight-link">Read More</a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="highlight-card">
          <h3 class="highlight-title">Student Success Stories</h3>
          <p class="highlight-content">Celebrate the achievements of our students and their coding journey.</p>
          <a href="#" class="highlight-link">Read More</a>
        </div>
      </div>
    </div>
  </div>
</section>

  <!-- news letter -->
<section class="newsletter-signup">
  <div class="container">
    <div class="icon">
      <i class="bi bi-envelope"></i>
    </div>
    <h2>Subscribe to Our Newsletter</h2>
    <p>Stay updated about new courses, events, and industry updates.</p>
    <form class="newsletter-form">
      <input type="email" class="newsletter-input" placeholder="Enter your email">
      <button type="submit" class="newsletter-button">Subscribe</button>
    </form>
  </div>
</section>

  <!-- footer -->
<?php include "../Back-end/footer.php";?>

</body>

</html>