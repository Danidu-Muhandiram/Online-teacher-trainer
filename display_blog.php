<?php

// Create connection
$con = new mysqli("localhost", "root", "", "online_teacher_trainer");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$sql = "SELECT post_id, title, description, image_path FROM blog_post";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='online_teacher_trainer post'>";                  
        echo "<h3>" . $row["title"] . "</h3>";
        echo "<p>" . $row["description"] . "</p>";
        echo "</div>";
    }
} else {
    echo "0 results";
}

$con->close();
?>
