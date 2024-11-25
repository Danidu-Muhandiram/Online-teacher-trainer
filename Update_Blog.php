<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" description="width=device-width, initial-scale=1.0">
  <title>Update Blog Page</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }
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
    input[type="file"] {
      font-size: 16px;
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
    .blog-list {
      margin-top: 40px;
    }
    .blog-post {
      display: flex;
      gap: 20px;
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 8px;
      margin-bottom: 20px;
    }
    .blog-post img {
      width: 150px;
      height: 150px;
      object-fit: cover;
      border-radius: 8px;
    }
    .blog-details {
      flex-grow: 1;
    }
    .blog-details h3 {
      margin: 0;
      font-size: 1.5em;
    }
    .blog-details p {
      font-size: 1em;
      color: #666;
    }
    .blog-details form {
      margin-top: 10px;
    }
  </style>
</head>
<body>

  <div class="container">
    <h1>Update Blog Page</h1>

    <!-- Form for adding/updating blog posts -->
    <form action="add-update-blog.php" method="POST" enctype="multipart/form-data">
      <label for="title">Blog Title :</label>
      <input type="text" id="title" name="title" required>

      <label for="description">Blog Content :</label>
      <textarea id="description" name="description" rows="8" required></textarea>

      <label for="image">Upload Blog Image</label>
      <input type="file" id="image" name="image" required>

      <input type="submit" value="Submit Blog Post">
    </form>

    <br><br><hr>
    <h2><center><u>Current Blog Posts</u></center></h2>
    <div class="blog-list">

      <?php
      // Connect to the database
      $con = new mysqli('localhost', 'root', '', 'online_teacher_trainer');

      // Check connection
      if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
      }

      // Fetch blog posts from the database
      $sql = "SELECT post_id, title, description, image_path FROM blog_post";
      $result = $con->query($sql);

      if ($result->num_rows > 0) {
        // Output data for each row
        while ($row = $result->fetch_assoc()) {
          echo '<div class="blog-post">';
          echo '<img src="' . htmlspecialchars($row['image_path']) . '" alt="' . htmlspecialchars($row['title']) . '">';
          echo '<div class="blog-details">';
          echo '<h3>' . htmlspecialchars($row['title']) . '</h3>';
          echo '<p>' . htmlspecialchars($row['description']) . '</p>';

          // Add delete form 
          echo '<form action="delete_blog.php" method="POST">';
          echo '<input type="hidden" name="post_id" value="' . $row['post_id'] . '">';
          echo '<button type="submit" class="btn btn-danger">Delete Blog Post</button>';
          echo '</form>';
          
          // Update option and redirection to edit page
          echo '<form action="edit_blog.php" method="GET">';  
          echo '<input type="hidden" name="post_id" value="' . $row['post_id'] . '">';
          echo '<button type="submit" class="btn btn-danger">Update Blog Post</button>';
          echo '</form>';
          
          echo '</div>';
          echo '</div>';
        }
      } else {
        echo "No blog posts found.";
      }

      $con->close();
      ?>
      
    </div>
  </div>

</body>
</html>
