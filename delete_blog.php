<?php

// Create connection
$con = new mysqli("localhost", "root", "", "online_teacher_trainer");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post_id = $_POST['post_id'];

    // Fetch the image path from the database
    $sql = "SELECT image_path FROM blog_post WHERE post_id = $post_id";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the image path
        $row = $result->fetch_assoc();
        $image_path = $row['image_path'];

        // Delete the image file from the server
        if (file_exists($image_path)) {
            unlink($image_path);
        } else {
            echo "Image file does not exist.";
        }

        // Delete the blog post from the database
        $delete_sql = "DELETE FROM blog_post WHERE post_id = $post_id";

        if ($con->query($delete_sql) === TRUE) {
            echo "Blog post and image deleted successfully!";
        } else {
            echo "Error deleting post: " . $con->error;
        }
    } else {
        echo "No blog post found with the provided ID.";
    }
}

$con->close();
?>
