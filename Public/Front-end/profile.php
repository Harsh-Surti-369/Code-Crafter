<?php
session_start();
 require '../Back-end/dbconnect.php';
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === false || $_SESSION['role'] === "guest") {
    // Display an alert message using Bootstrap classes
    echo '<div class="alert alert-danger" role="alert">';
    echo '<h2 class="alert-heading">Login Required</h2>';
    echo '<p>Login first to access your profile.</p>';
    echo '<a class="btn btn-primary custom-login-button" href="login.php">Log in</a>';
    echo '</div>';
    exit(); // Stop further execution
}

// Get the student ID from the session (you can modify this based on your authentication logic)
$sid = $_SESSION['sid'];

// Fetch student details based on the student ID
$query = "SELECT * FROM student WHERE sid = $studentId";
$result = mysqli_query($conn, $query);

// Check if the student exists
if (mysqli_num_rows($result) === 1) {
    $student = mysqli_fetch_assoc($result);
} else {
    // Handle the case where the student doesn't exist
    echo "Student not found.";
    exit();
}

// Handle profile update
if (isset($_POST['update_profile'])) {
    $updatedName = $_POST['name'];
    $updatedEmail = $_POST['email'];

    $updateQuery = "UPDATE student SET sname='$updatedName', semail='$updatedEmail' WHERE sid=$studentId";

    if (mysqli_query($conn, $updateQuery)) {
        echo '<div class="alert alert-success" role="alert">';
        echo 'Profile updated successfully';
        echo '</div>';
        // Update the $student array to reflect the changes
        $student['sname'] = $updatedName;
        $student['semail'] = $updatedEmail;
    } else {
        echo '<div class="alert alert-danger" role="alert">';
        echo 'Error updating profile: ' . mysqli_error($conn);
        echo '</div>';
    }
}

// Handle account deletion
if (isset($_POST['delete_account'])) {
    $deleteQuery = "DELETE FROM student WHERE sid=$studentId";

    if (mysqli_query($conn, $deleteQuery)) {
        // Redirect to the logout page or any other page after successful deletion
        header("Location: logout.php");
        exit();
    } else {
        echo '<div class="alert alert-danger" role="alert">';
        echo 'Error deleting account: ' . mysqli_error($conn);
        echo '</div>';
    }
}
// Check if the user is logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // Destroy the session to log the user out
    session_destroy();
}

// Redirect the user to the login page or any other desired page
header("Location: login.php");
exit(); // Stop further execution
?>

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Include your custom CSS styles here -->
    <link rel="stylesheet" href="CSS/profile.css">
</head>

<body>
    <header class="sticky-top">
        <nav class="navbar navbar-expand-lg p-2 mb-2 bg-light bg-gradient text-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.html"><img src="../Assets/images/logo/cODE cRAFT lOGO.jpg" alt="Code-Crafetr" class="logo" /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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

                        <?php
                        session_start();
                        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true  && $_SESSION['role'] == 'student') {
                            echo '<li class="nav-item cls mx-2">
                      <a class="nav-link ls" href="mycourse.php">My course</a>
                      </li>';
                            echo '<li class="nav-item cls">
                        <a class="nav-link ls active" href="Pofile.php">
                          Profile
                        </a>
                      </li>';
                        } elseif (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true  && $_SESSION['role'] == 'faculty') {
                            echo '<li class="nav-item cls mx-2">
                      <a class="nav-link ls" href="../faculty_module/create_course.php">Create course</a>
                      </li>';
                            echo '<li class="nav-item cls">
                        <a class="nav-link ls" href="../upload_video.php">
                          Update course
                        </a>
                      </li>';
                        } elseif (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == false) {
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
                        } elseif (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == false && $_SESSION['role'] == 'guest') {
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
                        } else {
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


    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        Student Profile
                    </div>
                    <div class="card-body">
                        <!-- Display student details here -->
                        <h5>Student Details:</h5>
                        <p>Name: <?php echo $student['sname']; ?></p>
                        <p>Email: <?php echo $student['semail']; ?></p>

                        <!-- Update Form -->
                        <form action="profile.php" method="post">
                            <div class="mb-3">
                                <label for="name" class="form-label">Student Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo $student['sname']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $student['semail']; ?>">
                            </div>

                            <!-- Add more student details here -->

                            <button type="submit" class="btn btn-primary" name="update_profile">Update Profile</button>
                        </form>

                        <!-- Delete Account Button -->
                        <form action="profile.php" method="post">
                            <button type="submit" class="btn btn-danger" name="delete_account">Delete Account</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="logout.php">Logout</a>


    <!-- Include Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>