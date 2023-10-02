  <!-- header navbar -->
  <header class="sticky-top">
    <nav class="navbar navbar-expand-lg p-1 mb-1 bg-light bg-gradient text-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.html"><img src="../Public/Assets/images/logo/cODE cRAFT lOGO.jpg" alt="Code-Crafetr" class="logo" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse flex-row-reverse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="../Public/Front-end/home.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../Public/Front-end/course.php">Courses</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../Public/Front-end/whyus.php">Why We</a>
            </li>

            <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true  && $_SESSION['role'] == 'student') {
              echo '<li class="nav-item cls">
                        <a class="nav-link ls" href="../../public/front-endProfile.php">
                          Profile
                        </a>
                      </li>';
            } elseif (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true  && $_SESSION['role'] == 'faculty') {
              echo '<li class="nav-item cls mx-2">
                      <a class="nav-link ls" href="create_course.php">Create course</a>
                      </li>';
              echo '<li class="nav-item cls">
                        <a class="nav-link ls" href="facultyprofile.php">Profile</a>
                      </li>';
            } elseif (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == false) {
              echo '<li class= "nav-item cls mx-2">
                        <a class="nav-link ls" href="../../public/front-end/login.php">Log in</a>
                      </li>';
              echo '<div class="dropstart cls">
                        <button type="button" class="btn dropdown-toggle ls" data-bs-toggle="dropdown">Sign Up</button>
                        <ul class="dropdown-menu">
                          <a class="dropdown-item" href="../../public/Back-end/student.signup.php">Sign Up as Student</a>
                          <a class="dropdown-item" href="../../public/Back-end/teacher.signup.php">Sign Up as Faculty</a>
                        </ul>
                      </div>';
            } elseif (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == false && $_SESSION['role'] == 'guest') {
              echo '<li class= "nav-item cls mx-2">
                        <a class="nav-link ls" href="../public//front-endlogin.php">Log in</a>
                      </li>';
              echo '<div class="dropstart cls">
                        <button type="button" class="btn dropdown-toggle ls" data-bs-toggle="dropdown">Sign Up</button>
                        <ul class="dropdown-menu">
                          <a class="dropdown-item" href="../../public/Back-end/student.signup.php">Sign Up as Student</a>
                          <a class="dropdown-item" href="../../public/Back-end/teacher.signup.php">Sign Up as Faculty</a>
                        </ul>
                      </div>';
            } else {
              echo '<li class= "nav-item cls mx-2">
                        <a class="nav-link ls" href="../public/front-end/login.php">Log in</a>
                      </li>';
              echo '<div class="dropstart cls">
                        <button type="button" class="btn dropdown-toggle ls" data-bs-toggle="dropdown">Sign Up</button>
                        <ul class="dropdown-menu">
                          <a class="dropdown-item" href="../../public/Back-end/student.signup.php">Sign Up as Student</a>
                          <a class="dropdown-item" href="../../public/Back-end/teacher.signup.php">Sign Up as Faculty</a>
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