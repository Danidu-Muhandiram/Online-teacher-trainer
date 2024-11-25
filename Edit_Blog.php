<?php
// Create a connection to the database
$con = new mysqli("localhost", "root", "", "online_teacher_trainer");

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Retrieve post_id from the URL (GET request)
if (isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];

    // Fetch the existing blog post data from the database
    $sql = "SELECT title, description FROM blog_post WHERE post_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $post_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $title = $row['title'];
        $description = $row['description'];
    } else {
        echo "Post not found!";
        exit;
    }

    $stmt->close();
} else {
    echo "No post ID provided!";
    exit;
}

// Check if the form is submitted (for updating)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $updated_title = $_POST['title'];
    $updated_description = $_POST['description'];

    // Update the blog post in the database
    $sql = "UPDATE blog_post SET title = ?, description = ? WHERE post_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssi", $updated_title, $updated_description, $post_id);

    if ($stmt->execute()) {
        echo "Blog post updated successfully!";
        // Redirect to the main page after update
        header("Location: Update_Blog.php");
        exit;
    } else {
        echo "Error updating post!";
    }

    $stmt->close();
}

// Close the database connection
$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Blog Post</title>
  <link rel="stylesheet" href="style.css">
  <style>
    /* Add some basic styling */
    .container {
      max-width: 900px;
      margin: 50px auto;
      padding: 20px;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
    }
    h1 {
      text-align: center;
      color: #333;
    }
    form {
      display: flex;
      flex-direction: column;
      gap: 20px;
      max-width: 800px; 
      margin: 0 auto;   
    }
    input[type="text"], textarea {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ddd;
      border-radius: 4px;
    }
    input[type="submit"] {
      padding: 12px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 18px;
    }
    input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Edit Blog Post</h1>

    <!-- Form to update the blog post -->
    <form action="edit_blog.php?post_id=<?php echo $post_id; ?>" method="POST">
      <label for="title">Blog Title :</label>
      <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?>" required>

      <label for="description">Blog Content :</label>
      <textarea id="description" name="description" rows="8" required><?php echo htmlspecialchars($description, ENT_QUOTES, 'UTF-8'); ?></textarea>

      <input type="submit" value="Update Blog Post">
    </form>
  </div>
</body>
</html>







