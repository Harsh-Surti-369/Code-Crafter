<?php
session_start();
include '../Back-end/dbconnect.php';
include '../Back-end/auth_login.php';
checkLogin();

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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="CSS/headerfooter.css" />
  <link rel="stylesheet" href="CSS/course.css" />
  <link rel="shortcut icon" href="../Assets/images/logo/cODE cRAFT lOGO.jpg" type="image/x-icon" />
  <title>Best IT courses</title>
</head>

<body>
  <?php 
  include '../Back-end/header.php';
  ?>
 <div class="container mt-5">
    <h1 class="mb-4">Explore Courses</h1>

    <!-- Section 1: Newly Arrived Courses -->
    <section class="mb-5">
        <h2>Newly Arrived Courses</h2>
        <div class="row">
            <?php
            // Retrieve course information from the database
            $coursesQuery = "SELECT * FROM courses";
            $coursesResult = mysqli_query($conn, $coursesQuery);

            if (!$coursesResult) {
                // Handle the query error for courses
                echo "Error: " . mysqli_error($conn);
            } else {
                $courseCount = 0; // Track the number of courses in the current row
                while ($course = mysqli_fetch_assoc($coursesResult)) {
                    // Retrieve faculty information based on 'fid'
                    $fid = $course['fid'];
                    $facultyQuery = "SELECT * FROM `faculty` WHERE fid = '$fid'";
                    $facultyResult = mysqli_query($conn, $facultyQuery);

                    if (!$facultyResult) {
                        echo "Error in faculty query: ";
                    } else {
                        $faculty = mysqli_fetch_assoc($facultyResult);

                        // Create a new row if the current row is full (maximum 3 courses per row)
                        if ($courseCount % 3 == 0) {
                            echo '</div><div class="row">';
                        }
            ?>
                        <div class="col-md-4">
                            <div class="course-card card mb-4">
                                <img src="../../faculty_module/uploads/<?php echo $course['intro_image']; ?>" class="card-img-top" alt="Course Image">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $course['course_name']; ?></h5>
                                    <p class="card-text"><?php echo $course['description']; ?></p>
                                    <b><i class="faculty-name">
                                            <?php
                                            if (isset($faculty['fullname'])) {
                                                echo $faculty['fullname'];
                                            }
                                            ?>
                                        </i><b>
                                            <div class="buttons">
                                                <a href="course_player.php?course_name=<?php echo urlencode($course['course_name']); ?>" class="btn btn-outline-warning">Learn</a>
                                            </div>
                                </div>
                            </div>
                        </div>
            <?php
                        $courseCount++;
                    }
                }
            }
            ?>
        </div>
    </section>
</div>


  <!-- footer -->
  <?php include "../Back-end/footer.php"; ?>

</body>

</html>