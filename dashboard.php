<?php
session_start();// Start the session to maintain the user's session data.

// Check if the user is logged in by verifying session data.
if (!isset($_SESSION['email'])) {
    header("Location: login.php");// Redirect to login page if the user is not logged in.
    exit();
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online_teacher_trainer";

// Create a new connection to the MySQL database.
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection for any errors.
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the email from the session.
$email = $_SESSION['email'];

// Prepare an SQL query to fetch user details based on the logged-in user's email.
$sql = "SELECT fname, lname, email, phone_number, country, subject, qualification_level FROM trainer2 WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);// Bind the email parameter to the query.
$stmt->execute();
$result = $stmt->get_result();// Execute the query and get the result.

if ($result->num_rows > 0) {
    // If a matching user is found, fetch their details.

    $row = $result->fetch_assoc();
    $name = $row['fname'] . ' ' . $row['lname'];// Combine first and last name.
    $email = $row['email'];
    $phone = $row['phone_number'];
    $address = $row['country']; // Assuming 'country' is used as 'address' here
    $password = ''; // Password should not be displayed in plain text
} else {
    echo "No user found."; // Handle case where no matching user is found.
    exit();
}

// Close the prepared statement and connection
$stmt->close();
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainer Profile</title>
    <!-- Link to the external stylesheet -->
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>

    <!-- Navigation Bar -->
    <section class="main_landing_section">
        <nav class="navbar">
            <div>
                <!-- Placeholder for logo -->
                <img src="danidu_src/logo.png" alt="TeachConnect Logo">
            </div>

            <!-- Navigation menu items -->
            <ul class="navbarlist">
                <li><a href="#">Home</a></li>
                <li><a href="aboutus.html">About Us</a></li>
                <li><a href="#">Courses</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>

            <!-- Search bar -->
            <div class="search_bar">
                <form>
                    <input type="search" placeholder="Search Courses">
                    <!-- Submit button with search icon -->
                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
            </div>

            
        </nav>
    </section>

    <!-- Trainer Profile Section -->
    <div class="profile-section">
        <div class="profile-pic">
            <!-- Trainer's profile picture -->
            <img src="k_images/trainer.jpeg" alt="Trainer Profile">
        </div>
        <div class="profile-details">
            <!-- Trainer's name and description -->
            <h1><?php echo htmlspecialchars($name); ?></h1>
            <p><h3>passionate educator with over a decade of experience in training teachers to improve their teaching techniques.</h3>

</p>
        </div>
    </div>

    <!-- Account Information Section -->
    <div class="account-info">
        <h2>Account Information</h2>
        <form>
            <!-- Trainer's personal information fields -->
            <label for="name">Name</label>
            <input type="text" id="name" value="<?php echo htmlspecialchars($name); ?>" readonly>

            <label for="email">Email</label>
            <input type="email" id="email" value="<?php echo htmlspecialchars($email); ?>" readonly>

            <label for="address">Address</label>
            <input type="text" id="address" value="<?php echo htmlspecialchars($address); ?>" readonly>

            <label for="phone">Phone</label>
            <input type="tel" id="phone" value="<?php echo htmlspecialchars($phone); ?>" readonly>

            <label for="password">Password</label>
            <input type="password" id="password" value="********" readonly>

            <!-- Button to trigger the edit functionality -->
            <button type="button" id="edit-btn">Edit</button>
            <!-- Button to trigger the delete functionality -->
            <button type="button" id="delete-btn" style="background-color: #ff4d4d; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.3s ease;">Delete Account</button>
        </form>
    </div>


<!-- Modal for editing details -->
<div id="editModal" class="modal" style="display: none; position: fixed; z-index: 1; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0, 0, 0, 0.6); padding-top: 60px; transition: opacity 0.3s ease;">
    <div class="modal-content" style="background-color: #fff; margin: 5% auto; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); width: 80%; max-width: 500px; animation: slide-down 0.3s ease-out;">
        <span class="close" style="color: #aaa; float: right; font-size: 28px; font-weight: bold; cursor: pointer; transition: color 0.3s ease;">&times;</span>
        <h2>Edit Account Information</h2>
        <form id="editForm" method="POST" action="update_profile.php">
            <label for="edit-name">Name</label>
            <input type="text" id="edit-name" name="name" value="<?php echo htmlspecialchars($name); ?>" style="width: 90%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 4px;">

            <label for="edit-email">Email</label>
            <input type="email" id="edit-email" name="email" value="<?php echo htmlspecialchars($email); ?>" style="width: 90%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 4px;">

            <label for="edit-address">Address</label>
            <input type="text" id="edit-address" name="address" value="<?php echo htmlspecialchars($address); ?>" style="width: 90%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 4px;">

            <label for="edit-phone">Phone</label>
            <input type="tel" id="edit-phone" name="phone" value="<?php echo htmlspecialchars($phone); ?>" style="width: 90%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 4px;">

            <label for="edit-password">Password</label>
            <input type="password" id="edit-password" name="password" placeholder="Enter new password" style="width: 90%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 4px;">

            <button type="submit" style="background-color: #18185c; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.3s ease;">Save</button>
        </form>
    </div>
</div>


    <!-- Footer Section -->
    <footer class="footer_section">
        <div class="container">
            <div class="row">
                <!-- Footer content, including logo, quick links, and social media -->
                <div class="footer_columns">
                    <h4>TeachConnect</h4>
                    <img src="danidu_src/logo.png">
                    <p>Teach</p>
                    <p>Learn</p>
                    <p>Inspire</p>
                </div>
                <div class="footer_columns">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="#">Register</a></li>
                        <li><a href="#">Login</a></li>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
                <div class="footer_columns">
                    <h4>Courses</h4>
                    <ul>
                        <li><a href="#">Technology</a></li>
                        <li><a href="#">Technology</a></li>
                    </ul>
                </div>
                <div class="footer_columns">
                    <h4>Follow Us</h4>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript for handling modal functionality -->
    <script>
        // Get the modal
        var modal = document.getElementById("editModal");

        // Get the button that opens the modal
        var btn = document.getElementById("edit-btn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        // Delete account functionality
    var deleteBtn = document.getElementById("delete-btn");
    deleteBtn.onclick = function() {
        if (confirm("Are you sure you want to delete your account? This action cannot be undone.")) {
            window.location.href = "delete_account.php";
        }
    }
    </script>
    
   
</body>
</html>
