<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Course</title>
    <link rel="stylesheet" href="Addcourse.css">
</head>
<body>
    <div class="container">
        <h3>Add New Course Details</h3>
        <form action="insertcourse.php" method="POST">
            <div class="input-field">
                <input type="text" name="trainerid" placeholder="Your ID">
            </div>
            <div class="input-field">
                <input type="text" name="coursename" placeholder="Course Name">
            </div>
            <div class="input-field">
                <textarea name="coursedescription" placeholder="Course Description"></textarea>
            </div>
            <div class="input-field">
                <input type="text" name="courseprice" placeholder="Course Price">
            </div>
            <div>
                <button type="submit">Add New Course</button>
            </div>
        </form>
    </div>
    
</body>
</html>