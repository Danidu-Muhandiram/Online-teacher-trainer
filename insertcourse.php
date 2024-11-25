<?php

    require 'config.php'; // Include the database connection

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get the course name and description from the 
        $trainer_id = $_POST['trainerid'];
        $course_name = $_POST['coursename'];
        $course_description = $_POST['coursedescription'];
        $course_price = $_POST['courseprice'];

        // Fetch the latest course_id and calculate the next one
        $query = "SELECT course_id FROM courses ORDER BY course_id DESC LIMIT 1";
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $last_course_id = $row['course_id'];
            $next_course_id = 'C' . str_pad(((int)substr($last_course_id, 1)) + 1, 3, '0', STR_PAD_LEFT); // Increment ID
        } else {
            $next_course_id = 'C001'; // Start from C001 if no records found
        }

        // Basic validation to check if fields are not empty
        if (!empty($course_name) && !empty($course_description) && !empty($trainer_id)  && !empty($course_price)) {
            // Prepare SQL statement to insert new course with the generated course_id
            $sql = "INSERT INTO courses (course_id, title, description, price, trainer_id) VALUES (?, ?, ?, ?, ?)";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("sssds", $next_course_id, $course_name, $course_description, $course_price, $trainer_id); 

            // Execute the statement
            if ($stmt->execute()) {
                echo "New course added successfully";  
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Both fields are required!";
        }
    }

    $con->close();

    
?>




