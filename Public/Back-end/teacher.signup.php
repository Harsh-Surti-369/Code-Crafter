<?php
session_start();

require 'dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // Get form data
    $fname = $_POST['fname'];
    $femail = $_POST['femail'];
    $fpswd = $_POST['fpswd'];
    $edu = $_POST['edu'];
    $exp = $_POST['exp'];

    // Handle image and CV file uploads
    if (isset($_FILES['fimg']) && $_FILES['fimg']['error'] === UPLOAD_ERR_OK) {
        $fimgFile = $_FILES['fimg']['tmp_name'];
        $fimgContent = file_get_contents($fimgFile);
    } else {
        $fimgContent = null; // No image provided
    }

    if (isset($_FILES['cv']) && $_FILES['cv']['error'] === UPLOAD_ERR_OK) {
        $cvFile = $_FILES['cv']['tmp_name'];
        $cvContent = file_get_contents($cvFile);
    } else {
        $cvContent = null; // No CV file provided
    } 

    error_log("Password: " . $fpswd); // Check if password is correctly received
    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO faculty (fullname, femail, fpswd, fimg, cv, degree, experience) VALUES (?, ?, ?, ?, ?, ?, ?)");
    // print_r($stmt);
    // echo $fpswd;
    // exit();
    if ($stmt) {
        $stmt->bind_param("sssbsss", $fname, $femail, $fpswd, $fimgContent, $cvContent, $edu, $exp);
        if ($stmt->execute()) {
            $_SESSION['successMessage'] = "Successfully registered. Start teaching today!";
            header("Location: ../Front-end/login.php"); // Redirect to clear POST data
        } else {
            $_SESSION['errorMessage'] = "Registration failed: ";
        }
        $stmt->close();
    } else {
        $_SESSION['errorMessage'] = "An internal error occurred. Please contact support.";
    }

    exit();
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous" defer></script>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="../Assets/images/logo_for_website-removebg-preview.png" type="image/x-icon">
    <link rel="stylesheet" href="../Front-end/CSS/headerfooter.css" />
    <link rel="stylesheet" href="../Front-end/CSS/student.signup.css" />
    <script src="../Front-end/JS/teacher.signup.js"></script>
    <link rel="shortcut icon" href="../Assets/images/logo/cODE cRAFT lOGO.jpg" type="image/x-icon" />
    <title>Sign up to Code-crafter</title>
</head>

<body>
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
              <a class="nav-link" href="../Front-end/home.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../Front-end/course.php">Courses</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="../Front-end/whyus.php">Why We</a>
            </li>
            <li class="nav-item cc">
              <a class="nav-link cart"><i class="fa-solid fa-cart-shopping fa-xl" style="color: #ad78df"></i></a>
            </li>
            
            <?php
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
                        <a class="nav-link ls" href="../front-end/login.php">Log in</a>
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
                        <a class="nav-link ls" href="../front-end/login.php">Log in</a>
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

    <?php if (isset($_SESSION['successMessage'])) : ?>
        <div class="alert alert-primary alert-dismissible fade show" role="alert" id="dalert">
            <strong><?php echo $_SESSION['successMessage']; ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" id="dalertbtn"></button>
        </div>
        <?php unset($_SESSION['successMessage']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['errorMessage'])) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="dalert">
            <strong><?php echo $_SESSION['errorMessage']; ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" id="dalertbtn"></button>
        </div>
        <?php unset($_SESSION['errorMessage']); ?>
    <?php endif; ?>

    <main class="h-100 bg-secondary w-100">
        <div class="container h-100 w-100">
            <div class="row d-flex justify-content-center align-items-center h-100 w-100">
                <div class="col-lg-6 mb-5"> <!-- Column for the form -->
                    <div class="card text-black" style="border-radius: 3%;">
                        <div class="card-body p-md-5">
                            <form class="mx-1 mx-md-4" action="teacher.signup.php" method="POST" enctype="multipart/form-data">
                                <p class="text-center h1 fw-bold mb-4 mx-1 mx-md-4 mt-4">Sign up</p>
                                <div class="d-flex flex-row align-items-center mb-4">
                                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                        <input name="fname" type="text" id="form3Example1c" class="form-control" required />
                                        <label class="form-label" for="form3Example1c">Full Name</label>
                                    </div>
                                </div>

                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-outline flex-fill mb-0">
                                        <input name="fimg" type="file" id="form3Example3c" class="form-control" required />
                                        <label class="form-label" for="form3Example3c">Your Image</label>
                                    </div>
                                </div>

                                <div class="d-flex flex-row align-items-center mb-4">
                                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                        <input name="femail" type="email" id="form3Example3c" class="form-control" required />
                                        <label class="form-label" for="form3Example3c">Your Email</label>
                                    </div>
                                </div>

                                <div class="d-flex flex-row align-items-center mb-4">
                                    <i class="fa-solid fa-key fa-lg pswd"></i>
                                    <div class="form-outline flex-fill mb-0">
                                        <input name="fpswd" type="password" id="form3Example3c" class="form-control" required />
                                        <label class="form-label" for="form3Example3c">Password</label>
                                    </div>
                                </div>

                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-outline flex-fill mb-0">
                                        <input name="cv" type="file" id="form3Example3c" class="form-control" required />
                                        <label class="form-label" for="form3Example3c">Upload CV</label>
                                    </div>
                                </div>

                                <div class="d-flex flex-row align-items-center mb-4">
                                    <i class="fa-solid fa-graduation-cap fa-lg"></i>
                                    <div class="form-outline flex-fill mb-0">
                                        <input name="edu" type="text" id="form3Example3c" class="form-control" required />
                                        <label class="form-label" for="form3Example3c">Highest Educational Degree</label>
                                    </div>
                                </div>

                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-outline flex-fill mb-0">
                                        <input name="exp" type="number" id="form3Example3c" class="form-control" required />
                                        <label class="form-label" for="form3Example3c">Years of Experience</label>
                                    </div>
                                </div>
                                <div class="form-check d-flex justify-content-center mb-5">
                                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" required />
                                    <label class="form-check-label" for="form2Example3">
                                        I agree all statements in <a href="#!">Terms of service</a>
                                    </label>
                                </div>

                                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                    <button type="submit" class="btn btn-primary btn-lg">Start Teaching</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-5"> <!-- Column for the image -->
                    <img src="../Assets/images/fimg.jpg" class="" alt="Side Image">
                </div>
            </div>
        </div>
    </main>

    <!-- footer -->
  <?php include "footer.php";?>
</body>
</html>