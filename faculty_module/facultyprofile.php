<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- bootstrap css -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../Public/Front-end/CSS/headerfooter.css" />
  <link rel="stylesheet" href="../Public/Front-end/CSS/facultyprofile.css" />
  <link rel="shortcut icon" href="../public/Assets/images/logo/cODE cRAFT lOGO.jpg" type="image/x-icon" />
  <title>Faculty Profile</title>
</head>

<body>
  <?php
  session_start();
  require '../public/back-end/dbconnect.php';

  if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === false || $_SESSION['role'] === "guest") {
    // Display an alert message using Bootstrap classes
    echo '<div class="alert alert-danger" role="alert">';
    echo '<h2 class="alert-heading">Login Required</h2>';
    echo '<p>Login first to access your profile.</p>';
    echo '<a class="btn btn-primary custom-login-button" href="../public/front-end/login.php">Log in</a>';
    echo '</div>';
    exit(); // Stop further execution
  }

  // Get faculty details based on session data
  $fid = $_SESSION['fid'];
  // echo $fid;
  $facultyQuery = "SELECT * FROM faculty WHERE fid = $fid";
  $facultyResult = mysqli_query($conn, $facultyQuery);

  // Check if the faculty record exists
  if (mysqli_num_rows($facultyResult) === 1) {
    $faculty = mysqli_fetch_assoc($facultyResult);
  } else {
    // Handle the case where the faculty record doesn't exist
    echo "Faculty not found.";
    exit();
  }

  // Update faculty details if the form is submitted
  if (isset($_POST['update_profile'])) {
    $newFullName = $_POST['fullname'];
    $newEmail = $_POST['email'];

    // Update faculty information in the database
    $updateQuery = "UPDATE faculty SET fullname = '$newFullName', femail = '$newEmail' WHERE fid = $fid";

    if (mysqli_query($conn, $updateQuery)) {
      echo '<div class="alert alert-success" role="alert">';
      echo 'Profile updated successfully';
      echo '</div>';
      $faculty['fullname'] = $newFullName;
      $faculty['femail'] = $newEmail;
    } else {
      // Handle the update error
      echo '<div class="alert alert-danger" role="alert">';
      echo 'Error updating faculty information: ';
      echo '</div>';
    }
  }

  // Handle account deletion
  if (isset($_POST['delete_profile'])) {
    $deleteQuery = "DELETE FROM faculty WHERE fid= $fid";

    if (mysqli_query($conn, $deleteQuery)) {
      // Redirect to the logout page or any other page after successful deletion
      header("Location: ../public/front-end/login.php");
      exit();
    } else {
      echo '<div class="alert alert-danger" role="alert">';
      echo 'Error deleting account: ';
      echo '</div>';
    }
  }
  // Logout faculty
  if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
  }
  ?>

  <?php include 'header.php'; ?>
  <?php
$searchQuery = "";
$query = "";

if (isset($_GET['search_query'])) {
    $searchQuery = $_GET["search_query"];
    $query = "SELECT * FROM courses WHERE fid = $fid AND (course_name LIKE '%$searchQuery%' OR description LIKE '%$searchQuery%')";
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["delete_course"])) {
        $courseNameToDelete = $_POST["course_name"];
        $deleteQuery = "DELETE FROM courses WHERE course_name = '$courseNameToDelete'";
        
        if (mysqli_query($conn, $deleteQuery)) {
            // Course deleted successfully
            $successMessage = "Course deleted successfully.";
        } else {
            // Error occurred during deletion
            $errorMessage = "Error: " . mysqli_error($conn);
        }
    }
}
?>

<div class="container mt-5">
    <h1 class="display-4 mb-4">Course Management</h1>

    <!-- Search Box -->
    <form class="mb-4" method="GET">
        <div class="input-group">
            <input type="text" class="form-control" name="search_query" placeholder="Search for courses">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>

    <?php
    if (!empty($query)) {
        $result = mysqli_query($conn, $query); // Execute the query

        if ($result !== false) {
            if (mysqli_num_rows($result) > 0) {
                ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Course Name</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td>' . $row["course_name"] . '</td>';
                            echo '<td>' . $row["description"] . '</td>';
                            echo '<td>';
                            echo '<a href="update_course.php?course_name=' . $row["course_name"] . '" class="btn btn-primary">Update</a>';
                            echo '<form method="POST" style="display: inline;">';
                            echo '<input type="hidden" name="course_name" value="' . $row["course_name"] . '">';
                            echo '<button type="submit" name="delete_course" class="btn btn-danger my-3">Delete</button>';
                            echo '</form>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
                <?php
            } elseif ($searchQuery) {
                echo "No courses found.";
            }
        } else {
            echo "Error executing the query: " . mysqli_error($conn);
        }
    }

    if (isset($successMessage)) {
        echo '<div class="alert alert-success">' . $successMessage . '</div>';
    } elseif (isset($errorMessage)) {
        echo '<div class="alert alert-danger">' . $errorMessage . '</div>';
    }
    ?>
</div>



  <!-- profile -->
  <div class="container my-4">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="profile-card">
          <h2 class="card-header">Faculty Profile</h2>
          <div class="card-body">
            <h5>faculty Details:</h5>
            <p>Name: <?php echo $faculty['fullname']; ?></p>
            <p>Email: <?php echo $faculty['femail']; ?></p>
            <form method="POST">
              <div class="mb-3">
                <label for="fullname" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $faculty['fullname']; ?>">
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $faculty['femail']; ?>">
              </div>
              <button name="update_profile" type="submit" class="btn btn-primary">Update Profile</button>
            </form>
            <form action="facultyprofile.php" method="post">
              <button name="delete_profile" type="submit" class="btn btn-danger" name="delete_account">Delete Account</button>
            </form>
            <form method="POST" name="logout">
              <button type="submit" name="logout" class="btn btn-danger mt-3 logout-button">Logout</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Add these script imports at the end of your HTML body -->
  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>


  <script>
    setTimeout(function() {
      var successMessage = document.getElementById('successMessage');
      var errorMessage = document.getElementById('errorMessage');

      if (successMessage) {
        successMessage.style.display = 'none';
      }

      if (errorMessage) {
        errorMessage.style.display = 'none';
      }
    }, 3000); // Hide messages after 5 seconds (adjust the delay as needed)
  </script>
</body>

</html>