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
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"
        defer></script>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="../Assets/images/logo_for_website-removebg-preview.png" type="image/x-icon" />
    <link rel="stylesheet" href="CSS/login.css" />
    <link rel="shortcut icon" href="../Assets/images/logo/cODE cRAFT lOGO.jpg" type="image/x-icon" />
    <title>Log in to Code Craft</title>
</head>

<body>
    <section class="h-100 gradient-form" style="background-color: #eee">
        <div class="container py-3 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-3 mx-md-2">
                                    <div class="text-center">
                                        <img src="../Assets/images/logo/cODE cRAFT lOGO.jpg" style="width: 150px"
                                            alt="logo" />
                                        <h4 class="mt-1 mb-5 pb-1">Log in to Code Craft</h4>
                                    </div>
                                    <form id="" method="post" action="../Back-end/authenticate.php">
                                        <p>Please login to your account</p>
                                        <div class="form-outline mb-4">
                                            <input type="email" id="form2Example11" class="form-control"
                                                placeholder="your registered email" name="lmail" required />
                                            <label class="form-label" for="form2Example11">Email</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" id="form2Example22" class="form-control" name="lpswd"
                                                required />
                                            <label class="form-label" for="form2Example22">Password</label>
                                        </div>

                                        <div class="text-center pt-1 mb-3 pb-1">
                                            <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3 col-3"
                                                type="submit" id="loginForm">
                                                Log in
                                            </button>
                                        </div>
                                    </form>
                        
                                    <div>Not have an account? </div>
                                    <div class="dropend cls">
                                        <button type="button" class="btn dropdown-toggle ls" data-bs-toggle="dropdown">
                                          Sign Up
                                        </button>
                                        <ul class="dropdown-menu">
                                          <a class="dropdown-item" href="../Back-end/student.signup.php">Sign Up as Student</a>
                                          <a class="dropdown-item" href="../Back-end/teacher.signup.php">Sign Up as Faculty</a>
                                        </ul>
                                      </div>
                                      <div class="text-center pt-1 mb-5 pb-1">
                                        <a  href="home.php">
                                            Continue as guest
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4">Welcome to Code Craft</h4>
                                    <p class="small mb-0">
                                        Embrace the power of technology with Code Craft, your
                                        gateway to mastering the intricate art of coding and
                                        harnessing the potential of information technology.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="JS/login.js"></script>
</body>

</html>