<?php
require 'config.php';

$course_id = null;
$title = "";
$description = "";

if (isset($_POST['id']) && !isset($_POST['description'])) { 
    // This block is for fetching the course details based on the course_id
    $course_id = $_POST['id']; 

    // Fetch the course details based on the ID
    $sql = "SELECT title, description FROM courses WHERE course_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $course_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $course = $result->fetch_assoc();
        $title = $course['title'];
        $description = $course['description'];
    } else {
        echo "Course not found!";
        exit;
    }
}

// When the form is submitted to update the description
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['description']) && isset($_POST['id'])) {
    $course_id = $_POST['id']; // Make sure we still have the course ID
    $new_description = $_POST['description']; // Get the updated description

    // Update the course description
    $update_sql = "UPDATE courses SET description = ? WHERE course_id = ?";
    $update_stmt = $con->prepare($update_sql);
    $update_stmt->bind_param("ss", $new_description, $course_id);
    $update_stmt->execute();

    if ($update_stmt->affected_rows > 0) {
        echo "Course description updated successfully!";
    } else {
        echo "No changes made.";
    }

    // Fetch the updated course data for display after the update
    $sql = "SELECT title, description FROM courses WHERE course_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $course_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $course = $result->fetch_assoc();
        $title = $course['title'];
        $description = $course['description'];
    }
}

$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Course</title>
    <link rel="stylesheet" href="Addcourse.css">
</head>
<body>
    <h2>Update Course: <?php echo htmlspecialchars($title); ?></h2>

    <form method="POST" action="update.php">
        <!-- Hidden input to store the course ID -->
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($course_id); ?>"> 
        
        
        <textarea name="description" id="description" rows="5" placeholder="Course Description"><?php echo htmlspecialchars($description); ?></textarea><br><br>

        <button type="submit">Update Description</button>
    </form>
</body>
</html>
