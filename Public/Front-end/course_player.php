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
    <link rel="stylesheet" href="CSS/course_player.css" />
    <link rel="shortcut icon" href="../Assets/images/logo/cODE cRAFT lOGO.jpg" type="image/x-icon" />
    <title><?php echo $course['course_name']; ?> Video</title>

    <style>
        /* Add your custom CSS styles here */
        .video-container {
            max-width: 70%;
            margin: 0 auto;
        }

        .video-list {
            background-color: #f9f9f9;
            padding: 20px;
        }
    .custom-login-button {
        background-color: #FF5722; /* Change the background color to your desired color */
        color: #fff; /* Change the text color to white or any color you prefer */
        border: none;
        padding: 10px 20px;
        text-decoration: none;
        font-weight: bold;
        border-radius: 5px;
    }

    .custom-login-button:hover {
        background-color: #D84315; /* Change the background color on hover */
        color: #fff; /* Change the text color on hover */
    }
    </style>

</head>
<?php
session_start();
// Include your database connection
require '../back-end/dbconnect.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === false || $_SESSION['role'] === "guest") {
    // Display an alert message using Bootstrap classes
    echo '<div class="alert alert-danger" role="alert">';
    echo '<h2 class="alert-heading">Login Required</h2>';
    echo '<p>Login first to access courses.</p>';
    echo '<a class="btn btn-primary custom-login-button" href="login.php">Log in</a>';
    echo '</div>';
    exit(); // Stop further execution
}

else{}

     // Get the course_name from the URL parameter and decode it
     $courseName = urldecode($_GET['course_name']);
 
     // Fetch the course details based on the course_name
     $query = "SELECT * FROM courses WHERE course_name = '$courseName'"; // Modify this query as per your database structure
     $result = mysqli_query($conn, $query);
 
     // Check if the course exists
     if (mysqli_num_rows($result) === 1) {
         $course = mysqli_fetch_assoc($result);
         $videoPath = 'uploads/' . $course['course_video'];
     } else {
         // Handle the case where the course doesn't exist
         echo "Course not found.";
         exit();
     }
?>
<body>
    <div class="container mt-5">
        <div class="row">
            <!-- Video Player on the Left -->
            <div class="col-md-8 video-container">
                <!-- Replace the video source with your actual video URL -->
                <video controls width="100%">
                <video src="<?php echo $course['course_video']; ?>" controls></video>
                    Your browser does not support the video tag.
                </video>
            </div>

            <!-- Course Details on the Right -->
            <div class="col-md-4 video-list">
                <!-- Course Name (Dynamic) -->
                <h4><?php echo $course['course_name']; ?></h4>

                <!-- Course Description (Dynamic) -->
                <p><?php echo $course['description']; ?></p>

                <h5>Other Videos in This Course</h5>
                <ul class="list-group">
                    <!-- Replace with dynamic data from your database -->
                    <?php
                    // Sample data (replace with database query)
                    $otherVideos = [
                        ['title' => 'Video 1', 'url' => 'video_url_1.mp4'],
                        ['title' => 'Video 2', 'url' => 'video_url_2.mp4'],
                        // Add more videos here...
                    ];

                    if (empty($otherVideos)) {
                        echo '<p>No more videos in this course</p>';
                    } else {
                        foreach ($otherVideos as $video) {
                            echo '<li class="list-group-item"><a href="' . $video['url'] . '">' . $video['title'] . '</a></li>';
                        }
                    }
                    ?>
                </ul>
                
                <!-- Button to Move to Course Page -->
                <a href="course.php" class="btn btn-primary mt-3">Back to All Course</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>