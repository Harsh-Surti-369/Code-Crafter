<?php
require 'dbconnect.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $fname = $_POST['fname'];
    $femail = $_POST['femail'];
    $pswd = $_POST['fpswd'];
    $cv = $_POST['cv'];
    $edu = $_POST['edu'];
    $exp = $_POST['exp'];

    // Handle image upload
    if (isset($_FILES['fimg']) && $_FILES['fimg']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['fimg']['tmp_name'];
        $imageContent = file_get_contents($image);
    } else {
        // Handle error, show message or set default image content
        $imageContent = ""; // Set a default image content here if needed
    }

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO faculty (fullname, femail, fpswd, fimg, cv, degree, experience) VALUES (?, ?, ?, ?, ?, ?, ?)");
    
    if (!$stmt) {
        $_SESSION['errorMessage'] = "An internal error occurred. Please contact support.";
    } else {
        if ($stmt->bind_param("sssssss", $fname, $femail, $pswd, $imageContent, $cv, $edu, $exp)) {
            if ($stmt->execute()) {
                $_SESSION['successMessage'] = "Successfully registered. Start teaching today!";
            } else {
                $_SESSION['errorMessage'] = "Registration failed: " . $stmt->error;
            }            
        } else {
            $_SESSION['errorMessage'] = "An internal error occurred. Please contact support.";
        }
        $stmt->close();
    }
    header('Location: ' . $_SERVER['REQUEST_URI']); // Redirect to clear POST data
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
    <link rel="shortcut icon" href="../Assets/images/logo/cODE cRAFT lOGO.jpg" type="image/x-icon" />
    <title>Sign up to Code-crafter</title>
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
                            <a class="nav-link" href="#">Courses</a>
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
                        <div class="dropstart">
                            <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown">
                                Sign Up
                            </button>
                            <ul class="dropdown-menu">
                                <a class="dropdown-item" href="student.signup.php">Sign Up as Student</a>
                                <a class="dropdown-item" href="teacher.signup.php">Sign Up as Faculty</a>
                            </ul>
                        </div>
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

    <main class="h-100 bg-dark w-100">
        <div class="container h-100 w-100">
            <div class="row d-flex justify-content-center align-items-center h-100 w-100">
                <div class="col-lg-12 col-xl-11 mt-4 mb-5 w-100">
                    <div class="card text-black" style="border-radius: 3%;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1 d-flex align-items-center form">
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
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img src="../Assets/images/studentimages/studnetform1.jpg" class="img-fluid" alt="Sample image">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- footer -->
    <footer class="bg-light">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-4">
                    <h3 class="mb-4">About Us</h3>
                    <p>We are dedicated to providing high-quality IT education and helping individuals become proficient
                        coders.
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
