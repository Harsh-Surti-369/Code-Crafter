 <?php
  session_start();

  require '../public/back-end/dbconnect.php';

  if ($_SESSION['loggedin'] === false) {
    header("Location: ../public/Front-end/login.php");
    exit();
  } elseif ($_SESSION['loggedin'] === true and $_SESSION['role'] === 'faculty') {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $courseName = $_POST['courseName'];
      $courseDesc = $_POST['courseDesc'];

// Handle image and video uploads
$introImageName = 'intro_' . time() . '_' . $_FILES['introImage']['name'];
$courseVideoName = 'video_' . time() . '_' . $_FILES['courseVideo']['name'];

$introImagePath = '../uploads/' . $introImageName;
$courseVideoPath = 'code-crafter/faculty_module/uploads/' . $courseVideoName;

move_uploaded_file($_FILES['introImage']['tmp_name'], $introImagePath);
move_uploaded_file($_FILES['courseVideo']['tmp_name'], $courseVideoPath);

// Insert new course details into the database with file paths
$insertQuery = "INSERT INTO courses (course_name, description, intro_image, course_video) 
                VALUES ('$courseName', '$courseDesc', '$introImagePath', '$courseVideoPath')";
mysqli_query($conn, $insertQuery);


      // Redirect to the course intro page or a suitable location
      header("Location: ../public/front-end/course.php");
      exit();
    }
  } else {
    header("Location: ../public/Front-end/login.php");
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
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

   <!-- font awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="shortcut icon" href="../Assets/images/logo/cODE cRAFT lOGO.jpg" type="image/x-icon" />
   <link rel="stylesheet" href="../Public/Front-end/CSS/create_course.css">
   <title>Create your new course</title>
 </head>

 <body>
  
 <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="course-card">
                    <h1>Create Course</h1>
                    <form action="create_course.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="courseName" class="form-label">Course Name:</label>
                            <input type="text" id="courseName" name="courseName" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="courseDesc" class="form-label">Course Description:</label>
                            <textarea id="courseDesc" name="courseDesc" rows="2" class="form-control" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="introImage" class="form-label">Intro Image:</label>
                            <input type="file" id="introImage" name="introImage" accept="image/*" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="courseVideo" class="form-label">Course Video:</label>
                            <input type="file" id="courseVideo" name="courseVideo" accept="video/*" class="form-control" required>
                        </div>

                        <label class="file-input-label">Upload a high-quality image and video for your course.</label>

                        <button type="submit" class="btn btn-create-course">Create Course</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
 </body>

 </html>