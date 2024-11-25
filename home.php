<?php
session_start();  // Start the session to access the session data

// Check if the user is logged in
$is_logged_in = isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true;
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>TeachConnect</title>
        <link rel="stylesheet" href="danidu_css/home.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    </head>

    <body>
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


                <!-- <div class="nav_buttons">
                    <button onclick="window.location.href='Regselector.html';" class="register_button">Register</button>
                    <button onclick="window.location.href='login.html';" class="login_button">Login</button>
                </div>-->

                <!--<div class="user_profile">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </div>-->
            </nav>

            <div class="main_section">
                <div>
                    <h3 class="box_text">Welcome to TeachConnect</h3>
                    <h2>Unlock Your Potential</h2>
                    <h1>Advanced Training for Educators</h1>

                    <p>
                        <!--Unlock your full potential as an educator with our advanced training programs 
                        designed to enhance your skills.--> <!--and take your teaching career to the next level.-->
                        Whether you're looking to stay current with the latest methodologies or develop new
                        strategies for classroom success, our courses provide the tools and knowledge you need.
                        Your future in teaching begins here...
                        <!--Invest in your professional growth today and become the educator you've always aspired to be.-->
                    </p>
                        <!--Start your journey today and take the first step towards transformative professional development.-->

                    <div class="main_buttons">
                        <button onclick="window.location.href='Course.php';" id = "startnowbutton" class="start_now_button" >Start Now <i class="fa-solid fa-angle-right"></i></button>
                        <button onclick="window.location.href='aboutus.php';" id="aboutbutton" class="about_us_button">About Us</button>
                    </div>
                </div>
            </div>

            <div class="landing_image">
                <img src="danidu_src/teacher.png" alt="landing page image">
            </div>

            <div class="landing_image2">
                <img src="danidu_src/teacher2.png" alt="landing page image 2">
            </div>

            <!--<div class="main_page_footer">
                <li>20+ Technology Courses</li>
                <li>20+ Technology Courses</li>
                <li>20+ Technology Courses</li>
                <li>20+ Technology Courses</li>
                <li>20+ Technology Courses</li>
                <li>20+ Technology Courses</li>
            </div>-->

            <!--<div class="main-table-footer">
                <table>
                  <tr>
                    <td>20+ Top-Tier Courses</td>
                    <td>Flexible Learning</td>
                    <td>Expert Instructors</td>
                    <td>Certificate Programs</td>
                  </tr>
                </table>
              </div>-->
        </section>
        

        <!--About Us Section-->

        <section class="about">

            <div class="about_Content">
                <div class="about_image">
                    <img src="danidu_src/aboutimage.png">
                </div>
                <div class="about_text_content">
                    <div class="about_us_title">
                        <h1>Discover,</h1>
                    </div>
                    <h1> Who we are..</h1>
                    <div class="about_paragraph">
                        <p>We are committed to empowering educators with quality training programs,
                        helping them advance their careers and make a meaningful impact in their classrooms.</p>
                    </div>

                    <div class="about_us_info">
                        <div>
                            <h5>10+</h5>
                            <h6>Years Expertise</h6>
                        </div>

                        <div>
                            <h5>1000+</h5>
                            <h6>Online Educators</h6>
                        </div>
                    </div>

                    <div class="about_us_info">
                        <div>
                            <h5>50+</h5>
                            <h6>Online Courses</h6>
                        </div>

                        <div>
                            <h5>250+</h5>
                            <h6>Positive Testimonials</h6>
                        </div>
                    </div>

                    <div class="about_button">
                        <button onclick="window.location.href='aboutus.php';">Learn More</button>
                    </div>
                </div>
            </div>
        </section>

        <!--Explore Our Polpular Course Section-->

        <section class="home_course_section">
            <h1>Explore Our Polpular Courses</h1>

                <div class="home_courses_grid">
                    <div class="course_item">
                        <img src="danidu_src/gridimage01.jpg" alt="gridimage01">
                        <h3>Teaching with Technology</h3>
                        <p>Explore digital tools to enhance student learning and interaction.</p>
                        <h4>$14.99</h4>
                        <button>Enroll Now</button>
                    </div>
                    <div class="course_item">
                        <img src="danidu_src/gridimage02.jpg" alt="gridimage02">
                        <h3>Classroom Management Strategies</h3>
                        <p>Learn techniques to maintain a productive and organized classroom environment.</p>
                        <h4>$24.99</h4>
                        <button>Enroll Now</button>
                    </div>
                    <div class="course_item">
                        <img src="danidu_src/gridimage03.jpg" alt="gridimage03">
                        <h3>Develope Critical Thinking in Students</h3>
                        <p>Learn methods to encourage analytical and independent thinking in students.</p>
                        <h4>$14.50</h4>
                        <button>Enroll Now</button>
                    </div>
                    <div class="course_item">
                        <img src="danidu_src/gridimage04.jpg" alt="gridimage04">
                        <h3>Advanced English for Educators</h3>
                        <p>Enhance your English proficiency for teaching in diverse, multilingual classrooms.</p>
                        <h4>$15.50</h4>
                        <button>Enroll Now</button>
                    </div>
                    <div class="course_item">
                        <img src="danidu_src/gridimage05.jpg" alt="gridimage05">
                        <h3>Foundation for New Educators</h3>
                        <p>Build essential teaching skills and knowledge for early-career educators.</p>
                        <h4>$10.00</h4>
                        <button>Enroll Now</button>
                    </div>
                    <div class="course_item">
                        <img src="danidu_src/gridimage06.jpg" alt="gridimage06">
                        <h3>Educational Leadership for Teachers</h3>
                        <p>Develop leadership skills to guide and influence positive change in your school community.</p>
                        <h4>$40.50</h4>
                        <button>Enroll Now</button>
                    </div>
                </div>
                <div class="all_courses_button">
                    <button onclick="window.location.href='course.php';">View All Courses</button>
                </div>
        </section>
        
          <!--Feedback section-->

          <section class="feedback_section">
            <div class="feedback_header">
                <h1>Feedbacks</h1>
                <h2>What our educators say about Us</h2>
            </div>
            <div class="feedback_card">
                <div class="card">
                    <p>
                        I appreciate how well-organized the courses are. 
                        It's easy to browse different categories and find exactly what I’m looking for
                    </p>
                    <hr/>
                    <img src="danidu_src/feedback01.jpg">
                    <p class="feedback_name">
                        Pathum Bandara
                    </p>
                </div>

                <div class="card">
                    <p>
                        The course descriptions are very detailed and informative. 
                        It really helps me decide which course suits my needs best
                    </p>
                    <hr/>
                    <img src="danidu_src/feedback02.jpg">
                    <p class="feedback_name">
                        Walter White
                    </p>
                </div>

                <div class="card">
                    <p>
                        The variety of courses offered on this platform is impressive. 
                        There’s something for everyone, whether you're a beginner or advanced learner!
                    </p>
                    <hr/>
                    <img src="danidu_src/feedback03.jpg">
                    <p class="feedback_name">
                        Lionel A. Messi
                    </p>
                </div>
            </div>

            <div class="all_courses_button">
                <button onclick="window.location.href='feedback.php';">View All Feedbacks</button>
            </div>
        </section>

        <!--Footer-->
      
        <!--Footer Html Codes-->
        <footer class="footer_section">
            <div class="footer_container">
                <div class="footer_columns">
                    <h4>TeachConnect</h4>
                    <img src="danidu_src/logo2.png" alt="Logo">
                    <p>Teach. Learn. Inspire.</p>
                </div>
    
                <div class="footer_columns">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="home.html">Home</a></li>
                        <li><a href="contact_us.php">Contact Us</a></li>
                        <li><a href="course.php">Courses</a></li>
                        <li><a href="Blog.php">Blog and News</a></li>
                        <li><a href="aboutus.php">About Us</a></li>
                        <li><a href="feedback.php">Feedbacks</a></li>
                        <li><a href="FAQ.php">FAQ</a></li>
                    </ul>
                </div>
    
                <div class="footer_columns">
                    <h4>Courses</h4>
                    <ul>
                        <li><a href="course.php">Technology</a></li>
                        <li><a href="course.php">Science</a></li>
                        <li><a href="course.php">Design</a></li>
                        <li><a href="course.php">Business</a></li>
                    </ul>
                </div>
    
                <div class="footer_columns">
                    <h4>Follow Us</h4>
                    <ul class="social-icons">
                        <li><a href="https://www.facebook.com"><i class="fab fa-facebook"></i> Facebook</a></li>
                        <li><a href="https://www.twitter.com"><i class="fab fa-twitter"></i> Twitter</a></li>
                        <li><a href="https://www.instagram.com"><i class="fab fa-instagram"></i> Instagram</a></li>
                    </ul>
                </div>
    
            </div>
            <div class="footer_bottom">
                &copy; 2024 TeachConnect. All Rights Reserved.
            </div>
        </footer>
        <script src="danidu_js/script.js"></script>
    </body>
</html>