<?php

// Create connection
$con = new mysqli("localhost", "root", "", "online_teacher_trainer");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post_id = isset($_POST['post_id']) ? $_POST['post_id'] : null;
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Handling image upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Only upload image if a file is selected
    if ($_FILES["image"]["size"] > 0) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image_path = $target_file;
        } else {
            echo "Sorry, there was an error uploading your file.";
            $uploadOk = 0;
        }
    }

    // If upload was successful or no image change
    if ($uploadOk == 1) {
        if ($post_id) {
            // Update existing blog post
            if (isset($image_path)) {
                $sql = "UPDATE blog_post SET title='$title', description='$description', image_path='$image_path' WHERE post_id=$post_id";
            } else {
                $sql = "UPDATE blog_post SET title='$title', description='$description' WHERE post_id=$post_id";
            }
        } else {
            // Add a new blog post
            if (isset($image_path)) {
                $sql = "INSERT INTO blog_post (title, description, image_path) VALUES ('$title', '$description', '$image_path')";
            } else {
                echo "Image upload required for new posts.";
                exit;
            }
        }

        if ($con->query($sql) === TRUE) {
            echo "Blog post saved successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }
}

$con->close();
?>

