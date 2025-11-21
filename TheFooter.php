<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <link rel="stylesheet" href="style.css">

  <style>
    /* Footer General Styling */
    .footer_section {
        background-color: #152153;
        padding: 40px 0;
        color: white;
        font-family: Arial, sans-serif;
    }

    .footer_container {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        max-width: 1200px;
        margin: 0 auto;
    }

    .footer_columns {
        flex: 1;
        min-width: 220px;
        margin-bottom: 30px;
        padding: 0 20px;
    }

    .footer_columns h4 {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 20px;
        position: relative;
    }

    .footer_columns ul {
        padding: 0;
    }

    .footer_columns ul li {
        list-style: none;
        margin-bottom: 10px;
    }

    .footer_columns ul a {
        text-decoration: none;
        color: #ffffff;
        font-size: 14px;
        transition: color 0.3s ease;
    }

    .footer_columns ul a:hover {
        color: #f1c40f;
    }

    .footer_columns p {
        margin: 10px 0;
        font-size: 14px;
    }

    .footer_columns img {
        width: 120px;
        margin-bottom: 20px;
    }

    /* Adjust column spacing */
    .footer_columns:first-child {
        padding-left: 0;
    }

    .footer_columns:last-child {
        padding-right: 0;
    }

    /* Social Media Icons - Vertical */
    .footer_columns ul.social-icons {
        display: block;
    }

    .footer_columns ul.social-icons li {
        list-style: none;
        margin-bottom: 10px;
    }

    .footer_columns ul.social-icons a {
        font-size: 18px;
        color: white;
        transition: color 0.3s ease;
    }

    .footer_columns ul.social-icons a:hover {
        color: #f1c40f;
    }

    /* Footer Bottom Section */
    .footer_bottom {
        text-align: center;       
        padding-top: 10px;
        padding-bottom: 5px;
        border-top: 2px solid #ffffff1a;
        font-size: 12px;
        color: #b0b0b0;
    }
  </style>
</head>
<body>    
    <footer class="footer_section">
        <div class="footer_container">
            <div class="footer_columns">
                <h4>TeachConnect</h4>
                <img src="danidu_src/logo.png" alt="Logo">
                <p>Teach. Learn. Inspire.</p>
            </div>

            <div class="footer_columns">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="#">Register</a></li>
                    <li><a href="#">Login</a></li>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Courses</a></li>
                    <li><a href="#">Blog and News</a></li>
                    <li><a href="#">About Us</a></li>
                </ul>
            </div>

            <div class="footer_columns">
                <h4>Courses</h4>
                <ul>
                    <li><a href="#">Technology</a></li>
                    <li><a href="#">Science</a></li>
                    <li><a href="#">Design</a></li>
                    <li><a href="#">Business</a></li>
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
</body>
</html>
