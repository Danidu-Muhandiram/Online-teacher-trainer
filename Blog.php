
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" description="width=device-width, initial-scale=1.0">    <!-- for responsiveness -->
    <title>Document</title>
    <link rel="stylesheet" href="css/Blog.css">
    <link rel="stylesheet" href="navigation_footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>
<body>

     <!-- Include the navigation bar -->
     <?php include 'navigation_bar.php'; ?>

    <!-- slider -->
    <div class="slider">
        <div class="list">
            <?php
            // making database connection 
            $con = new mysqli('localhost', 'root', '', 'online_teacher_trainer');  

            // Pulling blog posts from the database which we stored earlier
            $sql = "SELECT post_id, title, description, image_path FROM blog_post";
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
                $first = true;  
                while ($row = $result->fetch_assoc()) {  // When its true code enters a loop and generates blog posts                   
                    echo '<div class="item ' . ($first ? 'active' : '') . '">'; // Dynamically create each blog post slide
                        echo "<img src='" . $row['image_path'] . "' alt='Blog Image'>";

                        echo '<div class="description">';
                            echo '<p>NEWS & EVENT</p>';
                            echo '<h2>' . $row['title'] . '</h2>';
                            echo '<p>' . $row['description'] . '</p>';
                        echo '</div>'; 
                    echo '</div>'; 

                    $first = false;  // Set to false after the first item

                    //refered an external source to get an idea about functionality of the loop
                }
            } else {
                echo "<p>No blog posts found</p>"; //if there were no rows, this massege displays without going to a loop
            }
            ?>
        </div>

        <!-- arrow buttons -->
        <div class="arrows"> 
            <button id="prev"><</button>
            <button id="next">></button>
        </div>

       <!-- thumbnails -->
       <div class="thumbnail">
        <?php 
            // pulling images for thumbnails
            $sql = "SELECT image_path FROM blog_post";  
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
                $first = true;
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="item ' . ($first ? 'active' : '') . '">';  // Mark the first item as 'active'
                    echo "<img src='" . $row['image_path'] . "' alt='Thumbnail Image'>";  
                    echo '</div>';

                    $first = false;  // Set the first flag to false after the first iteration
                    //refered an external source to get an idea about functionality of the loop
                }
            } 
            else {
                echo "<p>No thumbnails found</p>";  // If no results, show a message
            }
            $con->close();  
        ?>
        </div>
    </div>

    <!-- footer -->
        <?php include 'footer.html'; ?>
        <script src="danidu_js/script.js"></script>
    <script src="js/Blog.js"></script>
    

</body>
</html>
