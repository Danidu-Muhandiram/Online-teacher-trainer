<?php
session_start();


// Check if the user is logged in
$is_logged_in = isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true;
?>

<section class="main_landing_section">
            <nav class="navbar">
                <div>
                    <img src="danidu_src/logo2.png" alt="TeachConnect Logo">
                </div>

                <ul class="navbarlist">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="aboutus.php">About Us</a></li>
                    <li><a href="Course.php">Courses</a></li>
                    <li><a href="Blog.php">Blog</a></li>
                    <li><a href="contact_us.php">Contact Us</a></li>

                    <div class="search_bar">
                    <form onsubmit="event.preventDefault(); window.location.href='course.php';">
                        <input type="search" placeholder="Search Courses">
                        <button type="submit">
                          <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                    </div>
                    
                        <?php if (isset($_SESSION['role']) && isset($_SESSION['fname'])): ?>
                            <li class="user_profile">
                                <div class="profile_circle">
                                    <?php echo strtoupper($_SESSION['fname'][0]); ?>
                                </div>
                            <ul class="dropdown_menu">
                                <?php if ($_SESSION['role'] === 'teacher'): ?>
                                <li><a href="student_dashboard.html">Dashboard</a></li>
                                 <?php elseif ($_SESSION['role'] === 'trainer'): ?>
                                <li><a href="Trainer_New/dashboard.php">Dashboard</a></li>
                                <?php elseif ($_SESSION['role'] === 'admin'): ?>
                                <li><a href="Admin.html">Admin Panel</a></li>
                                <?php endif; ?>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>   

                    <?php else: ?>
                        <!-- Show this if the user is not logged in -->
                        <div class="nav_buttons">
                            <button onclick="window.location.href='Regselector.html';" class="register_button">Register</button>
                            <button onclick="window.location.href='login.html';" class="login_button">Login</button>
                        </div>
                    <?php endif; ?>
                </ul>

            </nav>
        </section>

        <script src="danidu_js/script.js"></script>