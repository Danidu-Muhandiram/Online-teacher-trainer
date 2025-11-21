<?php
// Include database connection
include 'conn.php';

// Fetch all feedback
$sql = "SELECT * FROM feedback";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Feedbacks</title>
        <link rel="stylesheet" href="feedback.css">
    </head>

    <body>

       <!--Navigation Bar Html Codes-->





<br><br><br><br><br><br>
<h1 class="h_heading">All Feedbacks</h1><br>
<center>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Feedback</th>
            <th>Rating</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['feedback_id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['feedback'] ?></td>
            <td><?= $row['rating'] ?></td>
            <td>
                <a href="edit_feedback.php?id=<?= $row['feedback_id'] ?>">Edit</a> | 
                <a href="delete_feedback.php?id=<?= $row['feedback_id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<center>



        <!--Footer Html Codes-->
		
		
		
</body> 
</html>
<?php $conn->close(); ?>
