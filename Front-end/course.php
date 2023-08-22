<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
  <title>Explore courses</title>

</head>
<body>
      <!-- header navbar -->
  <header class="sticky-top">
    <nav class="navbar navbar-expand-lg p-3 mb-2 bg-light bg-gradient text-dark">
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


</body>
</html>