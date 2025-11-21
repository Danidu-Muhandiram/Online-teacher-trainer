<?php
    require 'config.php';

    if (isset($_POST['delete_id'])) {
        $course_id = $_POST['delete_id']; // Get the course ID from the POST request

        // SQL to delete the course based on course_id
        $delete_sql = "DELETE FROM courses WHERE course_id = ?";
        $stmt = $con->prepare($delete_sql);
        $stmt->bind_param("s", $course_id); // Bind the course ID as an integer
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Course deleted successfully!";
        } else {
            echo "Failed to delete the course.";
        }

        $stmt->close();
    } else {
        echo "Invalid request!";
    }

    $con->close();
?>
