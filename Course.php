
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Course</title>
    <link rel="stylesheet" href="course.css">
    <link rel="stylesheet" href="navigation_footer.css">
    <link rel="stylesheet" href="font.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
</head>
<body>
<!-- Include the navigation bar -->
<?php include 'navigation_bar.php'; ?>
<?php
        require 'config.php';

        $user = isset($_SESSION['role']) ? $_SESSION['role']: '';
        $testSql = "SELECT title, course_id, description FROM courses";
        $result = $con -> query($testSql);

        if($result -> num_rows > 0) {

            echo "<div class='course-container'>";

            while($row = $result -> fetch_assoc()) {
                
                echo "<div class='coursecontent'>";
                echo "<h3>" . $row['title'] . "</h3>";
                echo "<p>" . $row['description'] . "</p>";
                    echo "<div class=btn>";
                if($user == 'admin' || $user == 'trainer') {
                    echo "<form action='update.php' method='post'>"; 
                    echo "<input type='hidden' name='id' value='" . $row['course_id'] . "'>"; 
                    echo "<button class='update-btn' type='submit'>Update</button>";
                    echo "</form>";

                    echo "<form action='delete.php' method='post'>";
                    echo "<input type='hidden' name='delete_id' value='" . htmlspecialchars($row['course_id']) . "'>";
                    echo "<button class='delete-btn' type='submit' onclick='return confirm(\"Are you sure you want to delete this course?\")'>Delete</button>";
                    echo "</form>";
                }

                elseif($user == 'admin' || $user == 'student') {
                echo "<a href='payment.php'><button class='buy-btn'>Enroll Now</button></a>";}
                    echo "</div>";
                echo "</div>";
                
            }
            echo "</div>";
        }

        echo "<div class='add-course'>";
        echo "<a href='addcourse.php'>";
        echo "<img src='images/plus.png' alt= 'add image'>";
        echo "</a>";
        echo "</div>";
        
        $con -> close();
    ?>
    
     <!-- Include the footer -->
     <?php include 'footer.html'; ?>
    <script src="danidu_js/script.js"></script>
</body>
</html>
