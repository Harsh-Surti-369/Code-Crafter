<?php
session_start();
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

<section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5">Teach on Code Craft</h2>

                                <form>

                                    <div class="form-outline mb-4">
                                        <input type="text" id="form3Example1cg" class="form-control form-control-lg" />
                                        <label class="form-label" for="form3Example1cg">Full Name</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="email" id="form3Example3cg" class="form-control form-control-lg" />
                                        <label class="form-label" for="form3Example3cg"> Email</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="text" id="form3Example4cg" class="form-control form-control-lg" />
                                        <label class="form-label" for="form3Example4cg">Highest Education Degree</label>
                                    </div>
                                    
                                    <div class="form-outline mb-4">
                                        <input type="number" id="form3Example4cg" class="form-control form-control-lg" />
                                        <label class="form-label" for="form3Example4cg">Years of Experience</label>
                                    </div>
                                    
                                    <div class="form-outline mb-5">
                                        <input type="file" id="form3Example4cg file" class="form-control form-control-md" />
                                        <label class="form-label" for="form3Example4cg">Upload CV</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" id="form3Example4cg" class="form-control form-control-lg" />
                                        <label class="form-label" for="form3Example4cg">Password</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" id="form3Example4cdg" class="form-control form-control-lg" />
                                        <label class="form-label" for="form3Example4cdg">Confirm password</label>
                                    </div>

                                    <div class="form-check d-flex justify-content-center mb-5">
                                        <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" />
                                        <label class="form-check-label" for="form2Example3g">
                                            I agree all statements in <a href="#!" class="text-body"><u>Terms of
                                                    service</u></a>
                                        </label>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="button" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                                    </div>

                                    <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="#!" class="fw-bold text-body"><u>Login here</u></a></p>

                                </form>

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
<?php
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
    } else {
        echo "Problem in execution of query";
    }

    $stmt->close();
} else {
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert' id='dalert'>
        Try again after some Time
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close' id='dalertbtn'></button>
        </div>";
}

?>