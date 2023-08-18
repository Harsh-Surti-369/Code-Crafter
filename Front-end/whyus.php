<!-- Display success or error message -->
<?php
$message = '';
$error = '';

if (isset($_GET['message'])) {
  $message = $_GET['message'];
} elseif (isset($_GET['error'])) {
  $error = $_GET['error'];
}
?>

<?php if ($message) : ?>
  <div class="alert alert-success mt-3"><?php echo $message; ?></div>
<?php elseif ($error) : ?>
  <div class="alert alert-danger mt-3"><?php echo $error; ?></div>
<?php endif; ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- bootstrap css -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
  <!-- jquery -->
  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <!-- bootstrap js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- custom css js -->
  <link rel="stylesheet" href="CSS/headerfooter.css" />
  <link rel="stylesheet" href="CSS/whyus.css" />
  <link rel="shortcut icon" href="../Assets/images/logo/cODE cRAFT lOGO.jpg" type="image/x-icon" />
  <title>Why Code Crafter</title>
</head>

<body>
   <!-- header navbar -->
   <header class="sticky-top">

<nav class="navbar navbar-expand-lg p-3 mb-2 bg-light bg-gradient text-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.html"><img src="../Assets/images/logo/cODE cRAFT lOGO.jpg"
        alt="Code-Crafetr" class="logo" /></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="index.html">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">My Course</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="whyus.php">Why We</a>
        </li>
        <li class="nav-item cc">
          <a class="nav-link cart"><i class="fa-solid fa-cart-shopping fa-xl" style="color: #ad78df"></i></a>
        </li>
        <li class="nav-item cls">
          <a class="nav-link ls">Log in</a>
        </li>
        <div class="dropdown">
          <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown">
            Sign Up
          </button>
          <ul class="dropdown-menu">
            <a class="dropdown-item" href="../Back-end/student.signup.php">Sign Up as Student</a>
            <a class="dropdown-item" href="#">Sign Up as Faculty</a>
          </ul>
        </div>
    </div>
    </ul>
  </div>
  </div>
</nav>
</header>

  <!-- intro -->
  <section class="intro-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <h1 class="tagline">
            Empowering IT Aspirants to Excel:<br>
            Crafting Your Tech Journey with Code Crafter
          </h1>
          <p class="overview">
            At Code Crafter, we're dedicated to shaping the future of IT education. Our platform offers a diverse range of meticulously crafted courses designed to equip students with the skills and knowledge needed to thrive in the dynamic world of technology.
          </p>
          <p class="mission-values">
            Our mission is to democratize IT education by providing accessible and transformative learning experiences. We believe in fostering a community of lifelong learners who are empowered to achieve their career goals through hands-on, practical learning.
          </p>
          <a href="#courses" class="cta-button">Explore Our Courses</a>
        </div>
        <div class="col-lg-6">
          <div class="intro-image">
            <img src="../Assets/images/Imagine a futuristic.jpg" alt="Students engaging with course content">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- mission -->

  <section class="mission-values-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="mission-image">
            <img src="../Assets/images/Create an inspiring.jpg" alt="Hands-on learning experience">
          </div>
        </div>
        <div class="col-lg-6">
          <h2 class="section-title">Our Mission and Values</h2>
          <p class="section-description">
            At Code Crafter, our mission is to revolutionize IT education by offering students a dynamic and hands-on learning experience. We believe in empowering individuals to embrace technology and unlock their full potential.
          </p>
          <p class="section-description">
            Our core values guide every aspect of our platform. We are committed to excellence, inclusivity, innovation, and fostering a supportive community of learners.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- social resnonsibility -->
  <section class="social-responsibility-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <h2 class="section-title">Our Social Responsibility</h2>
          <p class="section-description">
            At Code Crafter, we believe in the transformative power of education. Beyond providing top-notch IT courses, we are committed to making a difference in communities. Our initiatives focus on bridging the digital divide and providing access to quality education for underserved individuals.
          </p>
          <p class="section-description">
            Through partnerships with local organizations and educational institutions, we're working to empower those who have been historically marginalized in the tech industry. We're dedicated to creating a more inclusive and equitable future through the power of technology.
          </p>
        </div>
        <div class="col-lg-6">
          <div class="social-responsibility-image">
            <img src="../Assets/images/Visualize an impact.jpg" alt="Social Responsibility Initiatives">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- inquiry -->
  <section class="contact-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <h2 class="section-title">Contact Us</h2>
          <p class="section-description">
            Have questions, feedback, or inquiries? Feel free to reach out using the form below. We'd love to hear from you!
          </p>
          <form action="../back-end/inquiry_form.php" method="post">
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
              <label for="message" class="form-label">Message</label>
              <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Alert container -->
  <div id="message-container" class="alert alert-dismissible fade" role="alert" style="display: none;">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <span id="message-text"></span>
  </div>

  <script>
    const messageContainer = document.getElementById('message-container');
    const messageText = document.getElementById('message-text');

    const sessionMessage = '<?php echo isset($_SESSION['message']) ? $_SESSION['message'] : ''; ?>';

    if (sessionMessage) {
      messageText.textContent = sessionMessage;
      messageContainer.style.display = 'block';

      if (sessionMessage.includes('successfully')) {
        messageContainer.classList.add('alert-success');
      } else {
        messageContainer.classList.add('alert-danger');
      }

      // Automatically hide the alert after 5 seconds (5000 milliseconds)
      setTimeout(function() {
        messageContainer.style.display = 'none';
      }, 5000); // Adjust the time (in milliseconds) as needed
    }
  </script>

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
            <img src="../Assets/images/logo/cODE cRAFT lOGO.jpg" alt="Code-Crafter Logo" class="mb-3" style="max-width: 100px;">
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