<?php
// Include database conn
include 'conn.php';

$id = $_GET['id'];

// Delete feedback from the db
$sql = "DELETE FROM feedback WHERE feedback_id='$id'";

if ($conn->query($sql) === TRUE) {
    header('Location: view_feedback.php');
    exit();
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
