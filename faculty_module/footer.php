<?php
// Check if the user is trying to logout
if (isset($_POST['logout'])) {
    // Unset all session variables
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect to the current page to refresh it
}
?>


<footer class="bg-light text-secondary">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-4">
                <h3 class="mb-4">About Us</h3>
                <p>We are dedicated to providing high-quality IT education and helping individuals become proficient coders.
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
                    <img src="../Assets/images/logo/cODE cRAFT lOGO.jpg" alt="Code-Crafter Logo" class="mb-3"
                        style="max-width: 100px;">
                    <h3 class="mb-4">Contact Us</h3>
                    <p>Email: info@code-crafter.com</p>
                    <p>Phone: +123-456-7890</p>
                    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) : ?>
                        <!-- Add the Logout button -->
                        <form method="post" action="footer.php">
                            <button type="submit" class="btn btn-danger mt-3" name="logout">Logout</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center py-3" style="background-color: #f0f0f0;">
        <p class="mb-0">&copy; 2023 Code Crafter. All rights reserved.</p>
    </div>
</footer>